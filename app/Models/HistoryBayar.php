<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryBayar extends Model
{
    use HasFactory;
    protected $table = 'history_bayars';
    protected $fillable = [
        'pinjam_id',
        'user_id',
        'tanggal_pinjam',
        'tanggal_bayar',
        'jumlah_bayar_sekarang',
        'gambar',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function pinjaman()
    {
        return $this->belongsTo(Pinjaman::class);
    }
}
