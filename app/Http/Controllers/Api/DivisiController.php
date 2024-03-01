<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $divisi = Divisi::paginate(10);
        return response()->json([
            "data" => $divisi
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $divisi = Divisi::create([
            "kode_divisi" => $request->kode_divisi,
            "nama_divisi" => $request->nama_divisi,
        ]);
        return response()->json([
            "data" => $divisi
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Divisi $divisi)
    {
        return response()->json([
            "data" => $divisi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Divisi $divisi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Divisi $divisi)
    {
        $divisi->kode_divisi = $request->kode_divisi;
        $divisi->nama_divisi = $request->nama_divisi;
        $divisi->save();
        return response()->json([
            "data" => $divisi
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Divisi $divisi)
    {
        $divisi->delete();
        return response()->json([
            "message" => "devisi delete"
        ], 204);
    }
}
