<?php
include "siswa_aksi.php";
session_start();


$username =$_SESSION['username'];


if (isset($_POST['create'])) {
    createSiswa($_POST['nis'], $_POST['nama'], $_POST['kelas'], $_POST['password']);
    header("Location: siswa.php?success=create");
    exit;
}

if (isset($_POST['update'])) {
    updateSiswa($_POST['nis'], $_POST['nama'], $_POST['kelas'], $_POST['password']);
    header("Location: siswa.php?success=update");
    exit;
}

if (isset($_GET['delete'])) {
    deleteSiswa($_GET['delete']);
    header("Location: siswa.php?success=delete");
    exit;
}



$nisn = $_GET['edit'] ?? null;

if ($nisn) {
    $siswaToEdit = getSiswaById($nisn);
}

$siswaData = getAllData();

if (isset($_GET['success'])) {
    switch ($_GET['success']) {
        case 'create':
            $successMessage = " Data siswa berhasil ditambahkan.";
            break;
        case 'update':
            $successMessage = "Data siswa berhasil diperbarui.";
            break;
        case 'delete':
            $successMessage = " Data siswa berhasil dihapus.";
            break;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Daftar Siswa</title>
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

    <h1 class="text-3xl font-bold mb-5">Daftar siswa</h1>
   

</div>

<!-- ✅ ALERT -->
<?php if (!empty($successMessage)): ?>
    <div class="mb-5 px-4 py-2 bg-green-100 text-green-800 rounded border border-green-300">
        <?= $successMessage; ?>
    </div>
<?php endif; ?>

<!-- ✅ FORM -->
<?php if (isset($siswaToEdit)): ?>
    <form action="" method="POST" class="mb-5">
        <input type="hidden" name="nisn" value="<?= $siswaToEdit['nisn']; ?>">
        <div class="flex mb-3">
            <input type="text" name="nis" value="<?= htmlspecialchars($siswaToEdit['nis']); ?>" class="px-4 py-2 w-1/2 border rounded" required>
            <input type="text" name="nama" value="<?= htmlspecialchars($siswaToEdit['nama']); ?>" class="px-4 py-2 w-1/2 ml-2 border rounded" required>
            <input type="text" name="nis" value="<?= htmlspecialchars($siswaToEdit['kelas']); ?>" class="px-4 py-2 w-1/2 border rounded" required>
            <input type="text" name="nama" value="<?= htmlspecialchars($siswaToEdit['password']); ?>" class="px-4 py-2 w-1/2 ml-2 border rounded" required>
            <button type="submit" name="update" class="ml-2 px-4 py-2 bg-red-600 text-white rounded">Update siswa</button>
        </div>
    </form>
<?php else: ?>
    <form action="" method="POST" class="mb-5 flex">
        <div class="flex justify-between">
        <a href="/php-front/admin/tambahSiswa/index.php" type="button" class="bg-blue-600 cursor-pointer rounded-md text-white px-4 py-2 hover:bg-blue-300">Tambah Siswa</a>
        </div> 
        <!-- <div class="flex mb-3">
            <input type="text" name="Nis" class="px-4 py-2 w-1/2 border rounded" placeholder="Nis" required>
            <input type="text" name="kompetensi_keahlian" class="px-4 py-2 w-1/2 ml-2 border rounded" placeholder="Kompetensi Keahlian" required>
            <button type="submit" name="create" class="ml-2 px-4 py-2 bg-blue-500 text-white rounded ">Tambah Kelas</button>
        </div> -->
    </form>
<?php endif; ?>

<!-- ✅ TABLE -->
<?php if (empty($siswaData)): ?>
    <p>Tidak ada data siswa ditemukan.</p>
<?php else: ?>
    <table class="min-w-full table-auto border-collapse">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2">Nisn</th>
                <th class="px-4 py-2">Nama siswa</th>
                <th class="px-4 py-2">Kelas</th>
                <th class="px-4 py-2">Password</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            

        <h1><?=htmlspecialchars( $username)?></h1>

        <form action="aksi_logout.php" method="POST">

            <?php foreach ($siswaData as $siswa): ?>
                <tr class="border-t">
                    <td class="px-4 py-2"><?= htmlspecialchars($siswa['nisn']); ?></td>
                    <td class="px-4 py-2"><?= htmlspecialchars($siswa['nama']); ?></td>
                    <td class="px-4 py-2"><?= htmlspecialchars($siswa['id_kelas']); ?></td>
                    <td class="px-4 py-2"><?= htmlspecialchars($siswa['password']); ?></td>
                    <td class="px-4 py-2">
                    <a href="edit_siswa.php?nisn=<?= $siswa['nisn']; ?>" class="text-blue-500 hover:underline">Edit</a>


                        <a href="siswa.php?delete=<?= $siswa['nisn']; ?>"
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
