@extends('layouts.user')
@php
    $activePage = 'cuti';
@endphp
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
                            <form action="{{ route('user.cuti.store') }}" method="post">
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
                                                        value="{{ $users->name }}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="largeInput">Divisi</label>
                                                    <input type="hidden" name="divisi_id" value="{{ $users->divisi ? $users->divisi->id : '' }}">
                                                    <input type="text" name="" class="form-control" value="{{ $users->divisi ? $users->divisi->nama_divisi : 'TIDAK BOLEH INPUT, DIVISI ANDA TELAH DIHAPUS. SEGERA HUBUNGI ADMIN' }}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="largeInput">Jabatan</label>
                                                    <input type="text" name="" class="form-control "
                                                        value="{{ $users->type }}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="largeInput">Hak Cuti</label>
                                                    @if ($cuti !== null && $cuti->sisa_cuti !== null)
                                                        <input type="text" id="hak_cuti" name="hak_cuti"
                                                            class="form-control" value="{{ $cuti->sisa_cuti }}" readonly>
                                                    @else
                                                        <input type="text" id="hak_cuti" name="hak_cuti"
                                                            class="form-control" value="12" readonly>
                                                    @endif

                                                </div>
                                                <div class="form-group">
                                                    <label for="largeInput">Ambil Cuti</label>
                                                    <input type="text" id="ambil_cuti" name="ambil_cuti"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="largeInput">Sisa Cuti</label>
                                                    <input type="text" id="sisa_cuti" name="sisa_cuti"
                                                        class="form-control" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="largeInput">Tanggal Mulai</label>
                                                    <input type="date" name="tanggal_mulai" class="form-control ">
                                                </div>
                                                <div class="form-group">
                                                    <label for="largeInput">Tanggal Selesai</label>
                                                    <input type="date" name="tanggal_selesai" class="form-control ">
                                                </div>
                                                <div class="form-group">
                                                    <label for="largeInput">Alasan Cuti</label>
                                                    <input type="text" name="alasan_cuti" class="form-control ">
                                                </div>
                                                <div class="form-group">
                                                    {{-- <label for="largeInput">Status</label> --}}
                                                    <input type="hidden" name="status" value="diproses"
                                                        class="form-control ">
                                                </div>
                                                <div class="card-action">
                                                    <button id="alert_demo_3_3"
                                                        class="btn btn-success w-100">Submit</button>
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
