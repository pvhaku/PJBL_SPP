<?php
session_start();
include "../database.php";

function loginSiswa($nis , $password )
{
    $conn = getDatabaseConnection();
    $reqst = $conn->prepare("SELECT * FROM siswa WHERE nis = :nis");
    $reqst->execute([':nis' => $nis]);
    $nis = $reqst->fetch(PDO::FETCH_ASSOC);

    if($nis && password_verify($password, $nis['password'])){
        $_SESSION['nis'] = $nis ['nis'];
        $_SESSION['status'] ='login';
        header("Location: /php-front/dashboard_siswa/index.php");
    }else{
        header("Location: /php-front/login_siswa/index.php?error=Invalid NIS or password");
    }
}
?>

