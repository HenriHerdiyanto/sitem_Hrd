<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    use HasFactory;
    protected $guarded = [];
    protected $fillable = [
        'divisi_id',
        'nomor_induk',
        'name',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat_ktp',
        'alamat_domisili',
        'no_hp',
        'no_ktp',
        'agama',
        'gol_darah',
        'status_pernikahan',
        'status_karyawan',
        'email',
        'password',
        'type',
        'foto_karyawan',
        'gaji',
        'uang_makan',
        'uang_transport',
        'mulai_kerja',
        'akhir_kerja',
        'kontrak_kerja',
        'status_ptkp',
        'cabang',
        'group_karyawan',
        'tempat_bekerja',
        'tunjangan_jabatan',
        'tunjangan_pulsa',
        'tunjangan_pendidikan',
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
     * Interact with the user's first name.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function type(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  ["user", "admin", "manager", "finance"][$value],
        );
    }
    public function divisi()
    {
        return $this->belongsTo(Divisi::class, 'divisi_id');
    }

    public function evaluasis()
    {
        return $this->hasMany(Evaluasi::class, 'user_id');
    }
    public function pinjaman()
    {
        return $this->hasMany(Pinjaman::class, 'user_id');
    }
    public function shiffs()
    {
        return $this->hasMany(Shiff::class, 'user_id');
    }
    public function absen()
    {
        return $this->hasMany(Absen::class, 'user_id');
    }
    public function todolists()
    {
        return $this->hasMany(Todolist::class);
    }
    public function payrolls()
    {
        return $this->hasMany(Payroll::class);
    }
    public function lemburs()
    {
        return $this->hasMany(Lembur::class);
    }
    public function reimbursement()
    {
        return $this->hasMany(Reimbursement::class, 'user_id', 'id');
    }

    public function pendidikans()
    {
        return $this->hasMany(Pendidikan::class);
    }
    public function keluargas()
    {
        return $this->hasMany(Keluarga::class);
    }
    public function perjalananDinas()
    {
        return $this->hasMany(PerjalananDinas::class, 'user_id');
    }
    public function cuti()
    {
        return $this->hasMany(Cuti::class, 'user_id');
    }
    public function budgets()
    {
        return $this->hasMany(Budget::class, 'user_id');
    }
    public function history()
    {
        return $this->hasMany(HistoryBayar::class, 'user_id');
    }
    public function infrastrukturs()
    {
        return $this->hasMany(Infrastruktur::class, 'user_id');
    }
    public function kpis()
    {
        return $this->hasMany(Kpi::class, 'user_id');
    }
}
