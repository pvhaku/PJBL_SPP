<?php
session_start();
include "../database.php";

function loginUser($username , $password )
{
    $conn = getDatabaseConnection();
    $reqst = $conn->prepare("SELECT * FROM petugas WHERE username = :username");
    $reqst->execute([':username' => $username]);
    $user = $reqst->fetch(PDO::FETCH_ASSOC);

    if($user && password_verify($password, $user['password'])){
        $_SESSION['username']= $user ['username'];
        $_SESSION['id_petugas']= $user ['id_petugas'];
        if ($user ['level'] == 'petugas') {
            $_SESSION['status']= "petugas";
            header("Location: /php-front/dashboard_petugas/index.php");
        // }else{
        //     $_SESSION['status']= "admin";
        //     header("Location: /php-front/admin/index.php");
        }
    }else{
        header("Location: /php-front/login_petugas/index.php?error=Invalid username or password");

    }
}
