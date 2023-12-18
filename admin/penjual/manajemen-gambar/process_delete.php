<?php
session_start();

if (!defined('ROOT'))
  define('ROOT', $_SERVER['DOCUMENT_ROOT'] . '/vi-food-id');
require_once ROOT . "/module/backend/akun/cek-penjual.php";
require_once ROOT . "/module/backend/database/connection.php";

$id = $_POST['id'];

function deleteGambar($id) {
	$konseksi = getDb();
	$sql = "DELETE FROM gambar_tempat_makan WHERE id = ?";
	$stmt = $konseksi->prepare($sql);
	$stmt->bind_param("i", $id);
	$stmt->execute();
	$stmt->close();
	return true;
}

if (deleteGambar($id)) {
	header("Location: ./index.php");
} else {
	echo "Gagal menghapus gambar";
	exit();
}
