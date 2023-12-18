<?php
session_start();

if (!defined('ROOT')) {
    define('ROOT', $_SERVER['DOCUMENT_ROOT'] . '/vi-food-id');
}

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    echo "Error: Tidak menerima method POST";
    exit();
}

require ROOT . "/module/backend/database/connection.php";

// Mengambil data dari form
$username = $_POST["username"];
$password = $_POST["password"];

// Melakukan validasi input
if (empty($username) || empty($password)) {
    echo "Error: Mohon lengkapi semua field.";
    mysqli_close($koneksi);
    exit();
}

// Mencegah SQL Injection dengan prepared statements
$queryMenu = "SELECT * FROM akun WHERE username = ?";
$stmtMenu = mysqli_prepare($koneksi, $queryMenu);
mysqli_stmt_bind_param($stmtMenu, "s", $username);
mysqli_stmt_execute($stmtMenu);
$menu = mysqli_stmt_get_result($stmtMenu);

// Periksa apakah hasil query mengembalikan baris data
if (mysqli_num_rows($menu) == 0) {
    echo "Error: Info login yang anda masukkan salah.";
    closeDatabaseConnection($koneksi, $stmtMenu);
    exit();
}

$user = mysqli_fetch_assoc($menu); // Ambil data pengguna dari hasil query

if (!password_verify($password, $user['password'])) {
    echo "Error: Info login yang anda masukkan salah.";
    closeDatabaseConnection($koneksi, $stmtMenu);
    exit();
}

$_SESSION['username'] = $username; // Simpan username dalam sessiom
$role = $user['tipe'];
$_SESSION['role'] = $role;

// Alihkan berdasarkan hak akses pengguna
switch ($role) {
	case 'penjual':
		header("Location: /vi-food-id/admin/penjual/dashboard/index.php");
		break;
	case 'pembeli':
		header("Location: /vi-food-id/home/index.php");
		break;
	default:
		echo "Error: Peran tidak valid.";
		break;
}

// Tutup statement dan koneksi ke database
closeDatabaseConnection($koneksi, $stmtMenu);

function closeDatabaseConnection($koneksi, $stmt)
{
    mysqli_stmt_close($stmt);
    mysqli_close($koneksi);
}
?>
