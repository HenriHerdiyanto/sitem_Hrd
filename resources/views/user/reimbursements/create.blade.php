@extends('layouts.user')
@php
    $activePage = 'reimbursement';
@endphp
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
                                        {{ __('Tambah Reimbursements') }}
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('user.reimbursements.store') }}" method="post">
                                @csrf
                                @method('post')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="largeInput">Nama Karyawan</label>
                                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                <input type="text" class="form-control form-control"
                                                    value="{{ $user->name }}" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="largeInput">Divisi</label>
                                                <input type="text" class="form-control form-control"
                                                    value="{{ $user->divisi->nama_divisi }}" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="largeInput">Tanggal</label>
                                                <input type="date" name="tanggal" class="form-control form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="largeInput">Keterangan</label>
                                                <textarea name="keterangan" class="form-control" cols="30" rows="10"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="largeInput">Jumlah Reimbursements</label>
                                                <input type="text" name="jumlah" class="form-control form-control">
                                            </div>
                                            <div class="form-group">
                                                {{-- <label for="largeInput">Persetujuan Atasan</label> --}}
                                                @if ($user->type == 'manager')
                                                    <input type="hidden" name="persetujuan_atasan"
                                                        class="form-control form-control" value="diterima">
                                                @else
                                                    <input type="hidden" name="persetujuan_atasan"
                                                        class="form-control form-control" value="diproses">
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                {{-- <label for="largeInput">Persetujuan finance</label> --}}
                                                <input type="hidden" name="persetujuan_finance"
                                                    class="form-control form-control" value="diproses">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-end">
                                    <button type="submit" class="btn btn-success btn-lg">SUBMIT</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
