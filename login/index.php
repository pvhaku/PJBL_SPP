<?php
include  'login/aksi.php';

$kelasData = getAllData();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="../output.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <div class="container mx-auto my-5 p-5 bg-white rounded shadow-md">
        <h1 class="text-3xl font-bold mb-5">Daftar Kelas</h1>

        <?php if (empty($kelasData)): ?>
            <p>Tidak ada data kelas ditemukan.</p>
        <?php else: ?>
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2">ID Kelas</th>
                        <th class="px-4 py-2">Nama Kelas</th>
                        <th class="px-4 py-2">Kompetensi Keahlian</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($kelasData as $kelas): ?>
                        <tr>
                            <td class="px-4 py-2"><?= htmlspecialchars($kelas['id_kelas']); ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($kelas['nama_kelas']); ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($kelas['kompetensi_keahlian']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

</body>
</html>
