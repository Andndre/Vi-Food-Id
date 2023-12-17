<?php
if (!defined('ROOT'))
  define('ROOT', $_SERVER['DOCUMENT_ROOT'] . '/vi-food-id');
require ROOT . "/module/backend/akun/cek-penjual.php";
require_once ROOT . "/module/backend/database/connection.php";

session_start();
$tempatMakan = $_SESSION['username'];

function getAllMenu($tempatMakan) {
	$queryMenu = "SELECT * FROM menu WHERE tempat_makan = ?";
	$koneksi = getdb();
	$stmtMenu = $koneksi->prepare($queryMenu);
	$stmtMenu->bind_param("s", $tempatMakan);
	
	if ($stmtMenu->execute()) {
			$menu = $stmtMenu->get_result();
			return $menu;
	} else {
			// Handle query execution error
			echo "Error executing query: " . $stmtMenu->error;
			exit();
	}
}

$menu = getAllMenu($tempatMakan);
?>

<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
  <?php require ROOT . "/module/components/head.php" ?>
  <body class="bg-gray-200">
    <div class="flex w-full min-h-screen">
      <?php 
        $_GET['highlight'] = "manajemen-menu";
      require ROOT . "/module/components/sidebar-penjual.php";
      ?>
      <div class="flex-1 flex flex-col">
				<?php require ROOT . "/module/components/navbar.php";?>
        <div class="px-4 md:px-8 py-8 ">
          <div class="flex flex-col lg:justify-between lg:items-center gap-3 pb-8 lg:flex-row  ">
            <h1 class="font-bold text-xl">Semua Menu</h1>
              <a href="tambah/" class="flex bg-primary  rounded-md px-4 py-2 text sm mr-auto lg:mr-0 hover:bg-orange-700 font-medium text-white ">
                <i data-feather="plus" class="text-white text-sm mx-1" ></i> 
                Tambah Menu
              </a>
          </div>
          <div class="grid grid-cols-12 gap-4">
						<!-- Card Start -->
						<?php while ($row = $menu->fetch_assoc()): ?>
						<div class="overflow-hidden col-span-12 md:col-span-6 lg:col-span-4 bg-white rounded-2xl shadow-sm">
							<img class="w-full object-cover aspect-video" src="/vi-food-id/uploads/<?= $row['gambar'] ?>" alt=""/>
							<div class="p-4 space-y-2">
								<h3 class="font-bold text-xl"><?= $row['nama'] ?><h3>
								<div class="flex justify-between items-center flex-wrap gap-3 pt-4">
									<span class="text-lg text-gray-400 font-semibold"><?= $row['harga'] ?></span>
									<a class="flex gap-2 items-center px-6 py-3 ml-auto bg-primary/20 hover:bg-primary transition-all duration-300 font-semibold rounded-lg" href="edit?id=<?= $row['id'] ?>"><i class="h-5" data-feather="edit-2"></i> Edit</a>
								</div>
							</div>
						</div>
						<?php 
							endwhile; 
							$menu->free_result();
						?>
						</div>
					</div>
					<!-- Konten -->
					<footer class="px-8 container mx-auto py-4 border-t">
						Copyright © 2023 VI-Food.co
					</footer>
        </div>
      </div>
    </div>
    <script>
      feather.replace();
    </script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.js"></script>
    <style>
      .hidden {
        display: none;
      }
    </style>
  </body>
</html>
