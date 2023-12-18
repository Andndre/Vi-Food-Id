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
	$query = "SELECT um.id AS ulasan_id,
			um.id_menu,
			um.pengirim,
			um.bintang,
			um.isi AS ulasan_isi,
			GROUP_CONCAT(gu.href) AS gambar_ulasan_href
		FROM ulasan_menu AS um
		JOIN menu AS m ON um.id_menu = m.id
		JOIN tempat_makan AS tm ON m.tempat_makan = tm.username
		LEFT JOIN gambar_ulasan AS gu ON um.id = gu.id_ulasan
		WHERE tm.slug = ?
		GROUP BY um.id, um.id_menu, um.pengirim, um.bintang, um.isi;";

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
		$comments = $result->fetch_all(MYSQLI_ASSOC);
		return $comments;
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


// Periksa apakah parameter 'id' ada dalam URL
if(isset($_GET['slug'])) {
	$slug = $_GET['slug'];
	$ratings = getAllRating($slug);
	$sumAllRating = $ratings['rating_0'] + $ratings['rating_1'] + $ratings['rating_2'] + $ratings['rating_3'] + $ratings['rating_4'] + $ratings['rating_5'];
	$maxRating = max((int)$ratings['rating_0'], (int)$ratings['rating_1'], (int)$ratings['rating_2'], (int)$ratings['rating_3'], (int)$ratings['rating_4'], (int)$ratings['rating_5']);

	// Panggil fungsi getAllCommentsById() dengan parameter $id
	$comments = getAllCommentsById($slug);
} else {
	echo "Parameter 'id' tidak ditemukan dalam URL.";
}
?>

<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
  <?php 
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
          src="https://gobiz.co.id/pusat-pengetahuan/wp-content/uploads/2019/03/usaha-warung-makan.jpg"
          alt="tempat makan"
        />
      </div>
      <div class="p-4 pt-14 col-span-12 md:col-span-8">
        <h1 class="text-4xl font-bold">Warung Pak Wayan</h1>
        <div class="flex mt-5">
          <a
            href="#"
            class="hover:bg-gray-100 bg-white rounded-tl-md rounded-bl-md p-3 border-r text-primary"
            >Deskripsi</a
          >
          <a
            href="../tempat-menu/"
            class="hover:bg-gray-100 bg-white rounded-tr-md rounded-br-md p-3"
            >Pesan</a
          >
        </div>
        <div>
          <p class="mt-4 text-justify text-gray-500">
            Selamat datang di Warung Pak Wayan, tempat di mana Anda bisa
            merasakan cita rasa otentik kuliner Indonesia. Pengalaman kuliner
            ala Indonesia sekarang dapat dinikmati di tengah kenyamanan rumah
            Anda. Nikmati makanan lezat dengan aroma harum rempah-rempah yang
            khas di Warung Pak Wayan, tempat di mana tradisi dan kelezatan
            bergandengan tangan. Pak Wayan, sang pemilik ramah, siap untuk
            menyajikan hidangan khas Indonesia yang autentik. Pilihlah hidangan
            favorit Anda, duduklah santai di depan meja kayu, dan nikmatilah
            selera khas Indonesia dalam kenyamanan rumah Anda. Temukan
            kehangatan dan kelezatan makanan khas Indonesia yang kami tawarkan,
            hanya di Warung Pak Wayan.
          </p>
        </div>
        <div class="pt-8"></div>
        <a href="../tempat-menu/" class="bg-primary text-white rounded-lg px-10 py-3 font-bold"> Makan di sini </a>
        <hr class="w-full mt-11 border-t border-gray-300">
        <h2 class="font-bold text-xl mt-6">Rating dan Komentar</h2>
        <p class="mt-2 text-gray-500">Berikut adalah kumpulan komentar yang sudah pernah makan di sini</p>
        
				<?php foreach (['rating_0', 'rating_1', 'rating_2', 'rating_3', 'rating_4', 'rating_5'] as $index => $key): ?>
						<div class="flex items-center mt-4">
								<a href="#" class="text-sm font-medium"><?= $index ?></a>
								<div class="w-2/4 h-5 mx-4 bg-gray-300 rounded">
										<div class="h-5 bg-primary rounded" style="width: <?= $ratings[$key] / $maxRating * 100 ?>%"></div>
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
        <div class="grid grid-cols-12 gap-3 mt-5">
          <div class="col-span-12 bg-white rounded-xl px-6 py-6 flex">
            <img
              class="object-cover w-16 h-16 rounded-full"
              src="https://www.blibli.com/friends-backend/wp-content/uploads/2022/11/biodata-maudy-ayunda.jpg"
              alt="jefri"
            />
            <div class="ml-6 pt-3">
              <span class="text-lg font-bold">Maudy Ayunda</span>
              <div class="flex h-5 mt-1 mr-11">
								<svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
									fill="currentColor" viewBox="0 0 22 20">
									<path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
								</svg>
								<svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
									fill="currentColor" viewBox="0 0 22 20">
									<path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
								</svg>
								<svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
									fill="currentColor" viewBox="0 0 22 20">
									<path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
								</svg>
								<svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
									fill="currentColor" viewBox="0 0 22 20">
									<path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
								</svg>
								<svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
									fill="currentColor" viewBox="0 0 22 20">
									<path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
								</svg>
              </div>
              <p class="text-neutral-500 text-sm mt-3">
                Mie goreng di Warung Pak Wayan sungguh luar biasa! Rasanya
                begitu autentik dan penuh dengan rempah-rempah yang membuat
                lidah saya bergoyang.
              </p>
            </div>
          </div>
        </div>
        <div class="flex justify-center p-4">
          <span class="mt-10 px-6 py-3 rounded-xl bg-primary text-white font-bold"
            >Muat lagi ..</span
          >
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
