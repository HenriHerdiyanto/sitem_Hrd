@extends('layouts.hero')

@section('content')
    {{-- dd($evaluasi); --}}
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="row">
                    <div class="col-sm-6 col-md-3">
                        <a href="{{ route('admin.karyawan.home') }}">
                            <div class="card card-stats card-round">
                                <div class="card-body ">
                                    <div class="row align-items-center">
                                        <div class="col-icon">
                                            <div class="icon-big text-center icon-primary bubble-shadow-small">
                                                <i class="fas fa-users"></i>
                                            </div>
                                        </div>
                                        <div class="col col-stats ml-3 ml-sm-0">
                                            <div class="numbers">
                                                <p class="card-category">Daftar</p>
                                                <h4 class="card-title">Karyawan</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <a href="{{ route('divisi.index') }}">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-icon">
                                            <div class="icon-big text-center icon-info bubble-shadow-small">
                                                <i class="far fa-newspaper"></i>
                                            </div>
                                        </div>
                                        <div class="col col-stats ml-3 ml-sm-0">
                                            <div class="numbers">
                                                <p class="card-category">Daftar</p>
                                                <h4 class="card-title">Divisi</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        {{-- <a href="{{ route('payroll.index') }}"> --}}
                        <a href="{{ route('payroll.index') }}">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-icon">
                                            <div class="icon-big text-center icon-success bubble-shadow-small">
                                                <i class="fas fa-money-check-alt"></i>
                                            </div>
                                        </div>
                                        <div class="col col-stats ml-3 ml-sm-0">
                                            <div class="numbers">
                                                <p class="card-category">Daftar</p>
                                                <h4 class="card-title">Payroll</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <a href="{{ route('AdminAbsen.index') }}">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-icon">
                                            <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                                <i class="fas fa-id-card"></i>
                                            </div>
                                        </div>
                                        <div
                                            class="col
                                                col-stats ml-3 ml-sm-0">
                                            <div class="numbers">
                                                <p class="card-category">Daftar</p>
                                                <h4 class="card-title">Absen</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-8 col-sm-8">
                                        {{ __('Dashboard') }}
                                    </div>
                                    {{-- <div class="col-4 col-sm-4 d-flex justify-content-end">
                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            Tambah User
                                        </button>
                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-fullscreen-sm-downl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="">
                                                            @csrf
                                                            @method('POST')
                                                            <div class="row mb-3">
                                                                <label for="name"
                                                                    class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                                                <div class="col-md-6">
                                                                    <input id="name" type="text"
                                                                        class="form-control @error('name') is-invalid @enderror"
                                                                        name="name" value="{{ old('name') }}" required
                                                                        autocomplete="name" autofocus>

                                                                    @error('name')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3">
                                                                <label for="email"
                                                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                                                <div class="col-md-6">
                                                                    <input id="email" type="email"
                                                                        class="form-control @error('email') is-invalid @enderror"
                                                                        name="email" value="{{ old('email') }}" required
                                                                        autocomplete="email">

                                                                    @error('email')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3">
                                                                <label for="password"
                                                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                                                <div class="col-md-6">
                                                                    <input id="password" type="password"
                                                                        class="form-control @error('password') is-invalid @enderror"
                                                                        name="password" required
                                                                        autocomplete="new-password">

                                                                    @error('password')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3">
                                                                <label for="password-confirm"
                                                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                                                <div class="col-md-6">
                                                                    <input id="password-confirm" type="password"
                                                                        class="form-control" name="password_confirmation"
                                                                        required autocomplete="new-password">
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3">
                                                                <label for="password-confirm"
                                                                    class="col-md-4 col-form-label text-md-end">{{ __('Role User') }}</label>

                                                                <div class="col-md-6">
                                                                    <select class="form-select form-control"
                                                                        aria-label="Default select example"
                                                                        name="type">
                                                                        <option selected></option>
                                                                        <option value="0">Admin</option>
                                                                        <option value="1">Manager</option>
                                                                        <option value="2">User</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="row mb-0">
                                                                <div class="col-md-6 offset-md-4">
                                                                    <button type="submit" class="btn btn-primary">
                                                                        {{ __('Register') }}
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="card-body">
                                @if ($todolists->isEmpty())
                                    <form action="{{ route('admin.store') }}" method="post">
                                        @csrf
                                        <div class="card-body">
                                            <input type="hidden" value="{{ auth()->user()->id }}" name="user_id"
                                                class="form-control">
                                            <input type="text" name="judul" class="form-control"
                                                placeholder="judul TO DO LIST"><br>
                                            <textarea name="keterangan" class="form-control" cols="30" rows="10" placeholder="tuliskan TO DO LIST  kamu"></textarea>
                                        </div>
                                        <div class="card-footer text-muted text-center">
                                            <button type="submit" class="btn btn-sm btn-primary w-100">Tambah</button>
                                        </div>
                                    </form>
                                @else
                                    @foreach ($todolists as $todolist)
                                        <form action="{{ route('admin.update', $todolist->id) }}" method="post">
                                            @csrf
                                            @method('post')
                                            <div class="card">
                                                <div class="card-body">
                                                    <input type="hidden" value="{{ auth()->user()->id }}" name="user_id"
                                                        class="form-control">
                                                    <input type="text" name="judul" class="form-control"
                                                        placeholder="judul TO DO LIST" value="{{ $todolist->judul }}"><br>
                                                    <textarea name="keterangan" class="form-control" cols="30" rows="10" placeholder="tuliskan TO DO LIST  kamu">{{ $todolist->keterangan }}</textarea>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="card-footer text-muted text-center">
                                            <form action="{{ route('admin.destroy', $todolist->id) }}" method="POST">
                                                <button type="submit" class="btn btn-sm btn-success">Update</button>
                                                @csrf
                                                @method('delete') <!-- Menggantikan metode HTTP ke DELETE -->
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-primary bg-primary-gradient bubble-shadow">
                            <div class="card-body">
                                <h4 class="mt-3 b-b1 pb-2 mb-4 fw-bold text-center">MYTAX INDONESIA</h4>
                                <h4 class="mt-3 b-b1 pb-2 mb-5 fw-bold text-center">HRD SYSTEM</h4>
                                <div id="activeUsersChart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
