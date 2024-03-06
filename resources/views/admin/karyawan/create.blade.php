@extends('layouts.hero')
@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-8 col-sm-8">
                                        {{ __('Tambah Karyawan') }}
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.karyawan.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('post')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                @if ($divisis->isEmpty())
                                                    <input type="text" class="form-control"
                                                        placeholder="Belum Ada Divisi" readonly>
                                                @else
                                                    <label for="divisi" class="form-label">Divisi</label>
                                                    <select name="divisi_id" id="divisi_id" class="form-control" required>
                                                        <option>-- PILIH DIVISI --</option>
                                                        @foreach ($divisis as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ $item->id == $item->divisi_id ? 'selected' : '' }}>
                                                                {{ $item->nama_divisi }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                @endif
                                            </div>
                                            <div class="mb-3">
                                                <label for="nomor_induk" class="form-label">Nomor Induk</label>
                                                <input type="text" class="form-control"
                                                    id="nomor_induk"name="nomor_induk">
                                            </div>
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Nama Karyawan</label>
                                                <input type="text" class="form-control" id="name" name="name">
                                            </div>
                                            <div class="mb-3">
                                                <label for="jenis_kelamin" class="form-label">Gender</label>
                                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                                    <option value="laki-laki">Laki-laki</option>
                                                    <option value="perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                                <input type="text" class="form-control" id="tempat_lahir"
                                                    name="tempat_lahir">
                                            </div>
                                            <div class="mb-3">
                                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                                <input type="date" class="form-control" id="tanggal_lahir"
                                                    name="tanggal_lahir">
                                            </div>
                                            <div class="mb-3">
                                                <label for="alamat_ktp" class="form-label">Alamat KTP</label>
                                                <input type="text" class="form-control" id="alamat_ktp"
                                                    name="alamat_ktp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="alamat_domisili" class="form-label">Alamat Domisili</label>
                                                <input type="text" class="form-control" id="alamat_domisili"
                                                    name="alamat_domisili">
                                            </div>
                                            <div class="mb-3">
                                                <label for="no_hp" class="form-label">Nomor HP</label>
                                                <input type="text" class="form-control" id="no_hp" name="no_hp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="agama" class="form-label">Agama</label>
                                                <select class="form-control" id="agama" name="agama">
                                                    <option value="islam">islam</option>
                                                    <option value="kristen">kristen</option>
                                                    <option value="hindu">hindu</option>
                                                    <option value="budha">budha</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="gol_darah" class="form-label">Gol Darah</label>
                                                <select class="form-control" id="gol_darah" name="gol_darah">
                                                    <option value="o">o</option>
                                                    <option value="a">a</option>
                                                    <option value="b">b</option>
                                                    <option value="ab">ab</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="status_pernikahan" class="form-label">Status
                                                    Pernikahan</label>
                                                <select class="form-control" id="status_pernikahan"
                                                    name="status_pernikahan">
                                                    <option value="Menikah">Menikah</option>
                                                    <option value="Belum Menikah">Belum Menikah</option>
                                                </select>
                                            </div>
                                            <div class="">
                                                <!--<label for="status_karyawan" class="form-label">Status-->
                                                <!--    karyawan</label>-->
                                                <!--<select class="form-control" id="status_karyawan" name="status_karyawan">-->
                                                <!--    <option value="aktif">aktif</option>-->
                                                <!--    <option value="nonaktif">nonaktif</option>-->
                                                <!--</select>-->
                                                <input type="hidden" class="form-control" id="status_karyawan"
                                                    name="status_karyawan" value="aktif">
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email"
                                                    name="email">
                                            </div>
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="text" class="form-control" id="password"name="password"
                                                    placeholder="Password Minimal 8 karakter">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="type" class="form-label">Jabatan Karyawan</label>
                                                <select class="form-control" id="type" name="type">
                                                    <option selected>-- PILIH --</option>
                                                    <option value="1">Admin</option>
                                                    <option value="0">Staff</option>
                                                    <option value="2">Supervisior</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="foto_karyawan" class="form-label">Foto karyawan</label>
                                                <input type="file" class="form-control"
                                                    id="foto_karyawan"name="foto_karyawan">
                                            </div>
                                            <div class="mb-3">
                                                <label for="gaji" class="form-label">Gaji Karyawan</label>
                                                <input type="text" class="form-control" id="gaji"name="gaji"
                                                    value="0">
                                            </div>
                                            <div class="mb-3">
                                                <label for="uang_makan" class="form-label">Uang Makan Karyawan</label>
                                                <input type="text" class="form-control"
                                                    id="uang_makan"name="uang_makan" value="0">
                                            </div>
                                            <div class="mb-3">
                                                <label for="uang_transport" class="form-label">Uang Transport
                                                    Karyawan</label>
                                                <input type="text" class="form-control"
                                                    id="uang_transport"name="uang_transport" value="0">
                                            </div>
                                            <div class="mb-3">
                                                <label for="tunjangan_jabatan" class="form-label">Tunjangan
                                                    Jabatan</label>
                                                <input type="text" class="form-control"
                                                    id="tunjangan_jabatan"name="tunjangan_jabatan" value="0">
                                            </div>
                                            <div class="mb-3">
                                                <label for="tunjangan_pulsa" class="form-label">Tunjangan Pulsa</label>
                                                <input type="text" class="form-control"
                                                    id="tunjangan_pulsa"name="tunjangan_pulsa" value="0">
                                            </div>
                                            <div class="mb-3">
                                                <label for="tunjangan_pendidikan" class="form-label">Tunjangan
                                                    Pendidikan</label>
                                                <input type="text" class="form-control"
                                                    id="tunjangan_pendidikan"name="tunjangan_pendidikan" value="0">
                                            </div>
                                            <div class="mb-3">
                                                <label for="mulai_kerja" class="form-label">Mulai Kerja</label>
                                                <input type="date" class="form-control"
                                                    id="mulai_kerja"name="mulai_kerja">
                                            </div>
                                            <div class="mb-3">
                                                <label for="akhir_kerja" class="form-label">Akhir Kerja</label>
                                                <input type="date" class="form-control"
                                                    id="akhir_kerja"name="akhir_kerja">
                                            </div>
                                            <div class="mb-3">
                                                <label for="kontrak_kerja" class="form-label">Kontrak Kerja</label><br>
                                                <div class="row">
                                                    <div class="col-8">
                                                        <input type="file" class="form-control" id="kontrak_kerja"
                                                            name="kontrak_kerja">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="status_ptkp" class="form-label">Status PTKP</label>
                                                <input type="text" class="form-control"
                                                    id="status_ptkp"name="status_ptkp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="cabang" class="form-label">Cabang</label>
                                                <input type="text" class="form-control" id="cabang"name="cabang">
                                            </div>
                                            <div class="mb-3">
                                                <label for="tunjangan_lain" class="form-label">Tunjangan Lain-
                                                    Lain</label>
                                                <input type="text" class="form-control"
                                                    id="tunjangan_lain"name="tunjangan_lain">
                                            </div>
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-primary w-100">SUBMIT</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
