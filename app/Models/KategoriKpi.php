<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriKpi extends Model
{
    use HasFactory;
    protected $table = 'kategori_kpis';
    protected $fillable = [
        'divisi_id',
        'nama_kpi',
        'pertanyaan1',
        'pertanyaan2',
        'pertanyaan3',
        'pertanyaan4',
        'pertanyaan5',
        'pertanyaan6',
        'pertanyaan7',
        'pertanyaan8',
        'pertanyaan9',
        'pertanyaan10',
        'pertanyaan11',
        'pertanyaan12',
    ];

    public function divisi()
    {
        return $this->belongsTo(Divisi::class, 'divisi_id');
    }
    public function kategori_kpis()
    {
        return $this->hasMany(KategoriKpi::class, 'kategorikpi_id');
    }
}
