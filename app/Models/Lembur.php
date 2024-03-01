<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lembur extends Model
{
    use HasFactory;
    protected $table = 'lemburs';
    protected $fillable = [
        "user_id",
        "nama_project",
        "tanggal",
        "mulai_lembur",
        "akhir_lembur",
        "total_lembur",
        "keterangan",
        "mengetahui",
        "status",
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
