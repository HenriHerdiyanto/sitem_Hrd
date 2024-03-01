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
                                        {{ __('Data Cuti Karyawan') }}
                                    </div>
                                    <div class="col-4 col-sm-4 d-flex justify-content-end">
                                        <a href="{{ route('user.cuti.create') }}" class="btn btn-sm btn-primary">Tambah</a>
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
                                                <th>Nama Divisi</th>
                                                {{-- <th>Jabatan</th> --}}
                                                <th>HAK CUTI</th>
                                                <th>SISA CUTI</th>
                                                <th>Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cuti as $data)
                                                @if ($data->user_id == $user->id)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $data->user->name }}</td>
                                                        <td>
                                                            @if ($data->divisi)
                                                                {{ $data->divisi->nama_divisi }}
                                                            @else
                                                                Divisi Belum Dipilih
                                                            @endif
                                                        </td>
                                                        {{-- <td>{{ $data->$user->type }}</td> --}}
                                                        <td>{{ $data->hak_cuti }}</td>
                                                        <td>{{ $data->sisa_cuti }}</td>
                                                        <td>
                                                            @if ($data->status == 'diproses')
                                                                <i class="fas fa-check-circle text-warning"> diproses</i>
                                                            @elseif ($data->status == 'diterima')
                                                                <i class="fas fa-check-circle text-success"> diterima</i>
                                                            @endif

                                                        </td>
                                                        <td class="text-center text-nowrap">
                                                            <form action="{{ route('user.cuti.destroy', $data->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('post')
                                                                @if ($data->status == 'diterima')
                                                                @else
                                                                    <a class="btn btn-sm btn-warning"
                                                                        href="{{ route('user.cuti.edit', $data->id) }}">View</a>
                                                                @endif
                                                                <button type="submit" id="alert_demo_3_4"
                                                                    class="btn btn-sm btn-danger">Hapus</button>
                                                            </form>
                                                        </td>
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
@endsection
