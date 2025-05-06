<?php
include '../login/auth.php';
$error = "";

if($_SERVER['REQUEST_METHOD'] =='POST'){
    $tipe = $_POST['tipe'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $hasil = register(table: $tipe, username: $username, password: $password );
    if ($hasil === true){
        $pesan = "<h1>Akun berhasil dibuat</h1>";
    }else {
        $pesan = "<h1>hasil</h1>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href=" ../output.css" rel ="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    <main>

        <div clas ="mx-auto container">
            <div class="flex justify-center items-center h-screen">

            <form method="POST" class="w-96 shadow-sm p-4 grid grid-cols-1 gap-5">
            <h2 class ="text-3xl text-blue-500 font-bold ">Register</h2>
                <label for="tipe" class="">Register sebagai</label>
                <select name ="tipe" required>
                    <option value="petugas">Petugas</option>
                </select>

                <input type="text" name="username" placeholder=" Username" class="outline-2 rounded-sm mt-5" required>
                <input type="password" name="password" placeholder=" Password" class="outline-2 rounded-sm" required>
                <button class="px-3 py-2 bg-blue-700 w-20 rounded-xl transition hover:scale-110 hover:shadow-xl 
                focus:ring-3 focus:outline-hidden ml-4 text-white font-semibold" type="submit">Daftar</button>

            </form>
            </div>
        </div>

        

    </main>
    
</body>
</html>