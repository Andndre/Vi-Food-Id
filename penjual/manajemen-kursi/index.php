<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>VI Food</title>
    <link rel="stylesheet" href="../../css/dist/output.css" />
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
      integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
      crossorigin="anonymous"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.js"></script>
  </head>
  <body class="bg-gray-200">
    <div class="flex w-full min-h-screen">
      <aside
        id="sidebar"
        class="bg-card-foreground bg-black text-white text-card border-r shadow-xl min-h-screen max-w-[250px] p-4 z-[100] flex flex-col fixed md:static"
      >
        <div class="flex flex-col items-center mt-8">
          <img
            id="sidebar-logo"
            src="../../public/logo-white.svg"
            alt="logo"
            class="transition-all"
            width="128px"
            height="128px"
          />
          <p class="font-medium sidebar-text">Warung Pak Wayan</p>
        </div>
        <div
          data-orientation="horizontal"
          role="none"
          class="shrink-0 bg-border h-[1px] w-full my-4"
        ></div>
        <ul class="space-y-1 flex-1 text-gray-300">
          <li
            title="Dashboard"
            class="transition-all duration-300 rounded-md px-4 py-2 bg-gray-900"
          >
            <a class="flex items-center gap-3" href="../index.html">
              <i data-feather="bar-chart-2"></i>
              <div class="sidebar-text">Dashboard</div></a
            >
          </li>
          <li
          title="Manajemen Pesanan"
          class="transition-all duration-300 rounded-md px-4 py-2 bg-gray-900"
        >
          <a class="flex items-center gap-3" href="/penjual/manajemen-pesanan/index.html">
            <i data-feather="database"></i>
            <div class="sidebar-text">Manajemen Pesanan</div>
          </a>
        </li>
          <li
            title="Manajemen Menu"
            class="transition-all duration-300 rounded-md px-4 py-2 bg-gray-900"
          >
            <a
              class="flex items-center gap-3"
              href="../manajemen-menu/index.html"
            >
              <i data-feather="book-open"></i>
              <div class="sidebar-text">Manajemen Menu</div>
            </a>
          </li>
          <li
            title="Manajemen Kursi"
            class="transition-all duration-300 rounded-md px-4 py-2 bg-primary/25 text-primary"
          >
            <a
              class="flex items-center gap-3"
              href="../manajemen-kursi/index.html"
            >
              <i data-feather="list"></i>
              <div class="sidebar-text">Manajemen Kursi</div>
            </a>
          </li>
          <li
            title="Ulasan"
            class="transition-all duration-300 rounded-md px-4 py-2 bg-gray-900"
          >
            <a class="flex items-center gap-3" href="../ulasan/index.html">
              <i data-feather="message-circle"></i>
              <div class="sidebar-text">Ulasan</div>
            </a>
          </li>
        </ul>
        <div>
          <div
            data-orientation="horizontal"
            role="none"
            class="shrink-0 bg-border h-[1px] w-full my-4"
          ></div>
          <button
            id="sidebar-tutup"
            class="duration-300 bg-gray-900 transition-all rounded-md p-2 flex gap-3 w-full"
          >
            <i data-feather="arrow-left"></i>
            <span class="sidebar-text">Tutup</span>
          </button>
        </div>
      </aside>
      <div class="flex-1 flex flex-col">
        <header class="flex justify-end shadow-sm border-b px-4 lg:px-8 py-2">
          <div class="flex items-center gap-3">
            <a href="../../profil/">
              <span
                class="relative flex h-10 w-10 shrink-0 overflow-hidden rounded-full cursor-pointer"
                type="button"
                ><img
                  class="aspect-square h-full w-full"
                  alt="user avatar"
                  src="https://avatars.githubusercontent.com/u/81848639?v=4"
              /></span>
            </a>
          </div>
        </header>
        <!-- Konten -->
        <div class="px-4 md:px-8 py-8">
          <div class="flex flex-col lg:justify-between lg:items-center gap-3 pb-8 lg:flex-row  ">
            <h1 class="font-bold text-xl">Semua Menu</h1>
            <a href="../tambah-kursi/index.html">
              <button class="flex bg-primary rounded-md px-4 py-2 text sm mr-auto lg:mr-0 hover:bg-primary/75 font-medium text-white ">
                <i data-feather="circle" class="text-white text-sm mr-3" ></i> Tambahkan Kursi
              </button>
            </a>
          </div>
          <div class="grid grid-cols-12 gap-4">
            <!-- Card Start -->
            <div class="overflow-hidden col-span-6 md:col-span-4 lg:col-span-3 bg-white rounded shadow-sm">
              <img class="w-full object-cover aspect-video" src="https://jeparawood.com/wp-content/uploads/2022/01/kursi-makan-sederhana.jpg" alt="">
              <div class="p-4 space-y-2">
                <h3 class="font-bold text-lg">Kursi Bucu Kangin<h3>
                  <!-- Label -->
                <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                  <span class="w-2 h-2 me-1 bg-green-500 rounded-full"></span>
                  Available
                </span>
                <!-- End Label -->
                <div class="flex justify-between items-center flex-wrap gap-3 pt-4">
                  <span class="text-sm text-gray-400 font-semibold">Sewa Rp. 2.000</span>
                  <a class="flex gap-2 items-center text-sm px-4 py-2 ml-auto bg-primary/20 hover:bg-primary transition-all duration-300 font-semibold rounded-lg" href="../edit-kursi/index.html"><i class="h-5" data-feather="edit-2"></i> Edit</a>
                </div>
              </div>
            </div>
            <!-- Card End -->
            <!-- Card Start -->
            <div class="overflow-hidden col-span-6 md:col-span-4 lg:col-span-3 bg-white rounded shadow-sm">
              <img class="w-full object-cover aspect-video" src="https://www.jatijeparamebel.com/wp-content/uploads/2021/03/Set-Kursi-Meja-Makan-Balero-Jok-Busa-Dudukan-Minimalis-Kayu-Jati-JJM-SKMN-050.jpg" alt="">
              <div class="p-4 space-y-2">
                <h3 class="font-bold text-lg">Kursi Blok 2A<h3>
                  <!-- Label -->
                <span class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                  <span class="w-2 h-2 me-1 bg-red-500 rounded-full"></span>
                  Full
                </span>
                <!-- End Label -->
                <div class="flex justify-between items-center flex-wrap gap-3 pt-4">
                  <span class="text-sm text-gray-400 font-semibold">Sewa Rp. 2.000</span>
                  <a class="flex gap-2 items-center text-sm px-4 py-2 ml-auto bg-red-800/20 hover:bg-red-800 hover:text-white transition-all duration-300 font-semibold rounded-lg" href="#"><i class="h-5" data-feather="x-circle"></i> Jadikan tersedia</a>
                  <a class="flex gap-2 items-center text-sm px-4 py-2 ml-auto bg-primary/20 hover:bg-primary transition-all duration-300 font-semibold rounded-lg" href="../edit-kursi/index.html"><i class="h-5" data-feather="edit-2"></i> Edit</a>
                </div>
              </div>
            </div>
            <!-- Card End -->
					</div>
        </div>
        <!-- Konten -->
        <footer class="px-4 md:px-8 py-4 border-t">
          Copyright © 2023 VI-Food.co
        </footer>
      </div>
    </div>
    <script>
      // Logika untuk sidebar
      const tombolClose = $("#sidebar-tutup");
      const sidebar = $("#sidebar");
      const sidebarLogo = $("#sidebar-logo");
      const sidebarTexts = $(".sidebar-text");

      tombolClose.click(() => {
        sidebarTexts.each((i, e) => {
          e.classList.toggle("hidden");
        });
        sidebar.toggleClass("fixed");
        sidebarLogo.toggleClass("w-16 h-16");
        sidebarLogo.toggleClass("w-7 h-7");
      });

      // Feather icon...
      feather.replace();
    </script>
    <style>
      .hidden {
        display: none;
      }
    </style>
  </body>
</html>
