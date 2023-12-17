<?php
session_start();

if (!defined('ROOT'))
  define('ROOT', $_SERVER['DOCUMENT_ROOT'] . '/vi-food-id');
require_once ROOT . "/module/backend/akun/cek-login.php";
require_once ROOT . '/module/backend/database/connection.php';

$username = $_SESSION['username'];
$email = $_POST['email'];
$passwordOld = $_POST['password-old']; // password lama opsional
$passwordNew = $_POST['password-new']; // password baru wajib jika password lama diisi
$passwordNewConfirm = $_POST['password-new-confirm']; // konfirmasi password baru wajib jika password lama diisi

function getOldValue($username) {
	$koneksi = getDb();
	$query = $koneksi->prepare('SELECT * FROM akun WHERE username = ?');
	$query->bind_param('s', $username); // Menggunakan bind_param untuk memberikan parameter
	$query->execute();
	$result = $query->get_result();
	$user = $result->fetch_assoc();
	return $user;
}

function updateInfo($username, $email, $passwordOld, $passwordNew, $passwordNewConfirm) {
	$koneksi = getDb();
	$oldValue = getOldValue($username);

	if ($passwordOld != "") {
		if (!password_verify($passwordOld, $oldValue['password'])) {
			echo "Password lama tidak sesuai";
			exit();
		}

		if ($passwordNew != $passwordNewConfirm) {
			echo "Konfirmasi password baru tidak sesuai";
			exit();
		}

		$password = password_hash($passwordNew, PASSWORD_DEFAULT);
		$query = $koneksi->prepare("UPDATE akun SET email = ?, password = ? WHERE username = ?");
		$query->bind_param('sss', $email, $password, $username);
		if ($query->execute()) {
			header("Location: $_SERVER[HTTP_REFERER]");
		} else {
			echo "Error: " . $query->error;
			exit();
		}
	} else {
		$query = $koneksi->prepare("UPDATE akun SET email = ? WHERE username = ?");
		$query->bind_param('ss', $email, $username);
		if ($query->execute()) {
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		} else {
			echo "Error: " . $query->error;
			exit();
		}
	}
}

updateInfo($username, $email, $passwordOld, $passwordNew, $passwordNewConfirm);