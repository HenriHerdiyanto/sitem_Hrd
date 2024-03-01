@extends('layouts.user')
@php
    $activePage = 'budget';
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
                                    <div class="col-4 col-sm-4 d-flex justify-content-end">
                                        <a href="{{ route('user.budget.create') }}"
                                            class="btn btn-sm btn-primary">Request</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="basic-datatables" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Nama Karyawan</th>
                                                <th>Nama Divisi</th>
                                                <th>Jenis Item</th>
                                                <th>Total Harga</th>
                                                <th>Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($budgets)
                                                @foreach ($budgets as $data)
                                                    <tr>
                                                        <td>{{ $data->user->name }}</td>
                                                        <td>
                                                            @if ($data->divisi)
                                                                {{ $data->divisi->nama_divisi }}
                                                            @else
                                                                Divisi Belum Dipilih
                                                            @endif
                                                        </td>
                                                        <td>{{ $data->jenis_item }}</td>
                                                        <td>{{ $data->total_harga }}</td>
                                                        <td>
                                                            @if ($data->status == 'diproses')
                                                                <i class="fas fa-check-circle text-warning"></i> Diproses
                                                            @elseif ($data->status == 'diterima')
                                                                <i class="fas fa-check-circle text-success"></i> Diterima
                                                            @elseif ($data->status == 'ditolak')
                                                                <i class="fas fa-check-circle text-danger"></i> Ditolak
                                                            @endif
                                                        </td>
                                                        <td class="text-center text-nowrap">
                                                            <form action="{{ route('user.budget.destroy', $data->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('post')
                                                                <a class="btn btn-sm btn-warning"
                                                                    href="{{ route('user.budget.edit', $data->id) }}">Edit</a>
                                                                <button type="submit" id="alert_demo_3_4"
                                                                    class="btn btn-sm btn-danger">Hapus</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="6" class="text-center">Data Kosong</td>
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
