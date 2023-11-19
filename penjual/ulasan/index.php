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
            <a class="flex items-center gap-3" href="../">
              <i data-feather="bar-chart-2"></i>
              <div class="sidebar-text">Dashboard</div></a
            >
          </li>
          <li
            title="Manajemen Pesanan"
            class="transition-all duration-300 rounded-md px-4 py-2 bg-gray-900"
          >
            <a
              class="flex items-center gap-3"
              href="../manajemen-pesanan/"
            >
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
              href="../manajemen-menu/"
            >
              <i data-feather="book-open"></i>
              <div class="sidebar-text">Manajemen Menu</div>
            </a>
          </li>
          <li
            title="Manajemen Kursi"
            class="transition-all duration-300 rounded-md px-4 py-2 bg-gray-900"
          >
            <a
              class="flex items-center gap-3"
              href="../manajemen-kursi/"
            >
              <i data-feather="list"></i>
              <div class="sidebar-text">Manajemen Kursi</div>
            </a>
          </li>
          <li
            title="Ulasan"
            class="transition-all duration-300 rounded-md px-4 py-2 bg-primary/25 text-primary"
          >
            <a class="flex items-center gap-3" href="#">
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
