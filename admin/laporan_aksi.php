<?php
include __DIR__ . '/../database.php';


function getAllData() {
    $conn = getDatabaseConnection();
    $sql = "SELECT * FROM pembayaram, siswa, petugas WHERE ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    exit;
}

function getSiswaById($nisn) {
    $conn = getDatabaseConnection();
    $sql = "SELECT * FROM siswa WHERE nisn = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nisn]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
    header("Location: /admin/siswa.php");
    exit;

}

function createSiswa($nis, $nama, $id_kelas, $password) {
    $conn = getDatabaseConnection();
    $sql = "INSERT INTO siswa (nis, nama, id_kelas, password, ) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([ $nis, $nama, $id_kelas, $password]);
    header("Location: /admin/siswa.php");
    exit;
}

function updateSiswa($nis, $nama, $id_kelas) {
    $conn = getDatabaseConnection();
    $sql = "UPDATE siswa SET nis = ?, nama = ?, id_kelas = ? WHERE nisn = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nis, $nama, $id_kelas]);
    header("Location: /admin/siswa.php");
    exit;
}


function deleteSiswa($nisn) {
    $conn = getDatabaseConnection();
    $sql = "DELETE FROM siswa WHERE nisn = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nisn]);
    header("Location: /admin/siswa.php");
    exit;
}
?>
