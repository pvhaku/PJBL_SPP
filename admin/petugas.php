<?php
include "petugas_aksi.php";
session_start();


$username =$_SESSION['username'];


if (isset($_POST['create'])) {
    createPetugas($_POST['id_petugas'], $_POST['nama_petugas'], $_POST['password']);
    header("Location: petugas.php?success=create");
    exit;
}

if (isset($_POST['update'])) {
    updatePetugas($_POST['id_petugas'], $_POST['nama_petugas']);
    header("Location: petugas.php?success=update");
    exit;
}

if (isset($_GET['delete'])) {
    deletePetugas($_GET['delete']);
    header("Location: petugas.php?success=delete");
    exit;
}

$petugas = $_GET['edit'] ?? null;

if ($petugas) {
    $petugasToEdit = getPetugasById($petugas);
}

$petugasData = getAllData();

if (isset($_GET['success'])) {
    switch ($_GET['success']) {
        case 'create':
            $successMessage = " Data petugas berhasil ditambahkan.";
            break;
        case 'update':
            $successMessage = "Data petugas berhasil diperbarui.";
            break;
        case 'delete':
            $successMessage = " Data petugas berhasil dihapus.";
            break;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Daftar Petugas</title>
    <link href="../output.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>


<body class="bg-gray-100">
<?php
include '../componen/navbar.php';
?>

<h1 class="text-2xl font-medium py-3 px-7">WELKAM ADMIN DASHBOARD</h1>
<h2 class="text-md font-medium text-cyan-700 px-15">Anda login sebagai Admin</h2>

<section class="flex justify-center mt-4">
  <div class="grid grid-cols-3 gap-20">
    <div class="bg-white text-black flex flex-col justify-center items-center rounded-md border py-6 px-10 shadow-md font-bold">
      <p>Jumlah siswa</p>
      <p>1</p>
    </div>
    <div class="bg-white text-black flex flex-col justify-center items-center rounded-md border py-6 px-10 shadow-md font-bold">
      <p>Jumlah petugas</p>
      <p>1</p>
    </div>
    <div class="bg-white text-black flex flex-col justify-center items-center rounded-md border py-6 px-10 shadow-md font-bold">
      <p>Total pembayaran bulan ini</p>
      <p>1</p>
    </div>
  </div>
</section>


<div class="container mx-auto  my-5 p-5 bg-white rounded shadow-md">
<div class="flex justify-between mb-4 ">

    <h1 class="text-3xl font-bold mb-5">Daftar petugas</h1>
   

</div>

<!-- ✅ ALERT -->
<?php if (!empty($successMessage)): ?>
    <div class="mb-5 px-4 py-2 bg-green-100 text-green-800 rounded border border-green-300">
        <?= $successMessage; ?>
    </div>
<?php endif; ?>

<!-- ✅ FORM -->
<?php if (isset($petugasToEdit)): ?>
    <form action="" method="POST" class="mb-5">
        <input type="hidden" name="id_petugas" value="<?= $petugasToEdit['id_petugas']; ?>">
        <div class="flex mb-3">
            <input type="text" name="id_petugas" value="<?= htmlspecialchars($petugasToEdit['id_petugas']); ?>" class="px-4 py-2 w-1/2 border rounded" required>
            <input type="text" name="nama_petugas" value="<?= htmlspecialchars($petugasToEdit['nama_petugas']); ?>" class="px-4 py-2 w-1/2 ml-2 border rounded" required>
            <button type="submit" name="update" class="ml-2 px-4 py-2 bg-red-600 text-white rounded">Update siswa</button>
        </div>
    </form>
<?php else: ?>
    <form action="" method="POST" class="mb-5 flex">
        <div class="flex justify-between">
        <a href="/php-front/admin/TambahPetugas/index.php" type="button" class="bg-blue-600 cursor-pointer rounded-md text-white px-4 py-2 hover:bg-blue-300">Tambah Petugas</a>
        </div> 
        <!-- <div class="flex mb-3">
            <input type="text" name="Nis" class="px-4 py-2 w-1/2 border rounded" placeholder="Nis" required>
            <input type="text" name="kompetensi_keahlian" class="px-4 py-2 w-1/2 ml-2 border rounded" placeholder="Kompetensi Keahlian" required>
            <button type="submit" name="create" class="ml-2 px-4 py-2 bg-blue-500 text-white rounded ">Tambah Kelas</button>
        </div> -->
    </form>
<?php endif; ?>

<!-- ✅ TABLE -->
<?php if (empty($petugasData)): ?>
    <p>Tidak ada data petugas ditemukan.</p>
<?php else: ?>
    <table class="min-w-full table-auto border-collapse">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2">ID Petugas</th>
                <th class="px-4 py-2">Nama Petugas</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            

        <h1><?=htmlspecialchars( $username)?></h1>

        <form action="aksi_logout.php" method="POST">
    
            <?php foreach ($petugasData as $petugas): ?>
                <tr class="border-t">
                    <td class="px-4 py-2"><?= htmlspecialchars($petugas['id_petugas']); ?></td>
                    <td class="px-4 py-2"><?= htmlspecialchars($petugas['username']); ?></td>
                    <td class="px-4 py-2">
                    <a href="edit_petugas.php?id_petugas=<?= $petugas['id_petugas']; ?>" class="text-blue-500 hover:underline">Edit</a>


                        <a href="petugas.php?delete=<?= $petugas['id_petugas']; ?>"
                           onclick="return confirm('Yakin ingin menghapus data ini?')"
                           class="text-red-500 hover:underline">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </form>
        </tbody>
    </table>

<?php endif; ?>
</div>

</body>

</html>
