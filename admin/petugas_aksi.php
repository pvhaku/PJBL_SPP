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
    header("Location: /admin/petugas.php");
    exit;

}

function createPetugas($id_petugas, $username , $password) {
    $conn = getDatabaseConnection();
    $sql = "INSERT INTO petugas (id_petugas, username, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([ $id_petugas, $username, $password]);
    header("Location: /admin/petugas.php");
    exit;
}

function updatePetugas($username, $id_petugas) {
    $conn = getDatabaseConnection();
    $sql = "UPDATE petugas SET username = ?,  WHERE id_petugas = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$username, $id_petugas]); 
    header("Location: /admin/petugas.php");

    exit;
}


function deletePetugas($id_petugas) {
    $conn = getDatabaseConnection();
    $sql = "DELETE FROM petugas WHERE id_petugas = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_petugas]);
    header("Location: /admin/petugas.php");
    exit;
}
?>
