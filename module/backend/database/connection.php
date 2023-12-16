<?php

$host = "localhost";
$password = "";
$username = "root";
$database = "vi-food";
$koneksi = mysqli_connect($host, $username, $password, $database); 

if ($koneksi->connect_error) {
	die("Error: gagal menghubungkan ke database: " . $koneksi->connect_error);
}
