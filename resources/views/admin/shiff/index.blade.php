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
                                        {{ __('Data Shiff') }}
                                    </div>
                                    <div class="col-4 col-sm-4 d-flex justify-content-end">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop">
                                            Tambah Shiff Kerja
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">SHIFF KERJA
                                                        </h1>
                                                    </div>
                                                    <form action="{{ route('shiff.store') }}" method="post">
                                                        @csrf
                                                        @method('post')
                                                        <div class="modal-body">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="form-group">
                                                                        <label for="largeInput">Nama karyawan</label>
                                                                        <select name="user_id" id="user_id"
                                                                            class="form-control" required>
                                                                            <option>-- PILIH KARYAWAN --</option>
                                                                            @foreach ($user as $item)
                                                                                <option value="{{ $item->id }}"
                                                                                    {{ $item->user_id == $item->id ? 'selected' : '' }}>
                                                                                    {{ $item->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="largeInput">Shiff Kerja</label>
                                                                        <select name="shiff" id="shiff"
                                                                            class="form-control" required>>
                                                                            <option selected> -- PILIH --</option>
                                                                            <option value="0">PAGI</option>
                                                                            <option value="1">SORE</option>
                                                                        </select>
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
                                                <th style="width: 3%;">No</th>
                                                <th style="width: 14%;">Nama Karyawan</th>
                                                <th style="width: 14%;">Shiff Kerja</th>
                                                <th style="width: 14%;" class="text-center">Action</th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                            @foreach ($shiff as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->user->name }}</td>
                                                    <td>
                                                        @if ($item->shiff == 0)
                                                            <i class="fas fa-check-circle text-success"> SHIFF PAGI</i>
                                                        @elseif ($item->shiff == 1)
                                                            <i class="fas fa-check-circle text-info"> SHIFF SORE</i>
                                                        @endif
                                                    </td>
                                                    <td class="text-center text-nowrap">
                                                        <form action="{{ route('shiff.destroy', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('post')
                                                            <a href="{{ route('shiff.edit', $item->id) }}"
                                                                class="btn btn-sm btn-warning">Edit</a>
                                                            <button type="submit" id="alert_demo_3_4"
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
