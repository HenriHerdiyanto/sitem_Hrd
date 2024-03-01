@extends('layouts.user')
@php
    $activePage = 'lembur';
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
                                        {{ __('Tambah Lembur') }}
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('user.lembur.update', $lembur->id) }}" method="post">
                                @csrf
                                @method('put')
                                <div class="card-body">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="largeInput">Nama Karyawan</label>
                                                    <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
                                                    <input type="text" class="form-control"
                                                        value="{{ auth()->user()->name }}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="largeInput">Nama Project Yang Dilakukan</label>
                                                    <input type="text" class="form-control" name="nama_project"
                                                        value="{{ $lembur->nama_project }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="largeInput">Tanggal</label>
                                                    <input type="date" value="{{ $lembur->tanggal }}"
                                                        class="form-control" name="tanggal">
                                                </div>
                                                @if ($lembur->status == 'ditolak')
                                                    <div class="form-group">
                                                        <label for="largeInput">Status</label>
                                                        <input type="text" value="{{ $lembur->status }}"
                                                            class="form-control" name="tanggal" readonly>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="mulai_lembur">Mulai Lembur <small class="text-red"
                                                            style="color: red;">Contoh:
                                                            03:00</small></label>
                                                    <input type="time" class="form-control"
                                                        value="{{ $lembur->mulai_lembur }}" id="mulai_lembur"
                                                        name="mulai_lembur" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="akhir_lembur">Akhir Lembur <small class="text-red"
                                                            style="color: red;">Contoh:
                                                            05:00</small></label>
                                                    <input type="time" class="form-control" id="akhir_lembur"
                                                        value="{{ $lembur->akhir_lembur }}" name="akhir_lembur" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="total_lembur">Total Jam Lembur / JAM</label>
                                                    <input type="number" class="form-control" id="total_lembur"
                                                        value="{{ $lembur->total_lembur }}" name="total_lembur" required>
                                                    <input type="hidden" class="form-control" id="status" name="status"
                                                        value="diproses">
                                                </div>
                                                @if ($lembur->status == 'ditolak')
                                                    <div class="form-group">
                                                        <label for="total_lembur">Keterangan jika ditolak</label>
                                                        <textarea name="keterangan" class="form-control" cols="30" rows="10" readonly>
                                                    {{ $lembur->keterangan }}
                                                    </textarea>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-end">
                                    @if ($lembur->status == 'diproses')
                                        <a href="{{ route('manager.lembur.index') }}" class="btn btn-info">KEMBALI</a>
                                        <button type="submit" id="alert_demo_3_5"
                                            class="btn btn-success ml-3">UPDATE</button>
                                    @else
                                        <a href="{{ route('manager.lembur.index') }}" class="btn btn-info">KEMBALI</a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Function to calculate the total lembur
        function calculateTotalLembur() {
            const mulaiLembur = document.getElementById('mulai_lembur').value;
            const akhirLembur = document.getElementById('akhir_lembur').value;

            // Parse the time values to calculate the difference
            const mulaiTime = new Date(`2000-01-01T${mulaiLembur}`);
            const akhirTime = new Date(`2000-01-01T${akhirLembur}`);

            // Calculate the difference in hours
            const diffHours = (akhirTime - mulaiTime) / 3600000;

            // Update the total_lembur input with the calculated value
            document.getElementById('total_lembur').value = diffHours;
        }

        // Add event listeners to the input fields to trigger the calculation
        document.getElementById('mulai_lembur').addEventListener('change', calculateTotalLembur);
        document.getElementById('akhir_lembur').addEventListener('change', calculateTotalLembur);
    </script>
@endsection
