<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
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
  <body class="bg-gray-200 pb-10">
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
          <div class="w-10 h-10 bg-gray-400 rounded-full"></div>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <!-- Content -->
    <div class="container mx-auto grid grid-cols-12 gap-3">
      <div
        class="relative col-span-12 aspect-video md:aspect-auto md:col-span-4 overflow-hidden md:h-screen flex flex-col justify-center"
      >
        <img
          class="sticky object-cover object-center w-full h-full transition-all hover:scale-125 duration-200"
          src="https://gobiz.co.id/pusat-pengetahuan/wp-content/uploads/2019/03/usaha-warung-makan.jpg"
          alt="tempat makan"
        />
      </div>
      <div class="p-4 pt-14 col-span-12 md:col-span-8">
        <h1 class="text-4xl font-bold">Warung Pak Wayan</h1>
        <div class="flex mt-5">
          <a
            href="../tempat/"
            class="hover:bg-gray-100 bg-white rounded-tl-md rounded-bl-md p-3 border-r"
            >Deskripsi</a
          >
          <a
            href="../tempat-menu/index.html"
            class="hover:bg-gray-100 bg-white rounded-tr-md rounded-br-md p-3 text-primary"
            >Pesan</a
          >
        </div>
        <div class="grid grid-cols-12 pt-8">
          <div class="overflow-hidden col-span-12 sm:col-span-4 md:col-span-6 lg:col-span-4 bg-white rounded-2xl shadow-sm">
            <img class="w-full aspect-video object-cover" src="https://d1vbn70lmn1nqe.cloudfront.net/prod/wp-content/uploads/2023/08/01045246/ini-resep-mie-goreng-dengan-bahan-sederhana-yang-menggugah-selera-halodoc.jpg.webp" alt="">
            <div class="p-4 space-y-2 text-sm">
              <h3 class="font-bold text-xl">Mie Goreng Sehat<h3>
              <div class="space-y-2">
                <div class="flex items-center text-gray-500 ">
                  <i data-feather="map-pin" class="h-5 mr-2"></i>
                  Jalan Wijaya Kusuma Gg 3 Singaraja
                </div>
                <div class="flex items-center text-gray-500 ">
                  <i data-feather="map" class="h-5 mr-2"></i>
                  Warung Pak Wayan
                </div>
                <div class="flex items-center text-gray-500">
                  <i data-feather="clock" class="h-5 mr-2"></i>
                  Buka 08:00 - 18:00 WITA</div>
              </div>
              <div class="flex justify-between items-center flex-wrap gap-3 pt-4">
                <span class="text-lg text-gray-400 font-semibold">Rp. 12.000,00</span>
                <a class="px-6 py-3 ml-auto bg-primary/20 hover:bg-primary transition-all duration-300 font-semibold rounded-lg" href="../menu/index.html">Lihat</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Main -->

    <script>
      feather.replace();
    </script>
  </body>
</html>

<!-- <!DOCTYPE html>
<html lang="id" class="scroll-smooth">
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
    <nav class="bg-white shadow-sm">
      <div
        class="flex items-center h-16 justify-between w-full gap-6 container mx-auto px-4"
      >
        <a href="../profil/"><img src="../public/logo.svg" alt="logo" class="h-5" /></a>
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
          <div class="w-10 h-10 bg-gray-400 rounded-full"></div>
        </div>
      </div>
    </nav>
    <div class="container mx-10 mt-10 flex justify-start items-start">
      <img
        class="object-cover object-center w-[250px] aspect-[9/16]"
        src="https://destinasian.co.id/id/wp/wp-content/uploads/mama-san.jpg"
        alt="tempat makan"
      />
      <div class="container mx-10 mt-20 ml-24">
        <h1 class="text-stone-950 text-[40px] font-bold">Warung Pak Wayan</h1>

        <div class="flex">
          <span class="bg-white rounded-md mt-6 border-r-4 py-3 px-3"
            >Deskripsi</span
          >
          <span class="bg-white rounded-md mt-6 px-3 py-3 text-primary"
            >Pesan</span
          >
        </div>

        <div class="mb-4 relative">
          <input
            type="text"
            id="username"
            name="username"
            class="w-96 px-5 pl-14 py-2 lg:py-3 hover:border-primary border-[3px] rounded-2xl bg-white mt-3"
            placeholder="Cari.."
          />
          <i
            data-feather="search"
            class="absolute z-50 top-0 bottom-0 left-4 h-full text-primary"
          ></i>
        </div>

        <div>
          <div class="w-52 h-52 bg-white rounded-xl">
            <img
              class="object-cover w-full h-20 aspect-video"
              src="https://thecozycook.com/wp-content/uploads/2023/02/Homemade-Ramen-f.jpg"
              alt="Ramen"
            />
            <span
              class="container flex justify-start items-start ml-3 mt-3 font-bold text-base"
              >Ramen Komplit</span
            >
            <span
              class="flex justify-start items-start ml-3 mt-1 text-zinc-500 text-[10px]"
            >
              Warung Pak Wayan</span
            >
            <div class="flex h-3 ml-3 mt-1">
              <img src="../public/material-symbols_star.svg" alt="star" />
              <img src="../public/material-symbols_star.svg" alt="star" />
              <img src="../public/material-symbols_star.svg" alt="star" />
              <img src="../public/material-symbols_star.svg" alt="star" />
              <img
                src="../public/material-symbols_star-outline.svg"
                alt="star"
              />
            </div>

            <div class="container flex justify-end items-end mt-1 px-3">
              <div
                class="bg-zinc-100 rounded-sm px-2 py-1 flex items-center gap-2"
              >
                <i data-feather="shopping-cart" class="w-2 h-2"></i>
                <span class="text-[7px] text-zinc-500">10</span>
              </div>
            </div>

            <div class="flex justify-start items-start ml-3 text-xs">
              <span> Rp.25.000</span>
            </div>

            <div class="flex justify-center items-center ml-12">
                <span class="bg-sky-100 rounded-sm mx-3 ml-9"><i data-feather="info" class="w-2 h-2"></i></span>

                <div class="flex">
                    <span class="bg-zinc-100 border-r rounded-sm ml-5"><i data-feather="minus" class="w-5 h-3"></i></span>
                    <span class="bg-primary rounded-sm"><i data-feather="plus" class="w-5 h-3"></i></span>
                </div>
            </div>
            

          </div>
        </div>
      </div>
    </div>

    <script>
      feather.replace();
    </script>
  </body>
</html> -->
