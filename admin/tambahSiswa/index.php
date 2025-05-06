<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../output.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<nav class="bg-[#4692AF] sticky z-50 top-0">
  <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
    <div class="relative flex h-16 items-center justify-between">
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        <!-- Mobile menu button-->
        
          <!--
            Icon when menu is closed.

            Menu open: "hidden", Menu closed: "block"
          -->
          <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
          <!--
            Icon when menu is open.

            Menu open: "block", Menu closed: "hidden"
          -->

        </button>
      </div>
      <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
        <div class="flex shrink-0 items-center">
          <img class="h-8 w-auto" src="" alt="Logo">
        </div>
        <div class="hidden sm:ml-6 sm:block">
          <div class="flex space-x-4">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="#" class="rounded-md py-2 text-sm font-medium text-white" aria-current="page">Dashboard</a>
            <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Petugas</a>
            <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Siswa</a>
            <a href="#" class="rounded-md bg-gray-400 px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Kelas</a>
            <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Laporan</a>


          </div>
           
        </div>
         
      </div>
      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
    <button class="px-2 py-1 w-23 bg-red-600 cursor-pointer text-slate-200 rounded-md" type="submit">Logout</button>
        <!-- Profile dropdown -->
        <div class="relative ml-3">
          <div>
            <button type="button" class="relative flex rounded-full bg-gray-800 text-sm focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
              <span class="absolute -inset-1.5"></span>
              <span class="sr-only">Open user menu</span>
             
          </div>
          
        </div>
      </div>
    </div>
  </div>

  <!-- Mobile menu, show/hide based on menu state. -->
  <div class="sm:hidden" id="mobile-menu">
    <div class="space-y-1 px-2 pt-2 pb-3">
      <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
      <a href="#" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white" aria-current="page">Dashboard</a>
      <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Siswa</a>
      <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Kelas</a>
      <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Laporan</a>

    </div>
  </div>
</nav>
<body>

  <div class="flex justify-center items-center min-h-screen bg-blue-50 ">
    <form method="POST" class=" shadow-xl p-4 grid grid-cols-1 w-full max-w-md space-y-2 rounded-2xl">
      <h2 class=" font-bold text-3xl text-center">Tambah Siswa</h2>
<div>
  <label for="Nis" class="block text-md font-semibold ">Nisn</label>
  <input type=" text" id="nis" class="w-full border rounded-md "> 
</div>
<div>
  <label for="Nis" class="block text-md font-semibold ">Nis</label>
  <input type=" text" id="nis" class="w-full border rounded-md "> 
</div>
<div>
  <label for="nama" class="block text-md font-semibold ">Nama siswa</label>
  <input type=" text" id="nama" class="w-full border rounded-md "> 
</div>
<div>
  <label for="kelas" class="block text-md font-semibold ">Kelas</label>
  <input type="text" id="kelas" class="w-full border rounded-md "> 
</div>
<div>
  <label for="password" class="block text-md font-semibold ">Password</label>
  <input type="password" id="password" class="w-full border rounded-md "> 
</div>
<div class=" flex justify-between">
  <a href="/php-front/admin/siswa.php" type="button" class="bg-blue-500 cursor-pointer text-white px-4 py-2 rounded-md hover:bg-blue-300">Kembali</a>
  <button type="submit" class="bg-green-500 cursor-pointer text-white px-4 py-2 rounded-md hover:bg-green-300">Simpan</button>
</div>
  

</body>
</html>