<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../../../assets/css/dist/output.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
</head>
<body>
    <div class="relative">
        <img class="hidden fixed lg:block w-screen h-screen -z-10 object-cover object-right rotate-180" src="https://images.unsplash.com/photo-1449962887303-b4a91c7c560a?q=80&w=1769&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
        <!-- form Start -->
        <form class="max-w-xl mx-auto px-4 lg:mr-auto lg:ml-10 flex flex-col justify-center py-14" action="process_daftar_penjual.php" method="post">
            <img src="../../../assets/images/logo.svg" alt="logo" class="h-5">
            <h1 class="font-bold text-4xl text-center pb-3">Selamat Datang</h1>
            <p class="text-center pb-4">Silakan masukkan <span class="text-black font-bold">Username</span> dan <span class="text-black font-bold">Password</span> Anda</p>
            <div class="mb-4 relative">
                <input type="text" id="username" name="username" class="w-full px-8 pl-14 py-4 border-black border-[3px] rounded-2xl bg-transparent" placeholder="Username">
                <i data-feather="user" class="absolute top-0 bottom-0 left-4 h-full"></i>
            </div>
            <div class="mb-4 relative">
                <input type="email" id="email" name="email" class="w-full px-8 pl-14 py-4 border-black border-[3px] rounded-2xl bg-transparent" placeholder="Email">
                <i data-feather="at-sign" class="absolute top-0 bottom-0 left-4 h-full"></i>
            </div>
            <div class="mb-4 relative">
                <input type="password" id="password" name="password" class="w-full px-8 pl-14 py-4 border-black border-[3px] rounded-2xl bg-transparent" placeholder="Password">
                <i data-feather="lock" class="absolute top-0 bottom-0 left-4 h-full"></i>
            </div>
            <div class="mb-4 relative">
                <input type="password" id="password-confirm" name="password-confirm" class="w-full px-8 pl-14 py-4 border-black border-[3px] rounded-2xl bg-transparent" placeholder="Konfirmasi Password">
                <i data-feather="lock" class="absolute top-0 bottom-0 left-4 h-full"></i>
            </div>
            <div class="mb-4 relative">
                <input type="text" id="nomor-hp" name="nomor-hp" class="w-full px-8 pl-14 py-4 border-black border-[3px] rounded-2xl bg-transparent" placeholder="NomorHP">
                <i data-feather="phone" class="absolute top-0 bottom-0 left-4 h-full"></i>
            </div>
            <div class="mb-4 relative">
                <input type="text" id="nama-tempat-makan" name="tempat-makan" class="w-full px-8 pl-14 py-4 border-black border-[3px] rounded-2xl bg-transparent" placeholder="Nama Tempat Makan">
                <i data-feather="shopping-cart" class="absolute top-0 bottom-0 left-4 h-full"></i>
            </div>
            <!-- Peta Leaflet -->
            <label>Masukkan lokasi tempat makan Anda:</label>
            <div id="map" class="mt-3 my-6 rounded-2xl border-black border-[3px]" style="height: 400px;"></div>
            <!-- Hidden input untuk menyimpan koordinat -->
            <input type="hidden" id="latitude" name="garis-lintang">
            <input type="hidden" id="longitude" name="garis-bujur">
            <button type="submit" id="register-button" class="bg-black text-white px-8 py-4 rounded-2xl font-bold text-center">Daftar</button>
            <div class="text-center">
                <p class="pt-6">Sudah punya akun? <a class="underline text-black font-bold" href="../../login/">Masuk</a></p>
            </div>
        </form>
    </div>
    <script>
        feather.replace();

        // Inisialisasi peta Leaflet
        var mymap = L.map('map').setView([0, 0], 13); // Koordinat default

        // Tambahkan tile layer dari OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(mymap);

        // Dapatkan lokasi terkini menggunakan Geolocation API
        navigator.geolocation.getCurrentPosition(function (position) {
            var lat = position.coords.latitude;
            var lon = position.coords.longitude;

            // Set tampilan peta ke lokasi terkini
            mymap.setView([lat, lon], 13);

            // Tambahkan marker ke lokasi terkini
            var marker = L.marker([lat, lon]).addTo(mymap);

            // Update nilai input hidden dengan koordinat terkini
            document.getElementById('latitude').value = lat;
            document.getElementById('longitude').value = lon;
        });

        // Tambahkan event listener saat peta diklik
        mymap.on('click', function (e) {
            // Hapus marker yang sudah ada (jika ada)
            mymap.eachLayer(function (layer) {
                if (layer instanceof L.Marker) {
                    mymap.removeLayer(layer);
                }
            });

            // Tambahkan marker ke koordinat yang diklik
            var marker = L.marker(e.latlng).addTo(mymap);

            // Update nilai input hidden dengan koordinat yang diklik
            document.getElementById('latitude').value = e.latlng.lat;
            document.getElementById('longitude').value = e.latlng.lng;
        });
    </script>
</body>
</html>
