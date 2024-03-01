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
                                        {{ __('Data Payroll Karyawan') }}
                                    </div>
                                    {{-- <div class="col-4 col-sm-4 d-flex justify-content-end">
                                    <a href="{{ route('admin.karyawan.create') }}" class="btn btn-sm btn-primary">Tambah
                                        Karyawan</a>
                                </div> --}}
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="basic-datatables" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Jabatan</th>
                                                <th>Total Gaji</th>
                                                <th class="text-center" style="width: 20%;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($payroll as $user)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $user->user->name }}</td>
                                                    <td>{{ $user->user->type }}</td>
                                                    <td>Rp. {{ number_format($user->total_gaji_bersih) }}</td>
                                                    <td class="text-center text-nowrap">
                                                        <a class="btn btn-sm btn-warning"
                                                            href="{{ route('detail.payroll', $user->id) }}">
                                                            <i class="fas fa-download"></i> Download
                                                        </a>
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
