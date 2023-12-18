<?php
if (!defined('ROOT'))
define('ROOT', $_SERVER['DOCUMENT_ROOT'] . '/vi-food-id');
require_once ROOT . "/module/backend/akun/cek-login.php";
require_once ROOT . "/module/components/navbar.php";

function getDetail($id) {
	$koneksi = getDb();
	$query = "SELECT * FROM menu WHERE id = ?";
	$stmt = $koneksi->prepare($query);
	$stmt->bind_param("i", $id);
	$stmt->execute();
	$result = $stmt->get_result();
	$menu = $result->fetch_assoc();
	return $menu;
}

function getAllRating($menuId) {
	$query = "SELECT
		m.nama AS menu_nama,
		COALESCE(SUM(CASE WHEN um.bintang = 0 THEN 1 ELSE 0 END), 0) AS rating_0,
		COALESCE(SUM(CASE WHEN um.bintang = 1 THEN 1 ELSE 0 END), 0) AS rating_1,
		COALESCE(SUM(CASE WHEN um.bintang = 2 THEN 1 ELSE 0 END), 0) AS rating_2,
		COALESCE(SUM(CASE WHEN um.bintang = 3 THEN 1 ELSE 0 END), 0) AS rating_3,
		COALESCE(SUM(CASE WHEN um.bintang = 4 THEN 1 ELSE 0 END), 0) AS rating_4,
		COALESCE(SUM(CASE WHEN um.bintang = 5 THEN 1 ELSE 0 END), 0) AS rating_5
	FROM menu AS m
	LEFT JOIN ulasan_menu AS um ON m.id = um.id_menu
	WHERE m.id = $menuId
	GROUP BY m.nama;";

	$koneksi = getDb();

	$result = $koneksi->query($query);

	if (!$result) {
		echo "Error executing query: " . $koneksi->error;
		exit();
	}

	$ratings = $result->fetch_assoc();

	return $ratings;
}

function getAllCommentsById($id) {
	$koneksi = getDb();
	$query = "SELECT
		um.id AS ulasan_id,
		um.pengirim,
		akun.image AS pengirim_image,
		um.bintang,
		um.isi AS ulasan_isi,
		GROUP_CONCAT(gu.href) AS gambar_ulasan_href
	FROM ulasan_menu AS um
	LEFT JOIN gambar_ulasan AS gu ON um.id = gu.id_ulasan
	LEFT JOIN akun ON um.pengirim = akun.username
	WHERE um.id_menu = ?
	GROUP BY um.id, um.pengirim, akun.image, um.bintang, um.isi;";

	$stmt = $koneksi->prepare($query);

	if (!$stmt) {
		echo "Error preparing statement: " . $koneksi->error;
		exit();
	}

	$stmt->bind_param("i", $id);

	if (!$stmt->execute()) {
		echo "Error executing statement: " . $stmt->error;
		exit();
	} else {
		$result = $stmt->get_result();
		return $result;
	}
}

if (!isset($_GET['id'])) {
	header("Location: /vi-food-id/makan/explore");
	exit();
}

$id = $_GET['id'];
$menu = getDetail($id);
$harga = "Rp. " . number_format($menu['harga'], 0, ",", "."); 
$ratings = getAllRating($id);
$sumAllRating = $ratings['rating_0'] + $ratings['rating_1'] + $ratings['rating_2'] + $ratings['rating_3'] + $ratings['rating_4'] + $ratings['rating_5'];
$maxRating = max((int)$ratings['rating_0'], (int)$ratings['rating_1'], (int)$ratings['rating_2'], (int)$ratings['rating_3'], (int)$ratings['rating_4'], (int)$ratings['rating_5']);
$allUlasan = getAllCommentsById($id);
?>

