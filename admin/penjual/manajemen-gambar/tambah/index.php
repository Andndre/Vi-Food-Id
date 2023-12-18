<?php
session_start();

if (!defined('ROOT'))
  define('ROOT', $_SERVER['DOCUMENT_ROOT'] . '/vi-food-id');
require ROOT . "/module/backend/akun/cek-penjual.php";
?>

<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<?php require ROOT . "/module/components/head.php" ?>
  <body class="bg-gray-200">
    <div class="flex w-full min-h-screen">
      <?php 
        $_GET['highlight'] = "manajemen-gambar";
      require ROOT . "/module/components/sidebar-penjual.php";
      ?>
      <div class="flex-1 flex flex-col">
      <?php require ROOT . "/module/components/navbar.php" ?>
        <!-- Konten -->
        <div class="px-4 md:px-8 py-8">
          <div class="flex text-3xl font-bold pb-8">
            <h1>Tambah Gambar</h1>
          </div>
          <hr class="border-t border-gray-300 mb-3" />
          <form class="flex flex-col gap-3" method="post" action="process_tambah_gambar.php" enctype="multipart/form-data">
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
