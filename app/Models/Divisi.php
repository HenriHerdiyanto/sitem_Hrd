<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'divisis';
    protected $fillable = [
        'kode_divisi',
        'nama_divisi',
    ];
    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function divisi()
    {
        return $this->hasMany(Divisi::class);
    }
    public function evaluasis()
    {
        return $this->hasMany(Evaluasi::class, 'divisi_id');
    }
    public function cuti()
    {
        return $this->hasMany(Cuti::class, 'divisi_id');
    }
    public function kategori_kpis()
    {
        return $this->hasMany(KategoriKpi::class, 'divisi_id');
    }
}
