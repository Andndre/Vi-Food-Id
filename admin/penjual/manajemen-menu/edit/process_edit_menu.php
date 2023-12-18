<?php
session_start();

if (!defined('ROOT'))
  define('ROOT', $_SERVER['DOCUMENT_ROOT'] . '/vi-food-id');
require_once ROOT . "/module/backend/akun/cek-penjual.php";
require_once ROOT . "/module/backend/database/connection.php";

$username = $_SESSION['username'];
$idMenu = $_POST['id'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];

// Validate and move the uploaded image file
$target_dir = "../../../../uploads/";
$nama_file = $username . '_menu_' . $idMenu . '.png';
$gambar = $target_dir . $nama_file;

function updateMenu($username, $nama, $harga, $deskripsi, $idMenu) {
	$koneksi = getDb();
	// Update the menu using prepared statements
	$sql = "UPDATE menu SET nama = ?, harga = ?, deskripsi = ? WHERE id = ?";
	$stmt = $koneksi->prepare($sql);
	$stmt->bind_param("sssi", $nama, $harga, $deskripsi, $idMenu);

	if ($stmt->execute()) {
		header("Location: ../");
		exit;
	} else {
		die("Error updating record: " . $stmt->error);
	}
}

function updateMenuWithImage($username, $nama, $harga, $deskripsi, $image, $idMenu) {
	$koneksi = getDb();
	// Update the menu using prepared statements
	$sql = "UPDATE menu SET nama = ?, harga = ?, deskripsi = ?, gambar = ? WHERE id = ?";
	$stmt = $koneksi->prepare($sql);
	$stmt->bind_param("ssssi", $nama, $harga, $deskripsi, $image, $idMenu);

	if ($stmt->execute()) {
		header("Location: ../");
		exit;
	} else {
		die("Error updating record: " . $stmt->error);
	}
}

if ($_FILES['image']['tmp_name']) {
	if (file_exists($gambar)) {
		unlink($gambar);
	}
	move_uploaded_file($_FILES["image"]["tmp_name"], $gambar);
	updateMenuWithImage($username, $nama, $harga, $deskripsi, $nama_file, $idMenu);
	header("Location: ../");
} else {
	updateMenu($username, $nama, $harga, $deskripsi, $idMenu);
	header("Location: ../");
}
