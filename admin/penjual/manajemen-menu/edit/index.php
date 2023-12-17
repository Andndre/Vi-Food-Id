<?php
session_start();

if (!defined('ROOT'))
  define('ROOT', $_SERVER['DOCUMENT_ROOT'] . '/vi-food-id');
require ROOT . "/module/backend/akun/cek-penjual.php";
require "../../process/edit-menu.php";
?>


<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<?php require ROOT . "/module/components/head-penjual.php" ?>
  <body class="bg-gray-200">
    <div class="flex w-full min-h-screen">
     <?php 
      $_GET['highlight'] = "manajemen-menu";
      require ROOT . "/module/components/sidebar-penjual.php" 
     ?>
      <div class="flex-1 flex flex-col">
        <?php require ROOT . "/module/components/header-penjual.php" ?>
        <!-- Konten -->
        <div class="px-4 md:px-8 py-8">
          <div class="flex text-3xl font-bold pb-8">
            <h1>Edit Menu</h1>
          </div>
          <hr class="border-t border-gray-300 mb-3" />
          <form class="flex flex-col gap-3">
            <!-- Nama Makanan -->
            <label for="nama" class="text-md font-semibold">Nama Makanan</label>
            <input
              type="text"
              id="nama"
              placeholder="Masukkan Nama Makanan yang ingin di edit"
              class="h-10 px-4 py-2 rounded-lg"
            />
            <!-- nominal Harga -->
            <label for="number" class="text-md font-semibold"
              >Harga Makanan</label
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
        <style>
      .hidden {
        display: none;
      }
    </style>
  </body>
</html>
