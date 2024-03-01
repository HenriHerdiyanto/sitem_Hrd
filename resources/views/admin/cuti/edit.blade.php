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
                                        {{ __('Tambah Perjalanan Dinas') }}
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('admin.cuti.update', $cuti->id) }}" method="post">
                                @csrf
                                @method('put')
                                <div class="card-body">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="largeInput">Nama Karyawan</label>
                                                    <input type="hidden" name="user_id" value="{{ $cuti->user_id }}">
                                                    <input type="text" name="" class="form-control form-control"
                                                        value="{{ $cuti->user->name }}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="largeInput">Divisi</label>
                                                    <input type="hidden" name="divisi_id" value="{{ $cuti->divisi->id }}">
                                                    <input type="text" name="" class="form-control "
                                                        value="{{ $cuti->divisi->nama_divisi }}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="largeInput">Jabatan</label>
                                                    <input type="text" name="jabatan" class="form-control"
                                                        value="{{ $cuti->user->type }}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="largeInput">Hak Cuti</label>
                                                    <input type="text" id="hak_cuti" name="hak_cuti"
                                                        class="form-control" value="20" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="largeInput">Ambil Cuti</label>
                                                    <input type="text" id="ambil_cuti" name="ambil_cuti"
                                                        class="form-control" value="{{ $cuti->ambil_cuti }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="largeInput">Sisa Cuti</label>
                                                    <input type="text" id="sisa_cuti" name="sisa_cuti"
                                                        class="form-control" value="{{ $cuti->sisa_cuti }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="largeInput">Tanggal Mulai</label>
                                                    <input type="date" name="tanggal_mulai" class="form-control"
                                                        value="{{ $cuti->tanggal_mulai }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="largeInput">Tanggal Selesai</label>
                                                    <input type="date" name="tanggal_selesai" class="form-control"
                                                        value="{{ $cuti->tanggal_selesai }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="largeInput">Alasan Cuti</label>
                                                    <input type="text" name="alasan_cuti" class="form-control"
                                                        value="{{ $cuti->alasan_cuti }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="largeInput">Status</label>
                                                    <select name="status" class="form-control" required>
                                                        <option selected value="{{ $cuti->status }} "> {{ $cuti->status }}
                                                        </option>
                                                        <option value="diterima">Diterima</option>
                                                        <option value="ditolak">Ditolak</option>
                                                    </select>
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
    <script>
        // Ambil elemen input
        var hakCutiInput = document.getElementById("hak_cuti");
        var ambilCutiInput = document.getElementById("ambil_cuti");
        var sisaCutiInput = document.getElementById("sisa_cuti");

        // Tambahkan event listener untuk menghitung sisa cuti
        hakCutiInput.addEventListener("input", hitungSisaCuti);
        ambilCutiInput.addEventListener("input", hitungSisaCuti);

        // Fungsi untuk menghitung sisa cuti
        function hitungSisaCuti() {
            var hakCuti = parseInt(hakCutiInput.value) || 0;
            var ambilCuti = parseInt(ambilCutiInput.value) || 0;
            var sisaCuti = hakCuti - ambilCuti;

            // Pastikan sisa cuti tidak negatif
            sisaCuti = Math.max(0, sisaCuti);

            // Update nilai input sisa cuti
            sisaCutiInput.value = sisaCuti;
        }
    </script>
@endsection
