<?php 
if (!defined('ROOT')) define('ROOT', $_SERVER['DOCUMENT_ROOT'] . '/vi-food-id');

require_once ROOT . '/module/backend/akun/cek-login.php';
require_once ROOT . '/module/backend/database/connection.php';

$username = $_SESSION['username'];

$targetDir = "../../uploads/";
$nama_file = $username . '_profil.png';
$gambarProfil = $targetDir . $nama_file;
if (file_exists($gambarProfil)) {
	unlink($gambarProfil);
}

move_uploaded_file($_FILES["image"]["tmp_name"], $gambarProfil);

function ubahGambarProfil($username, $nama_file) {
	$koneksi = getDb();
	$query = $koneksi->prepare("UPDATE akun SET image=? WHERE username=?");
	if (!$query) {
		echo "Error: " . $koneksi->error;
		exit();
	}
	$query->bind_param("ss", $nama_file, $username);
	if ($query->execute()) {
		return true;
	} else {
		echo "Error: " . $query->error;
		exit();
	}
}

if (ubahGambarProfil($username, $nama_file)) {
	header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
	echo "Error: Gagal mengubah gambar profil";
	exit();
}
