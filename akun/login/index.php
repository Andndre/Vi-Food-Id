<!DOCTYPE html>
<html lang="en">

<?php
if (!isset($_SESSION)) {
	session_start();
}

if (isset($_SESSION['username'])) {
	$role = $_SESSION['role'];
	switch ($role) {
		case 'penjual':
			header("Location: /vi-food-id/admin/penjual/dashboard/index.php");
			break;
		case 'pembeli':
			header("Location: /vi-food-id/home/index.php");
			break;
		default:
			echo "Error: Peran tidak valid.";
			break;
	}
}

if (!defined('ROOT'))
    define('ROOT', $_SERVER['DOCUMENT_ROOT'] . '/vi-food-id');

$_GET['title'] = 'Login ke Akun Anda - VI-Food';

require_once ROOT . "/module/components/head.php";

?>

<body>
    <div class="relative">
        <img class="hidden lg:block absolute w-screen h-screen -z-10 object-cover object-left"
            src="/vi-food-id/assets/images/register-bg.png" alt="">
        <form class="max-w-xl px-4 lg:ml-auto lg:mr-10 mx-auto h-screen flex flex-col justify-center"
            action="process_login.php" method="post">
            <img src="/vi-food-id/assets/images/logo.svg" alt="logo" class="h-5">
            <h1 class="font-bold text-4xl text-center pt-4 pb-3">Selamat Datang Kembali</h1>
            <p class="text-center pb-4">Silakan masukkan <span class="text-primary">Username</span> dan <span
							class="text-primary">Password</span> Anda</p>
            <div class="mb-4 relative">
							<input type="text" id="username" name="username"
								class="w-full px-8 pl-14 py-4 border-primary border-[3px] rounded-2xl bg-transparent"
								placeholder="Username">
							<i data-feather="user" class="absolute top-0 bottom-0 left-4 h-full"></i>
            </div>
            <div class="mb-4 relative">
							<input type="password" id="password" name="password"
								class="w-full px-8 pl-14 py-4 border-primary border-[3px] rounded-2xl bg-transparent"
								placeholder="Password">
							<i data-feather="lock" class="absolute top-0 bottom-0 left-4 h-full"></i>
            </div>
            <button id="register-button" type="submit"
							class="bg-primary text-white px-8 py-4 rounded-2xl font-bold text-center">Login</button>
            <div class="text-center">
							<p class="pt-6">Belum punya akun? <a class="underline text-primary font-bold"
								href="/vi-food-id/akun/daftar/index.php">Daftar</a></p>
            </div>
        </form>
    </div>
    <script>
    feather.replace();
    </script>
</body>

</html>