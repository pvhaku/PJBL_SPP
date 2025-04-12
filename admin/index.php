<?php
include 'aksi.php';

$successMessage = '';

if (isset($_POST['create'])) {
    createKelas($_POST['nama_kelas'], $_POST['kompetensi_keahlian']);
    header("Location: index.php?success=create");
    exit;
}

if (isset($_POST['update'])) {
    updateKelas($_POST['id_kelas'], $_POST['nama_kelas'], $_POST['kompetensi_keahlian']);
    header("Location: index.php?success=update");
    exit;
}

if (isset($_GET['delete'])) {
    deleteKelas($_GET['delete']);
    header("Location: index.php?success=delete");
    exit;
}

$id = $_GET['edit'] ?? null;

if ($id) {
    $kelasToEdit = getKelasById($id);
}

$kelasData = getAllData();

if (isset($_GET['success'])) {
    switch ($_GET['success']) {
        case 'create':
            $successMessage = " Data kelas berhasil ditambahkan.";
            break;
        case 'update':
            $successMessage = "Data kelas berhasil diperbarui.";
            break;
        case 'delete':
            $successMessage = " Data kelas berhasil dihapus.";
            break;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Daftar Kelas</title>
    <link href="../output.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

<div class="container mx-auto my-5 p-5 bg-white rounded shadow-md">

<h1 class="text-3xl font-bold mb-5">Daftar Kelas</h1>

<!-- ✅ ALERT -->
<?php if (!empty($successMessage)): ?>
    <div class="mb-5 px-4 py-2 bg-green-100 text-green-800 rounded border border-green-300">
        <?= $successMessage; ?>
    </div>
<?php endif; ?>

<!-- ✅ FORM -->
<?php if (isset($kelasToEdit)): ?>
    <form action="" method="POST" class="mb-5">
        <input type="hidden" name="id_kelas" value="<?= $kelasToEdit['id_kelas']; ?>">
        <div class="flex mb-3">
            <input type="text" name="nama_kelas" value="<?= htmlspecialchars($kelasToEdit['nama_kelas']); ?>" class="px-4 py-2 w-1/2 border rounded" required>
            <input type="text" name="kompetensi_keahlian" value="<?= htmlspecialchars($kelasToEdit['kompetensi_keahlian']); ?>" class="px-4 py-2 w-1/2 ml-2 border rounded" required>
            <button type="submit" name="update" class="ml-2 px-4 py-2 bg-red-600 text-white rounded">Update Kelas</button>
        </div>
    </form>
<?php else: ?>
    <form action="" method="POST" class="mb-5">
        <div class="flex mb-3">
            <input type="text" name="nama_kelas" class="px-4 py-2 w-1/2 border rounded" placeholder="Nama Kelas" required>
            <input type="text" name="kompetensi_keahlian" class="px-4 py-2 w-1/2 ml-2 border rounded" placeholder="Kompetensi Keahlian" required>
            <button type="submit" name="create" class="ml-2 px-4 py-2 bg-blue-500 text-white rounded">Tambah Kelas</button>
        </div>
    </form>
<?php endif; ?>

<!-- ✅ TABLE -->
<?php if (empty($kelasData)): ?>
    <p>Tidak ada data kelas ditemukan.</p>
<?php else: ?>
    <table class="min-w-full table-auto border-collapse">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2">ID Kelas</th>
                <th class="px-4 py-2">Nama Kelas</th>
                <th class="px-4 py-2">Kompetensi Keahlian</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($kelasData as $kelas): ?>
                <tr class="border-t">
                    <td class="px-4 py-2"><?= htmlspecialchars($kelas['id_kelas']); ?></td>
                    <td class="px-4 py-2"><?= htmlspecialchars($kelas['nama_kelas']); ?></td>
                    <td class="px-4 py-2"><?= htmlspecialchars($kelas['kompetensi_keahlian']); ?></td>
                    <td class="px-4 py-2">
                    <a href="edit/index.php?id=<?= $kelas['id_kelas']; ?>" class="text-blue-500 hover:underline">Edit</a>


                        <a href="index.php?delete=<?= $kelas['id_kelas']; ?>"
                           onclick="return confirm('Yakin ingin menghapus data ini?')"
                           class="text-red-500 hover:underline">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<?php endif; ?>
</div>

</body>

</html>
