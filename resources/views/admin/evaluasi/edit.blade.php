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
                                        {{ __('Detail Karyawan') }}
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                {{-- <form action="{{ route('admin.karyawan.update', $user->id) }}" method="post" --}}
                                <form action="{{ route('evaluasi.update', $evaluasi->id) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="">Divisi</label>
                                                <input type="hidden" name="user_id" value="{{ $evaluasi->user_id }}">
                                                <select name="divisi_id" class="form-control">
                                                    @foreach ($divisis as $divisi)
                                                        <option value="{{ $divisi->id }}"
                                                            {{ $evaluasi->divisi_id == $divisi->id ? 'selected' : '' }}>
                                                            {{ $divisi->nama_divisi }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Lama Percobaan</label>
                                                <input type="text" name="lama_percobaan" class="form-control"
                                                    value="{{ $evaluasi->lama_percobaan }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Nama Lengkap</label>
                                                <input type="text" name="nama_lengkap" class="form-control"
                                                    value="{{ $evaluasi->nama_lengkap }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Jabatan</label>
                                                <select name="type" class="form-control">
                                                    <option value="0" {{ $evaluasi->type == 0 ? 'selected' : '' }}>User
                                                    </option>
                                                    <option value="2" {{ $evaluasi->type == 2 ? 'selected' : '' }}>
                                                        Manager</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="">Mulai Kerja</label>
                                                <input type="text" name="mulai_kerja" class="form-control"
                                                    value="{{ $evaluasi->mulai_kerja }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Faktor Penilaian</label>
                                                <textarea name="faktor_penilaian" class="form-control" cols="15" rows="5">
                                                    {{ $evaluasi->faktor_penilaian }}
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="">Catatan Atasan</label>
                                                <textarea name="catatan_atasan" class="form-control" cols="15" rows="5">
                                                    {{ $evaluasi->catatan_atasan }}
                                                </textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Catatan hrd</label>
                                                <textarea name="catatan_hrd" class="form-control" cols="15" rows="5">
                                                    {{ $evaluasi->catatan_hrd }}
                                                </textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Dievaluasi Oleh</label>
                                                <input type="text" name="dievaluasi_oleh" class="form-control"
                                                    value="{{ $evaluasi->dievaluasi_oleh }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Disetujui Oleh</label>
                                                <input type="text" name="disetujui_oleh" class="form-control"
                                                    value="{{ $evaluasi->disetujui_oleh }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Status Evaluasi</label>
                                                <select name="status_evaluasi" class="form-control">
                                                    <option value="{{ $evaluasi->status_evaluasi }}" selected>
                                                        {{ $evaluasi->status_evaluasi }}</option>
                                                    <option value="diterima">Diterima</option>
                                                    <option value="ditolak">Ditolak</option>
                                                </select>
                                            </div>
                                            <button type="submit" id="alert_demo_3_3"
                                                class="btn btn-success w-100">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
