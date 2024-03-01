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
                                        {{ __('Tambah Perjalanan Dinas') }}
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('dinas.store') }}" method="post">
                                @csrf
                                @method('post')
                                <div class="card-body">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="largeInput">Nama Karyawan</label>
                                                    <input type="hidden" name="user_id" value="{{ $users->id }}">
                                                    <input type="text" name="user_name" class="form-control form-control"
                                                        id="defaultInput" value="{{ $users->name }}" readonly>

                                                </div>
                                                <div class="form-group">
                                                    <label for="largeInput">Divisi</label>
                                                    <input type="hidden" name="divisi_id" value="{{ $users->divisi->id }}">
                                                    <input type="text" name="" class="form-control form-control"
                                                        id="defaultInput" value="{{ $users->divisi->nama_divisi }}"
                                                        readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="largeInput">Jabatan</label>
                                                    <input type="text" name="type" class="form-control form-control"
                                                        id="defaultInput" value="{{ $users->type }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="largeInput">Project yang dilakukan</label>
                                                    <input type="text" name="project" class="form-control form-control"
                                                        id="defaultInput">
                                                </div>
                                                <div class="form-group">
                                                    <label for="largeInput">Maksud dan tujuan</label>
                                                    <input type="text" name="tujuan" class="form-control form-control"
                                                        id="defaultInput">
                                                </div>
                                                <div class="form-group">
                                                    <label for="largeInput">Jumlah Personel</label>
                                                    <input type="text" name="jumlah_personel"
                                                        class="form-control form-control" id="defaultInput">
                                                </div>
                                                <div class="form-group">
                                                    <label for="largeInput">Nama Personel
                                                        <small style="color:red;">(*Jika lebih dari 1 Orang Masukan nama
                                                            anda
                                                            juga)</small>
                                                    </label>
                                                    <textarea name="nama_personel" class="form-control" cols="30" rows="10"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="defaultSelect">jenis Perjalanan</label>
                                                    <select class="form-control form-control" name="jenis_perjalanan">
                                                        <option selected> -- pilih --</option>
                                                        <option value="perjalanan dalam kota">perjalanan dalam kota
                                                        </option>
                                                        <option value="perjalanan luar kota">perjalanan luar kota
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="largeInput">Kota Tujuan</label>
                                                    <input type="text" name="kota_tujuan"
                                                        class="form-control form-control" id="defaultInput">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="largeInput">Tanggal Berangkat</label>
                                                    <input type="date" name="tanggal_berangkat"
                                                        class="form-control form-control" id="defaultInput">
                                                </div>
                                                <div class="form-group">
                                                    <label for="largeInput">Tanggal pulang</label>
                                                    <input type="date" name="tanggal_pulang"
                                                        class="form-control form-control" id="defaultInput">
                                                </div>
                                                <div class="form-group">
                                                    <label for="largeInput">Kota Pulang</label>
                                                    <input type="text" name="kota_pulang"
                                                        class="form-control form-control" id="defaultInput">
                                                </div>
                                                <div class="form-group">
                                                    <label for="defaultSelect">Transportasi</label>
                                                    <select class="form-control form-control" name="transportasi">
                                                        <option selected> -- pilih --</option>
                                                        <option value="Disiapkan user">Disiapkan user
                                                        </option>
                                                        <option value="Disiapkan Perusahaan">Disiapkan Perusahaan
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="largeInput">Hotel / tempat tinggal</label>
                                                    <select class="form-control form-control" name="hotel">
                                                        <option selected> -- pilih --</option>
                                                        <option value="Disiapkan user">Disiapkan user
                                                        </option>
                                                        <option value="Disiapkan Perusahaan">Disiapkan Perusahaan
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="largeInput">Bagasi</label>
                                                    <input type="text" name="bagasi"
                                                        class="form-control form-control" id="defaultInput">
                                                </div>
                                                <div class="form-group">
                                                    <label for="largeInput">cash advance ( / Hari )</label>
                                                    <input type="text" name="cash_advance"
                                                        class="form-control form-control" id="defaultInput">
                                                </div>
                                                <div class="form-group">
                                                    <label for="largeInput">Keterangan</label>
                                                    <textarea name="keterangan" class="form-control" cols="30" rows="10"></textarea>
                                                    <input type="hidden" name="status"
                                                        class="form-control form-control" value="diproses">
                                                </div>
                                                <div class="card-action">
                                                    <button class="btn btn-success w-100">Submit</button>
                                                </div>
                                            </div>
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
@endsection
