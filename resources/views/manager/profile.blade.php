@extends('layouts.manager')
@php
    $activePage = 'dashboard'; // Anda bisa mengubah nilai ini sesuai dengan halaman yang aktif
@endphp
@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                @if (session('success'))
                    <div class="alert alert-success" id="success-alert">
                        {{ session('success') }}
                        <button type="button" class="close" onclick="closeAlert()">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title text-center">BIODATA KARYAWAN</h4>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-pills nav-secondary  nav-pills-no-bd nav-pills-icons justify-content-center"
                                    id="pills-tab-with-icon" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-home-tab-icon" data-toggle="pill"
                                            href="#pills-home-icon" role="tab" aria-controls="pills-home-icon"
                                            aria-selected="true">
                                            <i class="flaticon-user-4"></i>
                                            Profile
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-profile-tab-icon" data-toggle="pill"
                                            href="#pills-profile-icon" role="tab" aria-controls="pills-profile-icon"
                                            aria-selected="false">
                                            <i class="fas fa-user-graduate"></i>
                                            Pendidikan
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-contact-tab-icon" data-toggle="pill"
                                            href="#pills-contact-icon" role="tab" aria-controls="pills-contact-icon"
                                            aria-selected="false">
                                            <i class="fas fa-users"></i>
                                            Keluarga
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content mt-2 mb-3" id="pills-with-icon-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home-icon" role="tabpanel"
                                        aria-labelledby="pills-home-tab-icon">
                                        <form action="{{ route('manager.update.Profile', $user->id) }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="row mt-3">
                                                <div class="col-md-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Divisi</label>
                                                        <input type="text" class="form-control" name="divisi_id"
                                                            value="{{ $user->divisi->nama_divisi }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-4">
                                                    <div class="form-group form-group-default">
                                                        <label>Name</label>
                                                        <input type="text" class="form-control" name="name"
                                                            placeholder="Name" value="{{ $user->name }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group form-group-default">
                                                        <label>Email</label>
                                                        <input type="email" class="form-control" name="email"
                                                            placeholder="Email" value="{{ $user->email }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group form-group-default">
                                                        <label>New Password</label>
                                                        <input type="password" class="form-control" name="password"
                                                            placeholder="New Password">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-4">
                                                    <div class="form-group form-group-default">
                                                        <label>Tanggal Lahir</label>
                                                        <input type="date" class="form-control" id="tanggal_lahir"
                                                            name="tanggal_lahir" value="{{ $user->tanggal_lahir }}"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group form-group-default">
                                                        <label>Gender</label>
                                                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin"
                                                            required>
                                                            <option selected value="{{ $user->jenis_kelamin }}">
                                                                {{ $user->jenis_kelamin }}</option>
                                                            <option value="laki-laki">Laki-laki</option>
                                                            <option value="perempuan">perempuan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group form-group-default">
                                                        <label>Phone</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $user->no_hp }}" name="no_hp"
                                                            placeholder="Masukan Nomor HP" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group form-group-default">
                                                        <label>Agama</label>
                                                        <select name="agama" class="form-control" required>
                                                            @if ($user->agama)
                                                                <option value="{{ $user->agama }}" selected>
                                                                    {{ $user->agama }}
                                                                </option>
                                                            @else
                                                                <option selected>--- PILIH ---</option>
                                                            @endif
                                                            <option value="islam">Islam</option>
                                                            <option value="kristen">kristen</option>
                                                            <option value="hindu">hindu</option>
                                                            <option value="budha">budha</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group form-group-default">
                                                        <label>Gol Darah</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $user->gol_darah }}" name="gol_darah"
                                                            placeholder="gol_darah" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group form-group-default">
                                                        <label>Alamat Domisili</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $user->alamat_domisili }}" name="alamat_domisili"
                                                            placeholder="alamat_domisili" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group form-group-default">
                                                        <label>Status Pernikahan</label>
                                                        <input type="text" class="form-control" id="status_pernikahan"
                                                            name="status_pernikahan"
                                                            value="{{ $user->status_pernikahan }}"
                                                            placeholder="Menikah / Belum Menikah" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group form-group-default">
                                                        <label>Status Karyawan</label>
                                                        <input type="text" class="form-control" id="status_karyawan"
                                                            name="status_karyawan" value="{{ $user->status_karyawan }}"
                                                            placeholder="status_karyawan" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group form-group-default">
                                                        <label>Jabatan</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $user->type }}" name="type"
                                                            placeholder="type" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group form-group-default">
                                                        <label>Gaji Karyawan</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $user->gaji }}" name="gaji"
                                                            placeholder="gaji" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group form-group-default">
                                                        <label>Uang Makan</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $user->uang_makan }}" name="uang_makan"
                                                            placeholder="uang_makan" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group form-group-default">
                                                        <label>Uang transport</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $user->uang_transport }}" name="uang_transport"
                                                            placeholder="uang_transport" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group form-group-default">
                                                        <label>Mulai Kerja</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $user->mulai_kerja }}" name="mulai_kerja"
                                                            placeholder="mulai_kerja" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group form-group-default">
                                                        <label>Akhir Kerja</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $user->akhir_kerja }}" name="akhir_kerja"
                                                            placeholder="akhir_kerja" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group form-group-default">
                                                        <label>Tunjangan Lain - lain</label>
                                                        @if ($user->tunjangan_lain)
                                                            <input type="text" class="form-control"
                                                                value="{{ $user->tunjangan_lain }}" name="tunjangan_lain"
                                                                placeholder="tunjangan_lain" readonly>
                                                        @else
                                                            <input type="text" class="form-control" value="0"
                                                                name="tunjangan_lain" readonly>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group form-group-default">
                                                        <label>Tunjangan Jabatan</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $user->tunjangan_jabatan }}"
                                                            name="tunjangan_jabatan" placeholder="tunjangan_jabatan"
                                                            readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group form-group-default">
                                                        <label>Tunjangan Pulsa</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $user->tunjangan_pulsa }}" name="tunjangan_pulsa"
                                                            placeholder="tunjangan_pulsa" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group form-group-default">
                                                        <label>Tunjangan Pendidikan</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $user->tunjangan_pendidikan }}"
                                                            name="tunjangan_pendidikan" placeholder="tunjangan_pendidikan"
                                                            readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row d-flex">
                                                <div class="col-md-8">
                                                    <div class="form-group form-group-default">
                                                        @if ($user->foto_karyawan)
                                                            <label for="">UPDATE FOTO KARYAWAN</label>
                                                            <img src="{{ asset('foto_karyawan/' . $user->foto_karyawan) }}"
                                                                class="img-fluid" style="width: 200px;">
                                                            <input type="file" class="form-control"
                                                                name="foto_karyawan" value="{{ $user->foto_karyawan }}">
                                                        @else
                                                            <label for="">UPLOAD FOTO KARYAWAN</label>
                                                            <input type="file" class="form-control"
                                                                name="foto_karyawan" required>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group form-group-default">
                                                        @if ($user->kontrak_kerja)
                                                            <a href="{{ asset('kontrak_kerja/' . $user->kontrak_kerja) }}"
                                                                class="btn btn-primary text-end" target="_blank">Lihat
                                                                Kontrak
                                                                kerja</a>
                                                        @else
                                                            <h3><span class="badge bg-warning">Belum ada Kontrak
                                                                    Kerja</span></h3>
                                                        @endif
                                                        <input type="hidden" class="form-control"
                                                            value="{{ $user->kontrak_kerja }}" name="kontrak_kerja">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group form-group-default">
                                                    <button type="submit" class="btn btn-success w-100">UPDATE</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="pills-profile-icon" role="tabpanel"
                                        aria-labelledby="pills-profile-tab-icon">
                                        @if ($pendidikans->isEmpty())
                                            <form action="{{ route('user.pendidikan.store') }}" method="post">
                                                @csrf
                                                @method('post')
                                                <div class="row mt-3">
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default">
                                                            <label>Name</label>
                                                            <input type="hidden" class="form-control" name="user_id"
                                                                value="{{ $user->id }}">
                                                            <input type="text" class="form-control"
                                                                value="{{ $user->name }}">
                                                        </div>
                                                        <div class="form-group form-group-default">
                                                            <label>Instansi Pendidikan</label>
                                                            <input type="text" class="form-control"
                                                                name="instansi_pendidikan">
                                                        </div>
                                                        <div class="form-group form-group-default">
                                                            <label>Jenjang Pendidikan</label>
                                                            <select name="jenjang_pendidikan" class="form-control">
                                                                <option selected>-- PILIH --</option>
                                                                <option value="SARJANA">SARJANA</option>
                                                                <option value="MASTER">MASTER</option>
                                                                <option value="DOCTOR">DOCTOR</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group form-group-default">
                                                            <label>Jurusan</label>
                                                            <input type="text" class="form-control"name="jurusan">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default">
                                                            <label>Tahun Masuk</label>
                                                            <input type="text" class="form-control"
                                                                name="tahun_masuk">
                                                        </div>
                                                        <div class="form-group form-group-default">
                                                            <label>Tahun Keluar</label>
                                                            <input type="text" class="form-control"
                                                                name="tahun_keluar">
                                                        </div>
                                                        <div class="form-group form-group-default">
                                                            <label>Index Komulatif</label>
                                                            <input type="text" class="form-control"
                                                                name="index_nilai">
                                                        </div>
                                                        <button type="submit" id="alert_demo_3_3"
                                                            class="btn btn-primary w-100">SUBMIT</button>
                                                    </div>
                                                </div>
                                            </form>
                                        @else
                                            @foreach ($pendidikans as $data)
                                                <form action="{{ route('user.pendidikan.update', $data->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('put')
                                                    <div class="row mt-3">
                                                        <div class="col-md-6">
                                                            <div class="form-group form-group-default">
                                                                <label>Name</label>
                                                                <input type="hidden" class="form-control" name="user_id"
                                                                    value="{{ $user->id }}">
                                                                <input type="text" class="form-control"
                                                                    value="{{ $user->name }}">
                                                            </div>

                                                            <div class="form-group form-group-default">
                                                                <label>Instansi Pendidikan</label>
                                                                <input type="text" class="form-control"
                                                                    name="instansi_pendidikan"
                                                                    value="{{ $data->instansi_pendidikan }}">
                                                            </div>
                                                            <div class="form-group form-group-default">
                                                                <label>Jenjang Pendidikan</label>
                                                                <select name="jenjang_pendidikan" class="form-control">
                                                                    <option
                                                                        value="SARJANA"{{ $data->jenjang_pendidikan === 'SARJANA' ? ' selected' : '' }}>
                                                                        SARJANA</option>
                                                                    <option
                                                                        value="MASTER"{{ $data->jenjang_pendidikan === 'MASTER' ? ' selected' : '' }}>
                                                                        MASTER</option>
                                                                    <option
                                                                        value="DOCTOR"{{ $data->jenjang_pendidikan === 'DOCTOR' ? ' selected' : '' }}>
                                                                        DOCTOR</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group form-group-default">
                                                                <label>Jurusan</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $data->jurusan }}" name="jurusan">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group form-group-default">
                                                                <label>Tahun Masuk</label>
                                                                <input type="text" class="form-control"
                                                                    name="tahun_masuk" value="{{ $data->tahun_masuk }}">
                                                            </div>
                                                            <div class="form-group form-group-default">
                                                                <label>Tahun Keluar</label>
                                                                <input type="text" class="form-control"
                                                                    name="tahun_keluar"
                                                                    value="{{ $data->tahun_keluar }}">
                                                            </div>
                                                            <div class="form-group form-group-default">
                                                                <label>Index Komulatif</label>
                                                                <input type="text" class="form-control"
                                                                    name="index_nilai" value="{{ $data->index_nilai }}">
                                                            </div>
                                                            <button type="submit" id="alert_demo_3_5"
                                                                class="btn btn-success w-100">UPDATE</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="tab-pane fade" id="pills-contact-icon" role="tabpanel"
                                        aria-labelledby="pills-contact-tab-icon">
                                        @if ($keluargas->isEmpty())
                                            <form action="{{ route('user.keluarga.store') }}" method="post">
                                                @csrf
                                                <div class="row mt-3">
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default">
                                                            <label>Nama Karyawan</label>
                                                            <input type="hidden" class="form-control" name="user_id"
                                                                value="{{ $user->id }}">
                                                            <input type="text" class="form-control"
                                                                value="{{ $user->name }}">
                                                        </div>
                                                        <div class="form-group form-group-default">
                                                            <label>Nama Lengkap Ayah</label>
                                                            <input type="text" class="form-control" name="nama_ayah">
                                                        </div>
                                                        <div class="form-group form-group-default">
                                                            <label>Tanggal Lahir Ayah</label>
                                                            <input type="date" class="form-control" name="tl_ayah">
                                                        </div>
                                                        <div class="form-group form-group-default">
                                                            <label>Pendidikan Terakhir Ayah</label>
                                                            <select name="pendidikan_ayah" class="form-control">
                                                                <option selected>-- PILIH --</option>
                                                                <option value="DOCTOR">DOCTOR</option>
                                                                <option value="MASTER">MASTER</option>
                                                                <option value="SARJANA">SARJANA</option>
                                                                <option value="SMA">SMA</option>
                                                                <option value="SMP">SMP</option>
                                                                <option value="SD">SD</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group form-group-default">
                                                            <label>Pekerjaan Ayah</label>
                                                            <input type="text" class="form-control"
                                                                name="pekerjaan_ayah">
                                                        </div>
                                                        <div class="form-group form-group-default">
                                                            <label>Jabatan Ayah</label>
                                                            <input type="text" class="form-control"
                                                                name="jabatan_ayah">
                                                        </div>
                                                        <div class="form-group form-group-default">
                                                            <label>Nama Perusahaan Ayah</label>
                                                            <input type="text" class="form-control"
                                                                name="perusahaan_ayah">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default">
                                                            <label>Nama Lengkap IBU</label>
                                                            <input type="text" class="form-control" name="nama_ibu">
                                                        </div>
                                                        <div class="form-group form-group-default">
                                                            <label>Tanggal Lahir IBU</label>
                                                            <input type="date" class="form-control" name="tl_ibu">
                                                        </div>
                                                        <div class="form-group form-group-default">
                                                            <label>Pendidikan Terakhir IBU</label>
                                                            <select name="pendidikan_ibu" class="form-control">
                                                                <option selected>-- PILIH --</option>
                                                                <option value="DOCTOR">DOCTOR</option>
                                                                <option value="MASTER">MASTER</option>
                                                                <option value="SARJANA">SARJANA</option>
                                                                <option value="SMA">SMA</option>
                                                                <option value="SMP">SMP</option>
                                                                <option value="SD">SD</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group form-group-default">
                                                            <label>Pekerjaan IBU</label>
                                                            <input type="text" class="form-control"
                                                                name="pekerjaan_ibu">
                                                        </div>
                                                        <div class="form-group form-group-default">
                                                            <label>Jabatan IBU</label>
                                                            <input type="text" class="form-control"
                                                                name="jabatan_ibu">
                                                        </div>
                                                        <div class="form-group form-group-default">
                                                            <label>Nama Perusahaan IBU</label>
                                                            <input type="text" class="form-control"
                                                                name="perusahaan_ibu">
                                                        </div>
                                                        <button type="submit" id="alert_demo_3_3"
                                                            class="btn btn-primary w-100">SUBMIT</button>
                                                    </div>
                                                </div>
                                            </form>
                                        @else
                                            @foreach ($keluargas as $data)
                                                <form action="{{ route('user.keluarga.update', $data->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('put')
                                                    <div class="row mt-3">
                                                        <div class="col-md-6">
                                                            <div class="form-group form-group-default">
                                                                <label>Nama Karyawan</label>
                                                                <input type="hidden" class="form-control" name="user_id"
                                                                    value="{{ $data->user_id }}">
                                                                <input type="text" class="form-control"
                                                                    value="{{ $user->name }}">
                                                            </div>
                                                            <div class="form-group form-group-default">
                                                                <label>Nama Lengkap Ayah</label>
                                                                <input type="text" class="form-control"
                                                                    name="nama_ayah" value="{{ $data->nama_ayah }}">
                                                            </div>
                                                            <div class="form-group form-group-default">
                                                                <label>Tanggal Lahir Ayah</label>
                                                                <input type="date" class="form-control" name="tl_ayah"
                                                                    value="{{ $data->tl_ayah }}">
                                                            </div>
                                                            <div class="form-group form-group-default">
                                                                <label>Pendidikan Terakhir Ayah</label>
                                                                <select name="pendidikan_ayah" class="form-control">
                                                                    <option value="{{ $data->pendidikan_ayah }}" selected>
                                                                        {{ $data->pendidikan_ayah }}</option>
                                                                    <option value="DOCTOR">DOCTOR</option>
                                                                    <option value="MASTER">MASTER</option>
                                                                    <option value="SARJANA">SARJANA</option>
                                                                    <option value="SMA">SMA</option>
                                                                    <option value="SMP">SMP</option>
                                                                    <option value="SD">SD</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group form-group-default">
                                                                <label>Pekerjaan Ayah</label>
                                                                <input type="text" class="form-control"
                                                                    name="pekerjaan_ayah"
                                                                    value="{{ $data->pekerjaan_ayah }}">
                                                            </div>
                                                            <div class="form-group form-group-default">
                                                                <label>Jabatan Ayah</label>
                                                                <input type="text" class="form-control"
                                                                    name="jabatan_ayah"
                                                                    value="{{ $data->jabatan_ayah }}">
                                                            </div>
                                                            <div class="form-group form-group-default">
                                                                <label>Nama Perusahaan Ayah</label>
                                                                <input type="text" class="form-control"
                                                                    name="perusahaan_ayah"
                                                                    value="{{ $data->perusahaan_ayah }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group form-group-default">
                                                                <label>Nama Lengkap IBU</label>
                                                                <input type="text" class="form-control"
                                                                    name="nama_ibu" value="{{ $data->nama_ibu }}">
                                                            </div>
                                                            <div class="form-group form-group-default">
                                                                <label>Tanggal Lahir IBU</label>
                                                                <input type="date" class="form-control" name="tl_ibu"
                                                                    value="{{ $data->tl_ibu }}">
                                                            </div>
                                                            <div class="form-group form-group-default">
                                                                <label>Pendidikan Terakhir IBU</label>
                                                                <select name="pendidikan_ibu" class="form-control">
                                                                    <option value="{{ $data->pendidikan_ibu }}" selected>
                                                                        {{ $data->pendidikan_ibu }}</option>
                                                                    <option value="DOCTOR">DOCTOR</option>
                                                                    <option value="MASTER">MASTER</option>
                                                                    <option value="SARJANA">SARJANA</option>
                                                                    <option value="SMA">SMA</option>
                                                                    <option value="SMP">SMP</option>
                                                                    <option value="SD">SD</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group form-group-default">
                                                                <label>Pekerjaan IBU</label>
                                                                <input type="text" class="form-control"
                                                                    name="pekerjaan_ibu"
                                                                    value="{{ $data->pekerjaan_ibu }}">
                                                            </div>
                                                            <div class="form-group form-group-default">
                                                                <label>Jabatan IBU</label>
                                                                <input type="text" class="form-control"
                                                                    name="jabatan_ibu" value="{{ $data->jabatan_ibu }}">
                                                            </div>
                                                            <div class="form-group form-group-default">
                                                                <label>Nama Perusahaan IBU</label>
                                                                <input type="text" class="form-control"
                                                                    name="perusahaan_ibu"
                                                                    value="{{ $data->perusahaan_ibu }}">
                                                            </div>
                                                            <button type="submit" id="alert_demo_3_3"
                                                                class="btn btn-success w-100">UPDATE</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-profile card-secondary">
                            <div class="card-header" style="background-image: url('../assets/img/blogpost.jpg')">
                                <div class="profile-picture">
                                    <div class="avatar avatar-xl">
                                        <img src="{{ asset('foto_karyawan/' . $user->foto_karyawan) }}" alt="..."
                                            class="avatar-img rounded-circle">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="user-profile text-center">
                                    <div class="name">{{ $user->name }}</div>
                                    <div class="job">{{ optional($user->divisi)->nama_divisi }}</div>
                                    <div class="desc">MY TAX INDONESIA</div>
                                    <div class="social-media">
                                        <a class="btn btn-info btn-twitter btn-sm btn-link" href="#">
                                            <span class="btn-label just-icon"><i class="flaticon-twitter"></i> </span>
                                        </a>
                                        <a class="btn btn-danger btn-sm btn-link" rel="publisher" href="#">
                                            <span class="btn-label just-icon"><i class="flaticon-google-plus"></i> </span>
                                        </a>
                                        <a class="btn btn-primary btn-sm btn-link" rel="publisher" href="#">
                                            <span class="btn-label just-icon"><i class="flaticon-facebook"></i> </span>
                                        </a>
                                        <a class="btn btn-danger btn-sm btn-link" rel="publisher" href="#">
                                            <span class="btn-label just-icon"><i class="flaticon-dribbble"></i> </span>
                                        </a>
                                    </div>
                                    <div class="view-profile">
                                        <a href="#" class="btn btn-secondary btn-block">View Full Profile</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row user-stats text-center">
                                    <div class="col">
                                        <div class="number">45</div>
                                        <div class="title">Post</div>
                                    </div>
                                    <div class="col">
                                        <div class="number">25K</div>
                                        <div class="title">Followers</div>
                                    </div>
                                    <div class="col">
                                        <div class="number">134</div>
                                        <div class="title">Following</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    <script>
        function closeAlert() {
            var alert = document.getElementById('success-alert');
            alert.style.display = 'none';
        }
    </script>
@endsection
