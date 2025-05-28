<?php
include __DIR__ . '/../database.php';


function getAllData() {
    $conn = getDatabaseConnection();
    $sql = "SELECT * FROM petugas";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    exit;
}

function getPetugasById($id_petugas) {
    $conn = getDatabaseConnection();
    $sql = "SELECT * FROM petugas WHERE id_petugas = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_petugas]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
    header("Location: /php-front/admin/petugas.php");
    exit;

}

function createPetugas( $username , $password) {
    $conn = getDatabaseConnection();
    $sql = "INSERT INTO petugas ( username, password) VALUES ( ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$username, $password]);
    $password = password_hash($password, PASSWORD_DEFAULT);
    header("Location: /php-front/admin/petugas.php");
    exit;
}

function updatePetugas($username, $id_petugas) {
    $conn = getDatabaseConnection();
    $sql = "UPDATE petugas SET username = ?  WHERE id_petugas = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$username, $id_petugas]); 
    header("Location: /php-front/admin/petugas.php");
    exit;
}


function deletePetugas($id_petugas) {
    $conn = getDatabaseConnection();
    $sql = "DELETE FROM petugas WHERE id_petugas = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_petugas]);
    header("Location: /php-front/admin/petugas.php");
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
