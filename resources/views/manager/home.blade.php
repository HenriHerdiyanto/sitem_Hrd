@extends('layouts.manager')

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-8 col-sm-8">
                                        {{ __('Data Karyawan') }}
                                    </div>
                                    {{-- <div class="col-4 col-sm-4 d-flex justify-content-end">
                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop">
                                            Tambah Divisi
                                        </button>
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
                                                <th>Jabatan Karyawan</th>
                                                <th style="width: 10%;" class="text-center">action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->type }}</td>
                                                    <td style="width: 10%;" class="text-nowrap">
                                                        <a href="{{ route('manager.edit', $user->id) }}"
                                                            class="btn btn-sm btn-warning" title="View">
                                                            <i class="fas fa-address-book"></i>
                                                        </a>
                                                        <a href="{{ route('manager.create', $user->id) }}"
                                                            class="btn btn-sm btn-warning" title="Evaluasi">
                                                            <i class="fas fa-signal"></i>
                                                        </a>
                                                        <a href="{{ route('manager.pendidikan.show', $user->id) }}"
                                                            class="btn btn-sm btn-warning" title="Pendidikan">
                                                            <i class="fas fa-user-tie"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-primary-gradient">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-8 col-sm-8 text-white">
                                        {{ __('To Do List ') }}
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if ($todolists->isEmpty())
                                    <form action="{{ route('todolist.store') }}" method="post">
                                        @csrf
                                        @method('post')
                                        <div class="card-body">
                                            <input type="hidden" value="{{ auth()->user()->id }}" name="user_id"
                                                class="form-control">
                                            <input type="text" name="judul" class="form-control"
                                                placeholder="judul TO DO LIST"><br>
                                            <textarea name="keterangan" class="form-control" cols="30" rows="10" placeholder="tuliskan TO DO LIST  kamu"></textarea>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" id="alert_demo_3_3"
                                                class="btn btn-primary w-100">Tambah</button>
                                        </div>
                                    </form>
                                @else
                                    @foreach ($todolists as $todolist)
                                        <form action="{{ route('todolist.update', $todolist->id) }}" method="post">
                                            @csrf
                                            @method('post')
                                            <div class="card-body">
                                                <input type="hidden" value="{{ auth()->user()->id }}" name="user_id"
                                                    class="form-control">
                                                <input type="text" name="judul" class="form-control"
                                                    placeholder="judul TO DO LIST" value="{{ $todolist->judul }}"><br>
                                                <textarea name="keterangan" class="form-control" cols="30" rows="10" placeholder="tuliskan TO DO LIST  kamu">{{ $todolist->keterangan }}</textarea>
                                            </div>
                                        </form>
                                        <div class="card-footer">
                                            <form action="{{ route('todolist.destroy', $todolist->id) }}" method="POST">
                                                <button type="submit" id="alert_demo_3_3"
                                                    class="btn btn-success">Update</button>
                                                @csrf
                                                @method('delete') <!-- Menggantikan metode HTTP ke DELETE -->
                                                <button type="submit" id="alert_demo_3_4"
                                                    class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
