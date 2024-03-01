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
                                        {{ __('Tambah Lembur') }}
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('manager.lembur.store') }}" method="post">
                                @csrf
                                @method('post')
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
                                                    <!--indry minta perubahan nama project di ubah menjadi nama divisi tapi saya ubah nama projek doang tidak mengubah database-->
                                                    <!--<label for="largeInput">Nama Project Yang Dilakukan</label>-->
                                                    <!--<input type="text" class="form-control" name="nama_project">-->
                                                    <label for="largeInput">Nama Divisi</label>
                                                    <input type="text" name="nama_project" class="form-control "
                                                        value="{{ $user->divisi->nama_divisi }}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="largeInput">Tanggal</label>
                                                    <input type="date" class="form-control" name="tanggal" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="mulai_lembur">Mulai Lembur <small class="text-red"
                                                            style="color: red;">Contoh:
                                                            03:00</small></label>
                                                    <input type="time" class="form-control" id="mulai_lembur"
                                                        name="mulai_lembur" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="akhir_lembur">Akhir Lembur <small class="text-red"
                                                            style="color: red;">Contoh:
                                                            05:00</small></label>
                                                    <input type="time" class="form-control" id="akhir_lembur"
                                                        name="akhir_lembur" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="total_lembur">Total Jam Lembur / JAM</label>
                                                    <input type="text" class="form-control" id="total_lembur"
                                                        name="total_lembur" required step="1">
                                                    <input type="hidden" class="form-control" id="status" name="status"
                                                        value="diproses">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">SUBMIT</button>
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

            // Convert string time to Date objects
            const mulaiTime = new Date(`2000-01-01T${mulaiLembur}`);
            const akhirTime = new Date(`2000-01-01T${akhirLembur}`);

            // Calculate the time difference in milliseconds
            let diffTime = akhirTime - mulaiTime;
            if (diffTime < 0) { // Handle case where end time is before start time
                diffTime += 24 * 60 * 60 * 1000; // Add 24 hours in milliseconds
            }

            // Convert time difference to hours
            const diffHours = diffTime / (1000 * 60 * 60);

            // Update the total_lembur input with the calculated value
            document.getElementById('total_lembur').value = diffHours;
        }

        // Add event listeners to the input fields to trigger the calculation
        document.getElementById('mulai_lembur').addEventListener('change', calculateTotalLembur);
        document.getElementById('akhir_lembur').addEventListener('change', calculateTotalLembur);
    </script>
@endsection
