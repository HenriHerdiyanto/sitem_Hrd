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
                                        {{ __('Detail Evaluasi Karyawan') }}
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
                                                <th>Divisi</th>
                                                <th>Lama Percobaan</th>
                                                <th>Mulai Kerja</th>
                                                <th>Status Evaluasi</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($evaluasi as $data)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $data->nama_lengkap }}</td>
                                                    <td>{{ $data->divisi->nama_divisi }}</td>
                                                    <td>{{ $data->lama_percobaan }}</td>
                                                    <td>{{ $data->mulai_kerja }}</td>
                                                    <td>{{ $data->status_evaluasi }}</td>
                                                    <td>
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-warning"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#staticBackdrop{{ $data->id }}">
                                                            View
                                                        </button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="staticBackdrop{{ $data->id }}"
                                                            data-bs-backdrop="static" data-bs-keyboard="false"
                                                            tabindex="-1" aria-labelledby="staticBackdropLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5"
                                                                            id="staticBackdropLabel">Ditail Evaluasi</h1>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <table class="table table-bordered">
                                                                            <tr>
                                                                                <th>Nama Lengkap</th>
                                                                                <td>{{ $data->nama_lengkap }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Divisi</th>
                                                                                <td>{{ $data->divisi->nama_divisi }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Lama Percobaan</th>
                                                                                <td>{{ $data->lama_percobaan }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Mulai Kerja</th>
                                                                                <td>{{ $data->mulai_kerja }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Faktor Penilaian</th>
                                                                                <td>{{ $data->faktor_penilaian }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Catatan HRD</th>
                                                                                <td>{{ $data->catatan_hrd }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Dievaluasi Oleh</th>
                                                                                <td>{{ $data->dievaluasi_oleh }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Disetujui Oleh</th>
                                                                                <td>{{ $data->disetujui_oleh }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Status Evaluasi</th>
                                                                                <td>{{ $data->status_evaluasi }}</td>
                                                                            </tr>
                                                                            <!-- Add more data fields as needed -->
                                                                        </table>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <button type="button"
                                                                            class="btn btn-primary">Understood</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
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
