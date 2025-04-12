<?php
include 'database.php';

function getAllData() {
    $conn = getDatabaseConnection();

    $sql = "SELECT * FROM users";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(fetch_assoc());
}
?>
