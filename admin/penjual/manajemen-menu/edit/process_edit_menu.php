<?php
require "connection.php";

$username = $_COOKIE['username'];
$idMenu = $_POST['id'];
$nama = $_POST['nama-makanan'];
$gambar = $_POST['gambar-menu'];
$harga = $_POST['harga-makanan'];
$deskripsi = $_POST['deskripsi'];

$queryMenu = "SELECT id FROM menu WHERE id = ?";
$stmt = mysqli_prepare($koneksi, $queryMenu);
mysqli_stmt_bind_param($stmt, "i", $idMenu);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) == 0) {
  echo "Menu tidak ditemukan";
  goto exit_tutup_database;
}

$menu = mysqli_fetch_assoc($result);
if ($menu['tempat_makan'] != $username) {
  echo "Akses ditolak";
  goto exit_tutup_database;
}

$queryUpdate = "UPDATE menu SET nama = ?, gambar = ?, harga = ?, deskripsi = ? WHERE id = ?";
$stmt = mysqli_prepare($koneksi, $queryUpdate);
mysqli_stmt_bind_param($stmt, "ssisi", $nama, $gambar, $harga, $deskripsi, $idMenu);
mysqli_stmt_execute($stmt);

if (mysqli_stmt_affected_rows($stmt) == 0) {
  echo "Gagal memperbarui menu";
	goto exit_tutup_database;
}

exit_tutup_database:
	// Tutup statement dan koneksi ke database
	mysqli_stmt_close($stmt);
	mysqli_close($koneksi);
	