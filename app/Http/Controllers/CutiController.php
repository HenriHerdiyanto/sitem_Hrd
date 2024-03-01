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

class CutiController extends Controller
{
    public function index()
    {
        // Mengambil user_id pengguna yang sedang login
        $userId = auth()->user()->id;
        // Mengambil data user yang akan ditampilkan
        $user = User::find($userId);

        // Mengambil data divisi
        $divisi = Divisi::all();
        // Mengambil data cuti (jika diperlukan)
        $cuti = Cuti::all();

        return view("manager.cuti.index", compact("cuti", "divisi", "user"));
    }



    public function Adminindex()
    {

        $users = User::all();
        $divisi = Divisi::all();
        $cuti = Cuti::all();

        return view("admin.cuti.index", compact("cuti", "divisi", "users"));
    }

    public function create()
    {
        // Mengambil user_id pengguna yang sedang login
        $userId = auth()->user()->id;
        // Mengambil data user yang akan ditampilkan
        $users = User::find($userId);

        // Mengambil data divisi
        $divisi = Divisi::all();

        // Mengambil data cuti terakhir berdasarkan user_id
        $cuti = Cuti::latest()->where('user_id', $userId)->first();

        return view("manager.cuti.create", compact("cuti", "divisi", "users"));
    }


    public function Userindex()
    {
        $user = auth()->user();
        $divisi = $user->divisi;
        $cuti = $user->cuti;
        return view("user.cuti.index", compact("cuti", "divisi", "user"));
    }

    public function Usercreate()
    {
        $users = User::find(auth()->user()->id);
        $divisi = Divisi::all();
        $cuti = Cuti::latest()->where('user_id', $users->id)->first(); // Mengambil data terakhir berdasarkan user_id
        return view("user.cuti.create", compact("cuti", "divisi", "users"));
    }

    public function Userstore(Request $request)
    {
        $validateData = $request->validate([
            "user_id" => "required",
            "divisi_id" => "required",
            // "type" => "required",
            "hak_cuti" => "required",
            "ambil_cuti" => "required",
            "sisa_cuti" => "required",
            "tanggal_mulai" => "required",
            "tanggal_selesai" => "required",
            "alasan_cuti" => "required",
            "status" => "required",
        ]);

        $cuti = new Cuti();
        $cuti->user_id = $validateData['user_id'];
        $cuti->divisi_id = $validateData['divisi_id'];
        // $cuti->type = $validateData['type'];
        $cuti->hak_cuti = $validateData['hak_cuti'];
        $cuti->ambil_cuti = $validateData['ambil_cuti'];
        $cuti->sisa_cuti = $validateData['sisa_cuti'];
        $cuti->tanggal_mulai = $validateData['tanggal_mulai'];
        $cuti->tanggal_selesai = $validateData['tanggal_selesai'];
        $cuti->alasan_cuti = $validateData['alasan_cuti'];
        $cuti->status = $validateData['status'];
        $cuti->save();
        return redirect()->route('user.cuti.index')->with('success', 'ok');
    }

    public function Useredit($id)
    {
        $user = User::find(auth()->user()->id);
        $divisi = Divisi::all();
        $cuti = Cuti::find($id); // Menggunakan find() untuk mengambil objek Cuti berdasarkan ID
        // dd($cuti);
        return view("user.cuti.edit", compact("cuti", "divisi", "user"));
    }

    public function Userupdate(Request $request, $id)
    {
        $cuti = Cuti::find($id);
        $validateData = $request->validate([
            "user_id" => "nullable",
            "divisi_id" => "nullable",
            // "type" => "nullable",
            "hak_cuti" => "nullable",
            "ambil_cuti" => "nullable",
            "sisa_cuti" => "nullable",
            "tanggal_mulai" => "nullable",
            "tanggal_selesai" => "nullable",
            "alasan_cuti" => "nullable",
            "status" => "nullable",
        ]);
        $cuti = Cuti::findOrFail($id);
        $cuti->user_id = $validateData['user_id'];
        $cuti->divisi_id = $validateData['divisi_id'];
        // $cuti->type = $validateData['type'];
        $cuti->hak_cuti = $validateData['hak_cuti'];
        $cuti->ambil_cuti = $validateData['ambil_cuti'];
        $cuti->sisa_cuti = $validateData['sisa_cuti'];
        $cuti->tanggal_mulai = $validateData['tanggal_mulai'];
        $cuti->tanggal_selesai = $validateData['tanggal_selesai'];
        $cuti->alasan_cuti = $validateData['alasan_cuti'];
        $cuti->status = $validateData['status'];
        $cuti->save();
        return redirect()->route('user.cuti.index')->with('success', 'ok');
    }

