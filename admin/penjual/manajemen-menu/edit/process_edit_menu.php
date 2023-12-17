<?php
session_start();

if (!defined('ROOT'))
  define('ROOT', $_SERVER['DOCUMENT_ROOT'] . '/vi-food-id');
require ROOT . "/module/backend/akun/cek-penjual.php";

require "connection.php";

$username = $_COOKIE['username'];
$idMenu = $_POST['id'];
$nama = $_POST['nama-makanan'];
$gambar = $_POST['gambar-menu'];
$harga = $_POST['harga-makanan'];
$deskripsi = $_POST['deskripsi'];

$queryMenu = "SELECT id FROM menu WHERE id = ?";
$stmtMenu = mysqli_prepare($koneksi, $queryMenu);
mysqli_stmt_bind_param($stmtMenu, "i", $idMenu);
mysqli_stmt_execute($stmtMenu);
$menu = mysqli_stmt_get_result($stmtMenu);

if (mysqli_num_rows($menu) == 0) {
  echo "Menu tidak ditemukan";
  goto exit_tutup_database;
}

$menu = mysqli_fetch_assoc($menu);
if ($menu['tempat_makan'] != $username) {
  echo "Akses ditolak";
  goto exit_tutup_database;
}

$queryUpdate = "UPDATE menu SET nama = ?, gambar = ?, harga = ?, deskripsi = ? WHERE id = ?";
$stmtMenu = mysqli_prepare($koneksi, $queryUpdate);
mysqli_stmt_bind_param($stmtMenu, "ssisi", $nama, $gambar, $harga, $deskripsi, $idMenu);
mysqli_stmt_execute($stmtMenu);

if (mysqli_stmt_affected_rows($stmtMenu) == 0) {
  echo "Gagal memperbarui menu";
	goto exit_tutup_database;
}

exit_tutup_database:
	// Tutup statement dan koneksi ke database
	mysqli_stmt_close($stmtMenu);
	mysqli_close($koneksi);
	