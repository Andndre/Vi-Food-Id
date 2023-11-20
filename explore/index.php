<?php
	$host = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'vi-food';

	$koneksi = new mysqli($host, $username, $password, $database);

	// Periksa koneksi
	if ($koneksi->connect_error) {
			die("Koneksi gagal: " . $koneksi->connect_error);
	}

	$query = "SELECT * FROM menu";
	$semua_menu = $koneksi->query($query);
?>

<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VI Food</title>
    <link rel="stylesheet" href="../css/dist/output.css">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js'
        integrity='sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=='
        crossorigin='anonymous'></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.js"></script>
</head>

<body class="bg-gray-200 pb-6">
    <!-- Navbar -->
    <?php require "../components/navbar.php" ?>
    <!-- Header w/Search -->
    <div class="container mx-auto">
        <div
            class="mx-4 mt-4 bg-cover rounded-2xl px-6 py-24 lg:py-36 bg-[url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQsouIA8z5MLF0d2Z7NnunT8Sp7QvVaqbFCZA&usqp=CAU')] text-white text-center space-y-4">
            <h1 class="font-bold text-3xl lg:text-4xl">Mau Makan Apa Hari ini?</h1>
            <p class="text-center text-sm lg:text-base text-gray-400">Temukan tempat makan di sekitar anda yang jarang
                orang ketahui!</p>
            <div class="mb-4 relative left-1/2 -translate-x-1/2 max-w-sm">
                <input type="text" id="username" name="username"
                    class="w-full px-8 pl-14 py-2 lg:py-3 hover:border-primary border-[3px] rounded-2xl bg-white text-black"
                    placeholder="Cari makanan, tempat makan, dll...">
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
                                <span>Karangasem</span>
                            </div>
                            <div class="flex gap-3 items-center">
                                <input type="checkbox" name="" id="">
                                <span>Klungkung</span>
                            </div>
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
                    <!-- Card Start -->
                    <div class="overflow-hidden col-span-12 md:col-span-6 lg:col-span-4 bg-white rounded-2xl shadow-sm">
                        <img class="w-full aspect-video object-cover" src="<?= $row['gambar']?>" alt="">
                        <div class="p-4 space-y-2 text-sm">
                            <h3 class="font-bold text-xl"><?= $row['nama']?><h3>
                                    <div class="space-y-2">
                                        <div class="flex items-center text-gray-500 ">
                                            <i data-feather="map-pin" class="h-5 mr-2"></i>
                                            <?= $row['alamat']?>
                                        </div>
                                        <div class="flex items-center text-gray-500 ">
                                            <i data-feather="map" class="h-5 mr-2"></i>
                                            <?= $row['warung']?>
                                        </div>
                                        <div class="flex items-center text-gray-500">
                                            <i data-feather="clock" class="h-5 mr-2"></i>
                                            Buka <?= date("H:i", strtotime($row['buka']))?> -
                                            <?= date("H:i", strtotime($row['tutup']))?> WITA
                                        </div>
                                    </div>

                                    <div class="flex justify-between items-center flex-wrap gap-3 pt-4">
                                        <span
                                            class="text-lg text-gray-400 font-semibold"><?= 'Rp.' . number_format($row['harga'], 0, ',', '.') ?></span>
                                        <a class="px-6 py-3 ml-auto bg-primary/20 hover:bg-primary transition-all duration-300 font-semibold rounded-lg"
                                            href="/tempat/">Lihat</a>
                                    </div>
                        </div>
                    </div>
                    <!-- Card End -->
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
    <script>
    feather.replace();
    </script>
</body>

</html>