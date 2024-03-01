<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerjalananDinas extends Model
{
    use HasFactory;
    protected $table = 'perjalanan_dinas';
    protected $fillable = [
        'user_id',
        'divisi_id',
        'name',
        'type',
        'project',
        'tujuan',
        'jumlah_personel',
        'nama_personel',
        'jenis_perjalanan',
        'kota_tujuan',
        'tanggal_berangkat',
        'tanggal_pulang',
        'kota_pulang',
        'transportasi',
        'hotel',
        'bagasi',
        'cash_advance',
        'keterangan',
        'diminta_oleh',
        'diketahui_oleh',
        'disetujui_oleh',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function divisi()
    {
        return $this->belongsTo(Divisi::class, 'divisi_id');
    }
}
