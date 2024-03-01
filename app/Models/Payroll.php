<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;
    protected $table = 'payrolls';

    protected $fillable = [
        'user_id',
        'pendidikan',
        'status_ptkp',
        'cabang',
        'group',
        'gaji_pokok',
        'tempat_kerja',
        'tunjangan_jabatan',
        'tunjangan_pulsa',
        'lain_lain',
        'tunjangan_pendidikan',
        'uang_makan',
        'uang_transport',
        'total_gaji',
        'lembur',
        'dinas',
        'cuti_tahunan',
        'thr',
        'tunjanganpph21',
        'potonganpph21',
        'total_tunjangan',
        'total_gaji_tunjangan',
        'referal_client',
        'insentif_kk',
        'insentif_spv',
        'insentif_staff',
        'insentif_spt_op',
        'insentif_spt_badan',
        'insentif_spt',
        'komisi_marketing',
        'total_insentif',
        'total_pendapatan',
        'terlambat',
        'cuti_bersama',
        'cuti',
        'sakit',
        'izin',
        'alpha',
        'pinjaman',
        'bpjs_perusahaan',
        'bpjs_karyawan',
        'jkk',
        'jkm',
        'jht_37',
        'ditanggung_perusahaan',
        'ditanggung_karyawan',
        'total_pengurangan',
        'total_gaji_bersih',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function divisi()
    {
        return $this->belongsTo(Divisi::class, 'user_id');
    }
}
