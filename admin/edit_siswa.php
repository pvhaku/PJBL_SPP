<?php
include 'siswa_aksi.php';
session_start();

if (!isset($_GET['nisn'])) {
    header('Location: ../siswa.php');
    exit;
}

$nisn = $_GET['nisn'];
$siswa = getSiswaById($nisn);

if (!$siswa) {
    echo "Data siswa tidak ditemukan.";
    exit;
}

if (isset($_POST['update'])) {
    updateSiswa($_POST['nis'], $_POST['nama'], $_POST['id_kelas'], $_POST['id_spp'], $nisn);
    header('Location: ../siswa.php?success=update');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Siswa</title>
    <link href="../../output.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100">
<div class="container mx-auto my-5 p-5 bg-white rounded shadow-md">
    <h1 class="text-2xl font-bold mb-4">Edit Siswa</h1>
    <form action="" method="POST">
        <input type="hidden" name="nisn" value="<?= htmlspecialchars($nisn); ?>" />
        <div class="mb-3">
            <label class="block font-semibold">Nis</label>
            <input type="text" name="nis" value="<?= htmlspecialchars($siswa['nis']); ?>" class="w-full px-4 py-2 border rounded" required>
        </div>
        <div class="mb-3">
            <label class="block font-semibold">Nama Siswa</label>
            <input type="text" name="nama" value="<?= htmlspecialchars($siswa['nama']); ?>" class="w-full px-4 py-2 border rounded" required>
        </div>
        <div class="mb-3">
            <label class="block font-semibold">Kelas</label>
            <input type="text" name="id_kelas" value="<?= htmlspecialchars($siswa['id_kelas']); ?>" class="w-full px-4 py-2 border rounded" required>
        </div>
        <div class="mb-3">
            <label class="block font-semibold">ID Spp</label>
            <input type="text" name="id_spp" value="<?= htmlspecialchars($siswa['id_spp']); ?>" class="w-full px-4 py-2 border rounded" required>
        </div>
        <div class="flex justify-end">
            <a href="/php-front/admin/siswa.php" class="mr-3 px-4 py-2 bg-gray-300 rounded">Batal</a>
            <button type="submit" name="update" class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
        </div>
    </form>
</div>
</body>
</html>
