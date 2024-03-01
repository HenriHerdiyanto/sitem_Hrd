<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use Illuminate\Http\Request;

class InventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventaris = Inventaris::all();
        return view("admin.inventaris.index", compact("inventaris"));
    }
    public function store(Request $request)
    {
        $validateData = $request->validate([
            "name" => "required",
            "kategori" => "required",
            "jumlah" => "required",
            "tanggal" => "required",
            "harga" => "required",
            "gambar" => 'file|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        // Cek apakah ada file gambar yang diunggah
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'inventaris';
            $file->move(public_path($tujuan_upload), $nama_file);
        } else {
            return redirect()->back()->withErrors(['error' => 'Gagal upload gambar']); // Perbaiki pesan kesalahan
        }

        $inventaris = new Inventaris();
        $inventaris->name = $validateData['name'];
        $inventaris->kategori = $validateData['kategori'];
        $inventaris->jumlah = $validateData['jumlah'];
        $inventaris->tanggal = $validateData['tanggal'];
        $inventaris->harga = $validateData['harga'];
        $inventaris->gambar = $nama_file;
        $inventaris->save();
        return redirect()->back()->with('success', 'ok');
    }
    public function update(Request $request, $id)
    {
        // Validasi input
        $validateData = $request->validate([
            'name' => 'nullable',
            'kategori' => 'nullable',
            'jumlah' => 'nullable',
            'tanggal' => 'nullable',
            'harga' => 'nullable',
            'gambar' => 'file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Temukan entitas Inventaris
        $inventaris = Inventaris::find($id);

        if (!$inventaris) {
            return redirect()->route('inventaris.index')->with('error', 'Inventaris tidak ditemukan');
        }

        // Cek apakah ada file gambar yang diunggah
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'inventaris';
            $file->move(public_path($tujuan_upload), $nama_file);

            // Hapus foto lama jika ada
            if ($inventaris->gambar) {
                if (file_exists(public_path('inventaris/' . $inventaris->gambar))) {
                    unlink(public_path('inventaris/' . $inventaris->gambar));
                }
            }

            // Set foto baru
            $inventaris->gambar = $nama_file;
        }

        // Set properti yang diperbarui dari hasil validasi
        $inventaris->name = $validateData['name'];
        $inventaris->kategori = $validateData['kategori'];
        $inventaris->jumlah = $validateData['jumlah'];
        $inventaris->tanggal = $validateData['tanggal'];
        $inventaris->harga = $validateData['harga'];

        // Simpan perubahan
        $inventaris->save();

        return redirect()->route('inventaris.index')->with('success', 'Data inventaris berhasil diperbarui');
    }

    public function destroy($id)
    {
        $inventaris = Inventaris::find($id);
        // Hapus foto lama jika ada
        if ($inventaris->gambar) {
            if (file_exists(public_path('inventaris/' . $inventaris->gambar))) {
                unlink(public_path('inventaris/' . $inventaris->gambar));
            }
        }
        $inventaris->delete();
        return redirect()->back()->with('success', 'ok');
    }
}
