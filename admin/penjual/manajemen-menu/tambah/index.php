<?php

require "../../process/auth-akun.php"

?>

<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>VI Food</title>
    <link rel="stylesheet" href="../../assets/css/dist/output.css" />
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
      integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
      crossorigin="anonymous"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.js"></script>
  </head>
  <body class="bg-gray-200">
    <div class="flex w-full min-h-screen">
      <?php 
        $_GET['highlight'] = "manajemen-menu";
        require "../../components/sidebar-penjual.php";
      ?>
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
            <h1>Tambah Menu</h1>
          </div>
          <hr class="border-t border-gray-300 mb-3" />
          <form class="flex flex-col gap-3" method="post" action="../../process/tambah-menu.php" enctype="multipart/form-data">
            <!-- Nama Makanan -->
            <label for="nama" class="text-md font-semibold">Nama Makanan</label>
            <input
              type="text"
              id="nama"
              name="nama-makanan"
              placeholder="Masukkan Nama Makanan yang ingin ditambahkan"
              class="h-10 px-4 py-2 rounded-lg"
            />
            <!-- nominal Harga -->
            <label for="number" class="text-md font-semibold"
              >Harga Makanan</label
            >
            <input
              type="number"
              id="number"
              name="harga-makanan"
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
              name="deskripsi"
              placeholder="Tambahkan deskripsi..."
              class="px-4 py-2 rounded-lg"
            ></textarea>
            <!-- gambar -->
            <label for="gambar" class="text-md font-semibold">Gambar</label>
            <input type="file" accept="*.png,*.jpg,*.jpeg" name="gambar-menu" />
            <div class="flex mt-4">
              <button
                type="submit"
                class="py-3 px-4 rounded-lg bg-primary text-white font-semibold text-sm hover:bg-primary/80 transition-all duration-300"
              >
                Simpan
              </button>
            </div>
          </form>
          <!-- Konten -->
          <footer class="py-8">Copyright © 2023 VI-Food.co</footer>
        </div>
      </div>
    </div>
    
    <style>
      .hidden {
        display: none;
      }
    </style>
  </body>
</html>
