<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>VI Food</title>
    <link rel="stylesheet" href="../css/dist/output.css" />
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
      integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
      crossorigin="anonymous"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.js"></script>
  </head>
  <body class="bg-gray-200">
    <!-- Navbar -->
    <nav class="bg-white shadow-sm">
      <div
        class="flex items-center h-16 justify-between w-full gap-6 container mx-auto px-4"
      >
        <a href="/"><img src="../public/logo.svg" alt="logo" class="h-5" /></a>
        <div class="flex gap-4 items-center">
          <div class="flex gap-3 items-center">
            <a
              class="flex gap-2 items-center px-6 py-3 bg-primary/10 hover:bg-primary/25 transition-all duration-300 rounded-md"
              href="../pembelian"
              ><i data-feather="bar-chart-2"></i> Pembelian</a
            >
            <a
              class="flex gap-2 items-center px-6 py-3 bg-primary/10 hover:bg-primary/25 transition-all duration-300 rounded-md"
              href="../keranjang/"
              ><i data-feather="shopping-cart"></i> Keranjang</a
            >
          </div>
          <a href="../profil/">
            <div class="w-10 h-10 bg-gray-400 rounded-full"></div>
          </a>
        </div>
      </div>
    </nav>
    <!--  -->

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
  </body>
</html>
