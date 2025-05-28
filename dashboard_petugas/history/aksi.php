<?php
include __DIR__ . '../../../database.php';
$conn = getDatabaseConnection();
$stmt = $conn->query("SELECT nisn, nama FROM siswa");
$siswaList = $stmt->fetchAll(PDO::FETCH_ASSOC);


function getAllData($search = '') {
    $conn = getDatabaseConnection();
    
    $sql = "SELECT * FROM pembayaran
            JOIN petugas ON pembayaran.id_petugas = petugas.id_petugas
            JOIN siswa ON pembayaran.nisn = siswa.nisn
            JOIN spp ON pembayaran.id_spp = spp.id_spp";

    if (!empty($search)) {
        $sql .= " WHERE siswa.nama LIKE :search OR siswa.nis LIKE :search";
    }

    $sql .= " ORDER BY id_pembayaran DESC";

    $stmt = $conn->prepare($sql);

    if (!empty($search)) {
        $likeSearch = '%' . $search . '%';
        $stmt->bindParam(':search', $likeSearch);
    }

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function getTransaksiById($id_pembayaran) {
    $conn = getDatabaseConnection();
    $sql = "SELECT * FROM pembayaran,petugas,siswa,spp WHERE pembayaran.id_petugas= petugas.id_petugas and pembayaran.nisn = siswa.nisn and pembayaran.id_spp = spp.id_spp and id_pembayaran = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_pembayaran]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
    header("Location: /php-front/dashboard_petugas/history/detail.php");
    exit;

}

function updateTransaksi($id_pembayaran, $nisn, $tgl_bayar, $jumlah_bayar, $status) {
    $conn = getDatabaseConnection();

    if (!isset($_SESSION['id_petugas'])) {
        die("ID Petugas tidak ditemukan di session.");
    }
    $id_petugas = $_SESSION['id_petugas'];

    $stmtSpp = $conn->prepare("SELECT id_spp FROM siswa WHERE nisn = ?");
    $stmtSpp->execute([$nisn]);
    $sppData = $stmtSpp->fetch(PDO::FETCH_ASSOC);

    if (!$sppData) {
        die("Data SPP tidak ditemukan untuk NISN tersebut.");
    }

    $id_spp = $sppData['id_spp'];

    $tanggal = new DateTime($tgl_bayar);
    $bulan_dibayar = $tanggal->format('m'); 
    $tahun_dibayar = $tanggal->format('Y');

    $sql = "UPDATE  pembayaran SET
        id_petugas = ?, nisn = ?, tgl_bayar = ?, bulan_dibayar = ?, tahun_dibayar = ?, id_spp = ?, jumlah_bayar = ?, status = ?
         WHERE id_pembayaran = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        $id_petugas,
        $nisn,
        $tgl_bayar,
        $bulan_dibayar,
        $tahun_dibayar,
        $id_spp,
        $jumlah_bayar,
        $status,
        $id_pembayaran
    ]);

    header("Location: /php-front/dashboard_petugas/history/index.php");
    exit;
}

function deletePembayaran($id_pembayaran) {
    $conn = getDatabaseConnection();
    $sql = "DELETE FROM pembayaran WHERE id_pembayaran = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_pembayaran]);
    header("Location: /php-front/dashboard_petugas/history/index.php");
    exit;
}

 
?>