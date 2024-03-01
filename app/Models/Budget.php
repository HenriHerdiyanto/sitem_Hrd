<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;
    protected $table = 'budgets';
    protected $fillable = [
        'user_id',
        'divisi_id',
        'jenis_item',
        'tanggal',
        'judul_request',
        'barang1',
        'harga1',
        'barang2',
        'harga2',
        'barang3',
        'harga3',
        'barang4',
        'harga4',
        'total_harga',
        'diketahui',
        'disetujui',
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
