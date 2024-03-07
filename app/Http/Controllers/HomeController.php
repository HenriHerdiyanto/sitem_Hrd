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
            'divisi_id' => 'nullable',
            'nomor_induk' => 'nullable',
            'name' => 'nullable',
            'jenis_kelamin' => 'nullable',
            'tempat_lahir' => 'nullable',
            'tanggal_lahir' => 'nullable',
            'alamat_ktp' => 'nullable',
            'alamat_domisili' => 'nullable',
            'no_hp' => 'nullable',
            'no_ktp' => 'nullable',
            'agama' => 'nullable',
            'gol_darah' => 'nullable',
            'status_pernikahan' => 'nullable',
            'status_karyawan' => 'nullable',
            'email' => 'nullable',
            'password' => 'nullable',
            'type' => 'nullable',
            'foto_karyawan' => 'file|image|mimes:jpeg,png,jpg|max:2048|nullable',
            'gaji' => 'nullable',
            'uang_makan' => 'nullable',
            'uang_transport' => 'nullable',
            'mulai_kerja' => 'nullable',
            'akhir_kerja' => 'nullable',
            'kontrak_kerja' => 'file|mimes:pdf,doc,docx|max:2048|nullable',
            'status_ptkp' => 'nullable',
            'cabang' => 'nullable',
            'group_karyawan' => 'nullable',
            'tempat_bekerja' => 'nullable',
            'tunjangan_jabatan' => 'nullable',
            'tunjangan_pulsa' => 'nullable',
            'tunjangan_pendidikan' => 'nullable',

        ]);
        // Deklarasikan $nama_file sebelum penggunaannya
        $nama_file = null;

        // Tambahkan pengecekan dan penanganan file foto
        if ($request->hasFile('foto_karyawan')) {
            $file = $request->file('foto_karyawan');

            // Cek apakah file foto tidak kosong dan valid
            if ($file->isValid()) {
                $nama_file = time() . "_" . $file->getClientOriginalName();
                $tujuan_upload = 'foto_karyawan';
                $file->move(public_path($tujuan_upload), $nama_file);
            } else {
                return redirect()->back()->withErrors(['error' => 'Gagal upload gambar. File tidak valid.']);
            }
        }

        // Tambahkan pengecekan dan penanganan file kontrak kerja
        $nama_file_kontrak = null;
        if ($request->hasFile('kontrak_kerja')) {
            $file = $request->file('kontrak_kerja');
            $nama_file_kontrak = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'kontrak_kerja';
            $file->move(public_path($tujuan_upload), $nama_file_kontrak);
        } else {
            return redirect()->back()->withErrors(['error' => 'Gagal upload gambar']); // Perbaiki pesan kesalahan
        }


        $karyawan = new User();
        $karyawan->divisi_id = $validatedData['divisi_id'];
        $karyawan->nomor_induk = $validatedData['nomor_induk'];
        $karyawan->name = $validatedData['name'];
        $karyawan->jenis_kelamin = $validatedData['jenis_kelamin'];
        $karyawan->tempat_lahir = $validatedData['tempat_lahir'];
        $karyawan->tanggal_lahir = $validatedData['tanggal_lahir'];
        $karyawan->alamat_ktp = $validatedData['alamat_ktp'];
        $karyawan->alamat_domisili = $validatedData['alamat_domisili'];
        $karyawan->no_hp = $validatedData['no_hp'];
        $karyawan->no_ktp = $validatedData['no_ktp'];
        $karyawan->agama = $validatedData['agama'];
        $karyawan->gol_darah = $validatedData['gol_darah'];
        $karyawan->status_pernikahan = $validatedData['status_pernikahan'];
        $karyawan->status_karyawan = $validatedData['status_karyawan'];
        $karyawan->email = $validatedData['email'];

        $password = $validatedData['password'];
        // Hash password menggunakan bcrypt
        $hashedPassword = Hash::make($password);
        // Simpan password yang sudah di-hash ke dalam atribut 'password' pada objek $karyawan
        $karyawan->password = $hashedPassword;

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
        $karyawan->group_karyawan = $validatedData['group_karyawan'];
        $karyawan->tempat_bekerja = $validatedData['tempat_bekerja'];
        $karyawan->tunjangan_jabatan = $validatedData['tunjangan_jabatan'];
        $karyawan->tunjangan_pulsa = $validatedData['tunjangan_pulsa'];
        $karyawan->tunjangan_pendidikan = $validatedData['tunjangan_pendidikan'];
        $karyawan->save();
        // dd($user);
        return redirect()->route('admin.karyawan.home')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function karyawanUpdate(Request $request, $id)
    {
        $karyawan = User::find($id);
        $validatedData = $request->validate([
            'divisi_id' => 'required',
            'nomor_induk' => 'required',
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
            'email' => 'nullable',
            'type' => 'nullable',
            'foto_karyawan' => 'file|image|mimes:jpeg,png,jpg|max:2048',
            'gaji' => 'nullable',
            'uang_makan' => 'nullable',
            'uang_transport' => 'nullable',
            'mulai_kerja' => 'nullable',
            'akhir_kerja' => 'nullable',
            'kontrak_kerja' => 'file|mimes:pdf,doc,docx|max:2048',
            'status_ptkp' => 'nullable',
            'cabang' => 'nullable',
            'group_karyawan' => 'nullable',
            'tempat_bekerja' => 'nullable',
            'tunjangan_jabatan' => 'nullable',
            'tunjangan_pulsa' => 'nullable',
            'tunjangan_pendidikan' => 'nullable',
            'tunjangan_lain' => 'nullable',
        ]);
        // Cek apakah ada file gambar yang diunggah
        if ($request->hasFile('foto_karyawan')) {
            $file = $request->file('foto_karyawan');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'foto_karyawan';
            $file->move(public_path($tujuan_upload), $nama_file);

            // Hapus foto lama jika ada
            if ($karyawan->foto_karyawan) {
                // Pastikan foto lama ada sebelum menghapus
                if (file_exists(public_path('foto_karyawan/' . $karyawan->foto_karyawan))) {
                    unlink(public_path('foto_karyawan/' . $karyawan->foto_karyawan));
                }
            }

            // Set foto baru
            $karyawan->foto_karyawan = $nama_file;
        } else {
            // Jika tidak ada file gambar yang diunggah, gunakan foto lama
            if (!$karyawan->foto_karyawan) {
                // Jika tidak ada foto lama, Anda dapat menangani kesalahan di sini
                return redirect()->back()->withErrors(['error' => 'Gagal upload gambar']); // Perbaiki pesan kesalahan
            }
        }

        // Simpan data karyawan
        $karyawan->save();
        // Cek apakah ada file gambar yang diunggah
        if ($request->hasFile('kontrak_kerja')) {
            $file = $request->file('kontrak_kerja');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'kontrak_kerja';
            $file->move(public_path($tujuan_upload), $nama_file);

            // Hapus foto lama jika ada
            if ($karyawan->kontrak_kerja) {
                // Pastikan foto lama ada sebelum menghapus
                if (file_exists(public_path('kontrak_kerja/' . $karyawan->kontrak_kerja))) {
                    unlink(public_path('kontrak_kerja/' . $karyawan->kontrak_kerja));
                }
            }

            // Set foto baru
            $karyawan->kontrak_kerja = $nama_file;
        } else {
            // Jika tidak ada file gambar yang diunggah, gunakan foto lama
            if (!$karyawan->kontrak_kerja) {
                // Jika tidak ada foto lama, Anda dapat menangani kesalahan di sini
                return redirect()->back()->withErrors(['error' => 'Gagal upload gambar']); // Perbaiki pesan kesalahan
            }
        }

        // Simpan data karyawan
        $karyawan->save();

        $karyawan = User::findOrFail($id);
        $karyawan->divisi_id = $validatedData['divisi_id'];
        $karyawan->nomor_induk = $validatedData['nomor_induk'];
        $karyawan->name = $validatedData['name'];
        $karyawan->jenis_kelamin = $validatedData['jenis_kelamin'];
        $karyawan->tempat_lahir = $validatedData['tempat_lahir'];
        $karyawan->tanggal_lahir = $validatedData['tanggal_lahir'];
        $karyawan->alamat_ktp = $validatedData['alamat_ktp'];
        $karyawan->alamat_domisili = $validatedData['alamat_domisili'];
        $karyawan->no_hp = $validatedData['no_hp'];
        $karyawan->no_ktp = $validatedData['no_ktp'];
        $karyawan->agama = $validatedData['agama'];
        $karyawan->gol_darah = $validatedData['gol_darah'];
        $karyawan->status_pernikahan = $validatedData['status_pernikahan'];
        $karyawan->status_karyawan = $validatedData['status_karyawan'];
        $karyawan->email = $validatedData['email'];
        $karyawan->type = $validatedData['type'];
        // $karyawan->foto_karyawan = $nama_file;
        $karyawan->gaji = $validatedData['gaji'];
        $karyawan->uang_makan = $validatedData['uang_makan'];
        $karyawan->uang_transport = $validatedData['uang_transport'];
        $karyawan->mulai_kerja = $validatedData['mulai_kerja'];
        $karyawan->akhir_kerja = $validatedData['akhir_kerja'];
        $karyawan->status_ptkp = $validatedData['status_ptkp'];
        $karyawan->cabang = $validatedData['cabang'];
        $karyawan->group_karyawan = $validatedData['group_karyawan'];
        $karyawan->tempat_bekerja = $validatedData['tempat_bekerja'];
        $karyawan->tunjangan_jabatan = $validatedData['tunjangan_jabatan'];
        $karyawan->tunjangan_pulsa = $validatedData['tunjangan_pulsa'];
        $karyawan->tunjangan_pendidikan = $validatedData['tunjangan_pendidikan'];
        $karyawan->tunjangan_lain = $validatedData['tunjangan_lain'];
        // $karyawan->kontrak_kerja = $nama_file_kontrak;
        $karyawan->save();
        // dd($user);
        return redirect()->route('admin.karyawan.home')->with('success', 'Data berhasil diupdate');
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
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|in:laki-laki,perempuan',
            'no_hp' => 'required|string|max:15',
            'agama' => 'required|string|in:islam,kristen,hindu,budha',
            'gol_darah' => 'required|string|max:5',
            'alamat_domisili' => 'required|string|max:255',
            'foto_karyawan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Temukan pengguna berdasarkan ID
        $user = User::findOrFail($id);

        // Perbarui data pengguna
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->tanggal_lahir = $request->input('tanggal_lahir');
        $user->jenis_kelamin = $request->input('jenis_kelamin');
        $user->no_hp = $request->input('no_hp');
        $user->agama = $request->input('agama');
        $user->gol_darah = $request->input('gol_darah');
        $user->alamat_domisili = $request->input('alamat_domisili');

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
        $users = User::where('divisi_id', $divisiId)->orderby('type', 'desc')->get();
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
}
