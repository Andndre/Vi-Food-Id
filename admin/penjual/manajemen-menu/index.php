<?php 
require "../../../module/backend/database/connection.php";

session_start();
$tempatMakan = $_SESSION['username'];

$query = "SELECT * FROM menu WHERE tempat_makan = ?";
$stmt = $koneksi->prepare($query);
$stmt->bind_param("s", $tempatMakan);

if ($stmt->execute()) {
    $result = $stmt->get_result();
} else {
    // Handle query execution error
    echo "Error executing query: " . $stmt->error;
}
?>


<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>VI Food</title>
    <link rel="stylesheet" href="../../../assets/css/dist/output.css" />
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
      integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
      crossorigin="anonymous"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.js"></script>
  </head>
  <body class="bg-gray-200">
    <div class="flex w-full min-h-screen">
      <?php 
        $_GET['highlight'] = "manajemen-menu";
        require "../../../module/components/sidebar-penjual.php" 
      ?>
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
				<!-- Konten -->
        <div class="px-4 md:px-8 py-8 ">
          <div class="flex flex-col lg:justify-between lg:items-center gap-3 pb-8 lg:flex-row  ">
            <h1 class="font-bold text-xl">Semua Menu</h1>
           
              <a href="../tambah-menu/" class="flex bg-primary  rounded-md px-4 py-2 text sm mr-auto lg:mr-0 hover:bg-orange-700 font-medium text-white ">
                <i data-feather="plus" class="text-white text-sm mx-1" ></i> 
                Tambah Menu
              </a>
          </div>

          <div class="grid grid-cols-12 gap-4">
							<!-- Card Start -->
              <?php while ($row = $result->fetch_assoc()): ?>
							<div class="overflow-hidden col-span-12 md:col-span-6 lg:col-span-4 bg-white rounded-2xl shadow-sm">
								<img class="w-full object-cover aspect-video" src="../../../uploads/<?= $row['gambar'] ?>" alt="">
								<div class="p-4 space-y-2">
									<h3 class="font-bold text-xl"><?= $row['nama'] ?><h3>
									<div class="flex justify-between items-center flex-wrap gap-3 pt-4">
										<span class="text-lg text-gray-400 font-semibold"><?= $row['harga'] ?></span>
										<a class="flex gap-2 items-center px-6 py-3 ml-auto bg-primary/20 hover:bg-primary transition-all duration-300 font-semibold rounded-lg" href="../edit-menu?id=<?= $row['id'] ?>"><i class="h-5" data-feather="edit-2"></i> Edit</a>
									</div>
								</div>
							</div>
              <?php 
                endwhile; 
                $result->free_result();
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
    <style>
      .hidden {
        display: none;
      }
    </style>
  </body>
</html>
