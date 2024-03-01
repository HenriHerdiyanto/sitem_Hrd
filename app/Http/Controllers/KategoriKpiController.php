<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\KategoriKpi;
use App\Models\User;
use App\Models\Kpi;
use Illuminate\Http\Request;

class KategoriKpiController extends Controller
{
    public function index()
    {
        $user = User::all();
        $kpi = Kpi::all();
        $kategori = KategoriKpi::with('divisi')->get();
        $divisi = Divisi::all();
        return view("admin.kpi.index", compact("user", "kategori", "kpi", "divisi"));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            "divisi_id" => "required",
            "nama_kpi" => "required",
            "pertanyaan1" => "nullable",
            "pertanyaan2" => "nullable",
            "pertanyaan3" => "nullable",
            "pertanyaan4" => "nullable",
            "pertanyaan5" => "nullable",
            "pertanyaan6" => "nullable",
            "pertanyaan7" => "nullable",
            "pertanyaan8" => "nullable",
            "pertanyaan9" => "nullable",
            "pertanyaan10" => "nullable",
            "pertanyaan11" => "nullable",
            "pertanyaan12" => "nullable",
        ]);

        $kategori = new KategoriKpi();
        $kategori->divisi_id = $validateData['divisi_id'];
        $kategori->nama_kpi = $validateData['nama_kpi'];
        $kategori->pertanyaan1 = $validateData['pertanyaan1'];
        $kategori->pertanyaan2 = $validateData['pertanyaan2'];
        $kategori->pertanyaan3 = $validateData['pertanyaan3'];
        $kategori->pertanyaan4 = $validateData['pertanyaan4'];
        $kategori->pertanyaan5 = $validateData['pertanyaan5'];
        $kategori->pertanyaan6 = $validateData['pertanyaan6'];
        $kategori->pertanyaan7 = $validateData['pertanyaan7'];
        $kategori->pertanyaan8 = $validateData['pertanyaan8'];
        $kategori->pertanyaan9 = $validateData['pertanyaan9'];
        $kategori->pertanyaan10 = $validateData['pertanyaan10'];
        $kategori->pertanyaan11 = $validateData['pertanyaan11'];
        $kategori->pertanyaan12 = $validateData['pertanyaan12'];
        $kategori->save();

        return redirect()->route('admin.kategoriKpi.index')->with('success', 'ok');
    }

    public function update(Request $request, $id)
    {
        $kpi = KategoriKpi::find($id);
        $kpi->divisi_id = $request->divisi_id;
        $kpi->nama_kpi = $request->nama_kpi;
        $kpi->pertanyaan1 = $request->pertanyaan1;
        $kpi->pertanyaan2 = $request->pertanyaan2;
        $kpi->pertanyaan3 = $request->pertanyaan3;
        $kpi->pertanyaan4 = $request->pertanyaan4;
        $kpi->pertanyaan5 = $request->pertanyaan5;
        $kpi->pertanyaan6 = $request->pertanyaan6;
        $kpi->pertanyaan7 = $request->pertanyaan7;
        $kpi->pertanyaan8 = $request->pertanyaan8;
        $kpi->pertanyaan9 = $request->pertanyaan9;
        $kpi->pertanyaan10 = $request->pertanyaan10;
        $kpi->pertanyaan11 = $request->pertanyaan11;
        $kpi->pertanyaan12 = $request->pertanyaan12;
        $kpi->save();
        return redirect()->route('admin.kategoriKpi.index')->with('success', 'ok');
    }

    public function edit($user_id)
    {
        $user = User::find($user_id);
        $divisi_id = $user->divisi_id;
        $kpi = Kpi::where('user_id', $user_id)->first();
        $kategori = KategoriKpi::where('divisi_id', $divisi_id)->get();
        return view('admin.kpi.edit', compact('user', 'kpi', 'kategori'));
    }


    public function destroy($id)
    {
        $kategori = KategoriKpi::findOrFail($id);
        $kategori->delete();
        return redirect()->back()->with("success", "ok");
    }
}
