<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infrastruktur extends Model
{
    use HasFactory;
    protected $table = 'infrastrukturs';
    protected $fillable = [
        'user_id',
        'nomor',
        'tanggal',
        'infrastruktur',
        'ruangan',
        'jenis_perbaikan',
        'keterangan',
        'prepared',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
