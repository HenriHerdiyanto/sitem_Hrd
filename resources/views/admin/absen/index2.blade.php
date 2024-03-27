@extends('layouts.hero')
@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                {{ __('Data Absen Karyawan') }}
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="basic-datatables" class="display table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Karyawan</th>
                                                        <th>Tanggal</th>
                                                        <th class="text-center" style="width: 20%;">Payroll</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($absen as $user)
                                                        @php
                                                            // Pecah tanggal menjadi array dengan format ['tahun', 'bulan', 'tanggal']
                                                            $tanggal_parts = explode('-', $user->tanggal);

                                                            // Ambil bulan dan tahun dari array
                                                            $bulan = $tanggal_parts[1];
                                                            $tahun = $tanggal_parts[0];
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $user->name }}</td>
                                                            <td>{{ $user->tanggal }}</td>
                                                            <td class="text-center">
                                                                <a class="btn btn-sm btn-warning"
                                                                    href="{{ route('payroll.show', ['id' => $user->user_id, 'bulan' => $bulan, 'tahun' => $tahun]) }}">PAYROLL</a>
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
        </div>
    </div>
@endsection
