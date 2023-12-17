<!DOCTYPE html>
<html lang="id">

<?php 
if (!defined('ROOT')) define('ROOT', $_SERVER['DOCUMENT_ROOT'] . '/vi-food-id');
$_GET['title'] = 'Daftar Akun Pembeli - VI-Food';
require ROOT . "/module/components/head.php";
?>
<body>
    <div class="relative">
        <img class="hidden lg:block absolute w-screen h-screen -z-10 object-cover object-right"
            src="/vi-food-id/assets/images/register-bg-1.png" alt="">
        <form class="max-w-xl mx-auto px-4 lg:mr-auto lg:ml-10 h-screen flex flex-col justify-center"
            action="process_daftar_pembeli.php" method="post">
            <img src="/vi-food-id/assets/images/logo.svg" alt="logo" class="h-5">
            <h1 class="font-bold text-4xl text-center pt-4 pb-3">Selamat Datang</h1>
            <p class="text-center pb-4">Silakan masukkan <span class="text-black font-bold">Username</span> dan <span
                    class="text-black font-bold">Password</span> Anda</p>
            <div class="mb-4 relative">
                <input type="text" id="username" name="username"
                    class="w-full px-8 pl-14 py-4 border-black border-[3px] rounded-2xl bg-transparent"
                    placeholder="Username">
                <i data-feather="user" class="absolute top-0 bottom-0 left-4 h-full"></i>
            </div>

            <div class="mb-4 relative">
                <input type="text" id="email" name="email"
                    class="w-full px-8 pl-14 py-4 border-black border-[3px] rounded-2xl bg-transparent"
                    placeholder="Email">
                <i data-feather="mail" class="absolute top-0 bottom-0 left-4 h-full"></i>
            </div>

            <div class="mb-4 relative">
                <input type="password" id="password" name="password"
                    class="w-full px-8 pl-14 py-4 border-black border-[3px] rounded-2xl bg-transparent"
                    placeholder="Password">
                <i data-feather="lock" class="absolute top-0 bottom-0 left-4 h-full"></i>
            </div>
            <div class="mb-4 relative">
                <input type="password" id="password-confirm" name="password-confirm"
                    class="w-full px-8 pl-14 py-4 border-black border-[3px] rounded-2xl bg-transparent"
                    placeholder="Konfirmasi Password">
                <i data-feather="lock" class="absolute top-0 bottom-0 left-4 h-full"></i>
            </div>
            <button type="submit" id="register-button"
                class="bg-black text-white px-8 py-4 rounded-2xl font-bold text-center">Daftar</button>
            <div class="text-center">
                <p class="pt-6">Sudah punya akun? <a class="underline text-black font-bold" href="../../login/">Masuk</a>
                </p>
            </div>
        </form>
    </div>
    <script>
    feather.replace();
    </script>
</body>

</html>