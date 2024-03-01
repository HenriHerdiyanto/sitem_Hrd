<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KaryawanImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new User([
            'divisi_id' => $row['divisi_id'] ?? 0,
            'nomor_induk' => $row['nomor_induk'],
            'name' => $row['name'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'tempat_lahir' => $row['tempat_lahir'],
            'tanggal_lahir' => $row['tanggal_lahir'],
            'alamat_ktp' => $row['alamat_ktp'],
            'alamat_domisili' => $row['alamat_domisili'],
            'no_hp' => $row['no_hp'],
            'no_ktp' => $row['no_ktp'],
            'agama' => $row['agama'],
            'gol_darah' => $row['gol_darah'],
            'status_pernikahan' => $row['status_pernikahan'],
            'status_karyawan' => $row['status_karyawan'],
            'email' => $row['email'],
            'password' => isset($row['password']) ? bcrypt($row['password']) : bcrypt('usermytax123'), // Gunakan password default jika kosong
            'type' => $row['type'],
            'foto_karyawan' => $row['foto_karyawan'],
            'gaji' => $row['gaji'],
            'uang_makan' => $row['uang_makan'],
            'uang_transport' => $row['uang_transport'],
            'mulai_kerja' => $row['mulai_kerja'],
            'kontrak_kerja' => $row['kontrak_kerja'],
            'status_ptkp' => isset($row['status_ptkp']) ? $row['status_ptkp'] : null,
            'cabang' => isset($row['cabang']) ? $row['cabang'] : null,
            'group_karyawan' => isset($row['group_karyawan']) ? $row['group_karyawan'] : null,
            'tempat_bekerja' => isset($row['tempat_bekerja']) ? $row['tempat_bekerja'] : null,
            'tunjangan_jabatan' => isset($row['tunjangan_jabatan']) ? $row['tunjangan_jabatan'] : null,
            'tunjangan_pulsa' => isset($row['tunjangan_pulsa']) ? $row['tunjangan_pulsa'] : null,
            'tunjangan_pendidikan' => isset($row['tunjangan_pendidikan']) ? $row['tunjangan_pendidikan'] : null,
        ]);
    }
}
