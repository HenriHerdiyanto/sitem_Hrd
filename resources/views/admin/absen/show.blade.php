@extends('layouts.hero')
@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    {{ __('CARI DATA') }}
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('AdminAbsen.show') }}" method="post" class="row">
                                        @csrf
                                        @method('post')

                                        <div class="col-8 col-sm-8">
                                            <label for="bulan">{{ __('Pilih Bulan') }}</label>
                                            <select name="bulan" id="bulan" class="form-control">
                                                <option selected>-- PILIH --</option>
                                                <option value="01">Januari</option>
                                                <option value="02">Februari</option>
                                                <option value="03">Maret</option>
                                                <option value="04">April</option>
                                                <option value="05">Mei</option>
                                                <option value="06">Juni</option>
                                                <option value="07">Juli</option>
                                                <option value="08">Agustus</option>
                                                <option value="09">September</option>
                                                <option value="10">Oktober</option>
                                                <option value="11">November</option>
                                                <option value="12">Desember</option>
                                            </select>
                                        </div>

                                        <div class="col-4 col-sm-4 d-flex justify-content-end">
                                            <label for="tahun">{{ __('Pilih Tahun') }}</label>
                                            <input type="text" name="tahun" class="form-control">
                                        </div>

                                        <div class="col-12 col-sm-12">
                                            <button type="submit"
                                                class="btn btn-info btn-sm w-100">{{ __('CARI') }}</button>
                                        </div>
                                    </form>
                                    <!-- Isi dari card body dapat ditambahkan di sini -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-8 col-sm-8">
                                        {{ __('Data Absen') }}
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
                                                <th>Tanggal</th>
                                                <th>waktu masuk</th>
                                                <th>waktu keluar</th>
                                                <th>barcode</th>
                                                <th>terlambat</th>
                                                <th>sakit</th>
                                                <th>izin</th>
                                                <th>keterangan</th>
                                                <th class="text-center" style="width: 20%;">Payroll</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($absenData as $absen)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $absen->name }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($absen->tanggal)->format('d-m-Y') }}</td>
                                                    <td>{{ $absen->waktu_masuk }}</td>
                                                    <td>{{ $absen->waktu_keluar }}</td>
                                                    <td>{{ $absen->barcode }}</td>
                                                    <td class="text-center">
                                                        @if ($absen->terlambat == 1)
                                                            <i class="fas fa-check-circle text-warning"></i>
                                                        @else
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        @if ($absen->sakit == 1)
                                                            <i class="fas fa-check-circle text-danger"></i>
                                                        @else
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        @if ($absen->izin == 1)
                                                            <i class="fas fa-check-circle text-info"></i>
                                                        @else
                                                        @endif
                                                    </td>
                                                    <td>{{ $absen->keterangan }}</td>
                                                    <td class="text-center">
                                                        <a class="btn btn-sm btn-warning"
                                                            href="{{ route('payroll.show', ['id' => $absen->user_id, 'bulan' => $bulan, 'tahun' => $tahun]) }}">PAYROLL</a>

                                                    </td>
                                                </tr>
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
@endsection
