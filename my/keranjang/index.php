<?php
if (!defined('ROOT')) define('ROOT', $_SERVER['DOCUMENT_ROOT'] . '/vi-food-id');

session_start();
include ROOT . "/module/backend/akun/cek-login.php";
?>

<!DOCTYPE html>
<html lang="en">
  <?php
  if (!defined('ROOT'))
    define('ROOT', $_SERVER['DOCUMENT_ROOT'] . '/vi-food-id');
  $_GET['title'] = 'Keranjang Saya';
  require ROOT . "/module/components/head.php";
  ?>
  <body class="bg-gray-200">
    <!-- Navbar -->
		<?php
		require ROOT . '/module/components/navbar.php';
		?>

    <div class="flex flex-col lg:flex-row">
      <aside
        id="sidebar"
        class="bg-card-foreground bg-black text-white text-card border-r shadow-xl lg:min-h-[calc(100vh-64px)] lg:max-w-[250px] p-4 z-[100] flex flex-col"
      >
        <ul class="space-y-1 flex-1 text-gray-300">
          <li
            title="Dashboard"
            class="transition-all duration-300 rounded-md px-4 py-2 bg-primary/25 text-primary"
          >
            <a class="flex items-center gap-3" href="../">
              <i data-feather="loc"></i>
              <div class="sidebar-text">Warung Pak Wayan</div></a
            >
          </li>
          <!-- <li
            title="Dashboard"
            class="transition-all duration-300 rounded-md px-4 py-2 bg-gray-900"
          >
            <a class="flex items-center gap-3" href="../">
              <i data-feather="loc"></i>
              <div class="sidebar-text">KFC</div></a
            >
          </li> -->
        </ul>
      </aside>
      <div class="flex-1 w-full">
        <div class="w-full relative overflow-x-scroll sm:rounded-lg">
          <table class="w-full min-w-3xl mt-4 text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
              <tr>
                <th scope="col" class="px-16 py-3">
                  <span class="">Image</span>
                </th>
                <th scope="col" class="px-6 py-3">Menu</th>
                <th scope="col" class="px-6 py-3">Jumlah</th>
                <th scope="col" class="px-6 py-3">Harga</th>
                <th scope="col" class="px-6 py-3">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr class="bg-white border-b hover:bg-gray-50">
                <td class="p-4">
                  <img
                    src="https://images.unsplash.com/photo-1645696301019-35adcc18fc21?auto=format&fit=crop&q=80&w=1329&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    class="w-16 md:w-32 max-w-full max-h-full"
                    alt="Apple Watch"
                  />
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900">
                  Mie Goreng Sehat
                </td>
                <td class="px-6 py-4">
                  <div class="flex items-center">
                    <button
                      class="inline-flex items-center justify-center p-1 me-3 text-sm font-medium h-6 w-6 text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200"
                      type="button"
                    >
                      <svg
                        class="w-3 h-3"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 18 2"
                      >
                        <path
                          stroke="currentColor"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M1 1h16"
                        />
                      </svg>
                    </button>
                    <div>
                      <input
                        type="number"
                        id="first_product"
                        class="bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1"
                        placeholder="1"
                        required
                      />
                    </div>
                    <button
                      class="inline-flex items-center justify-center h-6 w-6 p-1 ms-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200"
                      type="button"
                    >
                      <svg
                        class="w-3 h-3"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 18 18"
                      >
                        <path
                          stroke="currentColor"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M9 1v16M1 9h16"
                        />
                      </svg>
                    </button>
                  </div>
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900">
                  Rp. 25.000, 00
                </td>
                <td class="px-6 py-4">
                  <a href="#" class="font-medium text-red-600 hover:underline"
                    >Remove</a
                  >
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div
          class="bg-slate-100 py-3 rounded-md w-full shadow-md flex justify-end items-center px-4 gap-3 lg:px-20 border-t-2"
        >
          <span class="">Rp.380.0000</span>
          <a
            class="flex ml-3 bg-gray-200 py-3 px-6 rounded-lg"
            href="../kursi"
            ><i data-feather="shopping-cart" class="mr-3"></i>CHECKOUT (6)</a
          >
        </div>
      </div>
    </div>
    <script>
      feather.replace();
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>	
  </body>
</html>
