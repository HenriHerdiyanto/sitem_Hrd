<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\HistoryBayar;
use App\Models\Pinjaman;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PinjamanController extends Controller
{
    public function userindex()
    {
        $user = User::find(auth()->user()->id);
        $divisi = Divisi::all();
        $pinjaman = Pinjaman::all();
        $historyBayar = HistoryBayar::all();
        // Menggunakan Query Builder untuk mengambil SUM dari kolom 'jumlah_bayar_sekarang' berdasarkan 'id'
        $jmlhBayar = HistoryBayar::select('user_id', DB::raw('SUM(jumlah_bayar_sekarang) as total_bayar'))
            ->groupBy('user_id')
            ->get();
        // dd($pinjaman);
        return view("user.pinjaman.index", compact("pinjaman", "divisi", "user", "historyBayar", "jmlhBayar"));
        // dd($pinjaman);
    }

    public function usercreate()
    {
        $users = User::find(auth()->user()->id);
        $divisi = Divisi::all();
        return view("user.pinjaman.create", compact("divisi", "users"));
    }

    public function userstore(Request $request)
    {
        $validateData = $request->validate([
            "user_id" => "required",
            "mulai_kerja" => "required",
            "jumlah_pinjam" => "required",
            "jangka_pelunasan" => "required",
            "jumlah_cicilan" => "required",
            "tanggal_pinjam" => "required",
            // "pelunasan_terakhir" => "required",
            "gaji" => "required",
            "keperluan" => "required",
            "status" => "required",
        ]);
        $pinjaman = new Pinjaman();
        $pinjaman->user_id = $validateData['user_id'];
        $pinjaman->mulai_kerja = $validateData['mulai_kerja'];
        $pinjaman->jumlah_pinjam = $validateData['jumlah_pinjam'];
        $pinjaman->jangka_pelunasan = $validateData['jangka_pelunasan'];
        $pinjaman->jumlah_cicilan = $validateData['jumlah_cicilan'];
        $pinjaman->tanggal_pinjam = $validateData['tanggal_pinjam'];
        // $pinjaman->pelunasan_terakhir = $validateData['pelunasan_terakhir'];
        $pinjaman->gaji = $validateData['gaji'];
        $pinjaman->keperluan = $validateData['keperluan'];
        $pinjaman->status = $validateData['status'];
        $pinjaman->save();
        return redirect()->route('user.pinjam.index')->with('success', 'ok');
    }

    public function userdestroy($id)
    {
        $pinjaman = Pinjaman::find($id);
        $pinjaman->delete();
        return redirect()->route('user.pinjam.index')->with('success', 'ok');
    }



    // ============================================================================================================================_++_
    public function index()
    {
        // Mengambil user_id pengguna yang sedang login
        $userId = auth()->user()->id;
        // Mengambil data user yang akan ditampilkan
        $user = User::find($userId);

        // Mengambil data divisi
        $divisi = Divisi::all();

        // Mengambil data pinjaman
        $pinjaman = Pinjaman::all();

        // Mengambil data history bayar
        $historyBayar = HistoryBayar::all();

        // Menggunakan Query Builder untuk mengambil SUM dari kolom 'jumlah_bayar_sekarang' berdasarkan 'user_id'
        $jmlhBayar = HistoryBayar::select('user_id', DB::raw('SUM(jumlah_bayar_sekarang) as total_bayar'))
            ->where('user_id', $userId)
            ->groupBy('user_id')
            ->get();

        return view("manager.pinjaman.index", compact("pinjaman", "divisi", "user", "historyBayar", "jmlhBayar"));
    }


    public function Adminindex()
    {
        $user = User::all();
        $divisi = Divisi::all();
        $pinjaman = Pinjaman::all();
        $jmlhBayar = HistoryBayar::select('user_id', DB::raw('SUM(jumlah_bayar_sekarang) as total_bayar'))
            ->groupBy('user_id')
            ->get();
        return view("admin.pinjaman.index", compact("pinjaman", "divisi", "user", "jmlhBayar"));
    }

    public function create()
    {
        // Mengambil user_id pengguna yang sedang login
        $userId = auth()->user()->id;
        // Mengambil data user yang akan ditampilkan
        $users = User::find($userId);

        // Mengambil data divisi
        $divisi = Divisi::all();

        return view("manager.pinjaman.create", compact("divisi", "users"));
    }
    public function store(Request $request)
    {
        $validateData = $request->validate([
            "user_id" => "required",
            "mulai_kerja" => "required",
            "jumlah_pinjam" => "required",
            "jangka_pelunasan" => "required",
            "jumlah_cicilan" => "required",
            "tanggal_pinjam" => "required",
            // "pelunasan_terakhir" => "required",
            "gaji" => "required",
            "keperluan" => "required",
            "status" => "required",
        ]);
        $pinjaman = new Pinjaman();
        $pinjaman->user_id = $validateData['user_id'];
        $pinjaman->mulai_kerja = $validateData['mulai_kerja'];
        $pinjaman->jumlah_pinjam = $validateData['jumlah_pinjam'];
        $pinjaman->jangka_pelunasan = $validateData['jangka_pelunasan'];
        $pinjaman->jumlah_cicilan = $validateData['jumlah_cicilan'];
        $pinjaman->tanggal_pinjam = $validateData['tanggal_pinjam'];
        // $pinjaman->pelunasan_terakhir = $validateData['pelunasan_terakhir'];
        $pinjaman->gaji = $validateData['gaji'];
        $pinjaman->keperluan = $validateData['keperluan'];
        $pinjaman->status = $validateData['status'];
        $pinjaman->save();
        return redirect()->route('manager.pinjam.index')->with('success', 'ok');
    }
    public function edit($id)
    {
        $users = User::find(auth()->user()->id);
        $pinjaman = Pinjaman::find($id);
        return view('manager.pinjaman.edit', compact('pinjaman', 'users'));
    }

    public function Adminedit($id)
    {
        $pinjaman = Pinjaman::find($id);

        if (!$pinjaman) {
            return abort(404);
        }

        $user = $pinjaman->user;
        $divisi = $user->divisi;

        return view('admin.pinjaman.edit', compact('pinjaman', 'user', 'divisi'));
    }


    public function update(Request $request, $id)
    {
        $pinjaman = Pinjaman::find($id);
        $validateData = $request->validate([
            "user_id" => "required",
            "mulai_kerja" => "required",
            "jumlah_pinjam" => "required",
            "jangka_pelunasan" => "required",
            "jumlah_cicilan" => "required",
            "tanggal_pinjam" => "required",
            // "pelunasan_terakhir" => "required",
            "gaji" => "required",
            "keperluan" => "required",
            "status" => "required",
        ]);

        $pinjaman = Pinjaman::findOrfail($id);
        $pinjaman->user_id = $validateData['user_id'];
        $pinjaman->mulai_kerja = $validateData['mulai_kerja'];
        $pinjaman->jumlah_pinjam = $validateData['jumlah_pinjam'];
        $pinjaman->jangka_pelunasan = $validateData['jangka_pelunasan'];
        $pinjaman->jumlah_cicilan = $validateData['jumlah_cicilan'];
        $pinjaman->tanggal_pinjam = $validateData['tanggal_pinjam'];
        // $pinjaman->pelunasan_terakhir = $validateData['pelunasan_terakhir'];
        $pinjaman->gaji = $validateData['gaji'];
        $pinjaman->keperluan = $validateData['keperluan'];
        $pinjaman->status = $validateData['status'];
        $pinjaman->save();
        return redirect()->route('pinjam.index')->with('success', 'ok');
    }

    public function Adminupdate(Request $request, $id)
    {
        $pinjaman = Pinjaman::find($id);
        $validateData = $request->validate([
            "user_id" => "required",
            "mulai_kerja" => "required",
            "jumlah_pinjam" => "required",
            "jangka_pelunasan" => "required",
            "jumlah_cicilan" => "required",
            "tanggal_pinjam" => "required",
            // "pelunasan_terakhir" => "required",
            "gaji" => "required",
            "keperluan" => "required",
            "disetujui" => "required",
            "status" => "required",
        ]);

        $pinjaman = Pinjaman::findOrfail($id);
        $pinjaman->user_id = $validateData['user_id'];
        $pinjaman->mulai_kerja = $validateData['mulai_kerja'];
        $pinjaman->jumlah_pinjam = $validateData['jumlah_pinjam'];
        $pinjaman->jangka_pelunasan = $validateData['jangka_pelunasan'];
        $pinjaman->jumlah_cicilan = $validateData['jumlah_cicilan'];
        $pinjaman->tanggal_pinjam = $validateData['tanggal_pinjam'];
        // $pinjaman->pelunasan_terakhir = $validateData['pelunasan_terakhir'];
        $pinjaman->gaji = $validateData['gaji'];
        $pinjaman->keperluan = $validateData['keperluan'];
        $pinjaman->disetujui = $validateData['disetujui'];
        $pinjaman->status = $validateData['status'];
        $pinjaman->save();
        return redirect()->route('admin.pinjaman.index')->with('success', 'ok');
    }

    public function destroy($id)
    {
        $pinjaman = Pinjaman::find($id);
        $pinjaman->delete();
        return redirect()->route('manager.pinjam.index')->with('success', 'ok');
    }

    public function Admindestroy($id)
    {
        $pinjaman = Pinjaman::find($id);
        $pinjaman->delete();
        return redirect()->route('admin.pinjaman.index')->with('success', 'ok');
    }
}
