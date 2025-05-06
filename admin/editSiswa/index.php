<?php
include '../siswa_aksi.php';

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
    updateSiswa($_POST['nis'], $_POST['nama'], $_POST['kelas'], $_POST['password']);
    header('Location: ../siswa.php?success=update');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit siswa</title>
    <link href="../../output.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
<div class="container mx-auto my-5 p-5 bg-white rounded shadow-md">
    <h1 class="text-2xl font-bold mb-4">Edit Siswa</h1>
    <form action="" method="POST">
        <input type="hidden" name="nis" value="<?= $siswa['nisn']; ?>">
        <div class="mb-3">
            <label class="block font-semibold">Nama siswa</label>
            <input type="text" name="nama" value="<?= htmlspecialchars($siswa['nama']); ?>" class="w-full px-4 py-2 border rounded" required>
        </div>
        <div class="mb-3">
            <label class="block font-semibold">Kelas</label>
            <input type="text" name="kelas" value="<?= htmlspecialchars($siswa['kelas']); ?>" class="w-full px-4 py-2 border rounded" required>
        </div>
        <div class="flex justify-end">
            <a href="../siswa.php" class="mr-3 px-4 py-2 bg-gray-300 rounded">Batal</a>
            <button type="submit" name="update" class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
        </div>
    </form>
</div>
</body>
</html>
