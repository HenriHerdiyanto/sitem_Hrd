@extends('layouts.manager')
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
                                        {{ __('Detail Karyawan') }}
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.karyawan.update', $user->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="divisi" class="form-label">Divisi</label>
                                                <select name="divisi_id" id="divisi_id" class="form-control" required @if ($divisis->isEmpty()) disabled @endif>
                                                    @if ($divisis->isEmpty())
                                                        <option value="">DIVISI ANDA TELAH DIHAPUS</option>
                                                    @else
                                                        @foreach ($divisis as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ $user->divisi_id == $item->id ? 'selected' : '' }}>
                                                                {{ $item->nama_divisi }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="nomor_induk" class="form-label">Nomor Induk</label>
                                                <input type="text" class="form-control" id="nomor_induk"
                                                    value="{{ $user->nomor_induk }}" name="nomor_induk" @readonly(true)>
                                            </div>
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Nama Karyawan</label>
                                                <input type="text" class="form-control" id="name"
                                                    value="{{ $user->name }}" name="name" @readonly(true)>
                                            </div>
                                            <div class="mb-3">
                                                <label for="jenis_kelamin" class="form-label">Gender</label>
                                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin"
                                                    @readonly(true)>
                                                    <option value="laki-laki"
                                                        {{ $user->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>
                                                        Laki-laki</option>
                                                    <option value="perempuan"
                                                        {{ $user->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>
                                                        Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                                <input type="text" class="form-control" id="tempat_lahir"
                                                    value="{{ $user->tempat_lahir }}" name="tempat_lahir" @readonly(true)>
                                            </div>
                                            <div class="mb-3">
                                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                                <input type="date" class="form-control" id="tanggal_lahir"
                                                    value="{{ $user->tanggal_lahir }}" name="tanggal_lahir"
                                                    @readonly(true)>
                                            </div>
                                            <div class="mb-3">
                                                <label for="alamat_ktp" class="form-label">Alamat KTP</label>
                                                <input type="text" class="form-control" id="alamat_ktp"
                                                    value="{{ $user->alamat_ktp }}" name="alamat_ktp" @readonly(true)>
                                            </div>
                                            <div class="mb-3">
                                                <label for="alamat_domisili" class="form-label">Alamat Domisili</label>
                                                <input type="text" class="form-control" id="alamat_domisili"
                                                    value="{{ $user->alamat_domisili }}" name="alamat_domisili"
                                                    @readonly(true)>
                                            </div>
                                            <div class="mb-3">
                                                <label for="no_hp" class="form-label">Nomor HP</label>
                                                <input type="text" class="form-control" id="no_hp"
                                                    value="{{ $user->no_hp }}" name="no_hp" @readonly(true)>
                                            </div>
                                            <div class="mb-3">
                                                <label for="no_ktp" class="form-label">Nomor KTP</label>
                                                <input type="text" class="form-control" id="no_ktp"
                                                    value="{{ $user->no_ktp }}" name="no_ktp" @readonly(true)>
                                            </div>
                                            <div class="mb-3">
                                                <label for="agama" class="form-label">Agama</label>
                                                <select class="form-control" id="agama" name="agama"
                                                    @readonly(true)>
                                                    <option value="islam"
                                                        {{ $user->agama == 'islam' ? 'selected' : '' }}>
                                                        islam</option>
                                                    <option value="kristen"
                                                        {{ $user->agama == 'kristen' ? 'selected' : '' }}>
                                                        kristen</option>
                                                    <option value="hindu"
                                                        {{ $user->agama == 'hindu' ? 'selected' : '' }}>
                                                        hindu</option>
                                                    <option value="budha"
                                                        {{ $user->agama == 'budha' ? 'selected' : '' }}>
                                                        budha</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="gol_darah" class="form-label">Gol Darah</label>
                                                <select class="form-control" id="gol_darah" name="gol_darah"
                                                    @readonly(true)>
                                                    <option value="o"
                                                        {{ $user->gol_darah == 'o' ? 'selected' : '' }}>
                                                        o</option>
                                                    <option value="a"
                                                        {{ $user->gol_darah == 'a' ? 'selected' : '' }}>
                                                        a</option>
                                                    <option value="b"
                                                        {{ $user->gol_darah == 'b' ? 'selected' : '' }}>
                                                        b</option>
                                                    <option value="ab"
                                                        {{ $user->gol_darah == 'ab' ? 'selected' : '' }}>
                                                        ab</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="status_pernikahan" class="form-label">Status
                                                    Pernikahan</label>
                                                <select class="form-control" id="status_pernikahan"
                                                    name="status_pernikahan" @readonly(true)>
                                                    <option value="Menikah"
                                                        {{ $user->status_pernikahan == 'Menikah' ? 'selected' : '' }}>
                                                        Menikah</option>
                                                    <option value="Belum Menikah"
                                                        {{ $user->status_pernikahan == 'Belum Menikah' ? 'selected' : '' }}>
                                                        Belum Menikah</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="status_karyawan" class="form-label">Status
                                                    karyawan</label>
                                                <select class="form-control" id="status_karyawan" name="status_karyawan"
                                                    @readonly(true)>
                                                    <option value="aktif"
                                                        {{ $user->status_karyawan == 'aktif' ? 'selected' : '' }}>
                                                        aktif</option>
                                                    <option value="nonaktif"
                                                        {{ $user->status_karyawan == 'nonaktif' ? 'selected' : '' }}>
                                                        nonaktif</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email"
                                                    value="{{ $user->email }}" name="email" readonly
                                                    @readonly(true)>
                                            </div>
                                            {{-- <div class="mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="text" class="form-control" id="password"
                                                    value="{{ $user->password }}" name="password">
                                            </div> --}}
                                            {{-- <div class="mb-3">
                                                <label for="type" class="form-label">Jabatan Karyawan</label>
                                                <select class="form-control" id="type" name="type">
                                                    <option value="{{ $user->type }}" selected>{{ $user->type }}
                                                    </option>
                                                    <option value="0" {{ $user->type == 0 ? 'selected' : '' }}>User
                                                    </option>
                                                    <option value="1" {{ $user->type == 1 ? 'selected' : '' }}>Admin
                                                    </option>
                                                    <option value="2" {{ $user->type == 2 ? 'selected' : '' }}>
                                                        Manager</option>
                                                </select>
                                            </div> --}}

                                            <div class="mb-3">
                                                <label for="foto_karyawan" class="form-label">Foto karyawan</label><br>
                                                @if ($user->foto_karyawan == null)
                                                    <input type="file" class="form-control" id="foto_karyawan"
                                                        value="{{ $user->foto_karyawan }}" name="foto_karyawan"
                                                        @readonly(true)>
                                                @else
                                                    <img class="img-fluid" style="width: 100px;"
                                                        src="{{ asset('foto_karyawan/' . $user->foto_karyawan) }}"
                                                        alt="">
                                                    <input type="file" class="form-control" id="foto_karyawan"
                                                        value="{{ $user->foto_karyawan }}" name="foto_karyawan"
                                                        @readonly(true)>
                                                @endif
                                            </div>
                                            <div class="mb-3">
                                                <label for="gaji" class="form-label">Gaji Karyawan</label>
                                                <input type="text" class="form-control" id="gaji"
                                                    value="{{ $user->gaji }}" name="gaji" @readonly(true)>
                                            </div>
                                            <div class="mb-3">
                                                <label for="uang_makan" class="form-label">Uang Makan Karyawan</label>
                                                <input type="text" class="form-control" id="uang_makan"
                                                    value="{{ $user->uang_makan }}" name="uang_makan" @readonly(true)>
                                            </div>
                                            <div class="mb-3">
                                                <label for="uang_transport" class="form-label">Uang Transport
                                                    Karyawan</label>
                                                <input type="text" class="form-control" id="uang_transport"
                                                    value="{{ $user->uang_transport }}" name="uang_transport"
                                                    @readonly(true)>
                                            </div>
                                            <div class="mb-3">
                                                <label for="mulai_kerja" class="form-label">Mulai Kerja</label>
                                                <input type="date" class="form-control" id="mulai_kerja"
                                                    value="{{ $user->mulai_kerja }}" name="mulai_kerja"
                                                    @readonly(true)>
                                            </div>
                                            <div class="mb-3">
                                                <label for="akhir_kerja" class="form-label">Akhir Kerja</label>
                                                <input type="date" class="form-control" id="akhir_kerja"
                                                    value="{{ $user->akhir_kerja }}" name="akhir_kerja"
                                                    @readonly(true)>
                                            </div>
                                            <div class="mb-3">
                                                <label for="kontrak_kerja" class="form-label">Kontrak Kerja</label><br>
                                                <div class="row">
                                                    <div class="col-8">
                                                        <input type="file" class="form-control" id="kontrak_kerja"
                                                            name="kontrak_kerja" @readonly(true)>
                                                    </div>
                                                    <div class="col-4">
                                                        @if ($user->kontrak_kerja)
                                                            <a href="{{ asset('kontrak_kerja/' . $user->kontrak_kerja) }}"
                                                                class="btn btn-primary w-100" target="_blank">Lihat
                                                                File</a>
                                                        @endif
                                                    </div>
                                                </div>

                                            </div>

                                            {{-- <div class="mb-3">
                                                <button type="submit" class="btn btn-success w-100">UPDATE</button>
                                            </div> --}}
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
