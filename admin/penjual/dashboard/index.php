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
        $_GET['highlight'] = "dashboard";
        require ROOT . "/module/components/sidebar-penjual.php" 
      ?>
      <div class="flex-1 flex flex-col">
			<?php require ROOT . "/module/components/navbar.php"; ?>
        <div class="flex-1 px-4 md:px-8 py-8">
          <div>
            <h1
              class="scroll-m-20 pb-2 text-3xl font-bold tracking-tight transition-colors"
            >
              Dashboard
            </h1>
            <div
              data-orientation="horizontal"
              role="none"
              class="shrink-0 bg-border h-[1px] w-full my-4"
            ></div>
            <div class="grid grid-cols-6 gap-3">
              <div
                class="col-span-6 md:col-span-3 lg:col-span-2 rounded-md border-gray-400 border p-4 relative shadow-sm"
              >
                <h2
                  class="scroll-m-20 pb-2 text-2xl font-semibold tracking-tight transition-colors"
                >
                  14
                </h2>
                <p class="font-medium text-muted-foreground">MENU</p>
                <i
                  data-feather="book-open"
                  class="h-8 w-8 absolute top-4 right-4 text-green-500"
                >
                </i>
              </div>
              <div
                class="col-span-6 md:col-span-3 lg:col-span-2 rounded-md border-gray-400 border p-4 relative shadow-sm"
              >
                <h2
                  class="scroll-m-20 pb-2 text-2xl font-semibold tracking-tight transition-colors"
                >
                  1.3K
                </h2>
                <p class="font-medium text-muted-foreground">ULASAN</p>
                <i
                  data-feather="message-circle"
                  class="h-8 w-8 absolute top-4 right-4 text-green-500"
                >
                </i>
              </div>
              <div
                class="col-span-6 md:col-span-3 lg:col-span-2 rounded-md border-gray-400 border p-4 relative shadow-sm"
              >
                <h2
                  class="scroll-m-20 pb-2 text-2xl font-semibold tracking-tight transition-colors"
                >
                  4
                </h2>
                <p class="font-medium text-muted-foreground">KURSI KOSONG</p>
                <i
                  data-feather="briefcase"
                  class="h-8 w-8 absolute top-4 right-4 text-green-500"
                >
                </i>
              </div>
            </div>
          </div>
        </div>
        <footer class="px-8 container mx-auto py-4 border-t">
          Copyright © 2023 VI-Food.co
        </footer>
      </div>
    </div>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>	
    <style>
      .hidden {
        display: none;
      }
    </style>
  </body>
</html>
