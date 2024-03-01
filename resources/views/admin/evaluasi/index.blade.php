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
                                        {{ __('Data Evaluasi') }}
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
                                                <th>DIVISI</th>
                                                <th>Lama Percobaan</th>
                                                <th>Jabatan</th>
                                                <th>Mulai Kerja</th>
                                                <th>Faktor Penilaian</th>
                                                <th>Status Evaluasi</th>
                                                <th class="text-center" style="width: 20%;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($evaluasi as $user)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $user->nama_lengkap }}</td>
                                                    <td>{{ $user->divisi->nama_divisi }}</td>
                                                    <td>{{ $user->lama_percobaan }}</td>
                                                    <td>
                                                        @if ($user->type == 0)
                                                            user
                                                        @elseif ($user->type == 2)
                                                            manager
                                                        @endif
                                                    </td>
                                                    <td>{{ $user->mulai_kerja }}</td>
                                                    <td>{{ $user->faktor_penilaian }}</td>
                                                    <td>
                                                        @if ($user->status_evaluasi == 'diterima')
                                                            <i class="fas fa-check-circle text-success"> Diterima</i>
                                                        @elseif ($user->status_evaluasi == 'diproses')
                                                            <i class="fas fa-angle-double-right text-warning"> Diproses</i>
                                                        @elseif ($user->status_evaluasi == 'ditolak')
                                                            <i class="fas fa-times text-danger"> Ditolak</i>
                                                        @endif
                                                    </td>
                                                    <td class="text-center text-nowrap">
                                                        <form action="{{ route('evaluasi.destroy', $user->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('post')
                                                            <a class="btn btn-sm btn-warning"
                                                                href="{{ route('evaluasi.edit', $user->id) }}">Edit</a>
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
