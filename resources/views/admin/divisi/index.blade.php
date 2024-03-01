@extends('layouts.hero')
<style>
    .modal-footer {
        display: flex;
        justify-content: space-between;
    }
</style>
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
                                        {{ __('Data Divisi') }}
                                    </div>
                                    <div class="col-4 col-sm-4 d-flex justify-content-end">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop">
                                            Tambah Divisi
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5 text-center" id="staticBackdropLabel">
                                                            Tambah Divisi
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <i class="fas fa-expand-arrows-alt"></i>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('divisi.store') }}" method="post">
                                                        <div class="modal-body">
                                                            @csrf
                                                            @method('post')
                                                            <div class="form-group form-floating-label">
                                                                <input id="input" name="kode_divisi" type="text"
                                                                    class="form-control input-border-bottom" required>
                                                                <label for="input" class="placeholder">Kode
                                                                    Divisi</label>
                                                            </div>
                                                            <div class="form-group form-floating-label">
                                                                <input id="input" type="text" name="nama_divisi"
                                                                    class="form-control input-border-bottom" required>
                                                                <label for="input" class="placeholder">Nama
                                                                    Divisi</label>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary"
                                                                id="alert_demo_3_3">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($divisi as $data)
                        <div class="col-sm-6 col-md-3 mb-3">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-icon">
                                            <div class="icon-big text-center icon-primary bubble-shadow-small">
                                                <img class="img-fluid" src="{{ asset('assets/img/logomt.png') }}"
                                                    alt="">
                                            </div>
                                        </div>
                                        <div class="col col-stats ml-3 ml-sm-0">
                                            <div class="numbers">
                                                <a href="#" data-toggle="modal"
                                                    data-target="#myModal{{ $data->id }}">
                                                    <p class="card-category">{{ $data->kode_divisi }}</p>
                                                    <h4 class="card-title">{{ $data->nama_divisi }}</h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="myModal{{ $data->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel{{ $data->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel{{ $data->id }}">
                                            Detail Divisi
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('divisi.update', $data->id) }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="modal-body">
                                            <!-- Isi modal dengan informasi divisi -->
                                            <input type="text" name="kode_divisi" class="form-control mb-3"
                                                value="{{ $data->kode_divisi }}">
                                            <input type="text" name="nama_divisi" class="form-control mb-3"
                                                value="{{ $data->nama_divisi }}">
                                            <!-- Anda dapat menambahkan informasi lainnya di sini -->
                                        </div>
                                        <div class="modal-footer">
                                            <button id="alert_demo_3_3" type="submit" style="margin-bottom: 13%;"
                                                class="btn btn-success mt-5">UPDATE</button>
                                    </form>
                                    <!-- Form untuk tindakan Delete -->
                                    <form action="{{ route('divisi.destroy', $data->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" id="alert_demo_3_4" class="btn btn-danger">DELETE</button>
                                </div>
                                </form>
                            </div>
                        </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
    </div>
@endsection
