<?php
session_start();

if (!defined('ROOT')) define('ROOT', $_SERVER['DOCUMENT_ROOT'] . '/vi-food-id');

require_once ROOT . "/module/backend/database/connection.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Hanya menerima POST");
}

// Fungsi untuk memasukkan data menu ke dalam database
function tambahGambar($tempat_makan,$gambar) {
		$koneksi = getDb();
    $query = "INSERT INTO gambar_tempat_makan (username, src) VALUES (?, ?)";
    $stmt = mysqli_prepare($koneksi, $query);

    if (!$stmt) {
        die("Error in prepare statement: " . mysqli_error($koneksi));
    }

    mysqli_stmt_bind_param($stmt, "ss", $tempat_makan, $gambar);
    $result = mysqli_stmt_execute($stmt);

    if (!$result) {
        die("Error in execution: " . mysqli_error($koneksi));
    }

    mysqli_stmt_close($stmt);
}

$targetDir = "../../../../uploads/";
$gambarMenu = $targetDir . basename($_FILES["gambar-menu"]["name"]);
move_uploaded_file($_FILES["gambar-menu"]["tmp_name"], $gambarMenu);

// Mendapatkan username dari cookie
$tempatMakan = $_SESSION['username']; 

// Panggil fungsi untuk menambahkan menu
tambahGambar($tempatMakan, basename($_FILES["gambar-menu"]["name"]));

// Redirect ke halaman sukses atau halaman lain yang sesuai
header("Location: ../");
exit();
?>
