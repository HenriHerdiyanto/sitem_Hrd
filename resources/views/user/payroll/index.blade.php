@extends('layouts.user')
@php
    $activePage = 'payroll';
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
                                        {{ __('Request Budget') }}
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
                                                @if ($payroll)
                                                    @foreach ($payroll as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $item->user->name }}</td>
                                                            <td>
                                                                @if ($item->user->type == 'user')
                                                                    Staff
                                                                @endif
                                                            </td>
                                                            <td>Rp. {{ number_format($item->total_gaji_bersih) }}</td>
                                                            <td class="text-center text-nowrap">
                                                                <a class="btn btn-sm btn-warning"
                                                                    href="{{ route('user.payrol.detail', $item->id) }}">
                                                                    <i class="fas fa-download"></i> Download
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="5" class="text-center">Data payroll tidak tersedia.
                                                        </td>
                                                    </tr>
                                                @endif
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
