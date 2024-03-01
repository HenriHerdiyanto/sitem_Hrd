<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\User;
use App\Models\PerjalananDinas;
use Illuminate\Http\Request;

class PerjalananDinasController extends Controller
{
    public function index()
    {
        // Mengambil user_id pengguna yang sedang login
        $userId = auth()->user()->id;
        $user = User::find($userId);
        $pd = PerjalananDinas::all();
        return view("manager.perjalananDinas.index", compact("user", 'pd'));
    }
    public function Adminindex()
    {
        $user = User::all();
        $divisi = Divisi::all();
        $pd = PerjalananDinas::all();

        return view("admin.perjalananDinas.index", compact("user", "pd", "divisi"));
    }
    public function create()
    {
        // Mengambil user_id pengguna yang sedang login
        $userId = auth()->user()->id;
        $divisi = Divisi::all();
        $users = User::find($userId);

        return view("manager.perjalananDinas.create", compact("users", "divisi"));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            "user_id" => "required",
            "divisi_id" => "required",
            "type" => "required",
            "project" => "required",
            "tujuan" => "required",
            "jumlah_personel" => "required",
            "nama_personel" => "required",
            "jenis_perjalanan" => "required",
            "kota_tujuan" => "required",
            "tanggal_berangkat" => "required",
            "tanggal_pulang" => "required",
            "kota_pulang" => "required",
            "transportasi" => "required",
            "hotel" => "required",
            "bagasi" => "required",
            "cash_advance" => "required",
            "keterangan" => "required",
            "status" => "required",
        ]);

        $perjalananDinas = new PerjalananDinas();
        $perjalananDinas->user_id = $validateData["user_id"];
        $perjalananDinas->divisi_id = $validateData["divisi_id"];
        $perjalananDinas->type = $validateData["type"];
        $perjalananDinas->project = $validateData["project"];
        $perjalananDinas->tujuan = $validateData["tujuan"];
        $perjalananDinas->jumlah_personel = $validateData["jumlah_personel"];
        $perjalananDinas->nama_personel = $validateData["nama_personel"];
        $perjalananDinas->jenis_perjalanan = $validateData["jenis_perjalanan"];
        $perjalananDinas->kota_tujuan = $validateData["kota_tujuan"];
        $perjalananDinas->tanggal_berangkat = $validateData["tanggal_berangkat"];
        $perjalananDinas->tanggal_pulang = $validateData["tanggal_pulang"];
        $perjalananDinas->kota_pulang = $validateData["kota_pulang"];
        $perjalananDinas->transportasi = $validateData["transportasi"];
        $perjalananDinas->hotel = $validateData["hotel"];
        $perjalananDinas->bagasi = $validateData["bagasi"];
        $perjalananDinas->cash_advance = $validateData["cash_advance"];
        $perjalananDinas->keterangan = $validateData["keterangan"];
        $perjalananDinas->status = $validateData["status"];
        $perjalananDinas->save();

        return redirect()->route('dinas.index')->with('success', 'ok');
    }

    public function edit($id)
    {
        // Mengambil user_id pengguna yang sedang login
        $userId = auth()->user()->id;
        // Mengambil data pengguna yang akan diedit
        $users = User::find($id);

        // Mengambil data divisi berdasarkan id pengguna
        $divisi = Divisi::find($users->divisi_id);

        // Mengambil data perjalanan dinas berdasarkan id
        $perjalananDinasData = PerjalananDinas::find($id);

        return view('manager.perjalananDinas.edit', compact('users', 'perjalananDinasData', 'divisi'));
    }
    public function Adminedit($id)
    {
        $users = User::find($id);
        $divisi = Divisi::find($id);
        $perjalananDinas = PerjalananDinas::find($id);
        return view('admin.perjalananDinas.edit', compact('users', 'perjalananDinas', 'divisi'));
    }
    public function update(Request $request, $id)
    {
        $perjalananDinas = PerjalananDinas::find($id);
        $validateData = $request->validate([
            'user_id' => 'required',
            'divisi_id' => 'required',
            'type' => 'required',
            'project' => 'nullable',
            'tujuan' => 'nullable',
            'jumlah_personel' => 'nullable',
            'nama_personel' => 'nullable',
            'jenis_perjalanan' => 'nullable',
            'kota_tujuan' => 'nullable',
            'tanggal_berangkat' => 'nullable',
            'tanggal_pulang' => 'nullable',
            'kota_pulang' => 'nullable',
            'transportasi' => 'nullable',
            'hotel' => 'nullable',
            'bagasi' => 'nullable',
            'cash_advance' => 'nullable',
            'keterangan' => 'nullable',
        ]);

        $perjalananDinas = PerjalananDinas::findOrFail($id);
        $perjalananDinas->user_id = $validateData['user_id'];
        $perjalananDinas->divisi_id = $validateData['divisi_id'];
        $perjalananDinas->type = $validateData['type'];
        $perjalananDinas->project = $validateData['project'];
        $perjalananDinas->tujuan = $validateData['tujuan'];
        $perjalananDinas->jumlah_personel = $validateData['jumlah_personel'];
        $perjalananDinas->nama_personel = $validateData['nama_personel'];
        $perjalananDinas->jenis_perjalanan = $validateData['jenis_perjalanan'];
        $perjalananDinas->kota_tujuan = $validateData['kota_tujuan'];
        $perjalananDinas->tanggal_berangkat = $validateData['tanggal_berangkat'];
        $perjalananDinas->tanggal_pulang = $validateData['tanggal_pulang'];
        $perjalananDinas->kota_pulang = $validateData['kota_pulang'];
        $perjalananDinas->transportasi = $validateData['transportasi'];
        $perjalananDinas->hotel = $validateData['hotel'];
        $perjalananDinas->bagasi = $validateData['bagasi'];
        $perjalananDinas->cash_advance = $validateData['cash_advance'];
        $perjalananDinas->keterangan = $validateData['keterangan'];
        $perjalananDinas->save();

        return redirect()->route('dinas.index')->with('success', 'ok');
    }


    public function Adminupdate(Request $request, $id)
    {
        $perjalananDinas = PerjalananDinas::find($id);
        $validateData = $request->validate([
            'user_id' => 'required',
            'divisi_id' => 'required',
            'type' => 'required',
            'project' => 'nullable',
            'tujuan' => 'nullable',
            'jumlah_personel' => 'nullable',
            'nama_personel' => 'nullable',
            'jenis_perjalanan' => 'nullable',
            'kota_tujuan' => 'nullable',
            'tanggal_berangkat' => 'nullable',
            'tanggal_pulang' => 'nullable',
            'kota_pulang' => 'nullable',
            'transportasi' => 'nullable',
            'hotel' => 'nullable',
            'bagasi' => 'nullable',
            'cash_advance' => 'nullable',
            'keterangan' => 'nullable',
            'diminta_oleh' => 'nullable',
            'diketahui_oleh' => 'nullable',
            'disetujui_oleh' => 'nullable',
            'status' => 'nullable',
        ]);

        $perjalananDinas = PerjalananDinas::findOrFail($id);
        $perjalananDinas->user_id = $validateData['user_id'];
        $perjalananDinas->divisi_id = $validateData['divisi_id'];
        $perjalananDinas->type = $validateData['type'];
        $perjalananDinas->project = $validateData['project'];
        $perjalananDinas->tujuan = $validateData['tujuan'];
        $perjalananDinas->jumlah_personel = $validateData['jumlah_personel'];
        $perjalananDinas->nama_personel = $validateData['nama_personel'];
        $perjalananDinas->jenis_perjalanan = $validateData['jenis_perjalanan'];
        $perjalananDinas->kota_tujuan = $validateData['kota_tujuan'];
        $perjalananDinas->tanggal_berangkat = $validateData['tanggal_berangkat'];
        $perjalananDinas->tanggal_pulang = $validateData['tanggal_pulang'];
        $perjalananDinas->kota_pulang = $validateData['kota_pulang'];
        $perjalananDinas->transportasi = $validateData['transportasi'];
        $perjalananDinas->hotel = $validateData['hotel'];
        $perjalananDinas->bagasi = $validateData['bagasi'];
        $perjalananDinas->cash_advance = $validateData['cash_advance'];
        $perjalananDinas->keterangan = $validateData['keterangan'];
        $perjalananDinas->diminta_oleh = $validateData['diminta_oleh'];
        $perjalananDinas->diketahui_oleh = $validateData['diketahui_oleh'];
        $perjalananDinas->disetujui_oleh = $validateData['disetujui_oleh'];
        $perjalananDinas->status = $validateData['status'];
        $perjalananDinas->save();

        return redirect()->route('admin.dinas.index')->with('success', 'ok');
    }
    public function destroy($id)
    {
        $perjalananDinas = PerjalananDinas::find($id);
        $perjalananDinas->delete();
        return redirect()->route('dinas.index')->with('success', 'ok');
    }

    public function Admindestroy($id)
    {
        $perjalananDinas = PerjalananDinas::find($id);
        $perjalananDinas->delete();
        return redirect()->route('admin.dinas.index')->with('success', 'ok');
    }
}
