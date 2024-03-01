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
                                        {{ __('Data Perjalanan Dinas Karyawan') }}
                                    </div>
                                    <!--<div class="col-4 col-sm-4 d-flex justify-content-end">-->
                                    <!--    <a href="{{ route('admin.karyawan.create') }}" class="btn btn-sm btn-primary">Tambah-->
                                    <!--        Karyawan</a>-->
                                    <!--</div>-->
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="basic-datatables" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Divisi</th>
                                                <th>Project Dilakukan</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center" style="width: 20%;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pd as $user)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $user->user->name }}</td>
                                                    <td>{{ $user->divisi->nama_divisi }}</td>
                                                    <td>{{ $user->project }}</td>
                                                    <td class="text-center">
                                                        @if ($user->status == 'diproses')
                                                            <i class="fas fa-check-circle text-warning">
                                                                {{ $user->status }}</i>
                                                        @elseif ($user->status == 'diterima')
                                                            <i class="fas fa-check-circle text-success">
                                                                {{ $user->status }}</i>
                                                        @elseif ($user->status == 'ditolak')
                                                            <i class="fas fa-check-circle text-danger">
                                                                {{ $user->status }}</i>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <form action="{{ route('admin.karyawan.delete', $user->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('post')
                                                            <a class="btn btn-sm btn-warning"
                                                                href="{{ route('admin.dinas.edit', $user->id) }}">Edit</a>
                                                            <button type="submit"
                                                                class="btn btn-sm btn-danger">Hapus</button>
                                                        </form>
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
