<!DOCTYPE html>
<html lang="en">
<?php 
if (!defined('ROOT')) define('ROOT', $_SERVER['DOCUMENT_ROOT'] . '/vi-food-id');
$_GET['title'] = 'Daftar Akun - VI-Food';
require ROOT . "/module/components/head.php";
?>
<body>
	<div class="relative">
		<img class="hidden lg:block absolute w-screen h-screen -z-10 object-cover object-left" src="https://images.unsplash.com/photo-1549483532-d1945e6c48af?q=80&w=1774&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
		<div class="max-w-xl px-4 lg:ml-auto lg:mr-10 mx-auto h-screen flex flex-col justify-center">
			<img src="/vi-food-id/assets/images/logo.svg" alt="logo" class="h-5">
			<h1 class="font-bold text-4xl text-center pt-4 pb-3">Selamat Datang Pengguna</h1>
			<p class="text-center pb-4">Silakan pilih <span class="text-black">Akun </span><span class="text-black">Pengguna</span></p>
			<a href="pembeli" id="register-button" class="bg-black  text-white px-8 py-4 rounded-2xl font-bold text-center">Pembeli</a>
			<a href="penjual" id="register-button" class="bg-black  text-white px-8 py-4 rounded-2xl font-bold text-center mt-5">Penjual</a>
			<div class="text-center">
				<p class="pt-6">Sudah punya akun? <a class="underline text-black font-bold" href="../login/">Masuk</a></p>
			</div>
		</div>
	</div>
	<script>
		feather.replace();
	</script>
</body>
</html>
