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
                                        {{ __('Perjalanan Dinas') }}
                                    </div>
                                    <div class="col-4 col-sm-4 d-flex justify-content-end">
                                        <a href="{{ route('dinas.create') }}" class="btn btn-sm btn-primary">Request</a>
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
                                                <th>Nama Project</th>
                                                <th>Tujuan</th>
                                                <th>Jumlah Personel</th>
                                                <th>Cash Advance</th>
                                                <th>Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pd as $data)
                                                @if ($data->user_id == $user->id)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $data->user->name }}</td>
                                                        <td>{{ $data->project }}</td>
                                                        <td>{{ $data->tujuan }}</td>
                                                        <td>{{ $data->jumlah_personel }}</td>
                                                        <td>{{ $data->cash_advance }}</td>
                                                        <td>
                                                            @if ($data->status == 'diproses')
                                                                <i class="fas fa-check-circle text-warning"> diproses</i>
                                                            @elseif ($data->status == 'diterima')
                                                                <i class="fas fa-check-circle text-success"> diterima</i>
                                                            @endif

                                                        </td>
                                                        <td class="text-center text-nowrap">
                                                            <form action="{{ route('admin.dinas.destroy', $data->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('post')
                                                                <a class="btn btn-sm btn-warning"
                                                                    href="{{ route('dinas.edit', $data->id) }}">Edit</a>
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
