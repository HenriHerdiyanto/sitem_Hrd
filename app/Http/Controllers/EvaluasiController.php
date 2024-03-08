<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Evaluasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EvaluasiController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $idDivisi = $user->divisi_id;
        $evaluasi = Evaluasi::where("divisi_id", "=", $idDivisi)->get();
        $users = User::where("divisi_id", "=", $idDivisi)->get();
        $divisis = Divisi::where("id", "=", $idDivisi)->get();
        return view("manager.evaluasi.index", compact("user", "users", "idDivisi", "evaluasi", "divisis"));
    }
    public function Adminindex()
    {
        $divisi = Divisi::all();
        $evaluasi = Evaluasi::all();
        return view("admin.evaluasi.index", compact("divisi", "evaluasi"));
    }
    public function create($id)
    {
        $user = User::find($id);
        $evaluasi = Evaluasi::all(); // Remove this line if not needed
        $divisis = Divisi::all();

        return view("manager.evaluasi", compact("evaluasi", "divisis", "user"));
    }
    public function store(Request $request)
    {
        $validateData = $request->validate([
            "user_id" => "required",
            "divisi_id" => "required",
            "lama_percobaan" => "required",
            "nama_lengkap" => "required",
            "type" => "required",
            "mulai_kerja" => "required",
            "faktor_penilaian" => "required",
            "catatan_atasan" => "required",
            "catatan_hrd" => "required",
            "dievaluasi_oleh" => "required",
            "disetujui_oleh" => "required",
            "status_evaluasi" => "required",
        ]);

        $evaluasi = new Evaluasi();
        $evaluasi->user_id = $validateData["user_id"];
        $evaluasi->divisi_id = $validateData['divisi_id'];
        $evaluasi->lama_percobaan = $validateData['lama_percobaan'];
        $evaluasi->nama_lengkap = $validateData['nama_lengkap'];
        $evaluasi->type = $validateData['type'];
        $evaluasi->mulai_kerja = $validateData['mulai_kerja'];
        $evaluasi->faktor_penilaian = $validateData['faktor_penilaian'];
        $evaluasi->catatan_atasan = $validateData['catatan_atasan'];
        $evaluasi->catatan_hrd = $validateData['catatan_hrd'];
        $evaluasi->dievaluasi_oleh = $validateData['dievaluasi_oleh'];
        $evaluasi->disetujui_oleh = $validateData['disetujui_oleh'];
        $evaluasi->status_evaluasi = $validateData['status_evaluasi'];
        $evaluasi->save();

        return redirect()->route('manager.home')->with('success', 'ok');
    }
    public function edit(Evaluasi $evaluasi, $id)
    {
        $divisis = Divisi::all();
        $evaluasi = Evaluasi::find($id);
        return view('admin.evaluasi.edit', compact('evaluasi', 'divisis'));
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'divisi_id' => 'required',
            'lama_percobaan' => 'required',
            'nama_lengkap' => 'required',
            'type' => 'required',
            'mulai_kerja' => 'required',
            'faktor_penilaian' => 'required',
            'catatan_atasan' => 'required',
            'catatan_hrd' => 'required',
            'dievaluasi_oleh' => 'required',
            'disetujui_oleh' => 'required',
            'status_evaluasi' => 'required',
        ]);

        // Cari data Evaluasi yang ingin diperbarui berdasarkan $id
        $evaluasi = Evaluasi::find($id);

        // Mengisi properti evaluasi dengan data yang valid
        $evaluasi->user_id = $validatedData['user_id'];
        $evaluasi->divisi_id = $validatedData['divisi_id'];
        $evaluasi->lama_percobaan = $validatedData['lama_percobaan'];
        $evaluasi->nama_lengkap = $validatedData['nama_lengkap'];
        $evaluasi->type = $validatedData['type'];
        $evaluasi->mulai_kerja = $validatedData['mulai_kerja'];
        $evaluasi->faktor_penilaian = $validatedData['faktor_penilaian'];
        $evaluasi->catatan_atasan = $validatedData['catatan_atasan'];
        $evaluasi->catatan_hrd = $validatedData['catatan_hrd'];
        $evaluasi->dievaluasi_oleh = $validatedData['dievaluasi_oleh'];
        $evaluasi->disetujui_oleh = $validatedData['disetujui_oleh'];
        $evaluasi->status_evaluasi = $validatedData['status_evaluasi'];

        // Simpan perubahan
        $evaluasi->save();

        return redirect()->route('evaluasi.index')->with('success', 'ok');
    }
    public function destroy($id)
    {
        $evaluasi = Evaluasi::find($id);
        $evaluasi->delete();
        return redirect()->route('evaluasi.index')->with('success', '');
    }
}
