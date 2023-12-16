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
    <!-- Navbar -->
    <nav class="bg-white shadow-sm">
     <?php 
      require "../../module/components/navbar.php"
     ?>
    </nav>
    <!-- navbar end -->
    <h1 class="text-center text-3xl font-bold mt-5 mb-5">Pilih Kursi</h1>
    <div class="grid gap-4 container mx-auto max-w-2xl mt-8 px-4">
      <div>
        <img
          class="h-auto max-w-full rounded-lg border-2 border-gray-400"
          src="https://ifimelamine.com/wp-content/uploads/2022/10/Apa-Saja-Peralatan-Untuk-Membuka-Warung-Makan.jpg"
          alt=""
        />
      </div>
      <div class="flex gap-3 overflow-x-scroll">
        <label class="p-4 cursor-pointer rounded-lg relative border-2 border-gray-400 max-w-[10rem] aspect-[14/9] flex justify-center items-center">
          <input name="kursi" type="checkbox" class="absolute top-2 left-2">
          1
        </label>
        <label class="p-4 cursor-pointer rounded-lg relative border-2 border-gray-400 max-w-[10rem] aspect-[14/9] flex justify-center items-center">
          <input name="kursi" type="checkbox" class="absolute top-2 left-2">
          2
        </label>
        <label class="p-4 cursor-pointer rounded-lg relative border-2 border-gray-400 max-w-[10rem] aspect-[14/9] flex justify-center items-center">
          <input name="kursi" type="checkbox" class="absolute top-2 left-2">
          3
        </label>
        <label class="p-4 cursor-pointer rounded-lg relative border-2 border-gray-400 max-w-[10rem] aspect-[14/9] flex justify-center items-center">
          <input name="kursi" type="checkbox" class="absolute top-2 left-2">
          4
        </label>
        <label class="p-4 cursor-pointer rounded-lg relative border-2 border-gray-400 max-w-[10rem] aspect-[14/9] flex justify-center items-center">
          <input name="kursi" type="checkbox" class="absolute top-2 left-2">
          5
        </label>
        <label class="p-4 cursor-pointer rounded-lg relative border-2 border-gray-400 max-w-[10rem] aspect-[14/9] flex justify-center items-center">
          <input name="kursi" type="checkbox" class="absolute top-2 left-2">
          6
        </label>
        <label class="p-4 cursor-pointer rounded-lg relative border-2 border-gray-400 max-w-[10rem] aspect-[14/9] flex justify-center items-center">
          <input name="kursi" type="checkbox" class="absolute top-2 left-2">
          7
        </label>
        <label class="p-4 cursor-pointer rounded-lg relative border-2 border-gray-400 max-w-[10rem] aspect-[14/9] flex justify-center items-center">
          <input name="kursi" type="checkbox" class="absolute top-2 left-2">
          8
        </label>
        <!--  -->
        <label class="p-4 cursor-pointer rounded-lg relative border-2 border-gray-400 max-w-[10rem] aspect-[14/9] flex justify-center items-center">
          <input name="kursi" type="checkbox" class="absolute top-2 left-2">
          9
        </label>
        <label class="p-4 cursor-pointer rounded-lg relative border-2 border-gray-400 max-w-[10rem] aspect-[14/9] flex justify-center items-center">
          <input name="kursi" type="checkbox" class="absolute top-2 left-2">
          10
        </label>
        <label class="p-4 cursor-pointer rounded-lg relative border-2 border-gray-400 max-w-[10rem] aspect-[14/9] flex justify-center items-center">
          <input name="kursi" type="checkbox" class="absolute top-2 left-2">
          11
        </label>
        <label class="p-4 cursor-pointer rounded-lg relative border-2 border-gray-400 max-w-[10rem] aspect-[14/9] flex justify-center items-center">
          <input name="kursi" type="checkbox" class="absolute top-2 left-2">
          12
        </label>
      </div>
    </div>
    <h2 class="text-center text-2xl font-bold mt-10 mb-10">
      Kursi Tersisa : 10
    </h2>
    <div class="flex justify-center">
      <a href="../pembayaran">
        <button
          class="bg-primary hover:bg-orange-500 text-white font-bold py-2 px-4 rounded"
        >
          Continue
        </button>
      </a>

      <a href="../pembayaran">
        <button
          class="hover:bg-primary hover:text-white text-primary font-bold py-2 px-4 ml-4 border-2 bg-transparent rounded-md border-primary"
        >
          Take away?
        </button>
      </a>
    </div>
    <div class="pb-10"></div>
    <script>
      feather.replace();
    </script>
  </body>
</html>
