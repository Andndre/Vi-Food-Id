<!DOCTYPE html>
<html lang="id">

<?php 
	session_start();
	if (!defined('ROOT')) {
		define('ROOT', $_SERVER['DOCUMENT_ROOT'] . '/vi-food-id');
	}
	require ROOT . '/module/backend/akun/cek-login.php';
	require ROOT . '/module/backend/database/connection.php';
	require ROOT . '/module/components/head.php'; 
	require ROOT . "/module/components/navbar.php";

	$username = $_SESSION['username'];

	function getOldValue($username) {
		$koneksi = getDb();
		$query = $koneksi->prepare('SELECT * FROM akun WHERE username = ?');
		$query->bind_param('s', $username); // Menggunakan bind_param untuk memberikan parameter
		$query->execute();
		$result = $query->get_result();
		$user = $result->fetch_assoc();
		return $user;
	}

	$user = getOldValue($username); // Memanggil fungsi dengan parameter yang benar

	$user_image = $user['image'] ? '/vi-food-id/uploads/' . $user['image'] : '/vi-food-id/assets/images/profile.png';
?>
  <body>
    <div class="container mx-auto px-8 max-w-4xl">
			<div class="space-y-6 pt-10">
				<div class="space-y-0.5">
					<h2 class="text-2xl font-bold tracking-tight">Pengaturan</h2>
					<p class="text-grabg-gray-200/60-foreground">
						Berikut adalah pengaturan untuk akun Anda
					</p>
				</div>
				<div
					data-orientation="horizontal"
					role="none"
					class="shrink-0 bg-border h-[1px] w-full my-6"
				></div>
						<div class="space-y-6">
							<div>
								<h3 class="text-lg font-medium">Profil</h3>
								<p class="text-sm text-grabg-gray-200/60-foreground">
									Update informasi terkait akun Anda di sini.
								</p>
							</div>
							<div
								class="border-t h-[1px] w-full"
							></div>
							<div class="flex flex-col lg:flex-row-reverse lg:justify-between w-full space-y-6 lg:space-y-0 lg:gap-6">
								<form class="lg:flex-1" method="post" action="process_simpan_foto.php" enctype="multipart/form-data" >
									<div class="space-y-2">
										<label
											class="text-sm font-medium leading-none"
											>Profil</label
										>
										<div class="flex lg:flex-col gap-3 items-center">
											<span
												class="relative flex shrink-0 overflow-hidden rounded-full w-28 h-28 lg:w-52 lg:h-52"
												><img
													class="aspect-square h-full w-full object-cover object-center"
													src="<?= $user_image?>"
													id="image-preview"
											/></span>
											<div class="space-y-3 flex flex-wrap">
												<input
													type="file"
													accept="image/png,image/jpg,image/jpeg,image/webp"
													class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-grabg-gray-200/60-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowedpointer-events-none"
													name="image"
													id="image"
													required
												/>
												<script>
													const imageInput = document.getElementById('image');
													const imagePreview = document.getElementById('image-preview');
													imageInput.addEventListener('change', () => {
														const file = imageInput.files[0];
														const reader = new FileReader();
														reader.onload = () => {
															imagePreview.src = reader.result;
														}
														reader.readAsDataURL(file);
													})
												</script>
												<button
													class="inline-flex items-center justify-center text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none border border-input bg-background hover:bg-accent h-9 rounded-md px-3"
													type="submit"
												>
													Perbarui
												</button>
											</div>
										</div>
									</div>
								</form>
								<form class="space-y-8 lg:m-0 lg:flex-1" action="process_simpan_info.php" method="post">
									<div class="space-y-2">
										<label
											class="text-sm font-medium leading-none"
											>Username</label
										><input
											type="text"
											class="flex h-10 w-full rounded-md border 
											px-3 py-2 text-sm 
											outline-none
											focus-visible:ring-primary
											focus-visible:ring-2 
											focus-visible:ring-offset-4"
											placeholder="Username"
											disabled=""
											name="username"
											value="<?= $user['username'] ?>"
										/>
									</div>
									<div class="space-y-2">
										<label
											class="text-sm font-medium leading-none"
											>Email</label
										><input
											type="email"
											class="flex h-10 w-full rounded-md border 
											px-3 py-2 text-sm 
											outline-none
											focus-visible:ring-primary
											focus-visible:ring-2 
											focus-visible:ring-offset-4"
											placeholder="Perbarui Email"
											name="email"
											value="<?= $user['email'] ?>"
										/>
									</div>
									<div class="space-y-2">
										<label
											class="text-sm font-medium leading-none"
											>Perbarui Password</label
										>
										<input
											type="password"
											class="flex h-10 w-full rounded-md border 
											px-3 py-2 text-sm 
											outline-none
											focus-visible:ring-primary
											focus-visible:ring-2 
											focus-visible:ring-offset-4"
											placeholder="Password Lama"
											name="password-old"
										/>
										<input
											type="password"
											class="flex h-10 w-full rounded-md border 
											px-3 py-2 text-sm 
											outline-none
											focus-visible:ring-primary
											focus-visible:ring-2 
											focus-visible:ring-offset-4"
											placeholder="Password Baru"
											name="password-new"
										/>
										<input
											type="password"
											class="flex h-10 w-full rounded-md border 
											px-3 py-2 text-sm 
											outline-none
											focus-visible:ring-primary
											focus-visible:ring-2 
											focus-visible:ring-offset-4"
											placeholder="Konfirmasi Password"
											name="password-new-confirm"
										/>
									</div>
									<button
										class="inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2"
										type="submit"
									>
										Simpan
									</button>
								</form>
							</div>
						</div>
						<div class="mt-8"></div>
						<footer class="container mx-auto py-4 border-t px-0">
							Copyright © 2023 VI-Food.co<!-- -->
						</footer>
					<!-- End Settings -->
				</div>
		</div>
    <!--  -->
    <script>
      feather.replace();
    </script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
  </body>
</html>
