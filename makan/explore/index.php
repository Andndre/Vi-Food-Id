<?php
session_start();

define('ROOT', $_SERVER['DOCUMENT_ROOT'] . '/vi-food-id');
require_once ROOT . '/module/backend/akun/cek-login.php';
require_once ROOT . '/module/backend/database/connection.php';

$queryMenu = "SELECT * FROM tempat_makan";
$semua_menu = $koneksi->query($queryMenu);
?>

<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<?php
$_GET['title'] = "Explore";
require ROOT . "/module/components/head.php";
?>

<body class="bg-gray-200 pb-6">
	<!-- Navbar -->
	<?php require ROOT . '/module/components/navbar.php'; ?>
	<!-- Header w/Search -->
	<div class="container mx-auto">
		<div
				class="mx-4 mt-4 bg-cover rounded-2xl px-6 py-24 lg:py-36 bg-[url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQsouIA8z5MLF0d2Z7NnunT8Sp7QvVaqbFCZA&usqp=CAU')] text-white text-center space-y-4">
				<h1 class="font-bold text-3xl lg:text-4xl">Mau Makan Apa Hari ini?</h1>
				<p class="text-center text-sm lg:text-base text-gray-400">Temukan tempat makan di sekitar anda yang jarang
						orang ketahui!</p>
				<div class="mb-4 relative left-1/2 -translate-x-1/2 max-w-sm">
						<form action="" class="contents">
								<input type="text" id="username" name="username"
										class="w-full px-8 pl-14 py-2 lg:py-3 hover:border-primary border-[3px] rounded-2xl bg-white text-black"
										placeholder="Cari makanan, tempat makan, dll...">
						</form>
						<i data-feather="search" class="absolute z-50 top-0 bottom-0 left-4 h-full text-primary"></i>
				</div>
		</div>
		<div class="pt-6"></div>
		<div class="grid grid-cols-12 container mx-auto px-4 gap-6">
			<!-- Filter -->
			<aside class="col-span-12 md:col-span-4 lg:col-span-3 p-6 bg-white shadow-sm rounded-2xl mb-auto">
				<h2 class="font-bold text-2xl">Filter</h2>
				<form class="space-y-3">
					<div class="space-y-2">
						<h3>Lokasi</h3>
						<div>
								<div class="flex gap-3 items-center">
										<input type="checkbox" name="" id="">
										<span>Singaraja</span>
								</div>
								<div class="flex gap-3 items-center">
										<input type="checkbox" name="" id="">
										<span>Kintamani</span>
								</div>
								<div class="flex gap-3 items-center">
										<input type="checkbox" name="" id="">
										<span>Jembrana</span>
								</div>
								<div class="flex gap-3 items-center">
										<input type="checkbox" name="" id="">
										<span>Karangasem</span>
								</div>
								<div class="flex gap-3 items-center">
										<input type="checkbox" name="" id="">
										<span>Klungkung</span></div>
						</div>
					</div>
					<div class="space-y-2">
						<h3>Rentang Harga</h3>
						<div>
							<div class="flex gap-3 items-center">
								<input type="checkbox" name="" id="">
								<span>5-10 ribu</span>
							</div>
							<div class="flex gap-3 items-center">
								<input type="checkbox" name="" id="">
								<span>10-20 ribu</span>
							</div>
							<div class="flex gap-3 items-center">
								<input type="checkbox" name="" id="">
								<span>20-30 ribu</span>
							</div>
							<div class="flex gap-3 items-center">
								<input type="checkbox" name="" id="">
								<span>&gt; 40 ribu </span>
							</div>
						</div>
					</div>
				</form>
			</aside>
			<!-- Tempat Makan -->
			<div class="col-span-12 md:col-span-8 lg:col-span-9">
					<h2 class="font-bold text-xl">Rekomendasi</h2>
					<!-- Grup Menu Rekomendasi -->
					<div class="grid grid-cols-12 pt-4 gap-4">
						<?php while ($row = $semua_menu->fetch_assoc()): ?>
							<div class="overflow-hidden col-span-12 md:col-span-6 lg:col-span-4 bg-white rounded-2xl shadow-sm">
								<img class="w-full aspect-video object-cover" src='<?= '/vi-food-id/uploads/' . $row['gambar'] ?>' alt="">
								<div class="p-4 space-y-2 text-sm">
									<h3 class="font-bold text-xl"><?= $row['nama_tempat_makan'] ?><h3>
									<div class="flex justify-between items-center flex-wrap gap-3 pt-4">
										<a class="px-6 py-3 ml-auto bg-primary/20 hover:bg-primary transition-all duration-300 font-semibold rounded-lg"
											href="tempat?slug=<?= $row['slug'] ?>">Lihat</a>
									</div>
								</div>
							</div>
						<?php endwhile; ?>
					</div>
			</div>
		</div>
	</div>
	<script>
	feather.replace();
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>	
</body>
</html>