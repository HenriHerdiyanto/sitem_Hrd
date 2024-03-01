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
                                        {{ __('History Pembayaran') }}
                                    </div>
                                    {{-- <div class="col-4 col-sm-4 d-flex justify-content-end">
                                        <a href="{{ route('pinjam.create') }}" class="btn btn-sm btn-primary">Request
                                            Pinjaman</a>
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
                                                <th>Tanggal Pinjam</th>
                                                <th>Tanggal Bayar Pelunasan</th>
                                                <th>Cicilan Pembayaran</th>
                                                <th>Jumlah Pinjaman</th>
                                                <th>Jumlah Pembayaran</th>
                                                {{-- <th class="text-center">Action</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($historyBayar as $data)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $data->user->name }}</td>
                                                    <td>{{ $data->tanggal_pinjam }} </td>
                                                    <td>{{ $data->tanggal_bayar }}</td>
                                                    <td>{{ number_format($data->jumlah_bayar_sekarang, 0, '.', ',') }}</td>
                                                    <td>
                                                        @foreach ($pinjaman as $data)
                                                            {{ number_format($data->jumlah_pinjam, 0, '.', ',') }}
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach ($jmlhBayar as $history)
                                                            @if ($history->user_id == $data->user_id)
                                                                {{ number_format($history->total_bayar, 0, '.', ',') }}
                                                                @if ($history->total_bayar == $data->jumlah_pinjam)
                                                                    <i class="fas fa-check-circle text-success">
                                                                        Lunas</i>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    {{-- <td class="text-center">
                                                        <form action="{{ route('admin.pinjaman.destroy', $data->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('post')
                                                            <a class="btn btn-sm btn-warning"
                                                                href="{{ route('admin.pinjaman.edit', $data->id) }}">Edit</a>
                                                            <a class="btn btn-sm btn-info"
                                                                href="{{ route('admin.pinjaman.history', $data->id) }}">History</a>
                                                            <button type="submit"
                                                                class="btn btn-sm btn-danger">Hapus</button>
                                                        </form>
                                                    </td> --}}
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
