<?php
if (!defined('ROOT')) define('ROOT', $_SERVER['DOCUMENT_ROOT'] . '/vi-food-id');
require ROOT . "/module/backend/akun/cek-login.php";
require_once ROOT . "/module/backend/database/connection.php";

$username = $_SESSION['username'];

function getWaktu() {
	// Set zona waktu menjadi WIB (Waktu Indonesia Bagian Tengah)
	date_default_timezone_set('Asia/Singapore');
  $waktu = date("H");

	if ($waktu < 11) {
		return "pagi";
	} elseif ($waktu < 15) {
		return "siang";
	} elseif ($waktu < 18) {
		return "sore";
	} else {
		return "malam";
	}
}

function getOldValue($username) {
	$koneksi = getDb();
	$query = 'SELECT * FROM akun WHERE username = ?';
	$stmt = $koneksi->prepare($query);
	$stmt->bind_param("s", $username);
	if ($stmt->execute()) {
		$user = $stmt->get_result()->fetch_assoc();
		return $user;
	}
	echo "Error executing query: " . $stmt->error;
	exit();
}

function getAllUlasan() {
	$query = "SELECT
		um.id AS ulasan_id,
		um.pengirim AS username_pengirim,
		akun_pengirim.image AS pengirim_image,
		tm.nama_tempat_makan,
		tm.slug AS tempat_makan_slug,
		m.id AS menu_id,
		um.isi AS ulasan_isi,
		um.bintang,
		GROUP_CONCAT(gu.href) AS gambar_ulasan_href,
		akun_tempat_makan.image AS tempat_makan_image
	FROM ulasan_menu AS um
	JOIN menu AS m ON um.id_menu = m.id
	JOIN tempat_makan AS tm ON m.tempat_makan = tm.username
	JOIN akun AS akun_tempat_makan ON tm.username = akun_tempat_makan.username
	JOIN akun AS akun_pengirim ON um.pengirim = akun_pengirim.username
	LEFT JOIN gambar_ulasan AS gu ON um.id = gu.id_ulasan
	GROUP BY um.id, um.pengirim, akun_pengirim.image, tm.nama_tempat_makan, tm.slug, m.id, um.isi, um.bintang, akun_tempat_makan.image
	ORDER BY um.bintang DESC;";
	
	$koneksi = getDb();
	$ulasan = $koneksi->query($query);

	if ($ulasan->num_rows > 0) {
		return $ulasan;
	} else {
		return false;
	}
}

$user = getOldValue($username);
$user_image = $user['image'] ? "/vi-food-id/uploads/" . $user['image'] : "/vi-food-id/assets/images/profile.png";

$allUlasan = getAllUlasan();
?>

<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home - VI Food</title>
    <link rel="stylesheet" href="/vi-food-id/assets/css/dist/output.css" />
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
      integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
      crossorigin="anonymous"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.js"></script>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.css"  rel="stylesheet" />
  </head>

<body class="bg-gray-200 pb-6">
    <!-- Navbar -->
    <?php require ROOT . '/module/components/navbar.php'; ?>
    <!-- Navbar End -->

    <div class="container mx-auto max-w-5xl grid grid-cols-12 gap-3 px-4 py-8">
        <div class="col-span-12 md:col-span-7 lg:col-span-9 grid grid-cols-1 gap-3">
          <!-- ucapan selama -->
            <h1 class="font-bold text-2xl">Selamat <?= getWaktu() ?>, @<?= $username ?></h1>
            <div class="rounded-lg pt-4 flex items-center gap-3">
              <!-- ucapatan selamat end -->
              <!-- baground -->
                <img class="w-10 h-10 rounded-full object-cover" src="<?= $user_image?>"
									alt="Rounded avatar" />
									<!-- Background end -->
                <form class="flex-1">
									<div class="relative">
										<div class="absolute flex items-center ps-3 pointer-events-none top-0 bottom-0 left-4">
											<svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
												fill="none" viewBox="0 0 20 20">
												<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
													stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
											</svg>
										</div>
										<input type="search" id="default-search"
											class="w-full pl-14 pt-4 pb-4 pr-4 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary focus:border-primary"
											placeholder="Cari makanan..." required />
										<button type="submit"
											class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-primary rounded-e-lg border border-primary hover:bg-primary/80 focus:ring-4 focus:outline-none focus:ring-primary">
											<svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
												viewBox="0 0 20 20">
												<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
													stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
											</svg>
											<span class="sr-only">Search</span>
										</button>
									</div>
                </form>
            </div>
            <p class="font-bold">Ulasan teratas</p>
            <div class="space-y-3">
							<?php 
							while ($ulasan = $allUlasan->fetch_assoc()): 
							$gambarTempatMakan = $ulasan['pengirim_image'] ? '/vi-food-id/uploads/' . $ulasan['pengirim_image'] : "/vi-food-id/assets/images/profile.png";?>
							<div class="rounded-lg bg-white">
									<div class="flex gap-3 p-4">
											<img class="w-10 h-10 aspect-square object-cover rounded-full"
												src="<?= $gambarTempatMakan ?>"
												alt="Rounded avatar" />
											<div class="space-y-2">
												<div>
													<span class="font-bold"><?= $ulasan['username_pengirim'] ?></span>
													<span>berbelanja di</span>
													<span class="font-bold"><?= $ulasan['nama_tempat_makan'] ?></span>
												</div>
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
												<p class="pt-2 text-sm">
													<span class="font-bold">Oleh </span>
													<span><?= $ulasan['username_pengirim'] ?></span>
												</p>
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
									<div class="p-3"><a href="../makan/explore/tempat?slug=<?= $ulasan['tempat_makan_slug'] ?>"
										class="w-full border-2 border-primary text-center py-3 block text-primary hover:text-white hover:bg-primary rounded-lg">Kunjungi
										Tempat Makan</a></div>
							</div>
							<?php endwhile; ?>
						</div>
        </div>
        <div class="col-span-12 md:col-span-5 lg:col-span-3 ">
            <div class="bg-white p-4 rounded-lg sticky top-4">
                <h2 class="font-bold text-lg">Home</h2>
                <div class="pt-3"></div>
                <p class="text-sm">Halo, <?= $_SESSION['username']?>! ini adalah rekomendasi anda berdasarkan beberapa informasi berikut:
                    Lokasi dan History pemesanan.</p>
                <p class="text-sm pt-3">Jika anda ingin mendapatkan rekomendasi yang lebih akurat, anda bisa mengupdate
                    Lokasi anda di Pengaturan</p>
                <a href="../makan/explore/"
                    class="w-full mt-3 border-2 border-primary text-center py-3 block text-white bg-primary rounded-lg">Explore
                    Menu</a>
            </div>
        </div>
    </div>
    <script>
    feather.replace();
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.js"></script>
		<script>
			navigator.geolocation.getCurrentPosition(function (position) {
				var lat = position.coords.latitude;
				var lon = position.coords.longitude;


			});
		</script>
</body>

</html>