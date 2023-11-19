<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>VI Food</title>
    <link rel="stylesheet" href="./css/dist/output.css" />
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"
      integrity="sha512-A7AYk1fGKX6S2SsHywmPkrnzTZHrgiVT7GcQkLGDe2ev0aWb8zejytzS8wjo7PGEXKqJOrjQ4oORtnimIRZBtw=="
      crossorigin="anonymous"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.js"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css"
      integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w=="
      crossorigin="anonymous"
    />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.css"  rel="stylesheet" />
  </head>

  <body class="bg-gray-200">

    <!-- navbar mulai -->
    <nav
      class="bg-white fixed w-full z-20 top-0 start-0 border-b border-gray-200"
    >
      <div
        class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
          <img
            src="./public/logo.svg"
            class="h-4"
            alt="Vi-Food Logo"
          />
      
        </a>
        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
          <a href="./login/index.html">
            
            <button
              type="button"
              class="border-2 border-primary text-white bg-primary hover:bg-primary focus:ring-4 focus:outline-none focus:ring-amber-100 font-medium rounded-lg text-sm px-4 py-2 text-center ">
              Login
            </button>
          </a>
          <button
            data-collapse-toggle="navbar-sticky"
            type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 "
            aria-controls="navbar-sticky"
            aria-expanded="false"
          >
            
            <i data-feather="menu"></i>
          </button>
        </div>
        <div
          class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1"
          id="navbar-sticky"
        >
          <ul
            class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white">
            <li>
              <a
                href="#"
                class="block py-2 px-3 text-gray-900 rounded hover:bg-primary md:hover:bg-transparent md:hover:text-primary md:p-0 "
                aria-current="page"
                >Home</a>
            </li>

            <li>
              <a
                href="#tentang-kami"
                class="block py-2 px-3 text-gray-900 rounded hover:bg-primary md:hover:bg-transparent md:hover:text-primary md:p-0 "
                >Tentang Kami</a
              >
            </li>
            <li>
              <a
                href="#footer-kontak"
                class="block py-2 px-3 text-gray-900 rounded hover:bg-primary md:hover:bg-transparent md:hover:text-primary md:p-0 "
                >Kontak Kami</a
              >
            </li>

            <li>
              <a
                href="#layanan-kami"
                class="block py-2 px-3 text-gray-900 rounded hover:bg-primary md:hover:bg-transparent md:hover:text-primary md:p-0 "
                >Layanan Kami</a
              >
            </li>
           
          </ul>
        </div>
      </div>
    </nav>

    <!-- navbar selesai -->
    <!-- Hero -->

    <div
      class="flex container mx-auto max-w-5xl min-h-screen items-center text-center lg:px-12 lg:text-start gap-3"
    >
      <div
        data-aos="fade-up"
        class="space-y-3 flex flex-col items-center mx-auto lg:items-start"
      >
        <img src="./public/logo.svg" alt="logo" class="h-5" />
        <h1 class="font-bold text-4xl">Sistem Pelayanan Khusus Tempat Makan</h1>
        <p>
          VI-Food memudahkan pemesanan makanan dan tempat makan dengan sistem
          pembayaran online
        </p>
        <div class="pt-2"></div>
        <a
          href="#tentang-kami"
          class="px-8 py-3 bg-primary text-white rounded-lg font-bold hover:bg-primary/70"
          >Lebih Lanjut</a
        >
      </div>
      <div class="hidden lg:block self-start">
        <img src="./public/hero-image.png" alt="" class="max-h-[80vh]" />
      </div>
    </div>
    <!-- Tentang Kami -->
    <section
      data-aos="fade-up"
      id="tentang-kami"
      class="flex flex-col-reverse justify-center container mx-auto px-4 lg:px-12 max-w-5xl min-h-screen text-center lg:items-center lg:text-start lg:flex-row"
    >
      <img
        src="./public/about-us.png"
        alt=""
        class="max-h-[80vh] mx-7 lg:max-w-[50%] lg:m-0"
      />
      <div class="pt-6 pl-6"></div>
      <div class="space-y-3">
        <h2 class="font-bold text-3xl">Tentang Kami</h2>
        <p>
          VI-Food merupakan sebuah aplikasi untuk pelanggan di sebuah Tempat
          Makan yang menyediakan layanan khusus. Dengan Aplikasi ini, pelanggan
          bisa mendaftar sebagai pelanggan khusus dengan mudah. Aplikasi ini
          menyediakan berbagai fitur seperti pemesanan online,
          mendapatkan pelayanan khusus, dan fitur untuk mengecek kesediaan tempat makan
          di slot pelanggan khusus.
        </p>
      </div>
    </section>
    <!-- Layanan Kami -->
    <section
      data-aos="fade-up"
      id="layanan-kami"
      class="container mx-auto lg:px-12 max-w-5xl min-h-screen py-8 flex flex-col gap-6"
    >
      <h2 class="font-bold text-3xl text-center">Layanan Kami</h2>
      <!-- List Layanan -->
      <div class="flex flex-wrap justify-center gap-4">
        <div class="space-y-3 text-center">
          <img
            src="./public/layanan-1.png"
            alt=""
            class="md:w-[300px] lg-w-[200px]"
          />
          <p>Mudah Memesan Lewat App</p>
        </div>
        <div class="space-y-3 text-center">
          <img
            src="./public/layanan-2.png"
            alt=""
            class="md:w-[300px] lg-w-[200px]"
          />
          <p>Pesanan Cepat Disajikan</p>
        </div>
        <div class="space-y-3 text-center">
          <img
            src="./public/layanan-3.png"
            alt=""
            class="md:w-[300px] lg-w-[200px]"
          />
          <p>Menyediakan Layanan Khusus</p>
        </div>
        <div class="space-y-3 text-center">
          <img
            src="./public/layanan-4.png"
            alt=""
            class="md:w-[300px] lg-w-[200px]"
          />
          <p>Mengutamakan Pesanan Anda</p>
        </div>
      </div>
    </section>
    <section data-aos="fade-up" class="bg-white">
      <div
        class="container mx-auto p-4 lg:px-12 max-w-5xl py-16 flex flex-col gap-14"
      >
        <h2 class="font-bold text-3xl text-center">
          Santai saja dalam perjalanan anda, kursi anda kami yang jaga
          <span class="inline-block"
            ><img class="h-6" src="./public/cup.png" alt=""
          /></span>
        </h2>
        <div class="grid grid-cols-12 gap-3">
          <div
            class="col-span-12 md:col-span-4 lg:col-span-3 flex flex-col items-center text-center gap-3"
          >
            <img
              class="w-28 sm:w-32 md:w-36 lg:w-40"
              src="./public/landing-1.png"
              alt=""
            />
            <p>
              Nikmati Makanan dan minuman ditempat favoritmu dengan instan tanpa
              antri
            </p>
          </div>
          <div
            class="col-span-12 md:col-span-4 lg:col-span-3 flex flex-col items-center text-center gap-3"
          >
            <img
              class="w-28 sm:w-32 md:w-36 lg:w-40"
              src="./public/landing-2.png"
              alt=""
            />
            <p>Kunjungi tempat makan favorit anda</p>
          </div>
          <div
            class="col-span-12 md:col-span-4 lg:col-span-3 flex flex-col items-center text-center gap-3"
          >
            <img
              class="w-28 sm:w-32 md:w-36 lg:w-40"
              src="./public/landing-3.png"
              alt=""
            />
            <p>Transaksi lebih mudah dengan E-Wallet</p>
          </div>
          <div
            class="col-span-12 md:col-span-4 lg:col-span-3 flex flex-col items-center text-center gap-3"
          >
            <img
              class="w-28 sm:w-32 md:w-36 lg:w-40"
              src="./public/landing-4.png"
              alt=""
            />
            <p>Nikmati perjalanan anda</p>
          </div>
        </div>
      </div>
    </section>
    <section
      data-aos="fade-up "
      class="container mx-auto lg:px-12 max-w-5xl flex flex-col gap-6 py-28"
    >
      <div
        class="rounded-lg flex flex-col items-center py-6 gap-6 bg-gray-900 text-white"
      >
        <h2 class="font-bold text-3xl text-center">
          Tertarik? Ayo buruan mulai!
        </h2>
        <a
          href="./Pilihan_Register"
          class="px-8 py-3 bg-primary text-white rounded-lg font-bold hover:bg-primary/70"
          >Mulai</a
        >
      </div>
    </section>

    <footer class="bg-white" id="footer-kontak">
      <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
        <div class="md:flex md:justify-between">
          <div class="mb-6 md:mb-0">
            <a href="#" class="flex items-center">
              <img
                src="./public/logo.svg"
                class="h-6 me-3"
                alt="VI-Food-logo"
              />
            </a>
          </div>
          <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
            <div>
              <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase">
                Lapar Order Sekarang
              </h2>
              <ul class="text-gray-500 font-medium">
                <li class="mb-4">
                  <a href="#" class="hover:underline">Makanaan</a>
                </li>
                <li>
                  <a href="#" class="hover:underline">Minuman</a>
                </li>
              </ul>
            </div>
            <div>
              <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase">
                Ikuti Kami
              </h2>
              <ul class="text-gray-500 font-medium">
                <li class="mb-4">
                  <a
                    href="https://github.com/Andndre/VI-Food"
                    class="hover:underline"
                    >Github</a
                  >
                </li>
                <li>
                  <a href="#" class="hover:underline">Instagram</a>
                </li>
              </ul>
            </div>
            <div>
              <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase">
                Legal
              </h2>
              <ul class="text-gray-500 font-medium">
                <li class="mb-4">
                  <a href="#" class="hover:underline">Privacy Policy</a>
                </li>
                <li>
                  <a href="#" class="hover:underline">Terms &amp; Conditions</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto lg:my-8" />
        <div class="sm:flex sm:items-center sm:justify-between">
          <span class="text-sm text-gray-500 sm:text-center"
            >© 2023 <a href="#" class="hover:underline">Vi-Food</a>. All Rights
            Reserved.
          </span>
          <div class="flex mt-4 sm:justify-center sm:mt-0">
            <a href="#" class="text-gray-500 hover:text-gray-900">
              <i data-feather="facebook" class="w-4 h-4"></i>
            </a>

            <a
              href="https://github.com/Andndre/VI-Food"
              class="text-gray-500 hover:text-gray-900 ms-5"
            >
              <i data-feather="github" class="h-4 w-4"></i>
            </a>
            <a href="#" class="text-gray-500 hover:text-gray-900 ms-5">
              <i data-feather="instagram" class="h-4 w-4"></i>
            </a>
          </div>
        </div>
      </div>
    </footer>

    <script>
      AOS.init();
      feather.replace();
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.js"></script>
  </body>
</html>
