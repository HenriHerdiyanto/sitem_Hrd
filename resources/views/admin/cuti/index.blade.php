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
                                        {{ __('Data Cuti Karyawan') }}
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
                                                <!--<th>HAK CUTI</th>-->
                                                <!--<th>AMBIL CUTI</th>-->
                                                <!--<th>SISA CUTI</th>-->
                                                <!--<th>Tanggal Mulai</th>-->
                                                <!--<th>Tanggal Selesai</th>-->
                                                <th>Alasan Cuti</th>
                                                <th>Status</th>
                                                <th class="text-center" style="width: 20%;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cuti as $user)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $user->user->name }}</td>
                                                    <td>{{ $user->divisi->nama_divisi }}</td>
                                                    <!--<td>{{ $user->hak_cuti }}</td>-->
                                                    <!--<td>{{ $user->ambil_cuti }}</td>-->
                                                    <!--<td>{{ $user->sisa_cuti }}</td>-->
                                                    <!--<td>{{ $user->tanggal_mulai }}</td>-->
                                                    <!--<td>{{ $user->tanggal_selesai }}</td>-->
                                                    <td>{{ $user->alasan_cuti }}</td>
                                                    <td>
                                                        @if ($user->status == 'diterima')
                                                            <i class="fas fa-check-circle text-success"> Diterima</i>
                                                        @elseif ($user->status == 'diproses')
                                                            <i class="fas fa-angle-double-right text-warning"> Diproses</i>
                                                        @elseif ($user->status == 'ditolak')
                                                            <i class="fas fa-times text-danger"> Ditolak</i>
                                                        @endif
                                                    </td>
                                                    <td class="text-center text-nowrap">
                                                        <form action="{{ route('evaluasi.destroy', $user->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('post')
                                                            <a class="btn btn-sm btn-warning"
                                                                href="{{ route('admin.cuti.edit', $user->id) }}">Edit</a>
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
