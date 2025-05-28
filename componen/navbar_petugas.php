<?php

if(!isset($_SESSION["username"])) {
    header("Location: /php-front/login_petugas/index.php");
    exit;
}
?>  

<nav class="bg-[#4692AF] sticky z-50 top-0">
  <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
    <div class="relative flex h-16 items-center justify-between">
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
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
            <a href="/php-front/dashboard_petugas/index.php" class="rounded-md py-2 text-sm font-medium text-white" aria-current="page">Transaksi</a>
            <a href="/php-front/dashboard_petugas/history/index.php" class="rounded-md py-2 text-sm font-medium text-white" aria-current="page">History</a>
            <a href="#" class="rounded-md py-2 text-sm font-medium text-white" aria-current="page">Laporan</a>
            
          </div>
           
        </div>
         
      </div>
      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
        <form action="/php-front/dashboard_petugas/aksi_logout.php">
    <button action="/php-front/dashboard_petugas/aksi_logout.php"  class="px-2 py-1 w-23 bg-red-600 cursor-pointer text-slate-200 rounded-md" type="submit">Logout</button>
        </form>
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
      <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white"></a>
      <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Projects</a>
      <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Calendar</a>

    </div>
  </div>
</nav>
