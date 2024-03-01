<?php

namespace App\Http\Controllers;

use App\Models\HistoryBayar;
use App\Models\Pinjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryBayarController extends Controller
{

    public function index()
    {
        $results = DB::table('historyBayar')
            ->select('id', DB::raw('SUM(jumlah_bayar_sekarang) as total_bayar'))
            ->groupBy('id')
            ->get();

        return view('manager.pinjaman.index', ['results' => $results]);
    }

    public function history($id)
    {
        $pinjaman = Pinjaman::where('id', $id)->get();
        $historyBayar = HistoryBayar::where('pinjam_id', $id)->get();
        $jmlhBayar = HistoryBayar::select('user_id', DB::raw('SUM(jumlah_bayar_sekarang) as total_bayar'))
            ->groupBy('user_id')
            ->get();
        return view('admin.pinjaman.history', compact('historyBayar', 'jmlhBayar', 'pinjaman'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            "pinjam_id" => "required",
            "user_id" => "required",
            "tanggal_pinjam" => "required",
            "tanggal_bayar" => "required",
            "jumlah_bayar_sekarang" => "required",
            "gambar" => 'file|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        // Cek apakah ada file gambar yang diunggah
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'pinjaman';
            $file->move(public_path($tujuan_upload), $nama_file);
        } else {
            return redirect()->back()->withErrors(['error' => 'Gagal upload gambar']); // Perbaiki pesan kesalahan
        }
        $history = new HistoryBayar();
        $history->pinjam_id = $validateData['pinjam_id'];
        $history->user_id = $validateData['user_id'];
        $history->tanggal_pinjam = $validateData['tanggal_pinjam'];
        $history->tanggal_bayar = $validateData['tanggal_bayar'];
        $history->jumlah_bayar_sekarang = $validateData['jumlah_bayar_sekarang'];
        $history->gambar = $nama_file;
        $history->save();
        return redirect()->back()->with('success', 'ok');
    }

    // =========================================================================================================================================
    public function userstore(Request $request)
    {
        $validateData = $request->validate([
            "pinjam_id" => "required",
            "user_id" => "required",
            "tanggal_pinjam" => "required",
            "tanggal_bayar" => "required",
            "jumlah_bayar_sekarang" => "required",
            "gambar" => 'file|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        // Cek apakah ada file gambar yang diunggah
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'pinjaman';
            $file->move(public_path($tujuan_upload), $nama_file);
        } else {
            return redirect()->back()->withErrors(['error' => 'Gagal upload gambar']); // Perbaiki pesan kesalahan
        }
        $history = new HistoryBayar();
        $history->pinjam_id = $validateData['pinjam_id'];
        $history->user_id = $validateData['user_id'];
        $history->tanggal_pinjam = $validateData['tanggal_pinjam'];
        $history->tanggal_bayar = $validateData['tanggal_bayar'];
        $history->jumlah_bayar_sekarang = $validateData['jumlah_bayar_sekarang'];
        $history->gambar = $nama_file;
        $history->save();
        return redirect()->route('user.pinjam.index')->with('success', 'ok');
    }
}
