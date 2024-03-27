<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AbsenController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $lastAbsen = Absen::where('user_id', $user->id)->latest()->first();
        $absens = Absen::where('user_id', $user->id)->get();

        return view("manager.absen.index", compact("user", "lastAbsen", "absens"));
    }



    public function store(Request $request)
    {
        $validateData = $request->validate([
            "user_id" => "required",
            "name" => "required",
            "tanggal" => "required",
            "waktu_masuk" => "required",
            "barcode" => "required",
            "terlambat" => "required",
        ]);

        $absen = new Absen();
        $absen->user_id = $validateData['user_id'];
        $absen->name = $validateData['name'];
        $absen->tanggal = $validateData['tanggal'];
        $absen->waktu_masuk = $validateData['waktu_masuk'];
        $absen->barcode = $validateData['barcode'];
        $absen->terlambat = $validateData['terlambat'];
        $absen->save();
        return redirect()->route('absen.index')->with('success', 'ok');
    }


    public function izin(Request $request)
    {
        $validateData = $request->validate([
            "user_id" => "required",
            "name" => "required",
            "tanggal" => "required",
            "tanggal_izin" => "required",
            "tanggal_akhir" => "required",
            "total_izin" => "required",
            "izin" => "required",
            "keterangan" => "required",
        ]);

        $absen = new Absen();
        $absen->user_id = $validateData['user_id'];
        $absen->name = $validateData['name'];
        $absen->tanggal = $validateData['tanggal'];
        $absen->tanggal_izin = $validateData['tanggal_izin'];
        $absen->tanggal_akhir = $validateData['tanggal_akhir'];
        $absen->total_izin = $validateData['total_izin'];
        $absen->izin = $validateData['izin'];
        $absen->keterangan = $validateData['keterangan'];
        $absen->save();
        return redirect()->route('absen.index')->with('success', 'ok');
    }

    public function sakit(Request $request)
    {
        $validateData = $request->validate([
            "user_id" => "required",
            "name" => "required",
            "tanggal" => "required",
            "sakit" => "required",
            "keterangan" => "required",
        ]);

        $absen = new Absen();
        $absen->user_id = $validateData['user_id'];
        $absen->name = $validateData['name'];
        $absen->tanggal = $validateData['tanggal'];
        $absen->sakit = $validateData['sakit'];
        $absen->keterangan = $validateData['keterangan'];
        $absen->save();
        return redirect()->route('absen.index')->with('success', 'ok');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'waktu_sekarang' => 'required',
        ]);

        Absen::where('id', $id)->update([
            'name' => $validatedData['name'],
            'waktu_keluar' => $validatedData['waktu_sekarang'],
        ]);

        return redirect()->route('absen.index')->with('success', 'ok');
    }

    // admin====================================================================================================================



    public function Adminindex()
    {
        $latest_absen_per_user = DB::table('absens')
            ->select('user_id', DB::raw('MAX(tanggal) as max_date'))
            ->groupBy('user_id', DB::raw('MONTH(tanggal)'), DB::raw('YEAR(tanggal)'))
            ->get();

        $latest_absen_ids = [];
        foreach ($latest_absen_per_user as $latest_absen) {
            $latest_absen_id = DB::table('absens')
                ->select('id')
                ->where('user_id', $latest_absen->user_id)
                ->whereDate('tanggal', $latest_absen->max_date)
                ->first();

            if ($latest_absen_id) {
                $latest_absen_ids[] = $latest_absen_id->id;
            }
        }

        $absen = Absen::whereIn('id', $latest_absen_ids)->get();

        return view("admin.absen.index2", compact("absen"));
    }



    public function Adminshow(Request $request)
    {
        // Validasi inputan form
        $request->validate([
            'bulan' => 'required', // Pastikan bulan diisi
            'tahun' => 'required|numeric',
        ]);

        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');

        // Query data absen terakhir berdasarkan bulan dan tahun
        $absenData = Absen::whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun)
            ->orderBy('tanggal', 'desc') // Urutkan berdasarkan tanggal secara menurun
            // ->take(1)
            ->get();

        return view('admin.absen.show', compact('absenData', 'bulan', 'tahun'));
    }

    // ==========================================================================================================================

    // user =====================================================================================================================
    public function Userindex()
    {
        $user = auth()->user();
        $absens = $user->absen;
        $lastAbsen = Absen::where('user_id', $user->id)->latest()->first();
        return view("user.absen.index", compact("absens", "user", "lastAbsen"));
    }

    public function Userstore(Request $request)
    {
        $validateData = $request->validate([
            "user_id" => "required",
            "name" => "required",
            "tanggal" => "required",
            "waktu_masuk" => "required",
            "barcode" => "required",
            "terlambat" => "required",
        ]);

        $absen = new Absen();
        $absen->user_id = $validateData['user_id'];
        $absen->name = $validateData['name'];
        $absen->tanggal = $validateData['tanggal'];
        $absen->waktu_masuk = $validateData['waktu_masuk'];
        $absen->barcode = $validateData['barcode'];
        $absen->terlambat = $validateData['terlambat'];
        $absen->save();
        return redirect()->route('userabsen.index')->with('success', 'ok');
    }

    public function Userupdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'waktu_sekarang' => 'required',
        ], [
            'name.required' => 'Nama harus diisi.',
            'waktu_sekarang.required' => 'Waktu sekarang harus diisi.',
        ]);

        $absen = Absen::find($id);
        if (!$absen) {
            return redirect()->route('userabsen.index')->with('error', 'Data absen tidak ditemukan.');
        }

        $absen->name = $validatedData['name'];
        $absen->waktu_keluar = $validatedData['waktu_sekarang'];
        $absen->save();

        return redirect()->route('userabsen.index')->with('success', 'Data absen berhasil diperbarui.');
    }


    public function Userizin(Request $request)
    {
        $validateData = $request->validate([
            "user_id" => "required",
            "name" => "required",
            "tanggal" => "required",
            "tanggal_izin" => "required",
            "tanggal_akhir" => "required",
            "total_izin" => "required",
            "izin" => "required",
            "keterangan" => "required",
        ]);

        $absen = new Absen();
        $absen->user_id = $validateData['user_id'];
        $absen->name = $validateData['name'];
        $absen->tanggal = $validateData['tanggal'];
        $absen->tanggal_izin = $validateData['tanggal_izin'];
        $absen->tanggal_akhir = $validateData['tanggal_akhir'];
        $absen->total_izin = $validateData['total_izin'];
        $absen->izin = $validateData['izin'];
        $absen->keterangan = $validateData['keterangan'];
        $absen->save();
        return redirect()->route('userabsen.index')->with('success', 'ok');
    }

    public function Usersakit(Request $request)
    {
        $validateData = $request->validate([
            "user_id" => "required",
            "name" => "required",
            "tanggal" => "required",
            "sakit" => "required",
            "keterangan" => "required",
        ]);

        $absen = new Absen();
        $absen->user_id = $validateData['user_id'];
        $absen->name = $validateData['name'];
        $absen->tanggal = $validateData['tanggal'];
        $absen->sakit = $validateData['sakit'];
        $absen->keterangan = $validateData['keterangan'];
        $absen->save();
        return redirect()->route('userabsen.index')->with('success', 'ok');
    }
}
