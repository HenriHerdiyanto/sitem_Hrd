<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Slip Gaji</title>
    <style>
        .head {
            width: 150px;
        }

        .space {
            margin-top: 70px;
        }

        table.table-borderless th,
        table.table-borderless td {
            padding: 0;
            margin: 0;
        }

        @media print {
            @page {
                size: A4 landscape;
                margin: 0;
            }

            body {
                margin: 1cm 0;
            }

            table.table-borderless th,
            table.table-borderless td {
                padding: 0;
                margin: 0;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h3 class="">PT. MYTAX INDONESIA</h3>

                <small class="">RUKO PARIS, GOLF LAKE RESIDENCE Blk. A No.58, Cengkareng Timur, Cengkareng 11730
                </small>

            </div>
            <div class="col">
                <h3 class="">PAY SLIP</h3>
                <p class="text-nowrap mb-0">Periode: 01-01-2021 s/d 31-01-2021</p>
            </div>
        </div>
        <hr class="">
        <div class="row">
            <div class="col">
                <table class="table table-borderless">
                    <tr class="hd">
                        <th class="head">NIP</th>
                        <td>: {{ $payroll->user->nomor_induk }}</td>
                    </tr>
                    <tr class="hd">
                        <th class="head">Name</th>
                        <td>: {{ $payroll->user->name }}</td>
                    </tr>
                    <tr class="hd">
                        <th class="head">Status</th>
                        <td>: {{ $payroll->user->status_ptkp }}</td>
                    </tr>
                </table>
            </div>
            <div class="col">
                <table class="table table-borderless">
                    <tr class="hd">
                        <th class="head">Department</th>
                        @if ($payroll->user->divisi)
                            <td>: {{ $payroll->user->divisi->nama_divisi }}</td>
                        @else
                            <td>: Belum Ada Divisi</td>
                        @endif
                    </tr>
                    <tr class="hd">
                        <th class="head">Section</th>
                        <td>: </td>
                    </tr>
                    <tr class="hd">
                        <th class="head">Title</th>
                        <td>: {{ $payroll->user->type }}</td>
                    </tr>
                </table>
            </div>
            <div class="col">
                <table class="table table-borderless">
                    <tr>
                        <th class="head">Payment Method</th>
                        <td>: Transfer Bank</td>
                    </tr>
                    <tr>
                        <th class="head">Bank Name</th>
                        <td>: BCA</td>
                    </tr>
                    <tr>
                        <th class="head">Bank Account</th>
                        <td>: 3920470999</td>
                    </tr>
                </table>
            </div>
            <hr>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-borderless">
                    <tr>
                        <th class="mb-0 pb-0">Earnings</th>
                        <th class="mb-0 pb-0 text-end">Amount</th>
                    </tr>
                    @if ($payroll->gaji_pokok != 0)
                        <tr style="border-top: 1px solid black;">
                            <td class="mb-0 pb-0">Basic Salary</td>
                            <td class="text-end mb-0 pb-0">
                                {{ number_format($payroll->gaji_pokok) }}
                            </td>
                        </tr>
                    @endif
                    @if ($payroll->tunjangan_jabatan != 0)
                        <tr style="border-top: 1px solid black;">
                            <td class="mb-0 pb-0">Tunjangan Jabatan</td>
                            <td class="text-end mb-0 pb-0">
                                {{ number_format($payroll->tunjangan_jabatan) }}
                            </td>
                        </tr>
                    @endif
                    @if ($payroll->tunjangan_pulsa != 0)
                        <tr style="border-top: 1px solid black;">
                            <td class="mb-0 pb-0">Tunjangan Pulsa</td>
                            <td class="text-end mb-0 pb-0">
                                {{ number_format($payroll->tunjangan_pulsa) }}
                            </td>
                        </tr>
                    @endif
                    @if ($payroll->tunjangan_pendidikan != 0)
                        <tr style="border-top: 1px solid black;">
                            <td class="mb-0 pb-0">Tunjangan Pendidikan</td>
                            <td class="text-end mb-0 pb-0">
                                {{ number_format($payroll->tunjangan_pendidikan) }}
                            </td>
                        </tr>
                    @endif
                    @if ($payroll->uang_makan != 0)
                        <tr style="border-top: 1px solid black;">
                            <td class="mb-0 pb-0">Tunjangan Uang Makan</td>
                            <td class="text-end mb-0 pb-0">
                                {{ number_format($payroll->uang_makan) }}
                            </td>
                        </tr>
                    @endif
                    @if ($payroll->uang_transport != 0)
                        <tr style="border-top: 1px solid black;">
                            <td class="mb-0 pb-0">Tunjangan Uang Transport</td>
                            <td class="text-end mb-0 pb-0">
                                {{ number_format($payroll->uang_transport) }}
                            </td>
                        </tr>
                    @endif
                    @if ($payroll->lembur != 0)
                        <tr style="border-top: 1px solid black;">
                            <td class="mb-0 pb-0">Lembur</td>
                            <td class="text-end mb-0 pb-0">
                                {{ number_format($payroll->lembur) }}
                            </td>
                        </tr>
                    @endif
                    @if ($payroll->dinas != 0)
                        <tr style="border-top: 1px solid black;">
                            <td class="mb-0 pb-0">Dinas</td>
                            <td class="text-end mb-0 pb-0">
                                {{ number_format($payroll->dinas) }}
                            </td>
                        </tr>
                    @endif
                    @if ($payroll->cuti != 0)
                        <tr style="border-top: 1px solid black;">
                            <td class="mb-0 pb-0">Cuti Tahunan</td>
                            <td class="text-end mb-0 pb-0">
                                {{ number_format($payroll->cuti) }}
                            </td>
                        </tr>
                    @endif
                    @if ($payroll->thr != 0)
                        <tr style="border-top: 1px solid black;">
                            <td class="mb-0 pb-0">Thr</td>
                            <td class="text-end mb-0 pb-0">
                                {{ number_format($payroll->thr) }}
                            </td>
                        </tr>
                    @endif
                </table>
            </div>
            <div class="col">
                <table class="table table-borderless">
                    <tr>
                        <th class="mb-0 pb-0">Deductions</th>
                        <th class="mb-0 pb-0 text-end">Amount</th>
                    </tr>
                    @if ($payroll->terlambat != 0)
                        <tr style="border-top: 1px solid black;">
                            <td class="mb-0 pb-0">Terlambat</td>
                            <td class="text-end mb-0 pb-0">
                                {{ number_format($payroll->terlambat) }}
                            </td>
                        </tr>
                    @endif
                    @if ($payroll->cuti_bersama != 0)
                        <tr style="border-top: 1px solid black;">
                            <td class="mb-0 pb-0">Cuti Bersama</td>
                            <td class="text-end mb-0 pb-0">
                                {{ number_format($payroll->cuti_bersama) }}
                            </td>
                        </tr>
                    @endif
                    @if ($payroll->izin != 0)
                        <tr style="border-top: 1px solid black;">
                            <td class="mb-0 pb-0">Izin</td>
                            <td class="text-end mb-0 pb-0">
                                {{ number_format($payroll->izin) }}
                            </td>
                        </tr>
                    @endif
                    @if ($payroll->sakit != 0)
                        <tr style="border-top: 1px solid black;">
                            <td class="mb-0 pb-0">Sakit</td>
                            <td class="text-end mb-0 pb-0">
                                {{ number_format($payroll->sakit) }}
                            </td>
                        </tr>
                    @endif
                    @if ($payroll->alpha != 0)
                        <tr style="border-top: 1px solid black;">
                            <td class="mb-0 pb-0">Potongan Alpha</td>
                            <td class="text-end mb-0 pb-0">
                                {{ number_format($payroll->alpha) }}
                            </td>
                        </tr>
                    @endif
                    @if ($payroll->pinjaman != 0)
                        <tr style="border-top: 1px solid black;">
                            <td class="mb-0 pb-0">Pinjaman</td>
                            <td class="text-end mb-0 pb-0">
                                {{ number_format($payroll->pinjaman) }}
                            </td>
                        </tr>
                    @endif
                    @if ($payroll->bpjs_karyawan != 0)
                        <tr style="border-top: 1px solid black;">
                            <td class="mb-0 pb-0">BPJS KESEHATAN 1%</td>
                            <td class="text-end mb-0 pb-0">
                                {{ number_format($payroll->bpjs_karyawan) }}
                            </td>
                        </tr>
                    @endif
                    <tr style="border-top: 1px solid black;">
                        <td class="mb-0 pb-0">BPJS KETENAGA KERJAAN 2%</td>
                        <td class="text-end mb-0 pb-0">
                            @if ($payroll->ditanggung_karyawan != 0)
                                {{ number_format($payroll->ditanggung_karyawan) }}
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <table class="table table-borderless">
                    <tr style="border-bottom: 1px solid black;">
                        <td class="my-0 py-0">Tunjangan PPh 21</td>
                        <td class="my-0 py-0 text-end">{{ number_format($payroll->tunjanganpph21) }}</td>
                    </tr>
                    <tr>
                        <th class="">Total</th>
                        <th class="text-end">Rp. {{ number_format($payroll->total_gaji) }}</th>
                    </tr>
                </table>
            </div>
            <div class="col">
                <table class="table table-borderless">
                    <tr style="border-bottom: 1px solid black;">
                        <td class="my-0 py-0">Potongan PPh 21</td>
                        <td class="my-0 py-0 text-end">{{ number_format($payroll->potonganpph21) }}</td>
                    </tr>
                    <tr>
                        <th>Total</th>
                        <th class="text-end">Rp. {{ number_format($payroll->total_pengurangan) }}</th>
                    </tr>
                </table>
            </div>
        </div>
        <hr class="m-0 p-0">
        <div class="row">
            <div class="col pt-0 ml-0">
                <table class="table table-borderless">
                    <tr>
                        {{-- <td>Net Pay : 20.000.000</td> --}}
                        <td>Total Gaji Bersih : <b>Rp. {{ number_format($payroll->total_gaji_bersih) }}</b></td>
                        <td class="text-end">Payroll Date : {{ $payroll->created_at->format('d F Y') }}</td>
                        {{-- <td>Payroll Date : 31-Jan-2024</td> --}}
                    </tr>
                </table>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-5">
                <div>
                    <p class=""><b>HRD Manager</b></p>
                    <div class="space"></div>
                    <p class="mt-5">{{ $user->name }}</p>
                </div>

            </div>
            <div class="col">
                <div>
                    <p class="text-end"><b>Employee</b></p>
                    <div class="space"></div>
                    <p class="mt-5 text-end">Merry Yao</p>
                </div>

            </div>
        </div>

        <div class="row mt-2">
            <div class="col">
                <p>Generated By <a href="https://mytax.co.id">MYTAX INDONESIA</a></p>
                <p>Generate Time : {{ $payroll->created_at }}</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        window.print();
    </script>
</body>

</html>
