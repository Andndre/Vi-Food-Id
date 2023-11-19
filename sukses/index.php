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
  <body class="bg-gray-200">
    <!-- Navbar -->
    <nav class="bg-white shadow-sm fixed w-full">
      <div
        class="flex items-center h-16 justify-between w-full gap-6 container mx-auto px-4"
      >
        <img src="../public/logo.svg" alt="logo" class="h-5" />
        <div class="flex gap-4 items-center">
          <div class="flex gap-3 items-center">
            <a
              class="flex gap-2 items-center px-6 py-3 bg-primary/10 hover:bg-primary/25 transition-all duration-300 rounded-md"
              href="../pembelian"
              ><i data-feather="bar-chart-2"></i> Pembelian</a
            >
            <a
              class="flex gap-2 items-center px-6 py-3 bg-primary/10 hover:bg-primary/25 transition-all duration-300 rounded-md"
              href="../pembelian"
              ><i data-feather="shopping-cart"></i> Keranjang</a
            >
          </div>
          <div class="w-10 h-10 bg-gray-400 rounded-full"></div>
        </div>
      </div>
    </nav>
    <div class="flex justify-center items-center h-screen">
			<div class="bg-white p-8 rounded-xl space-y-6 flex flex-col items-center">
				<h1 class="font-bold text-2xl text-center">Pembayaran Sukses!</h1>
				<div class="p-4 border-[.2rem] border-green-400 rounded-full text-green-400"><i data-feather="check"></i></div>
				<a class="rounded-md px-6 py-3 bg-primary text-white font-bold w-full text-center" href="../kartu-bukti">Daftar Pembelian</a>
			</div>
		</div>
    <script>
      feather.replace();
    </script>
  </body>
</html>
