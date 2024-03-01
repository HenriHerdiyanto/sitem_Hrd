<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluasi extends Model
{
    use HasFactory;
    protected $table = 'evaluasis';
    protected $fillable = [
        'user_id',
        'divisi_id',
        'lama_percobaan',
        'nama_lengkap',
        'type',
        'mulai_kerja',
        'faktor_penilaian',
        'catatan_atasan',
        'catatan_hrd',
        'dievaluasi_oleh',
        'disetujui_oleh',
        'status_evaluasi',
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
