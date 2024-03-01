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
                                        {{ __('Edit Reimbursements') }}
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('finance.reimbursements.update', $reimbursement->id) }}" method="post">
                                @csrf
                                @method('put')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="largeInput">Nama Karyawan</label>
                                                <input type="hidden" name="user_id" value="{{ $reimbursement->user_id }}">
                                                <input type="text" class="form-control form-control"
                                                    value="{{ $reimbursement->user->name }}" readonly>
                                            </div>
                                            {{-- <div class="form-group">
                                                <label for="largeInput">Divisi</label>
                                                <input type="text" class="form-control form-control"
                                                    value="{{ $user->divisi->nama_divisi }}" readonly>
                                            </div> --}}
                                            <div class="form-group">
                                                <label for="largeInput">Tanggal</label>
                                                <input type="date" name="tanggal" value="{{ $reimbursement->tanggal }}"
                                                    class="form-control form-control" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="largeInput">Keterangan</label>
                                                <textarea name="keterangan" class="form-control" cols="30" rows="10">{{ $reimbursement->keterangan }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="largeInput">Jumlah Reimbursements</label>
                                                <input type="text" name="jumlah" value="{{ $reimbursement->jumlah }}"
                                                    class="form-control form-control" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="largeInput">Persetujuan Atasan</label>
                                                <input type="text" class="form-control" name="persetujuan_atasan"
                                                    value="{{ $reimbursement->persetujuan_atasan }}" readonly>
                                                {{-- <select name="persetujuan_atasan" class="form-control">
                                                    <option value="{{ $reimbursement->persetujuan_atasan }}" selected>
                                                        {{ $reimbursement->persetujuan_atasan }}</option>
                                                    <option value="diterima">diterima</option>
                                                    <option value="ditolak">ditolak</option>
                                                </select> --}}
                                            </div>
                                            <div class="form-group">
                                                <label for="largeInput">Persetujuan finance</label>
                                                <select name="persetujuan_finance" class="form-control" required>
                                                    <option selected>-- PILIH --</option>
                                                    <option value="diterima">diterima</option>
                                                    <option value="ditolak">ditolak</option>
                                                </select>
                                                {{-- <input type="text" name="persetujuan_finance" class="form-control"
                                                    value="diproses"> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-end">
                                    <button type="submit" class="btn btn-success btn-lg">UPDATE</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
