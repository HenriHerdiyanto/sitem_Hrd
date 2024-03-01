<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;
    protected $table = 'pendidikans';
    protected $fillable = [
        'user_id',
        'jenjang_pendidikan',
        'instansi_pendidikan',
        'jurusan',
        'tahun_masuk',
        'tahun_keluar',
        'index_nilai',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
