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
    header("Location: /php-front/admin/spp.php");
    exit;

}

function createSpp( $tahun, $nominal) {
    $conn = getDatabaseConnection();
    $sql = "INSERT INTO spp ( tahun, nominal ) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([ $tahun, $nominal]);
    header("Location: /php-front/admin/spp.php");
    exit;
}

function updateSpp($tahun, $nominal, $id_spp) {
    $conn = getDatabaseConnection();
    $sql = "UPDATE spp SET tahun = ?, nominal = ? WHERE id_spp = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$tahun, $nominal, $id_spp]);
    header("Location: /php-front/admin/spp.php");
    exit;
}


function deleteSpp($id_spp) {
    $conn = getDatabaseConnection();
    $sql = "DELETE FROM spp WHERE id_spp = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_spp]);
    header("Location: /php-front/admin/spp.php");
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

function sumPembayaranBulanIni()
{
    $conn = getDatabaseConnection();
    $bulan = date('m');
    $tahun = date('Y');

    $sql = "SELECT SUM(jumlah_bayar) AS total FROM pembayaran 
            WHERE MONTH(tgl_bayar) = ? AND YEAR(tgl_bayar) = ?
            AND status = 'selesai'";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$bulan, $tahun]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['total'] ?? 0; // jika null, kembalikan 0
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
