@extends('layouts.finance')
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
                                        {{ __('Reimbursements') }}
                                    </div>
                                    {{-- <div class="col-4 col-sm-4 d-flex justify-content-end">
                                        <a href="{{ route('reimbursements.create') }}"
                                            class="btn btn-sm btn-primary">Request</a>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="basic-datatables" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Karyawan</th>
                                                <th>Tanggal</th>
                                                <th>Keterangan</th>
                                                <th>Jumlah Reimbursements</th>
                                                <th>Persetujuan Atasan</th>
                                                <th>Persetujuan Finance</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($reimbursements as $data)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $data->user->name }}</td>
                                                    <td>{{ $data->tanggal }}</td>
                                                    <td>{{ $data->keterangan }}</td>
                                                    <td>{{ $data->jumlah }}</td>
                                                    <td>
                                                        @if ($data->persetujuan_atasan == 'diproses')
                                                            <i class="fas fa-check-circle text-warning"> diproses</i>
                                                        @elseif ($data->persetujuan_atasan == 'diterima')
                                                            <i class="fas fa-check-circle text-success"> diterima</i>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($data->persetujuan_finance == 'diproses')
                                                            <i class="fas fa-check-circle text-warning"> diproses</i>
                                                        @elseif ($data->persetujuan_finance == 'diterima')
                                                            <i class="fas fa-check-circle text-success"> diterima</i>
                                                        @endif
                                                    </td>
                                                    <td class="text-center text-nowrap">
                                                        @if ($data->persetujuan_finance == 'diproses')
                                                            <form action="{{ route('reimbursements.destroy', $data->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('post')
                                                                <a class="btn btn-sm btn-warning"
                                                                    href="{{ route('finance.reimbursements.edit', $data->id) }}">Edit</a>
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-danger">Hapus</button>
                                                            </form>
                                                        @elseif ($data->persetujuan_finance == 'diterima')
                                                            <a class="btn btn-sm btn-warning"
                                                                href="{{ route('dinas.edit', $data->id) }}">Edit</a>
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
