@extends('layouts.hero')
@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="row">
                    @if (session('success'))
                        <div class="col-md-12">
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i
                                        class="fas fa-window-close"></i></button>
                            </div>
                        </div>
                    @endif

                    @if (session('update'))
                        <div class="col-md-12">
                            <div class="alert alert-primary alert-dismissible fade show d-flex align-items-center justify-content-between"
                                role="alert">
                                <div>{{ session('update') }}</div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                    @endif

                    @if (session('delete'))
                        <div class="col-md-12">
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                {{ session('delete') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i
                                        class="fas fa-window-close"></i></button>
                            </div>
                        </div>
                    @endif
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-8 col-sm-8">
                                        <form action="{{ route('admin.import') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="file" name="file" required>
                                            <button type="submit" class="btn btn-outline-primary btn-sm">
                                                <img src="{{ asset('bg_excel.png') }}" class="img-fluid"
                                                    style="width:20px;">
                                                Import
                                            </button>
                                        </form>
                                    </div>
                                    <div class="col-4 col-sm-4 d-flex justify-content-end">
                                        <a href="{{ asset('Template_Import_Karyawan.xlsx') }}"
                                            class="btn btn-sm btn-info mr-3">
                                            <img src="{{ asset('bg_excel.png') }}" class="img-fluid" style="width:20px;">
                                            Template Import</a>
                                        <a href="{{ route('admin.karyawan.create') }}" class="btn btn-sm btn-primary">Tambah
                                            Karyawan</a>
                                    </div>
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
                                                {{-- <th>Shiff</th> --}}
                                                <th>Divisi</th>
                                                <th class="text-center" style="width: 20%;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($user as $user)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->type }}</td>
                                                    {{-- <td>
                                                        @php
                                                            $userShiff = $shiffs->where('user_id', $user->id)->first();
                                                        @endphp

                                                        @if ($userShiff)
                                                            @if ($userShiff->shiff == 0)
                                                                <i class="fas fa-check-circle text-success"> SHIFF PAGI</i>
                                                            @elseif ($userShiff->shiff == 1)
                                                                <i class="fas fa-check-circle text-info"> SHIFF SORE</i>
                                                            @endif
                                                        @else
                                                            <a href="{{ route('shiff.index') }}"
                                                                class="btn btn-sm btn-info">Tambahkan Shiff</a>
                                                        @endif
                                                    </td> --}}

                                                    <td>
                                                        @if ($user->divisi)
                                                            {{ $user->divisi->nama_divisi }}
                                                        @endif
                                                    </td>
                                                    <td class="text-center text-nowrap">
                                                        <form action="{{ route('admin.karyawan.delete', $user->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('post')
                                                            <a class="btn btn-sm btn-success"
                                                                href="{{ route('pendidikan.detail', $user->id) }}">
                                                                <i class="fas fa-user"></i>
                                                            </a>
                                                            <a class="btn btn-sm btn-warning"
                                                                href="{{ route('admin.karyawan.edit', $user->id) }}">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <button type="submit" id="alert_demo_3_4"
                                                                class="btn btn-sm btn-danger">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
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
