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
        class="transition-all duration-300 rounded-md px-4 py-2 bg-primary/25 text-primary"
      >
        <a class="flex items-center gap-3" href="../penjual/manajemen-pesanan/index.html">
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
          <div class="flex text-3xl font-bold pb-8">
            <h1>Edit Kursi</h1>
          </div>
          <hr class="border-t border-gray-300 mb-3" />
          <form class="flex flex-col gap-3">
            <!-- Nama Kursi -->
            <label for="nama" class="text-md font-semibold">Nama Kursi</label>
            <input
              type="text"
              id="nama"
              placeholder="Masukkan Nama Kursi yang ingin diedit"
              class="h-10 px-4 py-2 rounded-lg"
            />
            <!-- nominal Harga -->
            <label for="number" class="text-md font-semibold"
              >Harga Sewa</label
            >
            <input
              type="number"
              id="number"
              placeholder="Rp."
              class="h-10 px-4 py-2 rounded-lg"
            />
            <!-- deskripsi -->
            <label for="deskripsi" class="text-md font-semibold"
              >Deskripsi</label
            >
            <textarea
              name="deskripsi"
              id="deskripsi"
              cols="30"
              rows="10"
              placeholder="Tambahkan deskripsi..."
              class="px-4 py-2 rounded-lg"
            ></textarea>
            <!-- gambar -->
            <label for="gambar" class="text-md font-semibold">Gambar</label>
            <input type="file" accept="*.png,*.jpg,*.jpeg" />
            <div class="flex mt-4 gap-3">
              <button
                type="submit"
                class="py-3 px-4 rounded-lg bg-primary text-white font-semibold text-sm hover:bg-primary/80 transition-all duration-300"
              >
                Simpan
              </button>
              <button
                type="submit"
                class="py-3 px-4 text-red-700 rounded-lg border-2 border-red-700 hover:text-white font-semibold text-sm hover:bg-red-700/80 transition-all duration-300"
              >
                Hapus
              </button>
            </div>
          </form>
          <!-- Konten -->
          <footer class="py-8">Copyright © 2023 VI-Food.co</footer>
        </div>
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
