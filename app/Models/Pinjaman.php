<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    use HasFactory;
    protected $table = 'pinjamen';
    protected $fillable = [
        'user_id',
        'mulai_kerja',
        'jumlah_pinjam',
        'jangka_pelunasan',
        'jumlah_cicilan',
        'tanggal_pinjam',
        'pelunasan_terakhir',
        'gaji',
        'keperluan',
        'disetujui',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function history()
    {
        return $this->hasMany(history::class);
    }
}
