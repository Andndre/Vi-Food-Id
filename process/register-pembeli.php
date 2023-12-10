<?php

require "connection.php";

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Ambil data dari form
$username = $_POST['username'];
$password = $_POST['password'];
$konfirmasi = $_POST['password-confirm'];

if ($password != $konfirmasi) {
    echo "Password tidak sesuai dengan password sebelumnya";
    exit();
}

// Periksa apakah username sudah ada di database menggunakan prepared statement
$sql = "SELECT * FROM akun WHERE username=?";
$stmt = $koneksi->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Jika username sudah ada, tampilkan pesan error
    echo "Username sudah ada. Silakan gunakan username lain atau masuk ke halaman login.";
} else {
    // Enkripsi password sebelum menyimpannya ke database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    // Menyimpan data ke dalam database menggunakan prepared statement
    $insert_query = "INSERT INTO akun (username, password, tipe) VALUES (?, ?, 'pembeli')";
    $insert_stmt = $koneksi->prepare($insert_query);
    $insert_stmt->bind_param("ss", $username, $hashed_password);
    $insert_stmt->execute();

    // Jika data berhasil disimpan, arahkan ke halaman login
    header("Location: ../login/index.php");
}

$koneksi->close();
