<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;
    protected $table = 'cutis';
    protected $fillable = [
        'user_id',
        'divisi_id',
        'type',
        'hak_cuti',
        'ambil_cuti',
        'sisa_cuti',
        'tanggal_mulai',
        'tanggal_selesai',
        'alasan_cuti',
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