    // =============================================================================================================================

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $validateData = $request->validate([
            "user_id" => "required",
            "divisi_id" => "required",
            // "type" => "required",
            "hak_cuti" => "required",
            "ambil_cuti" => "required",
            "sisa_cuti" => "required",
            "tanggal_mulai" => "required",
            "tanggal_selesai" => "required",
            "alasan_cuti" => "required",
            "status" => "required",
        ]);

        $cuti = new Cuti();
        $cuti->user_id = $validateData['user_id'];
        $cuti->divisi_id = $validateData['divisi_id'];
        // $cuti->type = $validateData['type'];
        $cuti->hak_cuti = $validateData['hak_cuti'];
        $cuti->ambil_cuti = $validateData['ambil_cuti'];
        $cuti->sisa_cuti = $validateData['sisa_cuti'];
        $cuti->tanggal_mulai = $validateData['tanggal_mulai'];
        $cuti->tanggal_selesai = $validateData['tanggal_selesai'];
        $cuti->alasan_cuti = $validateData['alasan_cuti'];
        $cuti->status = $validateData['status'];
        $cuti->save();
        return redirect()->route('cuti.index')->with('success', 'ok');
    }

    public function edit($id)
    {
        // Mengambil user_id pengguna yang sedang login
        $userId = auth()->user()->id;
        // Mengambil data user yang akan ditampilkan
        $user = User::find($userId);

        // Mengambil data divisi
        $divisi = Divisi::all();

        // Mengambil data cuti berdasarkan id
        $cuti = Cuti::find($id);

        return view("manager.cuti.edit", compact("cuti", "divisi", "user"));
    }


    public function Adminedit($id)
    {
        $user = User::find($id);
        $divisi = Divisi::all();
        $cuti = Cuti::find($id);
        // dd($cuti);
        return view("admin.cuti.edit", compact("cuti", "divisi", "user"));
    }

    public function Adminupdate(Request $request, $id)
    {
        $cuti = Cuti::find($id);
        $validateData = $request->validate([
            "user_id" => "nullable",
            "divisi_id" => "nullable",
            // "type" => "nullable",
            "hak_cuti" => "nullable",
            "ambil_cuti" => "nullable",
            "sisa_cuti" => "nullable",
            "tanggal_mulai" => "nullable",
            "tanggal_selesai" => "nullable",
            "alasan_cuti" => "nullable",
            "status" => "nullable",
        ]);
        $cuti = Cuti::findOrFail($id);
        $cuti->user_id = $validateData['user_id'];
        $cuti->divisi_id = $validateData['divisi_id'];
        // $cuti->type = $validateData['type'];
        $cuti->hak_cuti = $validateData['hak_cuti'];
        $cuti->ambil_cuti = $validateData['ambil_cuti'];
        $cuti->sisa_cuti = $validateData['sisa_cuti'];
        $cuti->tanggal_mulai = $validateData['tanggal_mulai'];
        $cuti->tanggal_selesai = $validateData['tanggal_selesai'];
        $cuti->alasan_cuti = $validateData['alasan_cuti'];
        $cuti->status = $validateData['status'];
        $cuti->save();
        return redirect()->route('admin.cuti.index')->with('success', 'ok');
    }

    public function update(Request $request, $id)
    {
        $cuti = Cuti::find($id);
        $validateData = $request->validate([
            "user_id" => "nullable",
            "divisi_id" => "nullable",
            // "type" => "nullable",
            "hak_cuti" => "nullable",
            "ambil_cuti" => "nullable",
            "sisa_cuti" => "nullable",
            "tanggal_mulai" => "nullable",
            "tanggal_selesai" => "nullable",
            "alasan_cuti" => "nullable",
            "status" => "nullable",
        ]);
        $cuti = Cuti::findOrFail($id);
        $cuti->user_id = $validateData['user_id'];
        $cuti->divisi_id = $validateData['divisi_id'];
        // $cuti->type = $validateData['type'];
        $cuti->hak_cuti = $validateData['hak_cuti'];
        $cuti->ambil_cuti = $validateData['ambil_cuti'];
        $cuti->sisa_cuti = $validateData['sisa_cuti'];
        $cuti->tanggal_mulai = $validateData['tanggal_mulai'];
        $cuti->tanggal_selesai = $validateData['tanggal_selesai'];
        $cuti->alasan_cuti = $validateData['alasan_cuti'];
        $cuti->status = $validateData['status'];
        $cuti->save();
        return redirect()->route('cuti.index')->with('success', 'ok');
    }

    public function destroy($id)
    {
        $cuti = Cuti::findOrFail($id);
        $cuti->delete();
        return redirect()->route('cuti.index')->with('success', 'ok');
    }

    public function Userdestroy($id)
    {
        $cuti = Cuti::findOrFail($id);
        $cuti->delete();
        return redirect()->route('user.cuti.index')->with('success', 'ok');
    }
}
