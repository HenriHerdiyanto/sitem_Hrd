@extends('layouts.hero')
@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <ul class="nav nav-pills nav-secondary  nav-pills-no-bd nav-pills-icons justify-content-center"
                                    id="pills-tab-with-icon" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-home-tab-icon" data-toggle="pill"
                                            href="#pills-home-icon" role="tab" aria-controls="pills-home-icon"
                                            aria-selected="true">
                                            <i class="fas fa-graduation-cap"></i>
                                            Pendidikan
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-profile-tab-icon" data-toggle="pill"
                                            href="#pills-profile-icon" role="tab" aria-controls="pills-profile-icon"
                                            aria-selected="false">
                                            <i class="fas fa-school"></i>
                                            Keluarga
                                        </a>
                                    </li>
                                    {{-- <li class="nav-item">
                                                <a class="nav-link" id="pills-contact-tab-icon" data-toggle="pill"
                                                    href="#pills-contact-icon" role="tab"
                                                    aria-controls="pills-contact-icon" aria-selected="false">
                                                    <i class="flaticon-mailbox"></i>
                                                    Contact
                                                </a>
                                            </li> --}}
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content mt-2 mb-3" id="pills-with-icon-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home-icon" role="tabpanel"
                                        aria-labelledby="pills-home-tab-icon">
                                        @if ($pendidikan->count() > 0)
                                            @foreach ($pendidikan as $data)
                                                <div class="row mt-3">
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default">
                                                            <label>JENJANG PENDIDIKAN</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $data->jenjang_pendidikan }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default">
                                                            <label>INSTANSI PENDIDIKAN</label>
                                                            <input type="email" class="form-control"
                                                                value="{{ $data->instansi_pendidikan }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default">
                                                            <label>JURUSAN</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $data->jurusan }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default">
                                                            <label>TAHUN MASUK</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $data->tahun_masuk }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default">
                                                            <label>TAHUN KELUAR</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $data->tahun_keluar }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default">
                                                            <label>INDEX NILAI</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $data->index_nilai }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="col-md-12">
                                                <h1 class="text-center">Belum ada data</h1>
                                                <center><img class="img-fluid" src="{{ asset('error.jpg') }}"
                                                        alt="">
                                                </center>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="tab-pane fade" id="pills-profile-icon" role="tabpanel"
                                        aria-labelledby="pills-profile-tab-icon">
                                        @if ($keluarga->count() > 0)
                                            @foreach ($keluarga as $data)
                                                <div class="row mt-3">
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default">
                                                            <label>NAMA AYAH</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $data->nama_ayah }}" readonly>
                                                        </div>
                                                        <div class="form-group form-group-default">
                                                            <label>TANGGAL LAHIR AYAH</label>
                                                            <input type="email" class="form-control"
                                                                value="{{ $data->tl_ayah }}" readonly>
                                                        </div>
                                                        <div class="form-group form-group-default">
                                                            <label>PENDIDIKAN AYAH</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $data->pendidikan_ayah }}" readonly>
                                                        </div>
                                                        <div class="form-group form-group-default">
                                                            <label>PEKERJAAN AYAH</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $data->pekerjaan_ayah }}" readonly>
                                                        </div>
                                                        <div class="form-group form-group-default">
                                                            <label>JABATAN AYAH</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $data->jabatan_ayah }}" readonly>
                                                        </div>
                                                        <div class="form-group form-group-default">
                                                            <label>PERUSAHAAN AYAH</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $data->perusahaan_ayah }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default">
                                                            <label>NAMA IBU</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $data->nama_ibu }}" readonly>
                                                        </div>
                                                        <div class="form-group form-group-default">
                                                            <label>TANGGAL LAHIR IBU</label>
                                                            <input type="email" class="form-control"
                                                                value="{{ $data->tl_ibu }}" readonly>
                                                        </div>
                                                        <div class="form-group form-group-default">
                                                            <label>PENDIDIKAN IBU</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $data->pendidikan_ibu }}" readonly>
                                                        </div>
                                                        <div class="form-group form-group-default">
                                                            <label>PEKERJAAN IBU</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $data->pekerjaan_ibu }}" readonly>
                                                        </div>
                                                        <div class="form-group form-group-default">
                                                            <label>JABATAN IBU</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $data->jabatan_ibu }}" readonly>
                                                        </div>
                                                        <div class="form-group form-group-default">
                                                            <label>PERUSAHAAN IBU</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $data->perusahaan_ibu }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="col-md-12">
                                                <h1 class="text-center">Belum ada data</h1>
                                                <center><img class="img-fluid" src="{{ asset('error.jpg') }}"
                                                        alt="">
                                                </center>
                                            </div>
                                        @endif
                                    </div>
                                    {{-- <div class="tab-pane fade" id="pills-contact-icon" role="tabpanel"
                                                aria-labelledby="pills-contact-tab-icon">
                                                <p>Pityful a rethoric question ran over her cheek, then she continued her
                                                    way. On her way she met a copy. The copy warned the Little Blind Text,
                                                    that where it came from it would have been rewritten a thousand times
                                                    and everything that was left from its origin would be the word "and" and
                                                    the Little Blind Text should turn around and return to its own, safe
                                                    country.</p>

                                                <p> But nothing the copy said could convince her and so it didn’t take long
                                                    until a few insidious Copy Writers ambushed her, made her drunk with
                                                    Longe and Parole and dragged her into their agency, where they abused
                                                    her for their</p>
                                            </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-profile card-secondary">
                            <div class="card-header" style="background-image: url('../assets/img/blogpost.jpg')">
                                <div class="profile-picture">
                                    <div class="avatar avatar-xl">
                                        <img src="{{ asset('foto_karyawan/' . $user->foto_karyawan) }}" alt="..."
                                            class="avatar-img rounded-circle">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="user-profile text-center">
                                    <div class="name">{{ $user->name }}</div>
                                    @if (!$user->divisi)
                                        <p><b>Belum Ada Divisi</b></p>
                                    @else
                                        <div class="job">{{ $user->divisi->nama_divisi }}</div>
                                    @endif

                                    <div class="desc">{{ $user->type }}</div>
                                    <div class="social-media">
                                        <a class="btn btn-info btn-twitter btn-sm btn-link" href="">
                                            <span class="btn-label just-icon"><i class="flaticon-twitter"></i>
                                            </span>
                                        </a>
                                        <a class="btn btn-danger btn-sm btn-link" rel="publisher" href="">
                                            <span class="btn-label just-icon"><i class="flaticon-google-plus"></i>
                                            </span>
                                        </a>
                                        <a class="btn btn-primary btn-sm btn-link" rel="publisher" href="">
                                            <span class="btn-label just-icon"><i class="flaticon-facebook"></i>
                                            </span>
                                        </a>
                                        <a class="btn btn-danger btn-sm btn-link" rel="publisher" href="">
                                            <span class="btn-label just-icon"><i class="flaticon-dribbble"></i>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="view-profile">
                                        <a href="" class="btn btn-secondary btn-block">View Full
                                            Profile</a>
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