<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<?php 
		$_GET['title'] = 'Detail';
		require_once ROOT . '/module/components/head.php';
	?>
  <body class="bg-gray-200 pb-10">

    <!-- Content -->
    <div class="container mx-auto grid grid-cols-12 gap-3">
      <div class="relative col-span-12 aspect-video md:aspect-auto md:col-span-4 overflow-hidden md:h-screen flex flex-col justify-center">
        <img
          class="sticky object-cover object-center w-full h-full transition-all hover:scale-125 duration-200"
          src="<?= '/vi-food-id/uploads/' . $menu['gambar']?>"
          alt="tempat makan"
        />
      </div>
      <div class="p-4 pt-14 col-span-12 md:col-span-8">
        <h1 class="text-4xl font-bold"><?= $menu['nama'] ?></h1>
        <div>
          <p class="mt-4 text-justify text-gray-500">
						<?= $menu['deskripsi'] ?>
          </p>
        </div>
        <div class="pt-8"></div>
				<div class="font-bold text-2xl"><?= $harga ?> <span id="harga-di-keranjang" class="text-base">(total Rp. 0,00)</span></div>
        <div class="pt-4"></div>
        <form class="flex gap-6 items-center" action="process_tambah_keranjang.php" method="POST">
					<div class="flex items-center h-3 gap-3">
						<button id="kurang" type="button" class="p-[.1rem] border-2 border-gray-600 aspect-square rounded-full"><i data-feather="minus" class="h-4"></i></button>
						<span id="count">0</span>
						<input type="text" id="kuantitas" name="kuantitas" value="0" class="hidden">
						<input type="text" name="menu" value="<?= $menu['id'] ?>" class="hidden">
						<button id="tambah" type="button" class="p-[.1rem] border-2 border-gray-600 aspect-square rounded-full"><i data-feather="plus" class="h-4"></i></button>
					</div>
          <button type="submit" id="checkout-btn" disabled="true" class="px-6 py-3 rounded-xl bg-primary disabled:bg-gray-400 text-white font-bold flex gap-3">
						<i data-feather="shopping-cart"></i> Masukkan ke Keranjang
					</button>
				</form>
				<script>
					let harga = <?= $menu['harga'] ?>;
					let count = 0;
					const counter = $('#count');
					const kurang = $('#kurang');
					const tambah = $('#tambah');
					const kuantitas = $('#kuantitas');
					const checkoutBtn = $('#checkout-btn');
					const totalHarga = $('#harga-di-keranjang');
					kurang.click(() => {
						if (count == 0) {
							return;
						}
						counter.html(--count);
						kuantitas.val(count);
						if (count == 0) {
							checkoutBtn.prop('disabled', true);
						}
						totalHarga.html('(total Rp. ' + (harga * count) + ',00)')
					});
					tambah.click(() => {
						counter.html(++count);
						kuantitas.val(count);
						checkoutBtn.prop('disabled', false);
						totalHarga.html('(total Rp. ' + (harga * count) + ',00)')
					});
				</script>
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
				<!-- Box comentar -->      
        <form class="mt-6">
            <label for="chat" class="sr-only">Komentar mu</label>
            <div class="flex items-center px-3 py-2 rounded-lg bg-gray-50">
                <button type="button" class="inline-flex justify-center p-2 text-gray-500 rounded-lg cursor-pointer hover:text-gray-900 hover:bg-gray-100">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                        <path fill="currentColor" d="M13 5.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0ZM7.565 7.423 4.5 14h11.518l-2.516-3.71L11 13 7.565 7.423Z"/>
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 1H2a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z"/>
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0ZM7.565 7.423 4.5 14h11.518l-2.516-3.71L11 13 7.565 7.423Z"/>
                    </svg>
                    <span class="sr-only">Upload image</span>
                </button>
                <button type="button" class="p-2 text-gray-500 rounded-lg cursor-pointer hover:text-gray-900 hover:bg-gray-100">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.408 7.5h.01m-6.876 0h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM4.6 11a5.5 5.5 0 0 0 10.81 0H4.6Z"/>
                    </svg>
                    <span class="sr-only">Add emoji</span>
                </button>
                <textarea id="chat" rows="1" class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500  placeholder="tulis komentar anda...."></textarea>
                    <button type="submit" class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100  ">
                    <svg class="w-5 h-5 rotate-90 rtl:-rotate-90" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                        <path d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8 18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z"/>
                    </svg>
                    <span class="sr-only">Send message</span>
                </button>
            </div>
        </form>
        <!-- End Box comentar -->
        <!-- Komentar -->
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
    <!-- End Main -->

    <script>
      feather.replace();
    </script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.js"></script>
  </body>
</html>
