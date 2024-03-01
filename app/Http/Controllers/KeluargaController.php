<?php

namespace App\Http\Controllers;

use App\Models\Keluarga;
use Illuminate\Http\Request;

class KeluargaController extends Controller
{

    public function userstore(Request $request)
    {
        $validateDate = $request->validate([
            "user_id" => "required",
            "nama_ayah" => "required",
            "tl_ayah" => "required",
            "pendidikan_ayah" => "required",
            "pekerjaan_ayah" => "required",
            "jabatan_ayah" => "required",
            "perusahaan_ayah" => "required",
            "nama_ibu" => "required",
            "tl_ibu" => "required",
            "pendidikan_ibu" => "required",
            "pekerjaan_ibu" => "required",
            "jabatan_ibu" => "required",
            "perusahaan_ibu" => "required",
        ]);
        $keluarga = new Keluarga();
        $keluarga->user_id = $validateDate["user_id"];
        $keluarga->nama_ayah = $validateDate["nama_ayah"];
        $keluarga->tl_ayah = $validateDate["tl_ayah"];
        $keluarga->pendidikan_ayah = $validateDate["pendidikan_ayah"];
        $keluarga->pekerjaan_ayah = $validateDate["pekerjaan_ayah"];
        $keluarga->jabatan_ayah = $validateDate["jabatan_ayah"];
        $keluarga->perusahaan_ayah = $validateDate["perusahaan_ayah"];
        $keluarga->nama_ibu = $validateDate["nama_ibu"];
        $keluarga->tl_ibu = $validateDate["tl_ibu"];
        $keluarga->pendidikan_ibu = $validateDate["pendidikan_ibu"];
        $keluarga->pekerjaan_ibu = $validateDate["pekerjaan_ibu"];
        $keluarga->jabatan_ibu = $validateDate["jabatan_ibu"];
        $keluarga->perusahaan_ibu = $validateDate["perusahaan_ibu"];
        $keluarga->save();
        return redirect()->back()->with("success", "ok");
    }

    public function userupdate(Request $request, $id)
    {
        $keluarga = Keluarga::find($id);
        $validateDate = $request->validate([
            "user_id" => "required",
            "nama_ayah" => "required",
            "tl_ayah" => "required",
            "pendidikan_ayah" => "required",
            "pekerjaan_ayah" => "required",
            "jabatan_ayah" => "required",
            "perusahaan_ayah" => "required",
            "nama_ibu" => "required",
            "tl_ibu" => "required",
            "pendidikan_ibu" => "required",
            "pekerjaan_ibu" => "required",
            "jabatan_ibu" => "required",
            "perusahaan_ibu" => "required",
        ]);
        $keluarga = Keluarga::findOrfail($id);
        $keluarga->user_id = $validateDate["user_id"];
        $keluarga->nama_ayah = $validateDate["nama_ayah"];
        $keluarga->tl_ayah = $validateDate["tl_ayah"];
        $keluarga->pendidikan_ayah = $validateDate["pendidikan_ayah"];
        $keluarga->pekerjaan_ayah = $validateDate["pekerjaan_ayah"];
        $keluarga->jabatan_ayah = $validateDate["jabatan_ayah"];
        $keluarga->perusahaan_ayah = $validateDate["perusahaan_ayah"];
        $keluarga->nama_ibu = $validateDate["nama_ibu"];
        $keluarga->tl_ibu = $validateDate["tl_ibu"];
        $keluarga->pendidikan_ibu = $validateDate["pendidikan_ibu"];
        $keluarga->pekerjaan_ibu = $validateDate["pekerjaan_ibu"];
        $keluarga->jabatan_ibu = $validateDate["jabatan_ibu"];
        $keluarga->perusahaan_ibu = $validateDate["perusahaan_ibu"];
        $keluarga->save();
        return redirect()->back()->with("success", "ok");
    }

    // ==================================================================================================================
    public function store(Request $request)
    {
        $validateDate = $request->validate([
            "user_id" => "required",
            "nama_ayah" => "required",
            "tl_ayah" => "required",
            "pendidikan_ayah" => "required",
            "pekerjaan_ayah" => "required",
            "jabatan_ayah" => "required",
            "perusahaan_ayah" => "required",
            "nama_ibu" => "required",
            "tl_ibu" => "required",
            "pendidikan_ibu" => "required",
            "pekerjaan_ibu" => "required",
            "jabatan_ibu" => "required",
            "perusahaan_ibu" => "required",
        ]);
        $keluarga = new Keluarga();
        $keluarga->user_id = $validateDate["user_id"];
        $keluarga->nama_ayah = $validateDate["nama_ayah"];
        $keluarga->tl_ayah = $validateDate["tl_ayah"];
        $keluarga->pendidikan_ayah = $validateDate["pendidikan_ayah"];
        $keluarga->pekerjaan_ayah = $validateDate["pekerjaan_ayah"];
        $keluarga->jabatan_ayah = $validateDate["jabatan_ayah"];
        $keluarga->perusahaan_ayah = $validateDate["perusahaan_ayah"];
        $keluarga->nama_ibu = $validateDate["nama_ibu"];
        $keluarga->tl_ibu = $validateDate["tl_ibu"];
        $keluarga->pendidikan_ibu = $validateDate["pendidikan_ibu"];
        $keluarga->pekerjaan_ibu = $validateDate["pekerjaan_ibu"];
        $keluarga->jabatan_ibu = $validateDate["jabatan_ibu"];
        $keluarga->perusahaan_ibu = $validateDate["perusahaan_ibu"];
        $keluarga->save();
        return redirect()->back()->with("success", "ok");
    }

    public function update(Request $request, $id)
    {
        $keluarga = Keluarga::find($id);
        $validateDate = $request->validate([
            "user_id" => "required",
            "nama_ayah" => "required",
            "tl_ayah" => "required",
            "pendidikan_ayah" => "required",
            "pekerjaan_ayah" => "required",
            "jabatan_ayah" => "required",
            "perusahaan_ayah" => "required",
            "nama_ibu" => "required",
            "tl_ibu" => "required",
            "pendidikan_ibu" => "required",
            "pekerjaan_ibu" => "required",
            "jabatan_ibu" => "required",
            "perusahaan_ibu" => "required",
        ]);
        $keluarga = Keluarga::findOrfail($id);
        $keluarga->user_id = $validateDate["user_id"];
        $keluarga->nama_ayah = $validateDate["nama_ayah"];
        $keluarga->tl_ayah = $validateDate["tl_ayah"];
        $keluarga->pendidikan_ayah = $validateDate["pendidikan_ayah"];
        $keluarga->pekerjaan_ayah = $validateDate["pekerjaan_ayah"];
        $keluarga->jabatan_ayah = $validateDate["jabatan_ayah"];
        $keluarga->perusahaan_ayah = $validateDate["perusahaan_ayah"];
        $keluarga->nama_ibu = $validateDate["nama_ibu"];
        $keluarga->tl_ibu = $validateDate["tl_ibu"];
        $keluarga->pendidikan_ibu = $validateDate["pendidikan_ibu"];
        $keluarga->pekerjaan_ibu = $validateDate["pekerjaan_ibu"];
        $keluarga->jabatan_ibu = $validateDate["jabatan_ibu"];
        $keluarga->perusahaan_ibu = $validateDate["perusahaan_ibu"];
        $keluarga->save();
        return redirect()->back()->with("success", "ok");
    }
}
