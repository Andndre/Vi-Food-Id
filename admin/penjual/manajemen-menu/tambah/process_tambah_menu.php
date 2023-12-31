<?php
session_start();

if (!defined('ROOT')) define('ROOT', $_SERVER['DOCUMENT_ROOT'] . '/vi-food-id');

require_once ROOT . "/module/backend/database/connection.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Hanya menerima POST");
}

// Fungsi untuk memasukkan data menu ke dalam database
function tambahGambar($tempat_makan, $nama, $gambar, $harga, $deskripsi, $koneksi) {
    $query = "INSERT INTO menu (tempat_makan, nama, gambar, harga, deskripsi) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($koneksi, $query);

    if (!$stmt) {
        die("Error in prepare statement: " . mysqli_error($koneksi));
    }

    mysqli_stmt_bind_param($stmt, "sssis", $tempat_makan, $nama, $gambar, $harga, $deskripsi);
    $result = mysqli_stmt_execute($stmt);

    if (!$result) {
        die("Error in execution: " . mysqli_error($koneksi));
    }

    mysqli_stmt_close($stmt);
}
// Ambil data dari form
$namaMakanan = $_POST['nama-makanan'];
$hargaMakanan = $_POST['harga-makanan'];
$deskripsiMakanan = $_POST['deskripsi'];

$targetDir = "../../../../uploads/";
$gambarMenu = $targetDir . basename($_FILES["gambar-menu"]["name"]);
move_uploaded_file($_FILES["gambar-menu"]["tmp_name"], $gambarMenu);

// Mendapatkan username dari cookie
$tempatMakan = $_SESSION['username']; 

// Panggil fungsi untuk menambahkan menu
tambahGambar($tempatMakan, $namaMakanan, basename($_FILES["gambar-menu"]["name"]), $hargaMakanan, $deskripsiMakanan, $koneksi);

// Redirect ke halaman sukses atau halaman lain yang sesuai
header("Location: ../");
exit();
?>
