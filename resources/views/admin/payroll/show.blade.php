@extends('layouts.hero')
@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <form action="{{ route('payroll.store') }}" method="post">
                    @csrf
                    @method('post')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-8 col-sm-8">
                                            <i class="fas fa-user-check"></i> {{ __('Detail Karyawan') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="user_id" class="form-label">Nama Karyawan</label>
                                                <input type="hidden" class="form-control" id="user_id"
                                                    value="{{ $user->id }}" name="user_id" readonly>
                                                <input type="text" class="form-control" value="{{ $user->name }}"
                                                    readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Jabatan</label>
                                                <input type="text" class="form-control" value="{{ $user->type }}"
                                                    readonly>
                                            </div>
                                            @if (isset($pendidikans))
                                                @foreach ($pendidikans as $pendidikan)
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Pendidikan Terakhir</label>
                                                        <input type="text" class="form-control" name="pendidikan"
                                                            value="{{ $pendidikan->jenjang_pendidikan ?? 'tidak ada' }}"
                                                            readonly>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Pendidikan Terakhir</label>
                                                    <input type="text" class="form-control" name="pendidikan"
                                                        value="Tidak ada data" readonly>
                                                </div>
                                            @endif

                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Status PTKP</label>
                                                <input type="text" class="form-control" name="status_ptkp"
                                                    value="{{ $user->status_ptkp }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Cabang</label>
                                                <input type="text" class="form-control" name="cabang"
                                                    value="{{ $user->cabang }}" readonly>
                                            </div>
                                            {{-- <div class="mb-3">
                                                <label for="" class="form-label">Group</label>
                                                <input type="text" class="form-control" name="group"
                                                    value="{{ $user->group_karyawan }}" readonly>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-8 col-sm-8">
                                            <i class="fas fa-toolbox"></i> {{ __('Tunjangan Karyawan') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="gaji_pokok" class="form-label">GAJI POKOK</label>
                                                <input type="text" class="form-control" id="input1"
                                                    value="{{ $user->gaji }}" name="gaji_pokok" readonly required>
                                            </div>
                                            {{-- <div class="mb-3">
                                                <label for="tempat_bekerja" class="form-label">Tempat Bekerja</label>
                                                <input type="text" class="form-control"
                                                    value="{{ $user->tempat_bekerja }}" name="tempat_kerja" readonly>
                                            </div> --}}
                                            <div class="mb-3">
                                                <label for="tunjangan_jabatan" class="form-label">Besar Tunjangan
                                                    Jabatan</label>
                                                <input type="text" class="form-control" name="tunjangan_jabatan"
                                                    id="input1" value="{{ $user->tunjangan_jabatan }}" required
                                                    readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="tunjangan_pulsa" class="form-label">Tunjangan Pulsa</label>
                                                <input type="text" class="form-control" name="tunjangan_pulsa"
                                                    id="input1" value="{{ $user->tunjangan_pulsa }}" required readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="tunjangan_pulsa" class="form-label">Tunjangan PPH 21</label>
                                                <input type="text" class="form-control" name="tunjanganpph21"
                                                    id="input1" value="0" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="lain_lain" class="form-label">Tunjangan Lain-lain</label>
                                                <input type="text" class="form-control" name="lain_lain"
                                                    id="input1" value="{{ $user->tunjangan_lain }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="tunjangan_pendidikan" class="form-label">Tunjangan
                                                    Pendidikan</label>
                                                <input type="text" class="form-control" name="tunjangan_pendidikan"
                                                    id="input1" value="{{ $user->tunjangan_pendidikan }}" required
                                                    readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="uang_makan" class="form-label">Uang Makan</label>
                                                <input type="text" class="form-control" name="uang_makan"
                                                    id="input1" value="{{ $user->uang_makan }}" required readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="uang_transport" class="form-label">Uang Transport</label>
                                                <input type="text" class="form-control" name="uang_transport"
                                                    id="input1" value="{{ $user->uang_transport }}" required readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="total1" class="form-label">TOTAL GAJI BULANAN</label>
                                                <input type="text" class="form-control" id="total1" required
                                                    readonly>
                                            </div>
                                            <div class="mb-3">
                                                <small style="color: red;">*Masukan Kembali Total Gaji Bulanan
                                                    Diatas</small>
                                                <input type="text" class="form-control" name="total_gaji"
                                                    id="total_gaji" required required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-8 col-sm-8">
                                            <i class="fas fa-toolbox"></i> {{ __('Pendapatan Karyawan') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="lembur" class="form-label">Total Lembur (
                                                    {{ $lamaLembur }} JAM )</label>
                                                <input type="text" class="form-control" id="input2"
                                                    value="{{ $totalLembur }}" name="lembur" readonly required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="dinas" class="form-label">Dinas</label>
                                                <input type="text" class="form-control" name="dinas" id="input2"
                                                    value="0" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="cuti_tahunan" class="form-label">Cuti Tahunan</label>
                                                <input type="text" class="form-control" name="cuti_tahunan"
                                                    id="input2" value="0" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="thr" class="form-label">THR</label>
                                                <input type="text" class="form-control" name="thr" id="input2"
                                                    value="0" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="total_tunjangan" class="form-label">Total Tunjangan Di
                                                    Luar Gaji</label>
                                                <input type="text" class="form-control" id="total2" value="0"
                                                    required>
                                            </div>
                                            <div class="mb-3">
                                                <small style="color: red;">*Masukan Kembali Total Tunjangan Di
                                                    Luar Gaji Diatas</small>
                                                <input type="text" class="form-control" name="total_tunjangan"
                                                    id="total_tunjangan" value="0" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="total_gaji_tunjangan" class="form-label">Total Gaji +
                                                    Tunjangan Di Luar Gaji</label>
                                                <input type="text" class="form-control" name="total_gaji_tunjangan"
                                                    id="total_gaji_tunjangan" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-8 col-sm-8">
                                            <i class="fas fa-toolbox"></i> {{ __('Insentif ( setiap tanggal 15 )') }}
                                        </div>
                                    </div>
                                </div>
                    {{-- <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="referal_client" class="form-label">REFERAL CLIENT-5%</label> --}}
                    <input type="hidden" class="form-control" id="input3" value="0" name="referal_client"
                        readonly required>
                    {{-- </div> --}}
                    {{-- <div class="mb-3">
                                                <label for="insentif_kk" class="form-label">INSENTIF KK-5%</label> --}}
                    <input type="hidden" class="form-control" name="insentif_kk" id="input3" value="0"
                        required>
                    {{-- </div> --}}
                    {{-- <div class="mb-3">
                                                <label for="insentif_spv" class="form-label">INSENTIF SPV-1%</label> --}}
                    <input type="hidden" class="form-control" name="insentif_spv" id="input3" value="0"
                        required>
                    {{-- </div> --}}
                    {{-- <div class="mb-3">
                                                <label for="insentif_staff" class="form-label">INSENTIF STAFF-2%</label> --}}
                    <input type="hidden" class="form-control" name="insentif_staff" id="input3" value="0"
                        required>
                    {{-- </div> --}}
                    {{-- <div class="mb-3">
                                                <label for="insentif_spt_op" class="form-label">INSENTIF SPT OP</label> --}}
                    <input type="hidden" class="form-control" name="insentif_spt_op" id="input3" value="0"
                        required>
                    {{-- </div>
                                        </div> --}}
                    {{-- <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="insentif_spt_badan" class="form-label">INSENTIF SPT
                                                    BADAN</label> --}}
                    <input type="hidden" class="form-control" name="insentif_spt_badan" id="input3" value="0"
                        required>
                    {{-- </div> --}}
                    {{-- <div class="mb-3">
                                                <label for="insentif_spt" class="form-label">INSENTIF SPT</label> --}}
                    <input type="hidden" class="form-control" name="insentif_spt" id="input3" value="0"
                        required>
                    {{-- </div> --}}
                    {{-- <div class="mb-3">
                                                <label for="komisi_marketing" class="form-label">KOMISI MARKETING</label> --}}
                    <input type="hidden" class="form-control" name="komisi_marketing" id="input3" value="0"
                        required>
                    {{-- </div> --}}
                    {{-- <div class="mb-3">
                                                <label for="" class="form-label">TOTAL INSENTIF DAN KOMISI
                                                    LAINNYA - PAYMENT PERTENGAHAN BULAN</label> --}}
                    <input type="hidden" class="form-control" id="total3" value="0" readonly required>
                    {{-- </div> --}}
                    {{-- <div class="mb-3">
                                                <small style="color: red;">*Masukan Kembali TOTAL INSENTIF DAN KOMISI
                                                    LAINNYA - PAYMENT PERTENGAHAN BULAN diatas</small> --}}
                    <input type="hidden" class="form-control" name="total_insentif" id="total_insentif" value="0"
                        required>
                    {{-- </div> --}}
                    {{-- <div class="mb-3">
                                                <label for="total_pendapatan" class="form-label">TOTAL PENDAPATAN BRUTO /
                                                    BULAN</label> --}}
                    <input type="hidden" class="form-control" name="total_pendapatan" id="total_pendapatan" required>
                    {{-- </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-8 col-sm-8">
                                            <i class="fas fa-toolbox"></i> {{ __('Pengurangan )') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <input type="hidden" class="form-control" id="uang_makan"
                                        value="{{ $user->uang_makan }}">
                                    <input type="hidden" class="form-control" id="total_cuti"
                                        value="{{ $totalcuti }}" readonly>
                                    <input type="hidden" class="form-control" id="uang_transport"
                                        value="{{ $user->uang_transport }}">
                                    <input type="hidden" class="form-control" id="total_sakit"
                                        value="{{ $totalsakit }}">
                                    <input type="hidden" class="form-control" id="jumlah_alpha"
                                        value="{{ $jumlah_alpha }}">
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="terlambat" class="form-label">Potongan PPH 21</label>
                                                <input type="text" class="form-control nilai-input4"
                                                    name="potonganpph21" value="0" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="terlambat" class="form-label">Terlambat
                                                    (Anda {{ $tterlambat }} X Terlambat)</label>
                                                <input type="text" class="form-control nilai-input4"
                                                    value="{{ $totalterlambat }}" name="terlambat" required readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="cuti_bersama" class="form-label">Cuti Bersama</label>
                                                <input type="text" class="form-control nilai-input4"
                                                    name="cuti_bersama" value="0" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="cuti" class="form-label">Potongan CUTI
                                                    ( {{ $total_cuti }} )</label>
                                                <input type="text" class="form-control nilai-input4" name="cuti"
                                                    value="{{ $totalcuti }}" required readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="izin" class="form-label">IZIN
                                                    (Anda {{ $total_izin }} X IZIN)</label>
                                                <input type="text" class="form-control nilai-input4" name="izin"
                                                    value="{{ $totalizin }}" required readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="sakit" class="form-label">SAKIT
                                                    ({{ $total_sakit }})</label>
                                                <input type="text" class="form-control nilai-input4" name="sakit"
                                                    id="potongan_sakit" value="{{ $totalsakit }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="alpha" class="form-label">Potongan Alpha
                                                    (Anda {{ $jumlah_alpha }} X Alpha) (Hadir Sebanyak
                                                    {{ $jumlah_hadir }} X)</label>
                                                <input type="text" class="form-control" id="alpha" required
                                                    readonly>
                                            </div>
                                            <div class="mb-3">
                                                <small style="color: red;">*Masukan Potongan Alpha Diatas</small>
                                                <input type="text" class="form-control nilai-input4" id="alpha"
                                                    name="alpha" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="pinjaman" class="form-label">Pinjaman</label>
                                                <input type="text" class="form-control nilai-input4" name="pinjaman"
                                                    value="{{ $jmlhBayar }}" required readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="bpjs_karyawan" class="form-label">BPJS KESEHATAN
                                                    Ditanggung
                                                    Karyawan 1%</label>
                                                <input type="text" class="form-control nilai-input4"
                                                    name="bpjs_karyawan" value="{{ $bpjs_kesehatan1 }}" required
                                                    readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="ditanggung_karyawan" class="form-label">BPJS
                                                    KETENAGAKERJAAN
                                                    Ditanggung Karyawan 2.00%</label>
                                                <input type="text" class="form-control nilai-input4"
                                                    name="ditanggung_karyawan" value="{{ $bpjs_ketenagakerjaan }}"
                                                    required readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="total_pengurangan" class="form-label">TOTAL
                                                    PENGURANGAN</label>
                                                <input type="text" class="form-control total-nilai4"
                                                    name="total_pengurangan" readonly required>
                                            </div>
                                            <div class="mb-3">
                                                <small style="color: red;">
                                                    *Masukan TOTAL PENGURANGAN diatas</small>
                                                <input type="text" class="form-control" id="total_pengurangan"
                                                    required>
                                            </div>
                                            {{-- <div class="mb-3">
                                                <label for="jkk" class="form-label">JKK 0.24%</label> --}}
                                            <input type="hidden" class="form-control" name="jkk" id="jkk"
                                                value="0" required>
                                            {{-- </div> --}}
                                            {{-- <div class="mb-3">
                                                <label for="jkm" class="form-label">JKM 0.30%</label> --}}
                                            <input type="hidden" class="form-control" name="jkm" id="jkm"
                                                value="0" required>
                                            {{-- </div> --}}
                                            {{-- <div class="mb-3">
                                                <label for="jht_37" class="form-label">JHT 3.7%</label> --}}
                                            <input type="hidden" class="form-control" name="jht_37" id="jht_37"
                                                value="0" required>
                                            {{-- </div> --}}
                                            {{-- <div class="mb-3">
                                                <label for="ditanggung_perusahaan" class="form-label">BPJS KESEHATAN
                                                    Ditanggung Perusahaan 4%</label> --}}
                                            <input type="hidden" class="form-control" name="ditanggung_perusahaan"
                                                id="ditanggung_perusahaan" value="0" required>
                                            {{-- </div> --}}
                                            {{-- <div class="mb-3">
                                                <label for="bpjs_perusahaan" class="form-label">BPJS KETENAGAKERJAAN
                                                    Ditanggung Perusahaan 4.24%</label> --}}
                                            <input type="hidden" class="form-control" name="bpjs_perusahaan"
                                                id="bpjs_perusahaan" value="0" required>
                                            {{-- </div> --}}
                                            <div class="mb-3">
                                                <label for="total_gaji_bersih" class="form-label">TOTAL GAJI
                                                    BERSIH</label>
                                                <input type="text" class="form-control" name="total_gaji_bersih"
                                                    id="total_gaji_bersih" value="0" required readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="car-footer d-flex justify-content-end">
                                    <div class="m-4">
                                        <button type="submit" class="btn btn-lg btn-success">SUBMIT</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- ini untuk tunjangan karyawan --}}
    <script>
        // Function to calculate and update total
        function updateTotal() {
            var inputs = document.querySelectorAll('[id="input1"]');

            var total = 0;

            inputs.forEach(function(input) {
                total += parseFloat(input.value || 0);
            });

            document.getElementById('total1').value = total;
        }

        var inputs = document.querySelectorAll('[id="input1"]');
        inputs.forEach(function(input) {
            input.addEventListener('input', updateTotal);
        });

        updateTotal();
    </script>

    {{-- ini untuk pendapatan karyawan --}}
    <script>
        // Function to calculate and update total
        function updateTotal() {
            var inputs = document.querySelectorAll('[id="input2"]');

            var total = 0;

            inputs.forEach(function(input) {
                total += parseFloat(input.value || 0);
            });

            document.getElementById('total2').value = total;
        }

        var inputs = document.querySelectorAll('[id="input2"]');
        inputs.forEach(function(input) {
            input.addEventListener('input', updateTotal);
        });

        updateTotal();
    </script>

    {{-- ini untuk Insentif ( setiap tanggal 15 ) karyawan --}}
    <script>
        // Function to calculate and update total
        function updateTotal() {
            var inputs = document.querySelectorAll('[id="input3"]');

            var total = 0;

            inputs.forEach(function(input) {
                total += parseFloat(input.value || 0);
            });

            document.getElementById('total3').value = total;
        }

        var inputs = document.querySelectorAll('[id="input3"]');
        inputs.forEach(function(input) {
            input.addEventListener('input', updateTotal);
        });

        updateTotal();
    </script>

    {{-- ini untuk Total Gaji + Tunjangan Di Luar Gaji --}}
    <script>
        // Fungsi untuk menghitung total gaji + tunjangan
        function hitungTotalGajiTunjangan() {
            var totalGaji = parseFloat(document.getElementById("total_gaji").value) || 0;
            var totalTunjangan = parseFloat(document.getElementById("total_tunjangan").value) || 0;

            var totalGajiTunjangan = totalGaji + totalTunjangan;

            // Menyimpan hasil penjumlahan pada elemen dengan id "total_gaji_tunjangan"
            document.getElementById("total_gaji_tunjangan").value = totalGajiTunjangan;
        }

        // Memanggil fungsi hitungTotalGajiTunjangan saat halaman dimuat
        window.addEventListener("load", hitungTotalGajiTunjangan);

        // Memanggil fungsi hitungTotalGajiTunjangan saat nilai input berubah
        var inputElements = document.getElementsByClassName("form-control");
        for (var i = 0; i < inputElements.length; i++) {
            inputElements[i].addEventListener("input", hitungTotalGajiTunjangan);
        }
    </script>

    {{-- ini untuk total pendapatan bruto --}}
    <script>
        // Fungsi untuk menghitung total pendapatan
        function hitungTotalPendapatan() {
            var totalGajiTunjangan = parseFloat(document.getElementById("total_gaji_tunjangan").value) || 0;
            var totalInsentif = parseFloat(document.getElementById("total_insentif").value) || 0;

            var totalPendapatan = totalGajiTunjangan + totalInsentif;

            // Menyimpan hasil penjumlahan pada elemen dengan id "total_pendapatan"
            document.getElementById("total_pendapatan").value = totalPendapatan;
        }

        // Memanggil fungsi hitungTotalPendapatan saat halaman dimuat
        window.addEventListener("load", hitungTotalPendapatan);

        // Memanggil fungsi hitungTotalPendapatan saat nilai input berubah
        var inputElements = document.getElementsByClassName("form-control");
        for (var i = 0; i < inputElements.length; i++) {
            inputElements[i].addEventListener("input", hitungTotalPendapatan);
        }
    </script>




    {{-- potongan alpha --}}
    <script>
        // Fungsi untuk menghitung dan menampilkan hasil di elemen dengan ID "alpha"
        function hitungAlpha() {
            var totalGaji = parseFloat(document.getElementById("total_gaji").value) || 0; // Jika NaN, maka 0
            var jumlahAlpha = parseFloat(document.getElementById("jumlah_alpha").value) || 0; // Jika NaN, maka 0
            var alpha = parseInt((totalGaji / 22) * jumlahAlpha); // Mengkonversi hasil ke angka bulat

            // Menampilkan hasil pada elemen dengan ID "alpha"
            document.getElementById("alpha").value = alpha;
        }

        // Panggil fungsi hitungAlpha saat nilai total gaji berubah
        document.getElementById("total_gaji").addEventListener("input", hitungAlpha);

        // Panggil fungsi hitungAlpha saat nilai jumlah alpha berubah
        document.getElementById("jumlah_alpha").addEventListener("input", hitungAlpha);

        // Inisialisasi perhitungan awal
        hitungAlpha();
    </script>


    {{-- total pengurangan --}}
    <script>
        // Mendapatkan elemen input nilai
        const nilaiInputs4 = document.querySelectorAll('.nilai-input4');

        // Mendapatkan elemen input total nilai
        const totalNilaiInput4 = document.querySelector('.total-nilai4');

        // Menjalankan fungsi hitungTotalNilai saat input nilai berubah
        nilaiInputs4.forEach(input => {
            input.addEventListener('input', hitungTotalNilai);
        });

        // Memanggil fungsi hitungTotalNilai untuk menginisiasi total nilai
        hitungTotalNilai();

        // Menghitung total nilai
        function hitungTotalNilai() {
            let totalNilai = 0;

            // Meloopi setiap input nilai dan menjumlahkannya
            nilaiInputs4.forEach(input => {
                const nilai = parseFloat(input.value) || 0;
                totalNilai += nilai;
            });

            // Mengatur nilai total pada input total nilai
            totalNilaiInput4.value = totalNilai;
        }
    </script>

    {{-- total gaji bersih --}}
    <script>
        // Mendapatkan elemen input total_pendapatan, total_pengurangan, dan total_gaji_bersih
        const totalPendapatanInput = document.getElementById('total_pendapatan');
        const totalPenguranganInput = document.getElementById('total_pengurangan');
        const totalGajiBersihInput = document.getElementById('total_gaji_bersih');

        // Menambahkan event listener untuk menghitung total gaji bersih saat nilai input berubah
        totalPendapatanInput.addEventListener('input', hitungTotalGajiBersih);
        totalPenguranganInput.addEventListener('input', hitungTotalGajiBersih);

        // Fungsi untuk menghitung total gaji bersih
        function hitungTotalGajiBersih() {
            const totalPendapatan = parseFloat(totalPendapatanInput.value) || 0;
            const totalPengurangan = parseFloat(totalPenguranganInput.value) || 0;
            const totalGajiBersih = totalPendapatan - totalPengurangan;

            // Menampilkan hasil pada input total_gaji_bersih
            totalGajiBersihInput.value = totalGajiBersih;
        }

        // Panggil fungsi hitungTotalGajiBersih saat halaman dimuat
        window.addEventListener('load', hitungTotalGajiBersih);
    </script>
@endsection
