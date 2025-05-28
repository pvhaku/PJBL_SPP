<?php
include '../database.php';
session_start();

function register($table, $nis, $password) {
    $conn = getDataBaseConnection();

    $res = $conn->prepare("SELECT * FROM $table WHERE nis = :nis");
    $res->execute([':nis' => $nis]);

    if($res->rowCount() > 0) {
        return "Nis sudah terdaftar";
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $res = $conn->prepare("INSERT INTO $table (nis, password) VALUES (:nis, :password)");
    $res->execute([
        ':nis' => $nis,
        ':password' => $hashedPassword
    ]);

    return true;
}



function login ($tipe, $username, $password){
    $conn = getDatabaseConnection();

    $res = $conn->prepare("SELECT * FROM $tipe WHERE username = :username");
    $res->execute([$username]);
    $data = $res->fetch(PDO ::FETCH_ASSOC);

    if($data && password_verify($password, $data['password'])){
        $_SESSION ['nis'] = $data;
        $_SESSION ['tipe'] = $tipe;
        return "Berhasil Login";
    }

    return "Gagal Login";
}



?>