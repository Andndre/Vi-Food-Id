<?php
session_start();
if (!defined('ROOT')) {
    define('ROOT', $_SERVER['DOCUMENT_ROOT'] . '/vi-food-id');
}
require_once ROOT . "/module/backend/akun/cek-login.php";
require_once ROOT . "/module/backend/database/connection.php";

function getAllCommentsById($slug) {
	$koneksi = getDb();
	// Query untuk mendapatkan semua komentar pada semua menu dari tempat makan
	$query = "SELECT
		um.id AS ulasan_id,
		um.id_menu,
		um.pengirim,
		akun.image AS pengirim_image,
		um.bintang,
		um.isi AS ulasan_isi,
		GROUP_CONCAT(gu.href) AS gambar_ulasan_href
	FROM ulasan_menu AS um
	JOIN menu AS m ON um.id_menu = m.id
	JOIN tempat_makan AS tm ON m.tempat_makan = tm.username
	JOIN akun ON um.pengirim = akun.username
	LEFT JOIN gambar_ulasan AS gu ON um.id = gu.id_ulasan
	WHERE tm.slug = ?
	GROUP BY um.id, um.id_menu, um.pengirim, akun.image, um.bintang, um.isi;";

	$stmt = $koneksi->prepare($query);

	if (!$stmt) {
		echo "Error preparing statement: " . $koneksi->error;
		exit();
	}

	$stmt->bind_param("s", $slug);

	if (!$stmt->execute()) {
		echo "Error executing statement: " . $stmt->error;
		exit();
	} else {
		$result = $stmt->get_result();
		return $result;
	}
}

function getAllRating($slug) {
	$query = "SELECT
		tm.nama_tempat_makan,
		tm.slug AS tempat_makan_slug,
		COALESCE(SUM(CASE WHEN um.bintang = 0 THEN 1 ELSE 0 END), 0) AS rating_0,
		COALESCE(SUM(CASE WHEN um.bintang = 1 THEN 1 ELSE 0 END), 0) AS rating_1,
		COALESCE(SUM(CASE WHEN um.bintang = 2 THEN 1 ELSE 0 END), 0) AS rating_2,
		COALESCE(SUM(CASE WHEN um.bintang = 3 THEN 1 ELSE 0 END), 0) AS rating_3,
		COALESCE(SUM(CASE WHEN um.bintang = 4 THEN 1 ELSE 0 END), 0) AS rating_4,
		COALESCE(SUM(CASE WHEN um.bintang = 5 THEN 1 ELSE 0 END), 0) AS rating_5
	FROM tempat_makan AS tm
	LEFT JOIN menu AS m ON tm.username = m.tempat_makan
	LEFT JOIN ulasan_menu AS um ON m.id = um.id_menu
	WHERE tm.slug = '$slug'
	GROUP BY tm.nama_tempat_makan, tm.slug;";

	$koneksi = getDb();

	$result = $koneksi->query($query);

	if (!$result) {
		echo "Error executing query: " . $koneksi->error;
		exit();
	}

	$ratings = $result->fetch_assoc();

	return $ratings;
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
	$ratings = getAllRating($slug);
	$sumAllRating = $ratings['rating_0'] + $ratings['rating_1'] + $ratings['rating_2'] + $ratings['rating_3'] + $ratings['rating_4'] + $ratings['rating_5'];
	$maxRating = max((int)$ratings['rating_0'], (int)$ratings['rating_1'], (int)$ratings['rating_2'], (int)$ratings['rating_3'], (int)$ratings['rating_4'], (int)$ratings['rating_5']);

	// Panggil fungsi getAllCommentsById() dengan parameter $id
	$allUlasan = getAllCommentsById($slug);
	$infoTempatMakan = getInfoTempatMakan($slug);
} else {
	echo "Parameter 'id' tidak ditemukan dalam URL.";
}
?>

