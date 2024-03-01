@extends('layouts.manager')

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title text-center">BIODATA KARYAWAN</h4>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-pills nav-secondary  nav-pills-no-bd nav-pills-icons justify-content-center"
                                    id="pills-tab-with-icon" role="tablist">
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-profile-tab-icon" data-toggle="pill"
                                            href="#pills-profile-icon" role="tab" aria-controls="pills-profile-icon"
                                            aria-selected="false">
                                            <i class="fas fa-user-graduate"></i>
                                            Pendidikan <br> ( CLICK ME ! )
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content mt-2 mb-3" id="pills-with-icon-tabContent">
                                    <div class="tab-pane fade" id="pills-profile-icon" role="tabpanel"
                                        aria-labelledby="pills-profile-tab-icon">
                                        {{-- <form action="{{ route('manager.pendidikan.update', $pendidikans->id) }}"
                                            method="post">
                                            @csrf
                                            @method('put') --}}
                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <div class="form-group form-group-default">
                                                    <label>Name</label>
                                                    {{-- <input type="hidden" class="form-control" name="user_id"
                                                            value="{{ $user->id }}"> --}}
                                                    <input type="text" class="form-control" value="{{ $user->name }}"
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-group-default">
                                                    <label>Instansi Pendidikan</label>
                                                    <input type="text" class="form-control" name="instansi_pendidikan"
                                                        value="{{ $pendidikans->instansi_pendidikan }}" readonly>
                                                </div>
                                                <div class="form-group form-group-default">
                                                    <label>Jenjang Pendidikan</label>
                                                    <input type="text" class="form-control" name="instansi_pendidikan"
                                                        value="{{ $pendidikans->jenjang_pendidikan }}" readonly>
                                                </div>
                                                <div class="form-group form-group-default">
                                                    <label>Jurusan</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $pendidikans->jurusan }}" name="jurusan" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-group-default">
                                                    <label>Tahun Masuk</label>
                                                    <input type="text" class="form-control" name="tahun_masuk"
                                                        value="{{ $pendidikans->tahun_masuk }}" readonly>
                                                </div>
                                                <div class="form-group form-group-default">
                                                    <label>Tahun Keluar</label>
                                                    <input type="text" class="form-control" name="tahun_keluar"
                                                        value="{{ $pendidikans->tahun_keluar }}" readonly>
                                                </div>
                                                <div class="form-group form-group-default">
                                                    <label>Index Komulatif</label>
                                                    <input type="text" class="form-control" name="index_nilai"
                                                        value="{{ $pendidikans->index_nilai }}" readonly>
                                                </div>
                                                {{-- <button type="submit" id="alert_demo_3_5"
                                                        class="btn btn-success w-100">UPDATE</button> --}}
                                            </div>
                                        </div>
                                        {{-- </form> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-profile card-secondary">
                            <div class="card-header" style="background-image: url('../assets/img/blogpost.jpg')">
                                <div class="profile-picture">
                                    <div class="avatar avatar-xl">
                                        <img src="{{ asset('foto_karyawan/' . $user->foto_karyawan) }}"
                                            class="avatar-img rounded-circle" alt="BELUM UPDATE">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="user-profile text-center">
                                    <div class="name">{{ $user->name }}</div>
                                    <div class="job">{{ optional($user->divisi)->nama_divisi }}</div>
                                    <div class="desc">MY TAX INDONESIA</div>
                                    <div class="social-media">
                                        <a class="btn btn-info btn-twitter btn-sm btn-link" href="#">
                                            <span class="btn-label just-icon"><i class="flaticon-twitter"></i> </span>
                                        </a>
                                        <a class="btn btn-danger btn-sm btn-link" rel="publisher" href="#">
                                            <span class="btn-label just-icon"><i class="flaticon-google-plus"></i> </span>
                                        </a>
                                        <a class="btn btn-primary btn-sm btn-link" rel="publisher" href="#">
                                            <span class="btn-label just-icon"><i class="flaticon-facebook"></i> </span>
                                        </a>
                                        <a class="btn btn-danger btn-sm btn-link" rel="publisher" href="#">
                                            <span class="btn-label just-icon"><i class="flaticon-dribbble"></i> </span>
                                        </a>
                                    </div>
                                    <div class="view-profile">
                                        <a href="{{ route('manager.edit', $user->id) }}"
                                            class="btn btn-secondary btn-block">View Full Profile</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row user-stats text-center">
                                    <div class="col">
                                        <div class="number">45</div>
                                        <div class="title">Post</div>
                                    </div>
                                    <div class="col">
                                        <div class="number">25K</div>
                                        <div class="title">Followers</div>
                                    </div>
                                    <div class="col">
                                        <div class="number">134</div>
                                        <div class="title">Following</div>
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
