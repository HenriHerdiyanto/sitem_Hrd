<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Reimbursement</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4c4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        header {
            background-color: #0f65e6;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        header h1 {
            margin: 0;
        }

        header img {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th,
        td {
            border: 1px solid #dddddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #0f65e6;
            color: #fff;
        }

        .status {
            font-weight: bold;
            padding: 8px 12px;
            border-radius: 4px;
            text-align: center;
        }

        .status-warning {
            background-color: #ffc107;
            color: #333;
        }

        .status-success {
            background-color: #28a745;
            color: #fff;
        }

        p {
            margin: 20px 0;
            padding: 0 12px;
            color: #555;
        }
    </style>
</head>

<body>

    <div class="container">
        <header>
            <h1>Detail Reimbursement</h1>
            <img src="{{ asset('assets/img/logomt.png') }}" alt="Company Logo">
        </header>

        <table>
            <tr>
                <th>Nama Karyawan</th>
                <td>{{ $reimbursement->user->name }}</td>
            </tr>
            <tr>
                <th>Tanggal</th>
                <td>{{ $reimbursement->tanggal }}</td>
            </tr>
            <tr>
                <th>Keterangan</th>
                <td>{{ $reimbursement->keterangan }}</td>
            </tr>
            <tr>
                <th>Jumlah Reimbursements</th>
                <td>Rp{{ number_format($reimbursement->jumlah, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Persetujuan Atasan</th>
                <td class="status status-warning">
                    @if ($reimbursement->persetujuan_atasan == 'diproses')
                        Diproses
                    @elseif ($reimbursement->persetujuan_atasan == 'diterima')
                        Diterima
                    @endif
                </td>
            </tr>
            <tr>
                <th>Persetujuan Finance</th>
                <td class="status status-warning">
                    @if ($reimbursement->persetujuan_finance == 'diproses')
                        Diproses
                    @elseif ($reimbursement->persetujuan_finance == 'diterima')
                        Diterima
                    @endif
                </td>
            </tr>
        </table>

        <p>Catatan: serahkan ke bagian terkait agar bisa segera dicairkan.</p>
    </div>
    <script>
        window.print();
    </script>

</body>

</html>
