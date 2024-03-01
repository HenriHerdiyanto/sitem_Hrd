@extends('layouts.manager')
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
                                        {{ __('Evaluasi Karyawan') }}
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('manager.store') }}" method="post">
                                @csrf
                                @method('post')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                {{-- <label for="divisi_id">user id</label> --}}
                                                <input type="hidden" class="form-control" name="user_id"
                                                    value="{{ $user->id }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="divisi_id">Divisi</label>
                                                <select class="form-control" name="divisi_id">
    @if ($user->divisi)
        <option value="{{ $user->divisi->id }}">
            {{ $user->divisi->nama_divisi }}
        </option>
    @else
        <option value="" disabled>Divisi anda telah dihapus</option>
    @endif
</select>

                                            </div>
                                            <div class="mb-3">
                                                <label for="">Lama Percobaan</label>
                                                <input type="text" class="form-control" name="lama_percobaan" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Nama Karyawan</label>
                                                <input type="text" class="form-control" name="nama_lengkap"
                                                    value="{{ $user->name }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="type">Jabatan</label>
                                                <select class="form-control" name="type" id="type" required>
                                                    <option value="" selected>-- pilih --
                                                    </option>
                                                    <option value="0" {{ $user->type == 0 ? 'selected' : '' }}>Staff
                                                    </option>
                                                    <option value="1" {{ $user->type == 1 ? 'selected' : '' }}>Admin
                                                    </option>
                                                    <option value="2" {{ $user->type == 2 ? 'selected' : '' }}>Manager
                                                    </option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="">Mulai Kerja</label>
                                                <input type="text" class="form-control" name="mulai_kerja"
                                                    value="{{ $user->mulai_kerja }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="">Faktor Penilaian</label>
                                                <textarea name="faktor_penilaian" class="form-control" cols="30" rows="10" required></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Catatan Anda</label>
                                                <textarea name="catatan_atasan" class="form-control" cols="30" rows="10" required></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <input type="hidden" name="catatan_hrd" value="belum ada">
                                            </div>
                                            <div class="mb-3">
                                                <input type="hidden" name="dievaluasi_oleh" value="belum ada">
                                            </div>
                                            <div class="mb-3">
                                                <input type="hidden" name="disetujui_oleh" value="belum ada">
                                            </div>
                                            <input type="hidden" class="form-control" name="status_evaluasi"
                                                value="diproses">
                                            <button type="submit" class="btn btn-success w-100">Submit</button>
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
@endsection
