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
                                        {{ __('Tambah Perjalanan Dinas') }}
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('budget.update', $budget->id) }}" method="post">
                                @csrf
                                @method('put')
                                <div class="card-body">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="largeInput">Nama Karyawan</label>
                                                    <input type="hidden" name="user_id" value="{{ $users->id }}">
                                                    <input type="text" name="" class="form-control form-control"
                                                        value="{{ $users->name }}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="largeInput">Divisi</label>
                                                    <input type="hidden" name="divisi_id" value="{{ $users->divisi->id }}">
                                                    <input type="text" name="" class="form-control "
                                                        value="{{ $users->divisi->nama_divisi }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="largeInput">Jenis Item</label>
                                                    <select name="jenis_item" class="form-control" required>
                                                        <option value="barang">Barang</option>
                                                        <option value="jasa">Jasa</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="largeInput">Tanggal</label>
                                                    <input type="date" value="{{ $budget->tanggal }}" name="tanggal"
                                                        class="form-control" required>
                                                </div>
                                            </div>

                                            <table class="table table-hover table-striped table-bordered mt-5">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Keperluan</th>
                                                        <th>Unit Price <small class="text-danger">*jangan gunakan titik Unit
                                                                Price (Contoh:
                                                                5000)</small></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>
                                                            <input type="text" value="{{ $budget->barang1 }}"
                                                                class="form-control" name="barang1">
                                                        </td>
                                                        <td>
                                                            <input type="number" name="harga1"
                                                                value="{{ $budget->harga1 }}"
                                                                class="form-control nilai-input">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>
                                                            <input type="text" value="{{ $budget->barang2 }}"
                                                                class="form-control" name="barang2">
                                                        </td>
                                                        <td>
                                                            <input type="number" name="harga2"
                                                                value="{{ $budget->harga2 }}"
                                                                class="form-control nilai-input">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>
                                                            <input type="text" value="{{ $budget->barang3 }}"
                                                                class="form-control" name="barang3">
                                                        </td>
                                                        <td>
                                                            <input type="number" name="harga3"
                                                                value="{{ $budget->harga3 }}"
                                                                class="form-control nilai-input">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>
                                                            <input type="text" class="form-control"
                                                                value="{{ $budget->barang4 }}" name="barang4">
                                                        </td>
                                                        <td>
                                                            <input type="number" name="harga4"
                                                                value="{{ $budget->harga4 }}"
                                                                class="form-control nilai-input">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td><b>TOTAL NILAI</b></td>
                                                        <td>
                                                            <input type="number" name="total_harga"
                                                                value="{{ $budget->total_harga }}"
                                                                class="form-control total-nilai" readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        {{-- <td>6</td>
                                                        <td>STATUS</td> --}}
                                                        <td>
                                                            <input type="hidden" value="diproses" name="status"
                                                                class="form-control" readonly>
                                                            <input type="hidden" value="-" name="diketahui"
                                                                class="form-control" readonly>
                                                            <input type="hidden" value="-" name="disetujui"
                                                                class="form-control" readonly>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8"></div>
                                            <div class="col-md-4">
                                                <div class="modal-footer">
                                                    <a href="{{ route('budget.index') }}" type="button"
                                                        class="btn btn-secondary btn-lg">Close</a>
                                                    <button type="submit" class="btn btn-lg btn-success">Kirim</button>
                                                </div>
                                            </div>
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
    <script>
        // Mendapatkan elemen input nilai
        const nilaiInputs = document.querySelectorAll('.nilai-input');

        // Mendapatkan elemen input total nilai
        const totalNilaiInput = document.querySelector('.total-nilai');

        // Menghitung total nilai
        function hitungTotalNilai() {
            let totalNilai = 0;

            // Meloopi setiap input nilai dan menjumlahkannya
            nilaiInputs.forEach(input => {
                const nilai = parseFloat(input.value) || 0;
                totalNilai += nilai;
            });

            // Mengatur nilai total pada input total nilai
            totalNilaiInput.value = totalNilai;
        }

        // Menjalankan fungsi hitungTotalNilai saat input nilai berubah
        nilaiInputs.forEach(input => {
            input.addEventListener('input', hitungTotalNilai);
        });
    </script>
@endsection
