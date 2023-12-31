<!DOCTYPE html>
<html lang="en">
  <?php 
  session_start();
  if (!defined('ROOT')) define('ROOT', $_SERVER['DOCUMENT_ROOT'] . '/vi-food-id');
  $_GET['title'] = 'Pembelian Saya';
  require ROOT . "/module/components/head.php";
  ?>
  <body class="bg-gray-200">

    <!-- Navbar -->
    <?php require ROOT . "/module/components/navbar.php"; ?>
    <!-- navbar end -->

    <!-- pembelian -->
    <div>
        <span class="flex justify-center items-center mt-10 ml-12 text-2xl font-bold"> Pesanan Aktif</span>
    </div>
    <div class="flex flex-wrap justify-center">
      <div class="bg-white p-8 rounded-md ml-6 shadow-md max-w-md">
        <h1 class="text-2xl text-center font-bold mb-6">Bukti Pembayaran</h1>
  
        <div class="flex justify-between mb-4">
            <span class="font-semibold">Penerima:</span>
            <span>Nama Penerima</span>
        </div>
  
        <div class="flex justify-between mb-4">
            <span class="font-semibold">Total Pembayaran:</span>
            <span>Rp 23.000,-</span>
        </div>
  
        <div class="flex justify-between mb-4">
            <span class="font-semibold">Metode Pembayaran:</span>
            <span>Transfer Dana</span>
        </div>
  
        <div class="flex justify-between mb-4">
            <span class="font-semibold">Tanggal Pembayaran:</span>
            <span>13 November 2023</span>
        </div>
  
        <div class="flex justify-between">
            <span class="font-semibold">ID Pembayaran:</span>
            <span>#123456789</span>
        </div>
    </div>
  
    <div class="bg-white p-8 rounded-md ml-6 shadow-md max-w-md">
      <h1 class="text-2xl text-center font-bold mb-6">Bukti Pembayaran</h1>
  
      <div class="flex justify-between mb-4">
          <span class="font-semibold">Penerima:</span>
          <span>Nama Penerima</span>
      </div>
  
      <div class="flex justify-between mb-4">
          <span class="font-semibold">Total Pembayaran:</span>
          <span>Rp 23.000,-</span>
      </div>
  
      <div class="flex justify-between mb-4">
          <span class="font-semibold">Metode Pembayaran:</span>
          <span>Transfer Dana</span>
      </div>
  
      <div class="flex justify-between mb-4">
          <span class="font-semibold">Tanggal Pembayaran:</span>
          <span>13 November 2023</span>
      </div>
  
      <div class="flex justify-between">
          <span class="font-semibold">ID Pembayaran:</span>
          <span>#123456789</span>
      </div>
    </div>  
      <div class="bg-white p-8 rounded-md ml-6 shadow-md max-w-md">
        <h1 class="text-2xl text-center font-bold mb-6">Bukti Pembayaran</h1>
    
        <div class="flex justify-between mb-4">
            <span class="font-semibold">Penerima:</span>
            <span>Nama Penerima</span>
        </div>
    
        <div class="flex justify-between mb-4">
            <span class="font-semibold">Total Pembayaran:</span>
            <span>Rp 23.000,-</span>
        </div>
    
        <div class="flex justify-between mb-4">
            <span class="font-semibold">Metode Pembayaran:</span>
            <span>Transfer Dana</span>
        </div>
    
        <div class="flex justify-between mb-4">
            <span class="font-semibold">Tanggal Pembayaran:</span>
            <span>13 November 2023</span>
        </div>
    
        <div class="flex justify-between">
            <span class="font-semibold">ID Pembayaran:</span>
            <span>#123456789</span>
        </div>
      </div>  
      
    </div>
    
    <script>
      feather.replace();
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>	
  </body>
</html>
