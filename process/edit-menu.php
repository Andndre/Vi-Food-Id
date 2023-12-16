<?php 
require "connection.php";

$username = $_COOKIE['username'];
$idMenu = $_POST['id'];
$nama = $_POST['nama-makanan'];	
$gambar	= $_POST['gambar-menu'];
$harga	= $_POST['harga-makanan'];
$deskripsi =$_POST['deskripsi'];

$queryMenu = "SELECT id FROM menu WHERE id=$id";
$result = mysqli_query($koneksi, $queryMenu);


if ($result->num_rows == 0) {
	die("Menu tidak ditemukan");
}

$menu = $result->fetch_assoc();
if ($menu['tempat_makan'] != $username) {
	die("Akses ditolak");
}

$queryUpdate = "";
