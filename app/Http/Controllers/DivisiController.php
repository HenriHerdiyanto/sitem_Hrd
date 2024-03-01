<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\KategoriKpi;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    public function index()
    {
        $divisi = Divisi::all();
        return view("admin.divisi.index", compact("divisi"));
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            "kode_divisi" => "required",
            "nama_divisi" => "required",
        ]);


        $divisi = new Divisi();
        $divisi->kode_divisi = $validate['kode_divisi'];
        $divisi->nama_divisi = $validate['nama_divisi'];
        $divisi->save();
        return redirect()->route('divisi.index')->with('success', 'ok');
    }
    public function update(Request $request, $id)
    {
        // Temukan divisi berdasarkan ID
        $divisi = Divisi::find($id);

        // Periksa jika divisi ditemukan
        if (!$divisi) {
            return redirect()->route('divisi.index')->with('error', 'Divisi tidak ditemukan.');
        }

        // Validasi input
        $request->validate([
            'kode_divisi' => 'required',
            'nama_divisi' => 'required',
        ]);

        // Simpan perubahan ke dalam divisi
        $divisi->kode_divisi = $request->input('kode_divisi');
        $divisi->nama_divisi = $request->input('nama_divisi');
        $divisi->save();

        // Redirect dengan pesan sukses
        return redirect()->route('divisi.index')->with('success', 'Data divisi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $divisi = Divisi::find($id);
    
        KategoriKpi::where('divisi_id', $divisi->id)->delete();
    
        $divisi->delete();
    
        return redirect()->route('divisi.index')->with('success', 'Data divisi berhasil dihapus');
    }

}
