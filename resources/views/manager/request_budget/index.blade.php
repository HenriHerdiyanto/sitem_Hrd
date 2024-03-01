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
                                        {{ __('Request Budget') }}
                                    </div>
                                    <div class="col-4 col-sm-4 d-flex justify-content-end">
                                        <a href="{{ route('budget.create') }}" class="btn btn-sm btn-primary">Request</a>
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
                                            @foreach ($budget as $data)
                                                @if ($data->user_id == $user->id)
                                                    <tr>
                                                        <td>{{ $data->user->name }}</td>
                                                        <td>{{ $data->divisi->nama_divisi }}</td>
                                                        <td>{{ $data->jenis_item }}</td>
                                                        <td>{{ $data->total_harga }}</td>
                                                        <td>
                                                            @if ($data->status == 'diproses')
                                                                <i class="fas fa-check-circle text-warning"> diproses</i>
                                                            @elseif ($data->status == 'diterima')
                                                                <i class="fas fa-check-circle text-success"> diterima</i>
                                                            @elseif ($data->status == 'ditolak')
                                                                <i class="fas fa-check-circle text-danger"> ditolak</i>
                                                            @endif

                                                        </td>
                                                        <td class="text-center text-nowrap">
                                                            <form action="{{ route('budget.destroy', $data->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('post')
                                                                <a class="btn btn-sm btn-warning"
                                                                    href="{{ route('budget.edit', $data->id) }}">Edit</a>
                                                                <button type="submit"
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
