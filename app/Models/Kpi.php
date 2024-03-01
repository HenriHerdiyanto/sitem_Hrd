<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kpi extends Model
{
    use HasFactory;
    protected $table = "kpis";
    protected $fillable = [
        "kategorikpi_id",
        "user_id",
        "nilai1",
        "nilai2",
        "nilai3",
        "nilai4",
        "nilai5",
        "nilai6",
        "nilai7",
        "nilai8",
        "nilai9",
        "nilai10",
        "nilai11",
        "nilai12",
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function kategori_kpis()
    {
        return $this->belongsTo(KategoriKpi::class, 'kategorikpi_id');
    }
}
