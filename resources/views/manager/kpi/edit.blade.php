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
                                        {{ __('Update KPI') }}
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @foreach ($kategori_kpis as $kategori_kpi)
                                    <div class="modal-body">
                                        <form action="{{ route('kpi.update', $kpi->id) }}" method="post">
                                            @csrf
                                            @method('put')
                                            <div class="modal-body">
                                                <div class="mb-2">
                                                    <label for="">Pilih
                                                        Staff</label>
                                                    <input type="hidden" name="kategorikpi_id"
                                                        value="{{ $kategori_kpi->id }}">
                                                    <input type="hidden" name="divisi_id" value="{{ $kpi->divisi_id }}">
                                                    <select name="user_id" class="form-control">
                                                        <option selected value="{{ $kpi->user_id }}">
                                                            {{ $kpi->user->name }}
                                                        </option>
                                                        @foreach ($users as $user)
                                                            <option value="{{ $user->id }}">
                                                                {{ $user->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <table class="table table-hover table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Indikator Penelitian
                                                            </th>
                                                            <th>Nilai</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>{{ $kategori_kpi->pertanyaan1 }}
                                                            </td>
                                                            <td><input type="text" name="nilai1" class="form-control"
                                                                    id="nilai" value="{{ $kpi->nilai1 }}">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>{{ $kategori_kpi->pertanyaan2 }}
                                                            </td>
                                                            <td><input type="text" name="nilai2" class="form-control"
                                                                    id="nilai" value="{{ $kpi->nilai2 }}">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>{{ $kategori_kpi->pertanyaan3 }}
                                                            </td>
                                                            <td><input type="text" name="nilai3" class="form-control"
                                                                    id="nilai" value="{{ $kpi->nilai3 }}">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>{{ $kategori_kpi->pertanyaan4 }}
                                                            </td>
                                                            <td><input type="text" name="nilai4" class="form-control"
                                                                    id="nilai" value="{{ $kpi->nilai4 }}">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>5</td>
                                                            <td>{{ $kategori_kpi->pertanyaan5 }}
                                                            </td>
                                                            <td><input type="text" name="nilai5" class="form-control"
                                                                    id="nilai" value="{{ $kpi->nilai5 }}">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>6</td>
                                                            <td>{{ $kategori_kpi->pertanyaan6 }}
                                                            </td>
                                                            <td><input type="text" name="nilai6" class="form-control"
                                                                    id="nilai" value="{{ $kpi->nilai6 }}">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>7</td>
                                                            <td>{{ $kategori_kpi->pertanyaan7 }}
                                                            </td>
                                                            <td><input type="text" name="nilai7" class="form-control"
                                                                    id="nilai" value="{{ $kpi->nilai7 }}">
                                                            </td>
                                                        </tr>
                                                        @if (empty($kategori_kpi->pertanyaan8))
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td>
                                                                    <input type="hidden" name="nilai18"
                                                                        class="form-control inputan" id="nilai"
                                                                        value="0">
                                                                </td>
                                                            </tr>
                                                        @else
                                                            <tr>
                                                                <td>8</td>
                                                                <td>{{ $kategori_kpi->pertanyaan8 }}
                                                                </td>
                                                                <td><input type="text" name="nilai8"
                                                                        class="form-control" id="nilai"
                                                                        value="{{ $kpi->nilai8 }}">
                                                                </td>
                                                            </tr>
                                                        @endif
                                                        @if (empty($kategori_kpi->pertanyaan9))
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td>
                                                                    <input type="hidden" name="nilai9"
                                                                        class="form-control inputan" id="nilai"
                                                                        value="0">
                                                                </td>
                                                            </tr>
                                                        @else
                                                            <tr>
                                                                <td>9</td>
                                                                <td>{{ $kategori_kpi->pertanyaan9 }}
                                                                </td>
                                                                <td><input type="text" name="nilai9"
                                                                        class="form-control" id="nilai"
                                                                        value="{{ $kpi->nilai9 }}">
                                                                </td>
                                                            </tr>
                                                        @endif
                                                        @if (empty($kategori_kpi->pertanyaan10))
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td>
                                                                    <input type="hidden" name="nilai10"
                                                                        class="form-control inputan" id="nilai"
                                                                        value="0">
                                                                </td>
                                                            </tr>
                                                        @else
                                                            <tr>
                                                                <td>10</td>
                                                                <td>{{ $kategori_kpi->pertanyaan10 }}
                                                                </td>
                                                                <td><input type="text" name="nilai10"
                                                                        class="form-control" id="nilai"
                                                                        value="{{ $kpi->nilai10 }}">
                                                                </td>
                                                            </tr>
                                                        @endif
                                                        @if (empty($kategori_kpi->pertanyaan11))
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td>
                                                                    <input type="hidden" name="nilai11"
                                                                        class="form-control inputan" id="nilai"
                                                                        value="0">
                                                                </td>
                                                            </tr>
                                                        @else
                                                            <tr>
                                                                <td>11</td>
                                                                <td>{{ $kategori_kpi->pertanyaan11 }}
                                                                </td>
                                                                <td><input type="text" name="nilai11"
                                                                        class="form-control" id="nilai"
                                                                        value="{{ $kpi->nilai11 }}">
                                                                </td>
                                                            </tr>
                                                        @endif
                                                        @if (empty($kategori_kpi->pertanyaan12))
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td>
                                                                    <input type="hidden" name="nilai12"
                                                                        class="form-control inputan" id="nilai"
                                                                        value="0">
                                                                </td>
                                                            </tr>
                                                        @else
                                                            <tr>
                                                                <td>12</td>
                                                                <td>{{ $kategori_kpi->pertanyaan12 }}
                                                                </td>
                                                                <td><input type="text" name="nilai12"
                                                                        class="form-control" id="nilai"
                                                                        value="{{ $kpi->nilai12 }}">
                                                                </td>
                                                            </tr>
                                                        @endif
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td><input type="hidden" class="form-control inputan"
                                                                    id="total_nilai_nol">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>#</td>
                                                            <td><b>TOTAL NILAI</b></td>
                                                            <td><input type="text" name="total_nilai"
                                                                    class="form-control" id="total_nilai"
                                                                    value="{{ $kpi->total_nilai }}" readonly>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>#</td>
                                                            <td><b>NILAI AKHIR</b></td>
                                                            <td><input type="text" name="nilai_akhir"
                                                                    class="form-control" id="nilai_akhir" readonly>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>#</td>
                                                            <td><b>ADJUSTMENT</b></td>
                                                            <td><input type="text" name="adjustments"
                                                                    class="form-control" id="adjustments" readonly>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>#</td>
                                                            <td><b>PERSEN %</b></td>
                                                            <td><input type="text" name="persen" class="form-control"
                                                                    id="persen" readonly>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <script>
                                                    document.addEventListener("DOMContentLoaded", function() {
                                                        // Ambil semua elemen input dengan class form-control
                                                        var inputElements = document.querySelectorAll(".inputan");
                                                        var totalNilaiInput = document.getElementById('total_nilai');
                                                        var totalNilaiNolInput = document.getElementById('total_nilai_nol');
                                                        var nilaiAkhirInput = document.getElementById('nilai_akhir');
                                                        var adjustmentInput = document.getElementById('adjustments');
                                                        var persenInput = document.getElementById('persen');

                                                        // Fungsi untuk menghitung total nilai yang bernilai 0
                                                        function hitungTotalNilaiNol() {
                                                            var totalNilaiNol = 0;

                                                            // Iterasi melalui setiap elemen input
                                                            inputElements.forEach(function(inputElement) {
                                                                // Periksa apakah nilai input adalah 0
                                                                if (parseInt(inputElement.value) === 0) {
                                                                    totalNilaiNol++;
                                                                }
                                                            });

                                                            // Hitung selisih antara 12 dan jumlah nilai nol
                                                            var selisih = 12 - totalNilaiNol;

                                                            // Tampilkan selisih pada elemen dengan id "total_nilai_nol"
                                                            totalNilaiNolInput.value = selisih;

                                                            // Panggil fungsi hitungNilaiAkhir setiap kali total nilai atau total nilai nol berubah
                                                            hitungNilaiAkhir();
                                                        }

                                                        // Panggil fungsi hitungTotalNilaiNol setiap kali nilai input berubah
                                                        inputElements.forEach(function(inputElement) {
                                                            inputElement.addEventListener("input", hitungTotalNilaiNol);
                                                        });

                                                        // Hitung total nilai nol saat halaman dimuat
                                                        hitungTotalNilaiNol();

                                                        // Fungsi untuk menghitung nilai akhir dan penilaian (adjustment)
                                                        function hitungNilaiAkhir() {
                                                            // Ambil nilai dari input
                                                            var totalNilai = parseFloat(totalNilaiInput.value) || 0;
                                                            var totalNilaiNol = parseFloat(totalNilaiNolInput.value) ||
                                                                1; // Ubah menjadi 1 jika totalNilaiNol kosong

                                                            // Hitung nilai akhir
                                                            var nilaiAkhir = totalNilai / totalNilaiNol;

                                                            // Tampilkan hasil pada input nilai akhir
                                                            nilaiAkhirInput.value = isNaN(nilaiAkhir) ? '' : nilaiAkhir.toFixed(2);

                                                            // Tentukan penilaian (adjustment) berdasarkan nilai akhir
                                                            var adjustmentText;
                                                            if (nilaiAkhir < 11) {
                                                                adjustmentText = "Sangat Kurang";
                                                            } else if (nilaiAkhir < 21) {
                                                                adjustmentText = "Kurang";
                                                            } else if (nilaiAkhir < 31) {
                                                                adjustmentText = "Cukup";
                                                            } else if (nilaiAkhir < 41) {
                                                                adjustmentText = "Baik";
                                                            } else {
                                                                adjustmentText = "Sangat Baik";
                                                            }

                                                            // Tampilkan hasil pada input adjustment
                                                            adjustmentInput.value = adjustmentText;

                                                            // Tentukan persen berdasarkan penilaian (adjustment)
                                                            var persen;
                                                            switch (adjustmentText) {
                                                                case "Sangat Kurang":
                                                                    persen = "TIDAK DAPAT";
                                                                    break;
                                                                case "Kurang":
                                                                    persen = "5%";
                                                                    break;
                                                                case "Cukup":
                                                                    persen = "7%";
                                                                    break;
                                                                case "Baik":
                                                                    persen = "10%";
                                                                    break;
                                                                case "Sangat Baik":
                                                                    persen = "12%";
                                                                    break;
                                                                default:
                                                                    persen = "";
                                                            }

                                                            // Tampilkan hasil pada input persen
                                                            persenInput.value = persen;
                                                        }
                                                    });
                                                </script>
                                                <script>
                                                    // Fungsi untuk menghitung total nilai
                                                    function hitungTotalNilai() {
                                                        var totalNilai = 0;

                                                        // Ambil semua elemen input dengan id "nilai"
                                                        var inputElements = document.querySelectorAll('input[id="nilai"]');

                                                        // Iterasi melalui setiap elemen input dan jumlahkan nilainya
                                                        for (var i = 0; i < inputElements.length; i++) {
                                                            var nilai = parseFloat(inputElements[i].value) || 0;
                                                            totalNilai += nilai;
                                                        }

                                                        // Tampilkan hasilnya pada input dengan id "total_nilai"
                                                        document.getElementById("total_nilai").value = totalNilai;
                                                    }

                                                    // Panggil fungsi hitungTotalNilai setiap kali nilai input berubah
                                                    var inputElements = document.querySelectorAll('input[id="nilai"]');
                                                    for (var i = 0; i < inputElements.length; i++) {
                                                        inputElements[i].addEventListener("input", hitungTotalNilai);
                                                    }
                                                </script>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="{{ route('kpi.index') }}" class="btn btn-secondary">Back</a>
                                                <button type="submit" id="alert_demo_3_5"
                                                    class="btn btn-success">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
