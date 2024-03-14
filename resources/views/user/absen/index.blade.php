@extends('layouts.user')
@php
    $activePage = 'absen'; // Anda bisa mengubah nilai ini sesuai dengan halaman yang aktif
@endphp

@php
    // Alamat IP yang diizinkan (cikarang) 103.152.238.148
    $allowedIP = '202.93.114.18';

    // Mendapatkan alamat IP pengunjung
    $clientIP = $_SERVER['REMOTE_ADDR'];

    if ($clientIP === $allowedIP) {
        $connectionStatus = 'Terhubung';
        $cardColor = 'primary';
        $modalTarget = '#myModal';
    } else {
        $connectionStatus = 'Tidak Terhubung';
        $cardColor = 'warning';
        $modalTarget = '#tidak';
    }

    $cekKoneksiStatus =
        $clientIP === $allowedIP
            ? 'Anda sudah terhubung dengan alamat IP yang diizinkan.'
            : 'Anda belum terhubung dengan alamat IP yang diizinkan.';
@endphp


@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="row">
                    <div class="col-sm-6 col-md-3">

                        <div class="card card-stats card-{{ $cardColor }} card-round" data-toggle="modal"
                            data-target="{{ $modalTarget }}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="icon-big text-center">
                                            <i class="flaticon-users"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats">
                                        <div class="numbers">
                                            <p class="card-category">ABSEN MASUK</p>
                                            <!--<h4 class="card-title">1,294</h4>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- modal tidak boleh absen --}}
                        <div class="modal fade" id="tidak" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel">ABSEN MASUK</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <!-- Modal Body -->
                                    <div class="modal-body">
                                        <h1>tidak boleh absen</h1>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal ABSEN MASUK-->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel">ABSEN MASUK</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <!-- Modal Body -->
                                    <form action="{{ route('UserAbsen.store') }}" method="post">
                                        @csrf
                                        @method('post')
                                        <div class="modal-body bg-secondary">
                                            <div class="mb-3">
                                                <label for="" class="text-white">Nama Karyawan</label>
                                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                <input type="text" name="name" class="form-control"
                                                    value="{{ $user->name }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="text-white">Tanggal Sekarang</label>
                                                <input type="text" name="tanggal" class="form-control"
                                                    value="{{ date('Y-m-d') }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="text-white">Waktu Sekarang</label>
                                                <input type="text" class="form-control" name="waktu_masuk"
                                                    id="waktu_masuk" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <input type="hidden" name="terlambat" class="form-control" id="terlambat">
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="text-white">Barcode</label>
                                                <input type="text" name="barcode" class="form-control" readonly
                                                    id="barcode">
                                            </div>

                                        </div>
                                        <!-- Modal Footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success"
                                                id="alert_demo_3_3">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="card card-stats card-info card-round" data-toggle="modal" data-target="#absenkeluar">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="icon-big text-center">
                                            <i class="flaticon-interface-6"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats">
                                        <div class="numbers">
                                            <p class="card-category">ABSEN KELUAR</p>
                                            <!--<h4 class="card-title">1303</h4>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal ABSEN KELUAR-->
                    <div class="modal fade" id="absenkeluar" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel">ABSEN KELUAR</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <!-- Modal Body -->
                                {{-- <form action="" method="post"> --}}
                                @if ($lastAbsen)
                                    <form action="{{ route('UserAbsen.update', $lastAbsen->id) }}" method="post">
                                        @csrf
                                        @method('put')
                                        <div class="modal-body bg-secondary">
                                            <div class="mb-3">
                                                <label for="" class="text-white">Nama Karyawan</label>
                                                <input type="text" name="name" class="form-control"
                                                    value="{{ $lastAbsen->name ?? '' }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="text-white">Waktu Sekarang</label>
                                                <input type="text" class="form-control" name="waktu_sekarang"
                                                    id="waktu_keluar" readonly
                                                    value="{{ $lastAbsen->waktu_keluar ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success"
                                                id="alert_demo_3_3">Submit</button>
                                        </div>
                                    </form>
                                @else
                                    <p>Data tidak ditemukan.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="card card-stats card-success card-round" data-toggle="modal" data-target="#IZIN">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="icon-big text-center">
                                            <i class="flaticon-analytics"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats">
                                        <div class="numbers">
                                            <p class="card-category">IZIN</p>
                                            <!--<h4 class="card-title">$ 1,345</h4>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal IZIN-->
                    <div class="modal fade" id="IZIN" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel">IZIN KARYAWAN</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <!-- Modal Body -->
                                <form action="{{ route('UserAbsen.izin') }}" method="post">
                                    @csrf
                                    @method('post')
                                    <div class="modal-body bg-secondary">
                                        <div class="mb-3">
                                            <label for="" class="text-white">Nama Karyawan</label>
                                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                                            <input type="text" name="name" class="form-control"
                                                value="{{ $user->name }}" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="text-white">Tanggal Sekarang</label>
                                            <input type="text" name="tanggal" class="form-control"
                                                value="{{ date('Y-m-d') }}" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="text-white">Tanggal izin</label>
                                            <input type="text" name="tanggal_izin" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="text-white">Sampai Tanggal</label>
                                            <input type="text" name="tanggal_akhir" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="text-white">Alasan IZIN</label>
                                            <textarea name="keterangan" class="form-control" cols="30" rows="10"></textarea>
                                            <input type="hidden" class="form-control" name="izin" readonly
                                                value="1">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success"
                                            id="alert_demo_3_3">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="card card-stats card-secondary card-round" data-toggle="modal" data-target="#SAKIT">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="icon-big text-center">
                                            <i class="fas fa-hospital"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats">
                                        <div class="numbers">
                                            <p class="card-category">SAKIT</p>
                                            <!--<h4 class="card-title">576</h4>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal SAKIT-->
                <div class="modal fade" id="SAKIT" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel">IZIN KARYAWAN</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <!-- Modal Body -->
                            <form action="{{ route('UserAbsen.sakit') }}" method="post">
                                @csrf
                                @method('post')
                                <div class="modal-body bg-secondary">
                                    <div class="mb-3">
                                        <label for="" class="text-white">Nama Karyawan</label>
                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                        <input type="text" name="name" class="form-control"
                                            value="{{ $user->name }}" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="text-white">Tanggal Sekarang</label>
                                        <input type="text" name="tanggal" class="form-control"
                                            value="{{ date('Y-m-d') }}" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="text-white">Alasan sakit</label>
                                        <textarea name="keterangan" class="form-control" cols="30" rows="10"></textarea>
                                        <input type="hidden" class="form-control" name="sakit" readonly
                                            value="1">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success" id="alert_demo_3_3">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-8 col-sm-8">
                                        {{ __('Data Absen') }} || <b>IP SEKARANG: {{ $clientIP }}</b>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="basic-datatables" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Karyawan</th>
                                                <th class="text-center">Tanggal</th>
                                                <th class="text-center">Waktu Masuk</th>
                                                <th class="text-center">Waktu Keluar</th>
                                                <!--<th class="text-center">Barcode</th>-->
                                                <th class="text-center">Terlambat</th>
                                                <th class="text-center">Sakit</th>
                                                <th class="text-center">Izin</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($absens as $data)
                                                @if ($data->user_id == $user->id)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $data->name }}</td>
                                                        <td class="text-center">{{ $data->tanggal }}</td>
                                                        <td class="text-center">{{ $data->waktu_masuk }}</td>
                                                        <td class="text-center">{{ $data->waktu_keluar }}</td>
                                                        <!--<td class="text-center">{{ $data->barcode }}</td>-->
                                                        <td class="text-center">
                                                            @if ($data->terlambat == 1)
                                                                <i class="fas fa-check-circle text-success"></i>
                                                            @else
                                                            @endif
                                                        </td>
                                                        <td class="text-center">
                                                            @if ($data->sakit == 1)
                                                                <i class="fas fa-check-circle text-danger"></i>
                                                            @else
                                                            @endif
                                                        </td>
                                                        <td class="text-center">
                                                            @if ($data->izin == 1)
                                                                <i class="fas fa-check-circle text-info"></i>
                                                            @else
                                                            @endif
                                                        </td>
                                                        <td>{{ $data->keterangan }}</td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function updateTerlambatStatus() {
            const currentTime = new Date();
            const hours = currentTime.getHours();
            const minutes = currentTime.getMinutes();
            const thresholdHour = 8; // Jam 08:00
            const thresholdMinute = 36; // Menit 36

            if (hours > thresholdHour || (hours === thresholdHour && minutes >= thresholdMinute)) {
                document.getElementById('terlambat').value = 1;
            } else {
                document.getElementById('terlambat').value = 0;
            }
        }

        // Panggil fungsi updateTerlambatStatus saat halaman dimuat dan secara teratur untuk memperbarui status terlambat
        updateTerlambatStatus();
        setInterval(updateTerlambatStatus, 1000); // Jika ingin memperbarui setiap detik
    </script>
    <script>
        function updateRealTimeClock() {
            const currentTime = new Date();
            const hours = currentTime.getHours().toString().padStart(2, '0');
            const minutes = currentTime.getMinutes().toString().padStart(2, '0');
            const seconds = currentTime.getSeconds().toString().padStart(2, '0');
            const formattedTime = hours + ':' + minutes + ':' + seconds;

            document.getElementById('waktu_masuk').value = formattedTime;
        }

        // Panggil fungsi updateRealTimeClock setiap detik untuk mengupdate waktu
        setInterval(updateRealTimeClock, 1000);

        // Pertama kali, panggil fungsi untuk menginisialisasi waktu awal
        updateRealTimeClock();
    </script>
    <script>
        function updateRealTimeClock() {
            const currentTime = new Date();
            const hours = currentTime.getHours().toString().padStart(2, '0');
            const minutes = currentTime.getMinutes().toString().padStart(2, '0');
            const seconds = currentTime.getSeconds().toString().padStart(2, '0');
            const formattedTime = hours + ':' + minutes + ':' + seconds;

            document.getElementById('waktu_keluar').value = formattedTime;
        }

        // Panggil fungsi updateRealTimeClock setiap detik untuk mengupdate waktu
        setInterval(updateRealTimeClock, 1000);

        // Pertama kali, panggil fungsi untuk menginisialisasi waktu awal
        updateRealTimeClock();
    </script>
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            generateRandomBarcode();
        });

        function generateRandomBarcode() {
            // Fungsi ini akan menghasilkan kode acak, misalnya 10 karakter
            const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            let barcode = '';
            const length = 10; // Anda dapat mengganti panjang kode sesuai kebutuhan

            for (let i = 0; i < length; i++) {
                const randomIndex = Math.floor(Math.random() * characters.length);
                barcode += characters.charAt(randomIndex);
            }

            // Setel nilai input dengan kode acak yang telah dibuat
            document.getElementById('barcode').value = barcode;
        }
    </script>
@endsection