<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
  <?php 
		$_GET['title'] = 'Tempat Makan - ' . $infoTempatMakan['nama_tempat_makan'];
		require_once ROOT . '/module/components/head.php';
	?>
  <body class="bg-gray-200 pb-10">
    <!-- Navbar -->
    <?php 
			require ROOT . "/module/components/navbar.php";
		?>
    <!-- End Navbar -->
    
    <!-- Content -->
    <div class="container mx-auto grid grid-cols-12 gap-3">
      <div class="relative col-span-12 aspect-video md:aspect-auto md:col-span-4 overflow-hidden md:h-screen flex flex-col justify-center">
        <img
          class="sticky object-cover object-center w-full h-full transition-all hover:scale-125 duration-200"
          src="<?= '/vi-food-id/uploads/' . $infoTempatMakan['image']?>"
          alt="tempat makan"
        />
      </div>
      <div class="p-4 pt-14 col-span-12 md:col-span-8">
        <h1 class="text-4xl font-bold"><?= $infoTempatMakan['nama_tempat_makan'] ?></h1>
        <div class="flex mt-5">
          <a
            href="#"
            class="hover:bg-gray-100 bg-white rounded-tl-md rounded-bl-md p-3 border-r text-primary"
            >Deskripsi</a
          >
          <a
            href="../menu?slug=<?= $infoTempatMakan['slug'] ?>"
            class="hover:bg-gray-100 bg-white rounded-tr-md rounded-br-md p-3"
            >Pesan</a
          >
        </div>
        <div>
          <p class="mt-4 text-justify text-gray-500">
						<?= $infoTempatMakan['deskripsi'] ?>
          </p>
        </div>
        <div class="pt-8"></div>
        <a href="../menu?slug=<?= $infoTempatMakan['slug'] ?>" class="bg-primary text-white rounded-lg px-10 py-3 font-bold"> Makan di sini </a>
        <hr class="w-full mt-11 border-t border-gray-300">
        <h2 class="font-bold text-xl mt-6">Rating dan Komentar</h2>
        <p class="mt-2 text-gray-500">Berikut adalah kumpulan komentar yang sudah pernah makan di sini</p>
        
				<?php foreach (['rating_0', 'rating_1', 'rating_2', 'rating_3', 'rating_4', 'rating_5'] as $index => $key): ?>
						<div class="flex items-center mt-2">
								<a href="#" class="text-sm font-medium"><?= $index ?></a>
								<div class="w-2/4 h-3 mx-4 bg-gray-300 rounded">
										<div class="h-3 bg-primary rounded" style="width: <?= $ratings[$key] / $maxRating * 100 ?>%"></div>
								</div>
								<span class="text-sm font-medium text-gray-500"><?= ($ratings[$key] / $maxRating) * (100 / $sumAllRating) ?>%</span>
						</div>
				<?php endforeach ?>
        
        <!-- Komentar -->
        <div class="grid grid-cols-12 gap-3 mt-5">
				<?php if ($allUlasan): ?>
							<?php 
							while ($ulasan = $allUlasan->fetch_assoc()): 
							$gambarPengirim = $ulasan['pengirim_image'] ? '/vi-food-id/uploads/' . $ulasan['pengirim_image'] : "/vi-food-id/assets/images/profile.png";?>
							<div class="rounded-lg bg-white col-span-12">
									<div class="flex gap-3 p-4">
											<img class="w-10 h-10 aspect-square object-cover rounded-full"
												src="<?= $gambarPengirim ?>"
												alt="Rounded avatar" />
											<div class="space-y-2">
												<span class="font-bold"><?= $ulasan['pengirim'] ?></span>
												<div class="flex gap-1">
													<?php for ($i = 0; $i < $ulasan['bintang']; $i++): ?>
													<svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
														fill="currentColor" viewBox="0 0 22 20">
														<path
															d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
													</svg>
													<?php endfor; ?>
													<?php for ($i = 0; $i < 5 - $ulasan['bintang']; $i++): ?>
													<svg class="w-4 h-4 text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
														fill="currentColor" viewBox="0 0 22 20">
														<path
															d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
													</svg>
													<?php endfor; ?>
												</div>
												<p>
													<?= $ulasan['ulasan_isi'] ?>
												</p>
											</div>
									</div>
									<?php if ($ulasan['gambar_ulasan_href']): 
										$gambarUlasan = explode(',', $ulasan['gambar_ulasan_href']);
									?>	
										<div id="controls-carousel" class="relative w-full" data-carousel="static">
												<div class="relative h-56 overflow-hidden rounded-lg md:h-96">
												<?php foreach ($gambarUlasan as $key => $value): 
														$gambar = '/vi-food-id/uploads/' . $value;
														$isActive = ($key === 0) ? 'active' : '';
												?>
												<div class="hidden duration-700 ease-in-out" data-carousel-item="<?= $isActive ?>">
														<img src="<?= $gambar ?>" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="..." />
												</div>
												<?php endforeach; ?>
											</div>
											<button type="button"
												class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
												data-carousel-prev>
												<span
													class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
													<svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true"
														xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
														<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
															stroke-width="2" d="M5 1 1 5l4 4" />
													</svg>
												</span>
											</button>
											<button type="button"
													class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
													data-carousel-next>
													<span
															class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
															<svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true"
																xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
																<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
																	stroke-width="2" d="m1 9 4-4-4-4" />
															</svg>
															<span class="sr-only">Next</span>
													</span>
											</button>
									</div>
									<?php endif; ?>
							</div>
							<?php endwhile; ?>
						<?php endif ?>
        </div>
      </div>
    </div>
    <!-- End Main -->

    <script>
      feather.replace();
    </script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.js"></script>
  </body>
</html>
