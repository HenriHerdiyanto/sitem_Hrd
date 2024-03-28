<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Support\Facades\View;
use App\Models\Evaluasi;
use App\Models\User;
use App\Models\Cuti;
use App\Models\PerjalananDinas;
use App\Models\Budget;
use App\Models\Pinjaman;
use App\Models\Lembur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LemburController extends Controller
{

    public function userindex()
    {
        $user = auth()->user();
        $lemburs = $user->lemburs;
        // dd($todolists);
        return view("user.lembur.index", compact("lemburs"));
    }

    public function usercreate()
    {
        $user = auth()->user();
        $lemburs = $user->lemburs;
        return view("user.lembur.create", compact("lemburs"));
    }

    public function userstore(Request $request)
    {
        $validateData  = $request->validate([
            "user_id" => "required",
            "nama_project" => "required",
            "tanggal" => "required",
            "mulai_lembur" => "required",
            "akhir_lembur" => "required",
            "total_lembur" => "required",
            "status" => "required",
        ]);

        $lembur = new Lembur();
        $lembur->user_id = $validateData["user_id"];
        $lembur->nama_project = $validateData["nama_project"];
        $lembur->tanggal = $validateData["tanggal"];
        $lembur->mulai_lembur = $validateData["mulai_lembur"];
        $lembur->akhir_lembur = $validateData["akhir_lembur"];
        $lembur->total_lembur = $validateData["total_lembur"];
        $lembur->status = $validateData["status"];
        $lembur->save();
        return redirect()->route("user.lembur.index")->with("success", "ok");
    }

    public function useredit($id)
    {
        $lembur = Lembur::find($id);
        $user = User::find($lembur->user_id);
        return view("user.lembur.edit", compact("lembur", "user"));
    }

    public function userupdate(Request $request, $id)
    {
        $lembur = Lembur::find($id);
        $validateData  = $request->validate([
            "user_id" => "required",
            "nama_project" => "required",
            "tanggal" => "required",
            "mulai_lembur" => "required",
            "akhir_lembur" => "required",
            "total_lembur" => "required",
            "status" => "required",
        ]);

        $lembur = Lembur::findOrfail($id);
        $lembur->user_id = $validateData["user_id"];
        $lembur->nama_project = $validateData["nama_project"];
        $lembur->tanggal = $validateData["tanggal"];
        $lembur->mulai_lembur = $validateData["mulai_lembur"];
        $lembur->akhir_lembur = $validateData["akhir_lembur"];
        $lembur->total_lembur = $validateData["total_lembur"];
        $lembur->status = $validateData["status"];
        $lembur->save();
        return redirect()->route("user.lembur.index")->with("success", "ok");
    }

    public function userdestroy($id)
    {
        $lembur = Lembur::find($id);
        $lembur->delete();
        return redirect()->route("user.lembur.index")->with("success", "ok");
    }


    // =============================================================================================================================
    public function index()
    {
        // Mengambil user_id pengguna yang sedang login
        $userId = auth()->user()->id;
        // Mengambil data user yang akan ditampilkan
        $user = auth()->user();
        // Mengambil data lembur berdasarkan user_id
        $lemburs = $user->lemburs;

        return view("manager.lembur.index", compact("lemburs"));
    }
    public function create()
    {
        // Mengambil user_id pengguna yang sedang login
        $userId = auth()->user()->id;
        // Mengambil data user yang akan ditampilkan
        $user = auth()->user();

        // Mengambil data lembur berdasarkan user_id
        $lemburs = $user->lemburs;

        // Mengambil data divisi dari user yang sedang login
        $divisi = $user->divisi;

        return view("manager.lembur.create", compact("lemburs", "user"));
    }



    public function store(Request $request)
    {
        $validateData  = $request->validate([
            "user_id" => "required",
            "nama_project" => "required",
            "tanggal" => "required",
            "mulai_lembur" => "required",
            "akhir_lembur" => "required",
            "total_lembur" => "required",
            "status" => "required",
        ]);

        $lembur = new Lembur();
        $lembur->user_id = $validateData["user_id"];
        $lembur->nama_project = $validateData["nama_project"];
        $lembur->tanggal = $validateData["tanggal"];
        $lembur->mulai_lembur = $validateData["mulai_lembur"];
        $lembur->akhir_lembur = $validateData["akhir_lembur"];
        $lembur->total_lembur = $validateData["total_lembur"];
        $lembur->status = $validateData["status"];
        $lembur->save();
        return redirect()->route("manager.lembur.index")->with("success", "ok");
    }

    public function edit($id)
    {
        // Mengambil data lembur berdasarkan ID
        $lembur = Lembur::find($id);

        // Mengambil data user berdasarkan user_id dari lembur yang akan diedit
        $user = User::find($lembur->user_id);

        return view("manager.lembur.edit", compact("lembur", "user"));
    }

    public function Adminedit($id)
    {
        $lembur = Lembur::find($id);
        $user = User::find($lembur->user_id);
        return view("admin.lembur.edit", compact("lembur", "user"));
    }

    public function update(Request $request, $id)
    {
        $lembur = Lembur::find($id);
        $validateData  = $request->validate([
            "user_id" => "required",
            "nama_project" => "required",
            "tanggal" => "required",
            "mulai_lembur" => "required",
            "akhir_lembur" => "required",
            "total_lembur" => "required",
            "status" => "required",
        ]);

        $lembur = Lembur::findOrfail($id);
        $lembur->user_id = $validateData["user_id"];
        $lembur->nama_project = $validateData["nama_project"];
        $lembur->tanggal = $validateData["tanggal"];
        $lembur->mulai_lembur = $validateData["mulai_lembur"];
        $lembur->akhir_lembur = $validateData["akhir_lembur"];
        $lembur->total_lembur = $validateData["total_lembur"];
        $lembur->status = $validateData["status"];
        $lembur->save();
        return redirect()->route("manager.lembur.index")->with("success", "ok");
    }

    public function destroy($id)
    {
        $lembur = Lembur::find($id);
        $lembur->delete();
        return redirect()->route("manager.lembur.index")->with("success", "ok");
    }

    // ===============================================================================================================================

    public function Adminindex()
    {
        $divisi = Divisi::all();
        $user = User::find(Auth::user()->id);
        $lemburs = Lembur::all();
        return view("admin.lembur.index", compact("lemburs", "user"));
    }

    public function Admindestroy($id)
    {
        $lembur = Lembur::find($id);
        $lembur->delete();
        return redirect()->route("admin.lembur.index")->with("success", "ok");
    }

    public function Adminupdate(Request $request, $id)
    {
        $lembur = Lembur::find($id);
        $validateData  = $request->validate([
            "user_id" => "nullable",
            "nama_project" => "nullable",
            "tanggal" => "nullable",
            "mulai_lembur" => "nullable",
            "akhir_lembur" => "nullable",
            "total_lembur" => "nullable",
            "keterangan" => "nullable",
            "status" => "required",
        ]);

        $lembur = Lembur::findOrfail($id);
        $lembur->user_id = $validateData["user_id"];
        $lembur->nama_project = $validateData["nama_project"];
        $lembur->tanggal = $validateData["tanggal"];
        $lembur->mulai_lembur = $validateData["mulai_lembur"];
        $lembur->akhir_lembur = $validateData["akhir_lembur"];
        $lembur->total_lembur = $validateData["total_lembur"];
        $lembur->keterangan = $validateData["keterangan"];
        $lembur->status = $validateData["status"];
        $lembur->save();
        return redirect()->route("admin.lembur.index")->with("success", "ok");
    }
}
