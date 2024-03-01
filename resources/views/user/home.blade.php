@extends('layouts.user')
@php
    $activePage = 'dashboard'; // Anda bisa mengubah nilai ini sesuai dengan halaman yang aktif
@endphp
@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card bg-info-gradient">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-8 col-sm-8 text-white">
                                                {{ __('To Do List ') }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        @if ($todolists->isEmpty())
                                            <form action="{{ route('user.store') }}" method="post">
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
                                                <form action="{{ route('user.update', $todolist->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="card-body">
                                                        <input type="hidden" value="{{ auth()->user()->id }}"
                                                            name="user_id" class="form-control">
                                                        <input type="text" name="judul" class="form-control"
                                                            placeholder="judul TO DO LIST"
                                                            value="{{ $todolist->judul }}"><br>
                                                        <textarea name="keterangan" class="form-control" cols="30" rows="10" placeholder="tuliskan TO DO LIST kamu">{{ $todolist->keterangan }}</textarea>
                                                    </div>
                                                    <div class="d-flex justify-content-between card-footer">
                                                        <button type="submit" id="alert_demo_3_5"
                                                            class="btn btn-success">Update</button>
                                                </form>
                                                <form action="{{ route('user.destroy', $todolist->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" id="alert_demo_3_4"
                                                        class="btn btn-danger">Delete</button>
                                                </form>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
