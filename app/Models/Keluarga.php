<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    use HasFactory;
    protected $table = 'keluargas';
    protected $fillable = [
        'user_id',
        'nama_ayah',
        'tl_ayah',
        'pendidikan_ayah',
        'pekerjaan_ayah',
        'jabatan_ayah',
        'perusahaan_ayah',
        'nama_ibu',
        'tl_ibu',
        'pendidikan_ibu',
        'pekerjaan_ibu',
        'jabatan_ibu',
        'perusahaan_ibu',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
