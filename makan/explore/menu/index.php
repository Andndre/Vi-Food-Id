<?php
if (!defined('ROOT'))
  define('ROOT', $_SERVER['DOCUMENT_ROOT'] . '/vi-food-id');

	require ROOT . "/module/backend/akun/cek-penjual.php";
	require_once ROOT . "/module/backend/database/connection.php";
	
	session_start();
	$tempatMakan = $_SESSION['username'];
	
	function getAllMenu($slug) {
		$queryMenu = "SELECT
				m.id AS menu_id,
				m.nama AS menu_nama,
				m.gambar AS menu_gambar,
				m.harga AS menu_harga,
				m.deskripsi AS menu_deskripsi
		FROM menu AS m
		JOIN tempat_makan AS tm ON m.tempat_makan = tm.username
		WHERE tm.slug = ?";
		$koneksi = getdb();
		$stmtMenu = $koneksi->prepare($queryMenu);
		$stmtMenu->bind_param("s", $slug);
		
		if ($stmtMenu->execute()) {
				$menu = $stmtMenu->get_result();
				return $menu;
		} else {
				// Handle query execution error
				echo "Error executing query: " . $stmtMenu->error;
				exit();
		}
	}

	function getInfoTempatMakan($slug) {
		$koneksi = getDb();
		$query = "SELECT * FROM tempat_makan WHERE slug = '$slug'";
	
		$result = $koneksi->query($query);
	
		if (!$result) {
			echo "Error executing query: " . $koneksi->error;
			exit();
		} else {
			$row = $result->fetch_assoc();
			return $row;
		}
	}
	
	
	// Periksa apakah parameter 'id' ada dalam URL
	if(isset($_GET['slug'])) {
		$slug = $_GET['slug'];
		$menu = getAllMenu($slug);
		$infoTempatMakan = getInfoTempatMakan($slug);
} else {
	echo "Parameter 'id' tidak ditemukan dalam URL.";
}
?>

<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<?php
$_GET['title'] = 'Semua Menu - ' . $infoTempatMakan['nama_tempat_makan'];
require ROOT . "/module/components/head.php"
  ?>

<body class="bg-gray-200 pb-10">
    <!-- Navbar -->
    <?php
    require ROOT . "/module/components/navbar.php"
      ?>
    <!-- End Navbar -->
    <!-- Content -->
    <div class="container mx-auto grid grid-cols-12 gap-3">
        <div
            class="relative col-span-12 aspect-video md:aspect-auto md:col-span-4 overflow-hidden md:h-screen flex flex-col justify-center">
            <img class="sticky object-cover object-center w-full h-full transition-all hover:scale-125 duration-200"
                src="<?= '/vi-food-id/uploads/' . $infoTempatMakan['image']?>"
                alt="tempat makan" />
        </div>
        <div class="p-4 pt-14 col-span-12 md:col-span-8">
            <h1 class="text-4xl font-bold"><?php echo $infoTempatMakan['nama_tempat_makan'] ?></h1>
            <div class="flex mt-5">
                <a href="../tempat?slug=<?php echo $slug ?>"
                    class="hover:bg-gray-100 bg-white rounded-tl-md rounded-bl-md p-3 border-r">Deskripsi</a>
                <a href="detail/index.php"
                    class="hover:bg-gray-100 bg-white rounded-tr-md rounded-br-md p-3 text-primary">Pesan</a>
            </div>
            <div class="grid grid-cols-12 pt-8">
								<?php while ($row = $menu->fetch_assoc()): 
									$gambar = '/vi-food-id/uploads/' . $row['menu_gambar'];
									$harga = "Rp. " . number_format($row['menu_harga'], 0, ",", ".");
									?>
                <div
                    class="overflow-hidden col-span-12 sm:col-span-4 md:col-span-6 lg:col-span-4 bg-white rounded-2xl shadow-sm">
                    <img class="w-full aspect-video object-cover"
                        src="<?php echo $gambar ?>"
                        alt="menu">
                    <div class="p-4 space-y-2 text-sm">
											<h3 class="font-bold text-xl"><?= $row['menu_nama'] ?><h3>
												<div class="flex justify-between items-center flex-wrap gap-3 pt-4">
														<span class="text-lg text-gray-400 font-semibold"><?= $harga ?></span>
														<a class="px-6 py-3 ml-auto bg-primary/20 hover:bg-primary transition-all duration-300 font-semibold rounded-lg"
															href="detail?id=<?= $row['menu_id'] ?>">Lihat</a>
												</div>
                    </div>
                </div>
								<?php endwhile; ?>
            </div>
        </div>
    </div>
    <!-- End Main -->

    <script>
    feather.replace();
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>	
</body>

</html>

