<?php
include "laporan_aksi.php";

$bulan = isset($_GET['bulan']) ? $_GET['bulan'] : null;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 5;
$offset = ($page - 1) * $limit;

$pembayaran = getPembayaranByTanggal($bulan, $limit, $offset);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cetak Laporan Pembayaran</title>
    <link href="../output.css" rel="stylesheet">
    <style>
        @media print {
            body {
                margin: 0;
                padding: 0;
            }
        }
    </style>
</head>
<body onload="window.print()">
    <h1 class="text-2xl font-bold text-center mt-5">Laporan Pembayaran</h1>
    <table class="min-w-full table-auto border-collapse mt-5">
        <thead>
            <tr class="bg-gray-200 ">
                <th class="px-4 py-2">NO</th>
                <th class="px-4 py-2">NIS</th>
                <th class="px-4 py-2">Nama Siswa</th>
                <th class="px-4 py-2">Tanggal Bayar</th>
                <th class="px-4 py-2">Jumlah Bayar</th>
                <th class="px-4 py-2">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($pembayaran as $laporan): ?>
                <tr class="border-t justify-center items-center">
                    <td class="px-4 py-2"><?= $no++ ?></td>
                    <td class="px-4 py-2"><?= htmlspecialchars($laporan['nis']); ?></td>
                    <td class="px-4 py-2"><?= htmlspecialchars($laporan['nama']); ?></td>
                    <td class="px-4 py-2"><?= htmlspecialchars($laporan['tgl_bayar']); ?></td>
                    <td class="px-4 py-2"><?= htmlspecialchars($laporan['jumlah_bayar']); ?></td>
                    <td class="px-4 py-2"><?= htmlspecialchars($laporan['status']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
