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
                                        {{ __('Data Inventaris') }}
                                    </div>
                                    <div class="col-4 col-sm-4 d-flex justify-content-end">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop">
                                            Tambah Service
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5 text-center" id="staticBackdropLabel">
                                                            SERVICE INFRASTRUKTUR
                                                        </h1>
                                                    </div>
                                                    <form action="{{ route('admin.infrastruktur.store') }}" method="post">
                                                        @csrf
                                                        @method('post')
                                                        <div class="modal-body">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="form-group">
                                                                        <label for="largeInput">Nomor Service</label>
                                                                        <input type="hidden" name="user_id"
                                                                            value="{{ $user->id }}">
                                                                        <input type="text" name="nomor"
                                                                            class="form-control form-control" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="largeInput">Tanggal Service</label>
                                                                        <input type="date" name="tanggal"
                                                                            class="form-control form-control" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="largeInput">Infrastruktur yang
                                                                            diservice</label>
                                                                        <input type="text" name="infrastruktur"
                                                                            class="form-control form-control" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="largeInput">Ruangan + lantai</label>
                                                                        <input type="text" name="ruangan"
                                                                            class="form-control form-control" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="largeInput">Jenis Perbaikan</label>
                                                                        <input type="text" name="jenis_perbaikan"
                                                                            class="form-control form-control" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="largeInput">Keterangan</label>
                                                                        <input type="text" name="keterangan"
                                                                            class="form-control form-control" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="largeInput">Prepared By</label>
                                                                        <input type="text" name="prepared"
                                                                            class="form-control form-control" required>
                                                                    </div>
                                                                </div>
                                                                <div class="card-action d-flex justify-content-end">
                                                                    <button type="submit" id="alert_demo_3_3"
                                                                        class="btn btn-success">Submit</button>
                                                                    <button type="button" class="btn btn-danger ml-2"
                                                                        data-bs-dismiss="modal">Cancel</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="basic-datatables" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th style="width: 14%;">Nomor Service</th>
                                                <th style="width: 14%;">Tanggal Service</th>
                                                <th style="width: 14%;">Infrastruktur yang diservice</th>
                                                <th style="width: 14%;">Jenis Perbaikan</th>
                                                <th style="width: 14%;">Keterangan</th>
                                                <th style="width: 14%;">Prepared By</th>
                                                <th style="width: 14%;" class="text-center">Action</th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                            @foreach ($infractions as $user)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $user->nomor }}</td>
                                                    <td>{{ $user->tanggal }}</td>
                                                    <td>{{ $user->infrastruktur }}</td>
                                                    <td>{{ $user->jenis_perbaikan }}</td>
                                                    <td>{{ $user->keterangan }}</td>
                                                    <td>{{ $user->prepared }}</td>
                                                    <td class="text-center text-nowrap">
                                                        <form
                                                            action="{{ route('admin.infrastruktur.destroy', $user->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('post')
                                                            <button type="button" class="btn btn-sm btn-warning"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#edit{{ $user->id }}">
                                                                Edit
                                                            </button>
                                                            <button type="submit" id="alert_demo_3_4"
                                                                class="btn btn-sm btn-danger">Hapus</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                <div class="modal fade" id="edit{{ $user->id }}"
                                                    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">EDIT
                                                                    SERVICE INFRASTRUKTUR
                                                                </h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form
                                                                action="{{ route('admin.infrastruktur.update', $user->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('put')
                                                                <div class="modal-body">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="form-group">
                                                                                <label for="largeInput">Nomor
                                                                                    Service</label>
                                                                                <input type="hidden" name="user_id"
                                                                                    value="{{ $user->user_id }}">
                                                                                <input type="text" name="nomor"
                                                                                    value="{{ $user->nomor }}"
                                                                                    class="form-control" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="largeInput">Tanggal
                                                                                    Service</label>
                                                                                <input type="date" name="tanggal"
                                                                                    value="{{ $user->tanggal }}"
                                                                                    class="form-control" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="largeInput">Infrastruktur yang
                                                                                    diservice</label>
                                                                                <input type="text" name="infrastruktur"
                                                                                    value="{{ $user->infrastruktur }}"
                                                                                    class="form-control" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="largeInput">Ruangan +
                                                                                    lantai</label>
                                                                                <input type="text" name="ruangan"
                                                                                    value="{{ $user->ruangan }}"
                                                                                    class="form-control" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="largeInput">Jenis
                                                                                    Perbaikan</label>
                                                                                <input type="text"
                                                                                    name="jenis_perbaikan"
                                                                                    value="{{ $user->jenis_perbaikan }}"
                                                                                    class="form-control" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="largeInput">Keterangan</label>
                                                                                <input type="text" name="keterangan"
                                                                                    value="{{ $user->keterangan }}"
                                                                                    class="form-control" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="largeInput">Prepared By</label>
                                                                                <input type="text" name="prepared"
                                                                                    value="{{ $user->prepared }}"
                                                                                    class="form-control" required>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="card-action d-flex justify-content-end">
                                                                            <button type="submit" id="alert_demo_3_5"
                                                                                class="btn btn-success">UPDATE</button>
                                                                            <button type="button"
                                                                                class="btn btn-danger ml-2"
                                                                                data-bs-dismiss="modal">Cancel</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
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
