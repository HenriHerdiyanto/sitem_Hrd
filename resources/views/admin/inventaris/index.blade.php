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
                                            Tambah Inventaris
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">INVENTARIS
                                                            KANTOR
                                                        </h1>
                                                    </div>
                                                    <form action="{{ route('inventaris.store') }}" method="post"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('post')
                                                        <div class="modal-body">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="form-group">
                                                                        <label for="largeInput">Nama Barang</label>
                                                                        <input type="text" name="name"
                                                                            class="form-control form-control"
                                                                            id="defaultInput" placeholder="Default Input"
                                                                            required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="largeInput">Kategori Barang</label>
                                                                        <input type="text" name="kategori"
                                                                            class="form-control form-control"
                                                                            id="defaultInput" placeholder="Default Input"
                                                                            required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="largeInput">Jumlah Barang</label>
                                                                        <input type="text" name="jumlah"
                                                                            class="form-control form-control"
                                                                            id="defaultInput" placeholder="Default Input"
                                                                            required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="largeInput">Tanggal Beli</label>
                                                                        <input type="date" name="tanggal"
                                                                            class="form-control form-control"
                                                                            id="defaultInput" placeholder="Default Input"
                                                                            required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="largeInput">Harga Barang</label>
                                                                        <input type="text" name="harga"
                                                                            class="form-control form-control"
                                                                            id="defaultInput" placeholder="Default Input"
                                                                            required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="largeInput">Gambar Barang</label>
                                                                        <input type="file" name="gambar"
                                                                            class="form-control form-control"
                                                                            id="defaultInput" placeholder="Default Input"
                                                                            required>
                                                                    </div>
                                                                </div>
                                                                <div class="card-action">
                                                                    <button type="submit"
                                                                        class="btn btn-success">Submit</button>
                                                                    <button type="button" class="btn btn-danger"
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
                                                <th style="width: 14%;">Nama Barang</th>
                                                <th style="width: 14%;">Kategori Barang</th>
                                                <th style="width: 14%;">Jumlah Barang</th>
                                                <th style="width: 14%;">Tanggal Beli</th>
                                                <th style="width: 14%;">Harga Beli</th>
                                                <th style="width: 14%;">Gambar Barang</th>
                                                <th style="width: 14%;" class="text-center">Action</th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                            @foreach ($inventaris as $user)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->kategori }}</td>
                                                    <td>{{ $user->jumlah }}</td>
                                                    <td>{{ $user->tanggal }}</td>
                                                    <td>Rp. {{ number_format($user->harga) }}</td>

                                                    <td>
                                                        <img class="img-fluid" style="width: 50%;"
                                                            src="{{ asset('inventaris/' . $user->gambar) }}" alt="">
                                                    </td>
                                                    <td class="text-center text-nowrap">
                                                        <form action="{{ route('inventaris.destroy', $user->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('post')
                                                            <button type="button" class="btn btn-sm btn-warning"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#edit{{ $user->id }}">
                                                                Edit
                                                            </button>
                                                            <button type="submit"
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
                                                                    INVENTARIS
                                                                </h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="{{ route('inventaris.update', $user->id) }}"
                                                                method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('put')
                                                                <div class="modal-body">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="form-group">
                                                                                <label for="largeInput">Nama Barang</label>
                                                                                <input type="text" name="name"
                                                                                    value="{{ $user->name }}"
                                                                                    class="form-control form-control"
                                                                                    id="defaultInput"
                                                                                    placeholder="Default Input">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="largeInput">Kategori
                                                                                    Barang</label>
                                                                                <input type="text" name="kategori"
                                                                                    value="{{ $user->kategori }}"
                                                                                    class="form-control form-control"
                                                                                    id="defaultInput"
                                                                                    placeholder="Default Input">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="largeInput">Jumlah
                                                                                    Barang</label>
                                                                                <input type="text" name="jumlah"
                                                                                    value="{{ $user->jumlah }}"
                                                                                    class="form-control form-control"
                                                                                    id="defaultInput"
                                                                                    placeholder="Default Input">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="largeInput">Tanggal
                                                                                    Beli</label>
                                                                                <input type="date" name="tanggal"
                                                                                    value="{{ $user->tanggal }}"
                                                                                    class="form-control form-control"
                                                                                    id="defaultInput"
                                                                                    placeholder="Default Input">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="largeInput">Harga
                                                                                    Barang</label>
                                                                                <input type="text" name="harga"
                                                                                    value="{{ $user->harga }}"
                                                                                    class="form-control form-control"
                                                                                    id="defaultInput"
                                                                                    placeholder="Default Input">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="largeInput">Gambar
                                                                                    Barang</label>
                                                                                <input type="file" name="gambar"
                                                                                    value="{{ $user->name }}"
                                                                                    class="form-control form-control"
                                                                                    id="defaultInput"
                                                                                    placeholder="Default Input">
                                                                                <img class="img-fluid" style="width: 50%;"
                                                                                    src="{{ asset('inventaris/' . $user->gambar) }}"
                                                                                    alt="">
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="card-action d-flex justify-content-end">
                                                                            <button type="submit"
                                                                                class="btn btn-success">Submit</button>
                                                                            <button type="button" class="btn btn-danger"
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
