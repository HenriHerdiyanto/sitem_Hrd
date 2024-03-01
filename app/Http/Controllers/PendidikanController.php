<?php

namespace App\Http\Controllers;

use App\Models\Keluarga;
use App\Models\Pendidikan;
use App\Models\User;
use Illuminate\Http\Request;

class PendidikanController extends Controller
{
    public function index()
    {
        $pendidikan = Pendidikan::all();
        $user = User::all();
        return view("admin.karyawan.pendidikan", compact("pendidikan", "user"));
    }

    // ================================================================================================

    public function userstore(Request $request)
    {
        $validateDate = $request->validate([
            "user_id" => "required",
            "jenjang_pendidikan" => "required",
            "instansi_pendidikan" => "required",
            "jurusan" => "required",
            "tahun_masuk" => "required",
            "tahun_keluar" => "required",
            "index_nilai" => "required",
        ]);

        $pendidikan = new Pendidikan();
        $pendidikan->user_id = $validateDate["user_id"];
        $pendidikan->jenjang_pendidikan = $validateDate["jenjang_pendidikan"];
        $pendidikan->instansi_pendidikan = $validateDate["instansi_pendidikan"];
        $pendidikan->jurusan = $validateDate["jurusan"];
        $pendidikan->tahun_masuk = $validateDate["tahun_masuk"];
        $pendidikan->tahun_keluar = $validateDate["tahun_keluar"];
        $pendidikan->index_nilai = $validateDate["index_nilai"];
        $pendidikan->save();
        return redirect()->back()->with("success", "ok");
    }

    public function userupdate(Request $request, $id)
    {
        $pendidikan = Pendidikan::find($id);
        $validateDate = $request->validate([
            "user_id" => "nullable",
            "jenjang_pendidikan" => "nullable",
            "instansi_pendidikan" => "nullable",
            "jurusan" => "nullable",
            "tahun_masuk" => "nullable",
            "tahun_keluar" => "nullable",
            "index_nilai" => "nullable",
        ]);

        $pendidikan = Pendidikan::findOrfail($id);
        $pendidikan->user_id = $validateDate["user_id"];
        $pendidikan->jenjang_pendidikan = $validateDate["jenjang_pendidikan"];
        $pendidikan->instansi_pendidikan = $validateDate["instansi_pendidikan"];
        $pendidikan->jurusan = $validateDate["jurusan"];
        $pendidikan->tahun_masuk = $validateDate["tahun_masuk"];
        $pendidikan->tahun_keluar = $validateDate["tahun_keluar"];
        $pendidikan->index_nilai = $validateDate["index_nilai"];
        $pendidikan->save();
        return redirect()->route('user.profile')->with("success", "ok");
    }



    // ================================================================================================
    public function store(Request $request)
    {
        $validateDate = $request->validate([
            "user_id" => "required",
            "jenjang_pendidikan" => "required",
            "instansi_pendidikan" => "required",
            "jurusan" => "required",
            "tahun_masuk" => "required",
            "tahun_keluar" => "required",
            "index_nilai" => "required",
        ]);

        $pendidikan = new Pendidikan();
        $pendidikan->user_id = $validateDate["user_id"];
        $pendidikan->jenjang_pendidikan = $validateDate["jenjang_pendidikan"];
        $pendidikan->instansi_pendidikan = $validateDate["instansi_pendidikan"];
        $pendidikan->jurusan = $validateDate["jurusan"];
        $pendidikan->tahun_masuk = $validateDate["tahun_masuk"];
        $pendidikan->tahun_keluar = $validateDate["tahun_keluar"];
        $pendidikan->index_nilai = $validateDate["index_nilai"];
        $pendidikan->save();
        return redirect()->back()->with("success", "ok");
    }

    public function show($id)
    {
        $user = User::find($id);
        if (!$user) {
            return view('manager.notfound');
        }
        $pendidikans = Pendidikan::where('user_id', $user->id)->first();
        if (!$pendidikans) {
            return view('manager.notfound');
        }
        return view('manager.pendidikan', compact('user', 'pendidikans'));
    }
    public function update(Request $request, $id)
    {
        $pendidikan = Pendidikan::find($id);
        $validateDate = $request->validate([
            "user_id" => "nullable",
            "jenjang_pendidikan" => "nullable",
            "instansi_pendidikan" => "nullable",
            "jurusan" => "nullable",
            "tahun_masuk" => "nullable",
            "tahun_keluar" => "nullable",
            "index_nilai" => "nullable",
        ]);

        $pendidikan = Pendidikan::findOrfail($id);
        $pendidikan->user_id = $validateDate["user_id"];
        $pendidikan->jenjang_pendidikan = $validateDate["jenjang_pendidikan"];
        $pendidikan->instansi_pendidikan = $validateDate["instansi_pendidikan"];
        $pendidikan->jurusan = $validateDate["jurusan"];
        $pendidikan->tahun_masuk = $validateDate["tahun_masuk"];
        $pendidikan->tahun_keluar = $validateDate["tahun_keluar"];
        $pendidikan->index_nilai = $validateDate["index_nilai"];
        $pendidikan->save();
        return redirect()->route('manager.profile')->with("success", "ok");
    }

    public function Detail($id)
    {
        $user = User::find($id);
        $keluarga = Keluarga::where('user_id', $user->id)->get();
        $pendidikan = Pendidikan::where('user_id', $user->id)->get();
        // dd($pendidikan);
        return view("admin.karyawan.pendidikan", compact("pendidikan", "user", "keluarga"));
    }
}
