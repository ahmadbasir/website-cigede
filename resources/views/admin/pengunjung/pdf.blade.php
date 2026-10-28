<!DOCTYPE html>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Data Pengunjung</title>


<style>
    body {
        font-family: DejaVu Sans, sans-serif;
        font-size: 12px;
    }

    h2 {
        text-align: center;
        margin-bottom: 5px;
    }

    p {
        text-align: center;
        margin: 2px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table, th, td {
        border: 1px solid #000;
    }

    th, td {
        padding: 8px;
        text-align: center;
    }

    th {
        background-color: #f2f2f2;
    }

    .footer {
        margin-top: 20px;
        text-align: right;
        font-size: 11px;
    }
</style>


</head>

<body>
<h2>Laporan Data Pengunjung</h2>
<p><strong>Mata Air Cigede</strong></p>

<p>
    Periode:
    @if($filter == 'mingguan')
        Mingguan
    @elseif($filter == 'bulanan')
        Bulanan
    @else
        Tahunan
    @endif
</p>

<p>Tanggal Cetak: {{ now()->format('d F Y') }}</p>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Nomor HP</th>
            <th>Asal Daerah</th>
            <th>Tanggal Kunjungan</th>
        </tr>
    </thead>

    <tbody>
        @forelse($pengunjung as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->nomor_hp }}</td>
                <td>{{ $item->asal_daerah }}</td>
                <td>{{ \Carbon\Carbon::parse($item->tanggal_kunjungan)->format('d-m-Y') }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="5">Tidak ada data pengunjung</td>
            </tr>
        @endforelse
    </tbody>
</table>

<div class="footer">
    Dicetak oleh Sistem Informasi Mata Air Cigede
</div>

</body>
</html>
