<?php 
if (!defined('ROOT'))
define('ROOT', $_SERVER['DOCUMENT_ROOT'] . '/vi-food-id');

require_once ROOT . '/module/backend/database/connection.php';

$username = $_SESSION['username'];

function getUserByUsername ($username) {
	$queryUser = "SELECT * FROM akun WHERE username = ?";
	$koneksi = getdb();
	$stmtMenu = $koneksi->prepare($queryUser);
	$stmtMenu->bind_param("s", $username);
	$stmtMenu->execute();
	$menu = $stmtMenu->get_result();
	$user = $menu->fetch_assoc();
	return $user;
}

$user = getUserByUsername($username);

?>

<nav class="bg-white border-gray-200 ">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
		<a href="/vi-food-id/" class="flex items-center space-x-3 ">
				<img src="/vi-food-id/assets/images/logo.svg" class="h-4" alt="Logo VI-Food" />
		</a>
		<div class="flex items-center md:order-2 space-x-3 md:space-x-0 ">
				<button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 " id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
					<img class="w-8 h-8 rounded-full" src="/vi-food-id/assets/images/profile.png" alt="user photo">
				</button>
				<!-- Dropdown menu -->
				<div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow  " id="user-dropdown">
					<div class="px-4 py-3">
						<span class="block text-sm text-gray-900 "><?= $user['username'] ?></span>
						<span class="block text-sm  text-gray-500 truncate "><?= $user['email'] ?></span>
					</div>
					<ul class="py-2" aria-labelledby="user-menu-button">
						<li>
							<a href="/vi-food-id/akun/profil" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100   ">Profil</a>
						</li>
						<li>
							<a href="/vi-food-id/my/keranjang/" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100   ">Keranjang</a>
						</li>
						<li>
							<a href="/vi-food-id/my/pembelian" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100   ">Pembelian</a>
						</li>
						<li>
							<a href="/vi-food-id/akun/logout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100   ">Keluar</a>
						</li>
					</ul>
				</div>
				<button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100      " aria-controls="navbar-user" aria-expanded="false">
					<span class="sr-only">Open main menu</span>
					<svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
						<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
					</svg>
			</button>
		</div>
  </div>
</nav>
