<?php
include "aksi_login.php";

$result = null;

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $nis = $_POST["nis"] ?? '';
    $password = $_POST["password"] ?? '';
    $result = loginSiswa($nis, $password);
    header("Location: /php-front/dashboard_siswa/index.php");
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../output.css"/>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>

<div class="flex justify-center items-center min-h-screen bg-blue-50 ">
<form method="POST" class=" shadow-xl p-4 grid grid-cols-1 gap-2  w-full max-w-md space-y-6 rounded-2xl">
<h2 class=" font-bold text-3xl text-center">Login Siswa</h2>
<div>
    <label class="font-semibold ">Nis</label>
    <input type="text" name="nis" required placeholder="nis" class="w-full px-4 py-2 rounded-xl focus:outline-none focus:ring-2 outline-1 focus:ring-blue-400 bg-blue-50  placeholder-blue-500">
    </div>

    <div>
    <label class="font-semibold">Password</label>
    <input type="password" name="password" required placeholder="password" class="w-full px-4 py-2 rounded-xl focus:outline-none focus:ring-2 outline-1 focus:ring-blue-400 bg-blue-50  placeholder-blue-500">
    </div>

    <button class ="px-6 py-3 rounded-xl  bg-blue-600 text-white font-semibold transition hover:scale-110 hover:shadow-xl 
    focus:ring-3 focus:outline-hidden cursor-pointer ml-10 w-78 " type="submit">Login</button>

    <div class='text-center'>
      <h1 class=" text-md font-semibold">Login Sebagai<span class="text-violet-600 cursor-pointer">
<a href="/php-front/login_petugas/index.php">Petugas</a>

</form>
</div>

<!-- <div class="flex items-center justify-center min-h-screen bg-gradient-to-br from-purple-100 to-fuchsia-100 p-4">
  <form class="bg-white p-8 rounded-2xl shadow-2xl w-full max-w-md space-y-6">
    <h2 class="text-3xl font-bold text-center text-purple-700">Form Ungu & Fuchsia</h2>


    <div>
      <label class="block text-purple-600 mb-1 font-medium">Fullname</label>
      <input type="text" placeholder="Masukkan nama..."
        class="w-full px-4 py-3 border border-purple-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-fuchsia-400 bg-purple-50 text-purple-800 placeholder-purple-400">
    </div>

 
    <div>
      <label class="block text-purple-600 mb-1 font-medium">Email</label>
      <input type="email" placeholder="Masukkan email..."
        class="w-full px-4 py-2 border border-purple-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-fuchsia-400 bg-purple-50 text-purple-800 placeholder-purple-400">
    </div>




    <div class="text-center">
      <button type="submit"
        class="bg-gradient-to-r from-purple-500 to-fuchsia-500 text-white px-6 py-2 rounded-xl font-semibold hover:from-fuchsia-600 hover:to-purple-600 transition-all duration-300 w-full">
        Kirim Form
      </button>
    </div> -->
  </form>
</div>
</body>
</html>