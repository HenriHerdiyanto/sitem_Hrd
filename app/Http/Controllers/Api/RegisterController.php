<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        $register = User::paginate(10);
        return response()->json([
            "data" => $register
        ]);
    }

    public function store(Request $request)
    {
        $register = User::create([
            "divisi_id" => $request->divisi_id,
            "nomor_induk" => $request->nomor_induk,
            "name" => $request->name,
            "jenis_kelamin" => $request->jenis_kelamin,
            "tempat_lahir" => $request->tempat_lahir,
            "tanggal_lahir" => $request->tanggal_lahir,
            "alamat_ktp" => $request->alamat_ktp,
            "alamat_ktp" => $request->alamat_ktp,
            "alamat_domisili" => $request->alamat_domisili,
            "no_hp" => $request->no_hp,
            "no_ktp" => $request->no_ktp,
            "agama" => $request->agama,
            "gol_darah" => $request->gol_darah,
            "status_pernikahan" => $request->status_pernikahan,
            "status_karyawan" => $request->status_karyawan,
            "email" => $request->email,
            "password" => $request->password,
            "type" => $request->type,
            "foto_karyawan" => $request->foto_karyawan,
            "gaji" => $request->gaji,
            "uang_makan" => $request->uang_makan,
            "uang_transport" => $request->uang_transport,
            "mulai_kerja" => $request->mulai_kerja,
            "akhir_kerja" => $request->akhir_kerja,
            "kontrak_kerja" => $request->kontrak_kerja,
        ]);
        return response()->json([
            "data" => $register
        ]);
    }

    public function show(User $register)
    {
        return response()->json([
            "data" => $register
        ]);
    }


    public function update(Request $request, User $register)
    {
        $register->divisi_id = $request->divisi_id;
        $register->nomor_induk = $request->nomor_induk;
        $register->name = $request->name;
        $register->jenis_kelamin = $request->jenis_kelamin;
        $register->tanggal_lahir = $request->tanggal_lahir;
        $register->alamat_ktp = $request->alamat_ktp;
        $register->alamat_domisili = $request->alamat_domisili;
        $register->no_hp = $request->no_hp;
        $register->no_ktp = $request->no_ktp;
        $register->agama = $request->agama;
        $register->gol_darah = $request->gol_darah;
        $register->status_pernikahan = $request->status_pernikahan;
        $register->status_karyawan = $request->status_karyawan;
        $register->email = $request->email;
        $register->password = $request->password;
        $register->type = $request->type;
        $register->foto_karyawan = $request->foto_karyawan;
        $register->gaji = $request->gaji;
        $register->uang_makan = $request->uang_makan;
        $register->uang_transport = $request->uang_transport;
        $register->mulai_kerja = $request->mulai_kerja;
        $register->akhir_kerja = $request->akhir_kerja;
        $register->kontrak_kerja = $request->kontrak_kerja;
        $register->save();
        return response()->json([
            "data" => $register
        ]);
    }

    public function destroy(User $register)
    {
        $register->delete();
        return response()->json([
            "message" => "karyawan delete"
        ], 204);
    }
}
