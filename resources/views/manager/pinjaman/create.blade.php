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
                                        {{ __('Pengajuan Pinjaman') }}
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('manager.pinjam.store') }}" method="post">
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
                                                    <input type="hidden" name="" value="{{ $users->divisi->id }}">
                                                    <input type="text" name="" class="form-control "
                                                        value="{{ $users->divisi->nama_divisi }}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="largeInput">Mulai Kerja</label>
                                                    <input type="text" name="mulai_kerja" class="form-control "
                                                        value="{{ $users->mulai_kerja }}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="largeInput">Jumlah Pinjaman</label>
                                                    <input type="text" id="jumlah_pinjam" name="jumlah_pinjam"
                                                        class="form-control" placeholder="Contoh : 1000000">
                                                </div>
                                                <div class="form-group">
                                                    <label for="largeInput">Jangka Pelunasan (Berapa bulan)</label>
                                                    <input type="text" id="jangka_pelunasan" name="jangka_pelunasan"
                                                        class="form-control"
                                                        placeholder="Tuliskan angka saja ( Contoh: 2 )">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="largeInput">Jumlah Cicilan</label>
                                                    <input type="text" id="jumlah_cicilan" name="jumlah_cicilan"
                                                        class="form-control" placeholder="Contoh : 500000">
                                                </div>
                                                <div class="form-group">
                                                    <label for="largeInput">Tanggal Pinjam</label>
                                                    <input type="date" name="tanggal_pinjam" class="form-control ">
                                                </div>
                                                <!--<div class="form-group">-->
                                                <!--    <label for="largeInput">Tanggal Pelunasan Terakhir</label>-->
                                                <!--    <input type="date" name="pelunasan_terakhir" class="form-control ">-->
                                                <!--</div>-->
                                                {{-- <div class="form-group"> --}}
                                                {{-- <label for="largeInput">Gaji Pokok</label> --}}
                                                <input type="hidden" name="gaji" value="{{ $users->gaji }}"
                                                    class="form-control " readonly>
                                                {{-- </div> --}}
                                                <div class="form-group">
                                                    <label for="largeInput">Keperluan</label>
                                                    <input type="text" name="keperluan" class="form-control "
                                                        placeholder="Akan dipakai untuk apa">
                                                    {{-- <input type="text" name="disetujui" value="-"
                                                        class="form-control "> --}}
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
        // Get references to the input fields
        const jumlahPinjamInput = document.getElementById('jumlah_pinjam');
        const jangkaPelunasanInput = document.getElementById('jangka_pelunasan');
        const jumlahCicilanInput = document.getElementById('jumlah_cicilan');

        // Add an input event listener to both jumlahPinjamInput and jangkaPelunasanInput
        jumlahPinjamInput.addEventListener('input', calculateCicilan);
        jangkaPelunasanInput.addEventListener('input', calculateCicilan);

        // Function to calculate Jumlah Cicilan
        function calculateCicilan() {
            // Get the values entered by the user
            const jumlahPinjam = parseFloat(jumlahPinjamInput.value) || 0;
            const jangkaPelunasan = parseFloat(jangkaPelunasanInput.value) || 0;

            // Calculate the Jumlah Cicilan
            const jumlahCicilan = (jumlahPinjam / jangkaPelunasan).toFixed();

            // Update the Jumlah Cicilan input field
            jumlahCicilanInput.value = jumlahCicilan;
        }
    </script>
@endsection
