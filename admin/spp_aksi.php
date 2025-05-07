<?php
include __DIR__ . '/../database.php';


function getAllData() {
    $conn = getDatabaseConnection();
    $sql = "SELECT * FROM spp";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    exit;
}

function getSppById($id_spp) {
    $conn = getDatabaseConnection();
    $sql = "SELECT * FROM spp WHERE id_spp = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_spp]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
    header("Location: /admin/spp.php");
    exit;

}

function createSpp( $tahun, $nominal) {
    $conn = getDatabaseConnection();
    $sql = "INSERT INTO spp ( tahun, nominal, ) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([ $tahun, $nominal]);
    header("Location: /admin/spp.php");
    exit;
}

function updateSpp($id_spp, $tahun, $nominal) {
    $conn = getDatabaseConnection();
    $sql = "UPDATE spp SET id_spp = ?, tahun = ?, nominal = ? WHERE id_spp = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_spp, $tahun, $nominal]);
    header("Location: /admin/spp.php");
    exit;
}


function deleteSpp($id_spp) {
    $conn = getDatabaseConnection();
    $sql = "DELETE FROM spp WHERE id_spp = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_spp]);
    header("Location: /admin/spp.php");
    exit;
}
?>
