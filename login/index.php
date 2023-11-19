<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
	<link rel="stylesheet" href="../css/dist/output.css">
	<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.js"></script>
</head>
<body>
	<div class="relative">
		<img class="hidden lg:block absolute w-screen h-screen -z-10 object-cover object-left" src="../public/register-bg.png" alt="">
		<form class="max-w-xl px-4 lg:ml-auto lg:mr-10 mx-auto h-screen flex flex-col justify-center">
			<img src="../public/logo.svg" alt="logo" class="h-5">
			<h1 class="font-bold text-4xl text-center pt-4 pb-3">Selamat Datang Kembali</h1>
			<p class="text-center pb-4">Silakan masukkan <span class="text-primary">Username</span> dan <span class="text-primary">Password</span> Anda</p>
			<div class="mb-4 relative">
				<input type="text" id="username" name="username" class="w-full px-8 pl-14 py-4 border-primary border-[3px] rounded-2xl bg-transparent" placeholder="Username">
				<i data-feather="user" class="absolute top-0 bottom-0 left-4 h-full"></i>
			</div>
			<div class="mb-4 relative">
				<input type="password" id="password" name="password" class="w-full px-8 pl-14 py-4 border-primary border-[3px] rounded-2xl bg-transparent" placeholder="Password">
				<i data-feather="lock" class="absolute top-0 bottom-0 left-4 h-full"></i>
			</div>
			<a href="../home" id="register-button" class="bg-primary text-white px-8 py-4 rounded-2xl font-bold text-center">Login</a>
			<div class="text-center">
				<p class="pt-6">Belum punya akun? <a class="underline text-primary font-bold" href="../Pilihan_Register/">Daftar</a></p>
			</div>
		</form>
	</div>
	<script>
		feather.replace();
	</script>
</body>
</html>
