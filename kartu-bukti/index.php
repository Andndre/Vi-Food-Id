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
    <div class="px-4 md:px-8 py-8">
        <div class="grid grid-cols-12 gap-4">
          <!-- Card Start -->
          <div class="overflow-hidden col-span-6 md:col-span-4 lg:col-span-3 bg-white rounded shadow-sm">
            <img class="w-full object-cover aspect-video" src="https://images.unsplash.com/photo-1563805042-7684c019e1cb?q=80&w=1854&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
            <div class="p-4 space-y-2">
              <h3 class="font-bold text-lg">Es Oreo<h3>
                <!-- Label -->
              <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                <span class="w-2 h-2 me-1 bg-green-500 rounded-full"></span>
                Sukses
              </span>
              <!-- End Label -->
              <div class="flex justify-between items-center flex-wrap gap-3 pt-4">
                <a class="flex gap-2 items-center text-sm px-4 py-2 ml-auto bg-primary/20 hover:bg-primary transition-all duration-300 font-semibold rounded-lg" href="/pembelian"> Lihat Bukti Pembayaran</a>
              </div>
            </div>
          </div>
          <!-- Card End -->
         <!-- Card Start -->
         <div class="overflow-hidden col-span-6 md:col-span-4 lg:col-span-3 bg-white rounded shadow-sm">
            <img class="w-full object-cover aspect-video" src="https://images.unsplash.com/photo-1563379926898-05f4575a45d8?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
            <div class="p-4 space-y-2">
              <h3 class="font-bold text-lg">Mie Goreng<h3>
                <!-- Label -->
              <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                <span class="w-2 h-2 me-1 bg-green-500 rounded-full"></span>
                Sukses
              </span>
              <!-- End Label -->
              <div class="flex justify-between items-center flex-wrap gap-3 pt-4">
                <a class="flex gap-2 items-center text-sm px-4 py-2 ml-auto bg-primary/20 hover:bg-primary transition-all duration-300 font-semibold rounded-lg" href="/pembelian"> Lihat Bukti Pembayaran</a>
              </div>
            </div>
          </div>
          <!-- Card End -->
           <!-- Card Start -->
          <div class="overflow-hidden col-span-6 md:col-span-4 lg:col-span-3 bg-white rounded shadow-sm">
            <img class="w-full object-cover aspect-video" src="https://images.unsplash.com/photo-1568901346375-23c9450c58cd?q=80&w=1899&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
            <div class="p-4 space-y-2">
              <h3 class="font-bold text-lg">Burger Jumbo<h3>
                <!-- Label -->
              <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                <span class="w-2 h-2 me-1 bg-green-500 rounded-full"></span>
                Sukses
              </span>
              <!-- End Label -->
              <div class="flex justify-between items-center flex-wrap gap-3 pt-4">
                <a class="flex gap-2 items-center text-sm px-4 py-2 ml-auto bg-primary/20 hover:bg-primary transition-all duration-300 font-semibold rounded-lg" href="/pembelian"> Lihat Bukti Pembayaran</a>
              </div>
            </div>
          </div>
          <!-- Card End -->
            <!-- Card Start -->
          <div class="overflow-hidden col-span-6 md:col-span-4 lg:col-span-3 bg-white rounded shadow-sm">
            <img class="w-full object-cover aspect-video" src="https://images.unsplash.com/photo-1614707267537-b85aaf00c4b7?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
            <div class="p-4 space-y-2">
              <h3 class="font-bold text-lg">Cake Stroberi<h3>
                <!-- Label -->
              <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                <span class="w-2 h-2 me-1 bg-green-500 rounded-full"></span>
                Sukses
              </span>
              <!-- End Label -->
              <div class="flex justify-between items-center flex-wrap gap-3 pt-4">
                <a class="flex gap-2 items-center text-sm px-4 py-2 ml-auto bg-primary/20 hover:bg-primary transition-all duration-300 font-semibold rounded-lg" href="/pembelian"> Lihat Bukti Pembayaran</a>
              </div>
            </div>
          </div>
          <!-- Card End -->
          
        </div>    
      </div>
    <script>
      feather.replace();
    </script>
  </body>
</html>
