<?php 
if (!defined('ROOT')) define('ROOT', $_SERVER['DOCUMENT_ROOT'] . '/vi-food-id');

require_once ROOT . '/module/backend/akun/cek-login.php';
require_once ROOT . '/module/backend/database/connection.php';

$targetDir = "../uploads/";
// simpan di ../uploads/username_profil.png, jika sudah ada, maka hapus yang lama
$gambarProfil = $targetDir . $username . "_profil.png";
$username = $_SESSION['username'];
if (file_exists($gambarProfil)) {
	unlink($gambarProfil);
}
move_uploaded_file($_FILES["file"]["tmp_name"], $gambarProfil);
