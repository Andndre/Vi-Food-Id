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
     $_GET['highlight'] = "manajemen-ulasan";
    require ROOT . "/module/components/sidebar-penjual.php";
    ?>
      <div class="flex-1 flex flex-col">
			<?php require ROOT . "/module/components/navbar.php"; ?>
        <!-- Konten komentar mulai-->
        <div class="py-10 px-5 mx-3 my-3 bg-white rounded-md">
          <div class="flex items-center mb-4">
            <img
              class="object-cover w-16 h-16 me-4 rounded-full"
              src="https://www.waseda.jp/inst/weekly/assets/uploads/2021/09/IMG_3675-940x627.jpg"
              alt="jerome"
            />
            <div>
              <p class="text-lg font-medium">Jerome Polin</p>
              <p class="text-gray-400 text-sm">Bergabung November 2023</p>
            </div>
          </div>
          <div class="flex items-center mb-1 space-x-1 rtl:space-x-reverse">
            <svg
              class="w-4 h-4 text-yellow-300"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="currentColor"
              viewBox="0 0 22 20"
            >
              <path
                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"
              />
            </svg>
            <svg
              class="w-4 h-4 text-yellow-300"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="currentColor"
              viewBox="0 0 22 20"
            >
              <path
                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"
              />
            </svg>
            <svg
              class="w-4 h-4 text-yellow-300"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="currentColor"
              viewBox="0 0 22 20"
            >
              <path
                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"
              />
            </svg>
            <svg
              class="w-4 h-4 text-yellow-300"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="currentColor"
              viewBox="0 0 22 20"
            >
              <path
                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"
              />
            </svg>
            <svg
              class="w-4 h-4 text-gray-300"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="currentColor"
              viewBox="0 0 22 20"
            >
              <path
                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"
              />
            </svg>
          </div>
          <div class="mb-5 text-sm text-gray-500">
            <p>12 November, 2023</p>
          </div>
          <p class="mb-2 text-gray-500">
            Mie goreng di Warung Pak Wayan sungguh luar biasa! Rasanya begitu
            autentik dan penuh dengan rempah-rempah yang membuat lidah saya
            bergoyang.
          </p>
          <p class="mb-3 text-gray-500">
            Tapi semuanya enak kok! Harganya oke juga kok, cuman emang buat yang
            harga segini ukurannya standar ya, nggak terlalu besar-besar
            banget..
          </p>
          <a
            href="#"
            class="block mb-5 text-sm font-medium text-primary hover:underline"
            >Lebih Lanjut</a
          >
          <div>
            <p class="mt-1 text-xs text-gray-500">
              19 orang menyukai komentar ini
            </p>
            <div class="flex flex-col items-start mt-3">
              <textarea
                name=""
                id=""
                cols="30"
                rows="3"
                class="w-full p-3 rounded-md border-2 border-gray-300"
                placeholder="Ketikkan Balasan..."
              ></textarea>
              <div class="flex my-4">
                <a
                  href="#"
                  class="text-white bg-primary font-medium rounded-lg text-xs px-2 py-1.5"
                  >Balas</a
                >
              </div>
            </div>
          </div>
        </div>

        <!-- Konten komentar berakhir-->

        <footer class="px-5 container mx-auto py-4 border-t">
          Copyright © 2023 VI-Food.co
        </footer>
      </div>
    </div>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.js"></script>
    <style>
      .hidden {
        display: none;
      }
    </style>
  </body>
</html>
