<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Absen;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    public function index()
    {
        $absen = Absen::paginate(10);
        return response()->json([
            "data" => $absen
        ]);
    }

    public function store(Request $request)
    {
        $absen = Absen::create([
            "user_id" => $request->user_id,
            "name" => $request->name,
            "tanggal" => $request->tanggal,
            "waktu_masuk" => $request->waktu_masuk,
            "waktu_keluar" => $request->waktu_keluar,
            "barcode" => $request->barcode,
            "terlambat" => $request->terlambat,
            "sakit" => $request->sakit,
            "izin" => $request->izin,
            "keterangan" => $request->keterangan,
        ]);
        return response()->json([
            "data" => $absen
        ]);
    }

    public function show(Absen $absen)
    {
        return response()->json([
            "data" => $absen
        ]);
    }

    public function update(Request $request, Absen $absen)
    {
        $absen->user_id = $request->user_id;
        $absen->shiff = $request->shiff;
        $absen->save();
        return response()->json([
            "data" => $absen
        ]);
    }

    public function destroy(Absen $absen)
    {
        $absen->delete();
        return response()->json([
            "message" => "absen delete"
        ], 204);
    }
}
