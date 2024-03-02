<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\HistoryBayar;
use App\Models\Payroll;
use App\Models\User;
use App\Models\Pinjaman;
use App\Models\Absen;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    public function indexManager()
    {
        $user = auth()->user();
        $payroll = Payroll::where("user_id", $user->id)->get();
        return view("manager.payroll", compact("user", "payroll"));
    }

    public function DetailManager($id)
    {
        $divisi = Divisi::where("nama_divisi", "HUMAN RESOURCE")->first(); // Perbaiki penulisan nama divisi

        $user = User::join("divisis", "users.divisi_id", "=", "divisis.id")
            ->select("users.name", "divisis.nama_divisi")
            ->where("users.divisi_id", "=", $divisi->id) // Perbaiki nama kolom dan hilangkan tanda kutip pada variabel
            ->first();

        $payroll = Payroll::findOrFail($id);
        return view("manager.detailPayroll", compact("payroll", "divisi", "user"));
    }
    // ==================================================================================================
    public function index()
    {
        $user = auth()->user();
        $payrolls = $user->payrolls;
        return view("admin.payroll.index", compact("payrolls"));
    }

    public function destroy($id)
    {
        $payroll = Payroll::findOrFail($id);
        $payroll->delete();
        return redirect()->back()->with("delete", "Data Berhasil Dihapus");
    }

    public function Adminindex()
    {
        $user = User::all();
        $payrolls = Payroll::all();
        return view("admin.payroll.index", compact("payrolls", "user"));
    }


    public function store(Request $request)
    {
        // Validasi data yang masuk
        $validatedData = $request->validate([
            'user_id' => 'nullable',
            'pendidikan' => 'nullable',
            'status_ptkp' => 'nullable',
            'cabang' => 'nullable',
            'group' => 'nullable',
            'gaji_pokok' => 'nullable',
            'tempat_kerja' => 'nullable',
            'tunjangan_jabatan' => 'nullable',
            'tunjangan_pulsa' => 'nullable',
            'lain_lain' => 'nullable',
            'tunjangan_pendidikan' => 'nullable',
            'uang_makan' => 'nullable',
            'uang_transport' => 'nullable',
            'total_gaji' => 'nullable',
            'lembur' => 'nullable',
            'dinas' => 'nullable',
            'cuti_tahunan' => 'nullable',
            'thr' => 'nullable',
            'tunjanganpph21' => 'nullable',
            'potonganpph21' => 'nullable',
            'total_tunjangan' => 'nullable',
            'total_gaji_tunjangan' => 'nullable',
            'referal_client' => 'nullable',
            'insentif_kk' => 'nullable',
            'insentif_spv' => 'nullable',
            'insentif_staff' => 'nullable',
            'insentif_spt_op' => 'nullable',
            'insentif_spt_badan' => 'nullable',
            'insentif_spt' => 'nullable',
            'komisi_marketing' => 'nullable',
            'total_insentif' => 'nullable',
            'total_pendapatan' => 'nullable',
            'terlambat' => 'nullable',
            'cuti_bersama' => 'nullable',
            'cuti' => 'nullable',
            'sakit' => 'nullable',
            'izin' => 'nullable',
            'alpha' => 'nullable',
            'pinjaman' => 'nullable',
            'bpjs_perusahaan' => 'nullable',
            'bpjs_karyawan' => 'nullable',
            'jkk' => 'nullable',
            'jkm' => 'nullable',
            'jht_37' => 'nullable',
            'ditanggung_perusahaan' => 'nullable',
            'ditanggung_karyawan' => 'nullable',
            'total_pengurangan' => 'nullable',
            'total_gaji_bersih' => 'nullable',
        ]);

        // Buat objek Payroll dan isi dengan data yang divalidasi
        $payroll = new Payroll($validatedData);

        // Simpan data ke database
        $payroll->save();

        // Redirect ke halaman yang sesuai dan sertakan pesan sukses
        return redirect()->route('payroll.index')->with('success', 'Data berhasil disimpan.');
    }

    public function update(Request $request, $id)
    {
        $payroll = Payroll::find($id);

        // Periksa apakah data Payroll ditemukan
        if (!$payroll) {
            return redirect()->route('payroll.index')->with('error', 'Data Payroll tidak ditemukan.');
        }
        $validatedData = $request->validate([
            'user_id' => 'nullable',
            'pendidikan' => 'nullable',
            'status_ptkp' => 'nullable',
            'cabang' => 'nullable',
            'group' => 'nullable',
            'gaji_pokok' => 'nullable',
            'tempat_kerja' => 'nullable',
            'tunjangan_jabatan' => 'nullable',
            'tunjangan_pulsa' => 'nullable',
            'lain_lain' => 'nullable',
            'tunjangan_pendidikan' => 'nullable',
            'uang_makan' => 'nullable',
            'uang_transport' => 'nullable',
            'total_gaji' => 'nullable',
            'lembur' => 'nullable',
            'dinas' => 'nullable',
            'cuti_tahunan' => 'nullable',
            'thr' => 'nullable',
            'tunjanganpph21' => 'nullable',
            'potonganpph21' => 'nullable',
            'total_tunjangan' => 'nullable',
            'total_gaji_tunjangan' => 'nullable',
            'referal_client' => 'nullable',
            'insentif_kk' => 'nullable',
            'insentif_spv' => 'nullable',
            'insentif_staff' => 'nullable',
            'insentif_spt_op' => 'nullable',
            'insentif_spt_badan' => 'nullable',
            'insentif_spt' => 'nullable',
            'komisi_marketing' => 'nullable',
            'total_insentif' => 'nullable',
            'total_pendapatan' => 'nullable',
            'terlambat' => 'nullable',
            'cuti_bersama' => 'nullable',
            'cuti' => 'nullable',
            'sakit' => 'nullable',
            'izin' => 'nullable',
            'alpha' => 'nullable',
            'pinjaman' => 'nullable',
            'bpjs_perusahaan' => 'nullable',
            'bpjs_karyawan' => 'nullable',
            'jkk' => 'nullable',
            'jkm' => 'nullable',
            'jht_37' => 'nullable',
            'ditanggung_perusahaan' => 'nullable',
            'ditanggung_karyawan' => 'nullable',
            'total_pengurangan' => 'nullable',
            'total_gaji_bersih' => 'nullable',
        ]);
        // Simpan data yang telah divalidasi ke dalam objek Payroll
        $payroll->fill($validatedData);

        // Simpan data ke database
        $payroll->save();

        // Redirect ke halaman yang sesuai dan sertakan pesan sukses
        return redirect()->route('payroll.index')->with('update', 'Data berhasil diperbarui.');
    }

    public function show(Request $request, $id, $bulan, $tahun)
    {
        // Mencari user berdasarkan user_id
        $user = User::find($id);

        if (!$user) {
            // Handle kasus ketika user tidak ditemukan
            // Misalnya, bisa melempar exception atau menampilkan pesan kesalahan.
        }

        // Query data absen berdasarkan user_id, bulan, dan tahun
        $absen = Absen::where('user_id', $id)
            ->whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun)
            ->get();

        // Menghitung total terlambat
        $tterlambat = Absen::where('user_id', $id)
            ->whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun)
            ->sum('terlambat');

        $totalterlambat = ($absen->sum('terlambat') ?? 0) * 50000;

        // Menghitung total izin
        $totalizin = ($absen->sum('izin') ?? 0) * 50000;

        // Menghitung total sakit
        $totalsakit = ($user->absen->sum('sakit') ?? 0) * 50000;


        // Menghitung jumlah hadir dan alpha
        $jumlah_hadir = $absen->count();
        $jumlah_alpha = 22 - $jumlah_hadir;

        // Mencari history bayar
        $historyBayar = HistoryBayar::find($id);
        $jmlhBayar = 0;

        if ($historyBayar) {
            $jmlhBayar = $historyBayar->sum("jumlah_bayar_sekarang");
        }

        // Mencari pinjaman
        $pinjaman = Pinjaman::find($id);

        if ($pinjaman) {
            $jumlah_pinjam = $pinjaman->jumlah_pinjam;
            $jumlah_cicilan = $pinjaman->jumlah_cicilan;

            if ($jmlhBayar == $jumlah_pinjam) {
                $jmlhBayar = 0;
            } else {
                $jmlhBayar = $jumlah_cicilan;
            }
        }

        // Mencari pendidikan
        $pendidikans = $user->pendidikans;
        $jenjang_pendidikan = null;

        if ($pendidikans->count() > 0) {
            $pendidikan = $pendidikans->first();

            if ($pendidikan) {
                $jenjang_pendidikan = $pendidikan->jenjang_pendidikan;
            }
        }

        // Mengambil data lembur
        $totalLembur = ($user->lemburs->where('status', 'diterima')->sum('total_lembur') ?? 0) * 50000;
        $lamaLembur = $user->lemburs->where('status', 'diterima')->sum('total_lembur');
        // Menghitung total cuti
        $totalcuti = $user->cuti->sum('ambil_cuti');

        return view("admin.payroll.show", compact("user", "absen", "lamaLembur", "totalcuti", "totalLembur", "totalterlambat", "totalizin", "jumlah_hadir", "jumlah_alpha", "jmlhBayar", "totalsakit", "tterlambat"));
    }


    public function edit($id)
    {
        $user = User::find($id);
        $payroll = Payroll::find($id);
        return view("admin.payroll.edit", compact("user", "payroll"));
    }

    // ==================================================================================================================
    public function Userindex()
    {
        // Mengambil pengguna yang sedang login
        $user = auth()->user();

        $payroll = Payroll::where('user_id', '=', $user->id)->get();
        // dd($payroll);
        return view('user.payroll.index', compact('user', 'payroll'));
    }

    public function DetailPayrollindex($id)
    {
        $divisi = Divisi::where("nama_divisi", "HUMAN RESOURCE")->first(); // Perbaiki penulisan nama divisi

        $user = User::join("divisis", "users.divisi_id", "=", "divisis.id")
            ->select("users.name", "divisis.nama_divisi")
            ->where("users.divisi_id", "=", $divisi->id) // Perbaiki nama kolom dan hilangkan tanda kutip pada variabel
            ->first();
        // dd($user);
        $payroll = Payroll::findOrFail($id);
        return view("user.payroll.detailPayroll", compact("payroll", "divisi", "user"));
    }
}
