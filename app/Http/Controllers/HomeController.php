<?php

namespace App\Http\Controllers;


use App\Models\Divisi;
use App\Models\Shiff;
use App\Models\User;
use App\Imports\KaryawanImport;
use Illuminate\Support\Facades\View;
use App\Models\Evaluasi;
use App\Models\Cuti;
use App\Models\PerjalananDinas;
use App\Models\Budget;
use App\Models\Pinjaman;
use App\Models\Lembur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::find(Auth::user()->id);
        return view('user.home', compact('user'));
    }

    // ============================================================================================
    // ============================================================================================
    // ============================================================================================


    public function karyawanDelete($id)
    {
        $user = User::find($id);
        // Hapus data terkait dalam tabel absen
        $user->absen()->delete();
        // Hapus data terkait dalam tabel budgets
        $user->budgets()->delete();
        // Hapus data terkait dalam tabel cuti
        $user->cuti()->delete();
        // // Hapus data terkait dalam tabel divisi
        // $user->divisi()->delete();
        // Hapus data terkait dalam tabel evaluasis
        $user->evaluasis()->delete();
        // Hapus data terkait dalam tabel history
        $user->history()->delete();
        // Hapus data terkait dalam tabel keluargas
        $user->keluargas()->delete();
        // Hapus data terkait dalam tabel lemburs
        $user->lemburs()->delete();
        // Hapus data terkait dalam tabel payrolls
        $user->payrolls()->delete();
        // Hapus data terkait dalam tabel pendidikans
        $user->pendidikans()->delete();
        // Hapus data terkait dalam tabel perjalananDinas
        $user->perjalananDinas()->delete();
        // Hapus data terkait dalam tabel pinjaman
        $user->pinjaman()->delete();
        // Hapus data terkait dalam tabel reimbursements
        $user->reimbursement()->delete();
        // Hapus data terkait dalam tabel shiffs
        $user->shiffs()->delete();
        // Hapus data terkait dalam tabel todolists
        $user->todolists()->delete();
        // Hapus pengguna
        $user->delete();

        return redirect()->back()->with('delete', 'Data Berhasil Dihapus');
    }

    public function karyawan()
    {
        $user = User::whereIn('type', [2, 0])->orderBy('type')->get();
        $shiffs = Shiff::all();
        // View::share('jumlahCutiDiproses', $jumlahCutiDiproses);
        return view('admin.karyawan.index', compact('user', 'shiffs'));
    }


    public function karyawanCreate()
    {
        $divisis = Divisi::all();
        return view('admin.karyawan.create', compact('divisis'));
    }

    public function karyawanEdit($id)
    {
        $divisis = Divisi::all();
        $user = User::find($id);
        return view('admin.karyawan.edit', compact('user', 'divisis'));
    }

    public function import(Request $request)
    {
        $file = $request->file('file');

        Excel::import(new KaryawanImport, $file);

        return redirect()->back()->with('success', 'Data karyawan berhasil diimpor.');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'divisi_id' => 'required',
            'nomor_induk' => 'nullable',
            'name' => 'nullable',
            'jenis_kelamin' => 'nullable',
            'tempat_lahir' => 'nullable',
            'tanggal_lahir' => 'nullable',
            'alamat_ktp' => 'nullable',
            'alamat_domisili' => 'nullable',
            'no_hp' => 'nullable',
            'agama' => 'nullable',
            'gol_darah' => 'nullable',
            'status_pernikahan' => 'nullable',
            'status_karyawan' => 'nullable',
            'email' => 'nullable|email|unique:users,email',
            'password' => 'nullable|min:8',
            'type' => 'nullable',
            'foto_karyawan' => 'image|mimes:jpeg,png,jpg|max:2048|nullable',
            'gaji' => 'nullable',
            'uang_makan' => 'nullable',
            'uang_transport' => 'nullable',
            'mulai_kerja' => 'nullable',
            'akhir_kerja' => 'nullable',
            'kontrak_kerja' => 'file|mimes:pdf,doc,docx|max:2048|nullable',
            'status_ptkp' => 'nullable',
            'cabang' => 'nullable',
            'tunjangan_jabatan' => 'nullable',
            'tunjangan_pulsa' => 'nullable',
            'tunjangan_pendidikan' => 'nullable',
            'tunjangan_lain' => 'nullable',
        ]);

        // Penanganan file foto karyawan
        $nama_file = null;
        if ($request->hasFile('foto_karyawan')) {
            $file = $request->file('foto_karyawan');
            if ($file->isValid()) {
                $nama_file = time() . "_" . $file->getClientOriginalName();
                $tujuan_upload = 'foto_karyawan';
                $file->move(public_path($tujuan_upload), $nama_file);
            } else {
                return redirect()->back()->withErrors(['error' => 'Gagal upload gambar. File tidak valid.']);
            }
        }

        // Penanganan file kontrak kerja
        $nama_file_kontrak = null;
        if ($request->hasFile('kontrak_kerja')) {
            $file = $request->file('kontrak_kerja');
            if ($file->isValid()) {
                $nama_file_kontrak = time() . "_" . $file->getClientOriginalName();
                $tujuan_upload = 'kontrak_kerja';
                $file->move(public_path($tujuan_upload), $nama_file_kontrak);
            } else {
                return redirect()->back()->withErrors(['error' => 'Gagal upload kontrak kerja']);
            }
        }

        // Buat instance karyawan dan isi propertinya
        $karyawan = new User();
        $karyawan->divisi_id = $request->input('divisi_id');
        $karyawan->nomor_induk = $validatedData['nomor_induk'];
        $karyawan->name = $validatedData['name'];
        $karyawan->jenis_kelamin = $validatedData['jenis_kelamin'];
        $karyawan->tempat_lahir = $validatedData['tempat_lahir'];
        $karyawan->tanggal_lahir = $validatedData['tanggal_lahir'];
        $karyawan->alamat_ktp = $validatedData['alamat_ktp'];
        $karyawan->alamat_domisili = $validatedData['alamat_domisili'];
        $karyawan->no_hp = $validatedData['no_hp'];
        $karyawan->agama = $validatedData['agama'];
        $karyawan->gol_darah = $validatedData['gol_darah'];
        $karyawan->status_pernikahan = $validatedData['status_pernikahan'];
        $karyawan->status_karyawan = $validatedData['status_karyawan'];
        $karyawan->email = $validatedData['email'];
        $karyawan->password = Hash::make($validatedData['password']);
        $karyawan->type = $validatedData['type'];
        $karyawan->foto_karyawan = $nama_file;
        $karyawan->gaji = $validatedData['gaji'];
        $karyawan->uang_makan = $validatedData['uang_makan'];
        $karyawan->uang_transport = $validatedData['uang_transport'];
        $karyawan->mulai_kerja = $validatedData['mulai_kerja'];
        $karyawan->akhir_kerja = $validatedData['akhir_kerja'];
        $karyawan->kontrak_kerja = $nama_file_kontrak;
        $karyawan->status_ptkp = $validatedData['status_ptkp'];
        $karyawan->cabang = $validatedData['cabang'];
        $karyawan->tunjangan_jabatan = $validatedData['tunjangan_jabatan'];
        $karyawan->tunjangan_pulsa = $validatedData['tunjangan_pulsa'];
        $karyawan->tunjangan_pendidikan = $validatedData['tunjangan_pendidikan'];
        $karyawan->tunjangan_lain = $validatedData['tunjangan_lain'];

        // Simpan karyawan ke dalam database
        $karyawan->save();

        return redirect()->route('admin.karyawan.home')->with('success', 'Data Berhasil Ditambahkan');
    }


    public function karyawanUpdate(Request $request, $id)
    {
        // Ambil data karyawan berdasarkan ID
        $karyawan = User::findOrFail($id);

        // Validasi input
        $validatedData = $request->validate([
            'divisi_id' => 'required',
            'nomor_induk' => 'nullable',
            'name' => 'nullable',
            'jenis_kelamin' => 'nullable',
            'tempat_lahir' => 'nullable',
            'tanggal_lahir' => 'nullable',
            'alamat_ktp' => 'nullable',
            'alamat_domisili' => 'nullable',
            'no_hp' => 'nullable',
            'agama' => 'nullable',
            'gol_darah' => 'nullable',
            'status_pernikahan' => 'nullable',
            'status_karyawan' => 'nullable',
            'email' => 'nullable|email|unique:users,email,' . $karyawan->id,
            'type' => 'nullable',
            'foto_karyawan' => 'image|mimes:jpeg,png,jpg|max:2048|nullable',
            'gaji' => 'nullable',
            'uang_makan' => 'nullable',
            'uang_transport' => 'nullable',
            'mulai_kerja' => 'nullable',
            'akhir_kerja' => 'nullable',
            'kontrak_kerja' => 'file|mimes:pdf,doc,docx|max:2048|nullable',
            'status_ptkp' => 'nullable',
            'cabang' => 'nullable',
            'tunjangan_jabatan' => 'nullable',
            'tunjangan_pulsa' => 'nullable',
            'tunjangan_pendidikan' => 'nullable',
            'tunjangan_lain' => 'nullable',
        ]);

        // Proses menyimpan file kontrak kerja
        if ($request->hasFile('kontrak_kerja')) {
            $file = $request->file('kontrak_kerja');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('kontrak_kerja'), $filename);
            $karyawan->kontrak_kerja = $filename;
        }

        // Proses menyimpan file foto karyawan
        if ($request->hasFile('foto_karyawan')) {
            $file = $request->file('foto_karyawan');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('foto_karyawan'), $filename);
            $karyawan->foto_karyawan = $filename;
        }

        // Simpan input dari form ke dalam model karyawan
        $karyawan->divisi_id = $validatedData['divisi_id'];
        $karyawan->nomor_induk = $validatedData['nomor_induk'];
        $karyawan->name = $validatedData['name'];
        $karyawan->jenis_kelamin = $validatedData['jenis_kelamin'];
        $karyawan->tempat_lahir = $validatedData['tempat_lahir'];
        $karyawan->tanggal_lahir = $validatedData['tanggal_lahir'];
        $karyawan->alamat_ktp = $validatedData['alamat_ktp'];
        $karyawan->alamat_domisili = $validatedData['alamat_domisili'];
        $karyawan->no_hp = $validatedData['no_hp'];
        $karyawan->agama = $validatedData['agama'];
        $karyawan->gol_darah = $validatedData['gol_darah'];
        $karyawan->status_pernikahan = $validatedData['status_pernikahan'];
        $karyawan->status_karyawan = $validatedData['status_karyawan'];
        $karyawan->email = $validatedData['email'];
        // if (isset($validatedData['password'])) {
        //     $karyawan->password = Hash::make($validatedData['password']);
        // }
        $karyawan->type = $validatedData['type'];
        $karyawan->gaji = $validatedData['gaji'];
        $karyawan->uang_makan = $validatedData['uang_makan'];
        $karyawan->uang_transport = $validatedData['uang_transport'];
        $karyawan->mulai_kerja = $validatedData['mulai_kerja'];
        $karyawan->akhir_kerja = $validatedData['akhir_kerja'];
        $karyawan->status_ptkp = $validatedData['status_ptkp'];
        $karyawan->cabang = $validatedData['cabang'];
        $karyawan->tunjangan_jabatan = $validatedData['tunjangan_jabatan'];
        $karyawan->tunjangan_pulsa = $validatedData['tunjangan_pulsa'];
        $karyawan->tunjangan_pendidikan = $validatedData['tunjangan_pendidikan'];
        $karyawan->tunjangan_lain = $validatedData['tunjangan_lain'];

        // Simpan perubahan
        $karyawan->save();

        // Redirect ke halaman tertentu dengan pesan sukses
        return redirect()->route('admin.karyawan.home')->with('success', 'Data karyawan berhasil diperbarui.');
    }


    public function profileuser()
    {
        $users = auth()->user();
        $pendidikans = $users->pendidikans;
        $keluargas = $users->keluargas;
        $divisis = Divisi::all();
        $user = User::find(Auth::user()->id);
        return view('user.profile', compact('user', 'keluargas', 'divisis', 'users', 'pendidikans'));
    }

    public function updateProfile(Request $request, $id)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'divisi_id' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'jenis_kelamin' => 'required|string|in:laki-laki,perempuan',
            'tempat_lahir' => 'required|string|max:225',
            'tanggal_lahir' => 'required|date',
            'no_hp' => 'required|string|max:15',
            'agama' => 'required|string|in:islam,kristen,hindu,budha',
            'gol_darah' => 'required|string|max:5',
            'status_pernikahan' => 'required|string|max:225',
            'alamat_ktp' => 'required|string|max:255',
            'alamat_domisili' => 'required|string|max:255',
            'foto_karyawan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'nullable|string|min:8', // tambahkan validasi password
        ]);

        // Temukan pengguna berdasarkan ID
        $user = User::findOrFail($id);

        // Perbarui data pengguna
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->jenis_kelamin = $request->input('jenis_kelamin');
        $user->tanggal_lahir = $request->input('tanggal_lahir');
        $user->tempat_lahir = $request->input('tempat_lahir');
        $user->no_hp = $request->input('no_hp');
        $user->agama = $request->input('agama');
        $user->gol_darah = $request->input('gol_darah');
        $user->status_pernikahan = $request->input('status_pernikahan');
        $user->alamat_ktp = $request->input('alamat_ktp');
        $user->alamat_domisili = $request->input('alamat_domisili');

        // Perbarui password jika ada input password baru
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        // Perbarui foto profil jika diunggah
        if ($request->hasFile('foto_karyawan')) {
            $image = $request->file('foto_karyawan');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('foto_karyawan'), $imageName);
            $user->foto_karyawan = $imageName;
        }

        // Simpan perubahan
        $user->save();

        // Redirect ke halaman profil atau halaman lain yang sesuai
        return redirect()->route('user.profile')->with('success', 'Profil berhasil diperbarui');
    }


    // ========================================================================================================
    // ========================================================================================================
    // ========================================================================================================

    public function managerHome()
    {
        $divisiId = Auth::user()->divisi_id;
        $userId = Auth::id();

        $divisis = Divisi::all();
        $users = User::where('divisi_id', $divisiId)
            ->where('type', '=', 'user')
            ->get();

        $user = auth()->user();
        $name = User::find(Auth::user()->id);
        $todolists = $user->todolists;

        return view('manager.home', compact('users', 'name', 'divisis', 'todolists'));
    }


    public function profile()
    {
        $users = auth()->user();
        $pendidikans = $users->pendidikans;
        $keluargas = $users->keluargas;
        $divisis = Divisi::all();
        $user = User::find(Auth::user()->id);
        return view('manager.profile', compact('user', 'keluargas', 'divisis', 'users', 'pendidikans'));
    }

    public function mangerEdit($id)
    {
        $divisis = Divisi::all();
        $user = User::find($id);

        return view('manager.edit', compact('user', 'divisis'));
    }

    public function updateProfileManager(Request $request, $id)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'divisi_id' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'jenis_kelamin' => 'required|string|in:laki-laki,perempuan',
            'tempat_lahir' => 'required|max:255',
            'tanggal_lahir' => 'required|date',
            'no_hp' => 'required|string|max:15',
            'agama' => 'required|string|in:islam,kristen,hindu,budha',
            'gol_darah' => 'required|string|max:5',
            'status_pernikahan' => 'required|string|max:255',
            'alamat_ktp' => 'required|string|max:255',
            'alamat_domisili' => 'required|string|max:255',
            'foto_karyawan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'nullable|string|min:8', // tambahkan validasi password
        ]);

        // Temukan pengguna berdasarkan ID
        $user = User::findOrFail($id);

        // Perbarui data pengguna
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->jenis_kelamin = $request->input('jenis_kelamin');
        $user->tanggal_lahir = $request->input('tanggal_lahir');
        $user->tempat_lahir = $request->input('tempat_lahir');
        $user->no_hp = $request->input('no_hp');
        $user->agama = $request->input('agama');
        $user->gol_darah = $request->input('gol_darah');
        $user->status_pernikahan = $request->input('status_pernikahan');
        $user->alamat_ktp = $request->input('alamat_ktp');
        $user->alamat_domisili = $request->input('alamat_domisili');

        // Perbarui password jika ada input password baru
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        // Perbarui foto profil jika diunggah
        if ($request->hasFile('foto_karyawan')) {
            $image = $request->file('foto_karyawan');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('foto_karyawan'), $imageName);
            $user->foto_karyawan = $imageName;
        }

        // Simpan perubahan
        $user->save();

        // Redirect ke halaman profil atau halaman lain yang sesuai
        return redirect()->route('manager.profile')->with('success', 'Profil berhasil diperbarui');
    }
}
