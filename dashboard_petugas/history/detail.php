<?php
include 'aksi.php';
include '../../componen/navbar_petugas.php';


if (!isset($_GET['id_pembayaran'])) {
    header('Location: ../index.php');
    exit;
}

$id = $_GET['id_pembayaran'];
$laporan = getTransaksiById($id);

if (!$laporan) {
    echo "Data kelas tidak ditemukan.";
    exit;
}

// if (isset($_POST['update'])) {
//     updateKelas($_POST['id_kelas'], $_POST['nama_kelas'], $_POST['kompetensi_keahlian']);
//     header('Location: ../index.php?success=update');
//     exit;
// }

if (isset($_GET['delete'])) {
    deletePembayaran($_GET['delete']);
    header("Location: ../php-front/admin/kelas/index.php?success=delete");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Edit</title>
    <link href="../output.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>


<body class="bg-gray-100">
    <div class="container mx-auto my-10 p-8 bg-white rounded-xl shadow-lg max-w-xl">
        <h1 class="text-3xl font-bold mb-8 text-gray-800 border-b pb-4">Detail Pembayaran</h1>

        <div class="space-y-5">
            <div class="flex justify-between">
                <span class="font-semibold text-gray-600">ID Pembayaran</span>
                <span><?= htmlspecialchars($laporan['id_pembayaran']); ?></span>
            </div>
            <div class="flex justify-between">
                <span class="font-semibold text-gray-600">Nama Petugas</span>
                <span><?= htmlspecialchars($laporan['nama_petugas']); ?></span>
            </div>
            <div class="flex justify-between">
                <span class="font-semibold text-gray-600">NISN</span>
                <span><?= htmlspecialchars($laporan['nisn']); ?></span>
            </div>
            <div class="flex justify-between">
                <span class="font-semibold text-gray-600">NIS</span>
                <span><?= htmlspecialchars($laporan['nis']); ?></span>
            </div>
            <div class="flex justify-between">
                <span class="font-semibold text-gray-600">Tanggal Bayar</span>
                <span><?= htmlspecialchars($laporan['tgl_bayar']); ?></span>
            </div>
            <div class="flex justify-between">
                <span class="font-semibold text-gray-600">Bulan Dibayar</span>
                <span><?= htmlspecialchars($laporan['bulan_dibayar']); ?></span>
            </div>
            <div class="flex justify-between">
                <span class="font-semibold text-gray-600">Tahun Dibayar</span>
                <span><?= htmlspecialchars($laporan['tahun_dibayar']); ?></span>
            </div>
            <div class="flex justify-between">
                <span class="font-semibold text-gray-600">ID SPP</span>
                <span><?= htmlspecialchars($laporan['id_spp']); ?></span>
            </div>
            <div class="flex justify-between">
                <span class="font-semibold text-gray-600">Jumlah Bayar</span>
                <span>Rp <?= number_format($laporan['jumlah_bayar'], 0, ',', '.'); ?></span>
            </div>
            <div class="flex justify-between">
                <span class="font-semibold text-gray-600">Status</span>
                <span class="<?= $laporan['status'] == 'selesai' ? 'text-green-600' : 'text-red-600'; ?>">
                    <?= htmlspecialchars($laporan['status']); ?>
                </span>
            </div>
        </div>

        <div class="mt-10 flex gap-4">
            <a href="edit.php?id=<?= $laporan['id_pembayaran']; ?>" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">Edit</a>
            <a href="index.php?delete=<?= $laporan['id_pembayaran']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">Delete</a>
        </div>
    </div>
</body>


</html>