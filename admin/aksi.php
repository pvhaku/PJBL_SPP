<?php
include __DIR__ . '/../database.php';


function getAllData() {
    $conn = getDatabaseConnection();
    $sql = "SELECT * FROM kelas";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    exit;
}

function getKelasById($id_kelas) {
    $conn = getDatabaseConnection();
    $sql = "SELECT * FROM kelas WHERE id_kelas = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_kelas]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
    header("Location: /admin/index.php");
    exit;

}

function createKelas($nama_kelas, $kompetensi_keahlian) {
    $conn = getDatabaseConnection();
    $sql = "INSERT INTO kelas (nama_kelas, kompetensi_keahlian) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nama_kelas, $kompetensi_keahlian]);
    header("Location: /php-front/admin/index.php");
    exit;
}

function updateKelas($id_kelas, $nama_kelas, $kompetensi_keahlian) {
    $conn = getDatabaseConnection();
    $sql = "UPDATE kelas SET nama_kelas = ?, kompetensi_keahlian = ? WHERE id_kelas = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nama_kelas, $kompetensi_keahlian, $id_kelas]);
    header("Location: /php-front/admin/index.php");
    exit;
}


function deleteKelas($id_kelas) {
    $conn = getDatabaseConnection();
    $sql = "DELETE FROM kelas WHERE id_kelas = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_kelas]);
    header("Location: /php-front/admin/index.php");
    exit;
}

function countSiswa() {
    $conn = getDatabaseConnection();
    $q = "SELECT COUNT(*) AS jumlah FROM siswa";
    $stmt = $conn->prepare($q);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['jumlah'];
}


function countPetugas() {
    $conn = getDatabaseConnection();
    $q = "SELECT COUNT(*) AS jumlah FROM petugas";
    $stmt = $conn->prepare($q);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['jumlah'];
}

function countAllSpp()
{
    $conn = getDatabaseConnection();
    return $conn->query("SELECT COUNT(*) AS total FROM spp")->fetch(PDO::FETCH_ASSOC)['total'];
}
function getAllDataPembayaran($limit = 5, $page = 1)
{
    $conn = getDatabaseConnection();
    $offset = ($page - 1) * $limit;
    $sql = "SELECT * FROM pembayaran
            JOIN petugas ON pembayaran.id_petugas = petugas.id_petugas
            JOIN siswa ON pembayaran.nisn = siswa.nisn
            JOIN spp ON pembayaran.id_spp = spp.id_spp
            ORDER BY pembayaran.tgl_bayar DESC
            LIMIT :limit OFFSET :offset";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function countAllPembayaran()
{
    $conn = getDatabaseConnection();
    return $conn->query("SELECT COUNT(*) AS total FROM pembayaran")->fetch(PDO::FETCH_ASSOC)['total'];
}
?>
