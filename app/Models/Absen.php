<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;
    protected $table = 'absens';
    protected $fillable = [
        'user_id',
        'name',
        'tanggal',
        'waktu_masuk',
        'waktu_keluar',
        'barcode',
        'terlambat',
        'sakit',
        'izin',
        'keterangan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
