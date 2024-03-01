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
                                        {{ __('Pinjaman Karyawan') }}
                                    </div>
                                    <div class="col-4 col-sm-4 d-flex justify-content-end">
                                        <a href="{{ route('manager.pinjam.create') }}"
                                            class="btn btn-sm btn-primary">Request
                                            Pinjaman</a>
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
                                                <th>Jangka Pelunasan</th>
                                                <th>Jumlah Pinjaman</th>
                                                <th>Cicilan Perbulan</th>
                                                <th>Jumlah Pembayaran</th>
                                                <th>Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pinjaman as $data)
                                                @if ($data->user_id == $user->id)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $data->user->name }}</td>
                                                        <td>{{ $data->jangka_pelunasan }} Bulan</td>
                                                        <td>Rp,{{ number_format($data->jumlah_pinjam, 0, '.', ',') }}</td>
                                                        <td>Rp,{{ number_format($data->jumlah_cicilan, 0, '.', ',') }}</td>
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
                                                            @if ($data->status == 'diterima')
                                                                <a type="button" class="btn btn-warning"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#staticBackdrop{{ $data->id }}">Bayar
                                                                    Cicilan</a>
                                                                <div class="modal fade"
                                                                    id="staticBackdrop{{ $data->id }}"
                                                                    data-bs-backdrop="static" data-bs-keyboard="false"
                                                                    tabindex="-1" aria-labelledby="staticBackdropLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h1 class="modal-title fs-5"
                                                                                    id="staticBackdropLabel">Form
                                                                                    Pembayaran
                                                                                </h1>
                                                                                <button type="button" class="btn-close"
                                                                                    data-bs-dismiss="modal"
                                                                                    aria-label="Close"></button>
                                                                            </div>
                                                                            <form
                                                                                action="{{ route('manager.history.store') }}"
                                                                                method="post"
                                                                                enctype="multipart/form-data">
                                                                                @csrf
                                                                                @method('post')
                                                                                <div class="modal-body">
                                                                                    <div class="form-group">
                                                                                        <input type="hidden"
                                                                                            class="form-control"
                                                                                            name="pinjam_id"
                                                                                            value="{{ $data->id }}">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <input type="hidden"
                                                                                            class="form-control"
                                                                                            name="user_id"
                                                                                            value="{{ $data->user_id }}">
                                                                                        <label style="margin-right: 70%;"
                                                                                            for="">Nama
                                                                                            Karyawan</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            value="{{ $data->user->name }}"
                                                                                            readonly>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label style="margin-right: 70%;"
                                                                                            for="">Tanggal
                                                                                            Pinjam</label>
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            name="tanggal_pinjam"
                                                                                            value="{{ $data->tanggal_pinjam }}"
                                                                                            readonly>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label style="margin-right: 70%;"
                                                                                            for="">Tanggal
                                                                                            Sekarang</label>
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            name="tanggal_bayar">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label style="margin-right: 60%;"
                                                                                            for="">Cicilan
                                                                                            Harus
                                                                                            Dibayar</label>
                                                                                        <input type="number"
                                                                                            class="form-control"
                                                                                            value="{{ $data->jumlah_cicilan }}"
                                                                                            readonly>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label style="margin-right: 60%;"
                                                                                            for="">Jumlah
                                                                                            Bayar
                                                                                            Sekarang</label>
                                                                                        <input type="number"
                                                                                            class="form-control"
                                                                                            name="jumlah_bayar_sekarang">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label style="margin-right: 70%;"
                                                                                            for="">Bukti
                                                                                            Pembayaran</label>
                                                                                        <input type="file"
                                                                                            class="form-control"
                                                                                            name="gambar">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                        class="btn btn-secondary"
                                                                                        data-bs-dismiss="modal">Close</button>
                                                                                    <button type="submit"
                                                                                        class="btn btn-primary">Submit</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <form
                                                                    action="{{ route('manager.pinjam.destroy', $data->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('post')
                                                                    <a class="btn btn-sm btn-warning"
                                                                        href="{{ route('manager.pinjam.edit', $data->id) }}">Edit</a>
                                                                    <button type="submit"
                                                                        class="btn btn-sm btn-danger">Hapus</button>
                                                                </form>
                                                            @endif
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-8 col-sm-8">
                                        {{ __('Story Pembayaran') }}
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="basic-datatables" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Nama Karyawan</th>
                                                <th>Tanggal Pinjam</th>
                                                <th>Tanggal Bayar</th>
                                                <th>Jumlah Bayar</th>
                                                <th class="text-center">Bukti Pembayaran</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($historyBayar as $data)
                                                @if ($data->user_id == $user->id)
                                                    <tr>
                                                        <td>{{ $data->user->name }}</td>
                                                        <td>{{ $data->tanggal_pinjam }}</td>
                                                        <td>{{ $data->tanggal_bayar }}</td>
                                                        <td>Rp,{{ number_format($data->jumlah_bayar_sekarang) }}</td>
                                                        <td class="text-center">
                                                            <img style="width: 100px;" class="img-fluid"
                                                                src="{{ asset('pinjaman/' . $data->gambar) }}"
                                                                alt="">
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
