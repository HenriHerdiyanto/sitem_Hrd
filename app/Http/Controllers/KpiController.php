<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\KategoriKpi;
use App\Models\Kpi;
use App\Models\User;
use Illuminate\Http\Request;

class KpiController extends Controller
{
    public function index()
    {
        $loggedInUser = auth()->user();
        // Mengambil semua data user dengan divisi_id yang sama
        $kpi = Kpi::where("divisi_id", '=', $loggedInUser->divisi_id)->get();
        // dd($kpi);
        $users = User::where("divisi_id", '=', $loggedInUser->divisi_id)->get();

        $divisi = Divisi::all();

        $kategori_kpis = KategoriKpi::join('users', 'kategori_kpis.divisi_id', '=', 'users.divisi_id')
            ->where('users.id', '=', $loggedInUser->id)
            ->get(['kategori_kpis.*']);

        return view("manager.kpi.index", compact("loggedInUser", "kategori_kpis", "divisi", "users", "kpi"));
    }

    public function store(Request $request)
    {
        $kpi = new Kpi();
        $kpi->kategorikpi_id = $request->kategorikpi_id;
        $kpi->divisi_id = $request->divisi_id;
        $kpi->user_id = $request->user_id;
        $kpi->nilai1 = $request->nilai1;
        $kpi->nilai2 = $request->nilai2;
        $kpi->nilai3 = $request->nilai3;
        $kpi->nilai4 = $request->nilai4;
        $kpi->nilai5 = $request->nilai5;
        $kpi->nilai6 = $request->nilai6;
        $kpi->nilai7 = $request->nilai7;
        $kpi->nilai8 = $request->nilai8;
        $kpi->nilai9 = $request->nilai9;
        $kpi->nilai10 = $request->nilai10;
        $kpi->nilai11 = $request->nilai11;
        $kpi->nilai12 = $request->nilai12;
        $kpi->total_nilai = $request->total_nilai;
        $kpi->nilai_akhir = $request->nilai_akhir;
        $kpi->adjustments = $request->adjustments;
        $kpi->persen = $request->persen;
        $kpi->save();
        return redirect()->route('kpi.index')->with('success', 'Data berhasil disimpan.');
    }

    public function edit(Kpi $kpi, $id)
    {
        $kpi = Kpi::find($id);
        $loggedInUser = auth()->user();
        $users = User::where("divisi_id", '=', $loggedInUser->divisi_id)->get();
        $divisi = Divisi::all();

        $kategori_kpis = KategoriKpi::join('users', 'kategori_kpis.divisi_id', '=', 'users.divisi_id')
            ->where('users.id', '=', $loggedInUser->id)
            ->get(['kategori_kpis.*']);

        return view('manager.kpi.edit', compact('kpi', 'kategori_kpis', 'users'));
    }


    public function update(Request $request, $id)
    {
        $kpi = Kpi::find($id);
        $kpi->kategorikpi_id = $request->kategorikpi_id;
        $kpi->divisi_id = $request->divisi_id;
        $kpi->user_id = $request->user_id;
        $kpi->nilai1 = $request->nilai1;
        $kpi->nilai2 = $request->nilai2;
        $kpi->nilai3 = $request->nilai3;
        $kpi->nilai4 = $request->nilai4;
        $kpi->nilai5 = $request->nilai5;
        $kpi->nilai6 = $request->nilai6;
        $kpi->nilai7 = $request->nilai7;
        $kpi->nilai8 = $request->nilai8;
        $kpi->nilai9 = $request->nilai9;
        $kpi->nilai10 = $request->nilai10;
        $kpi->nilai11 = $request->nilai11;
        $kpi->nilai12 = $request->nilai12;
        $kpi->total_nilai = $request->total_nilai;
        $kpi->save();
        return redirect()->route('kpi.index')->with('success', 'ok');
    }

    public function destroy($id)
    {
        $kpi = Kpi::find($id);
        $kpi->delete();
        return redirect()->route('kpi.index')->with('success', 'ok');
    }
    
    public function Admindestroy($id)
    {
        $kpi = Kpi::find($id);
        $kpi->delete();
        return redirect()->route('kpi.index')->with('success', 'ok');
    }
}
