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
                                        {{ __('Lembur Karyawan') }}
                                    </div>
                                    <div class="col-4 col-sm-4 d-flex justify-content-end">
                                        <a href="{{ route('manager.lembur.create') }}"
                                            class="btn btn-sm btn-primary">Tambah</a>
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
                                                <th>Project yang dilakukan</th>
                                                <th>Tanggal</th>
                                                <th class="text-center">Total Lembur</th>
                                                <th>Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($lemburs as $data)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $data->user->name }}</td>
                                                    <td>{{ $data->nama_project }}</td>
                                                    <td>{{ $data->tanggal }}</td>
                                                    <td class="text-center">{{ $data->total_lembur }} JAM</td>
                                                    <td>
                                                        @if ($data->status == 'diproses')
                                                            <i class="fas fa-check-circle text-warning"> diproses</i>
                                                        @elseif ($data->status == 'diterima')
                                                            <i class="fas fa-check-circle text-success"> diterima</i>
                                                        @elseif ($data->status == 'ditolak')
                                                            <i class="fas fa-check-circle text-danger"> Ditolak</i>
                                                        @endif
                                                    </td>

                                                    <td class="text-center text-nowrap">
                                                        @if ($data->status == 'diterima')
                                                            <a class="btn btn-sm btn-warning"
                                                                href="{{ route('dinas.edit', $data->id) }}">view</a>
                                                        @else
                                                            <form action="{{ route('manager.lembur.destroy', $data->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('post')
                                                                <a class="btn btn-sm btn-warning"
                                                                    href="{{ route('manager.lembur.edit', $data->id) }}">Edit</a>
                                                                <button type="submit" id="alert_demo_3_4"
                                                                    class="btn btn-sm btn-danger">Hapus</button>
                                                            </form>
                                                        @endif
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
