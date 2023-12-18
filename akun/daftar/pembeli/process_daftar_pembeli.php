<?php
if (!defined('ROOT')) define('ROOT', $_SERVER['DOCUMENT_ROOT'] . '/vi-food-id');


require ROOT . "/module/backend/database/connection.php";

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Ambil data dari form
$username = $_POST['username'];
$password = $_POST['password'];
$konfirmasi = $_POST['password-confirm'];
$email = $_POST['email'];

if ($password != $konfirmasi) {
    echo "Password tidak sesuai dengan password sebelumnya";
    exit();
}

// Periksa apakah username sudah ada di database menggunakan prepared statement
$sql = "SELECT * FROM akun WHERE username=?";
$stmtMenu = $koneksi->prepare($sql);

// Check if the statement is prepared successfully
if (!$stmtMenu) {
    // If not, show an error message
    die("Error preparing statement: " . $koneksi->error);
}

$stmtMenu->bind_param("s", $username);
$stmtMenu->execute();
$menu = $stmtMenu->get_result();

if ($menu->num_rows > 0) {
    // Jika username sudah ada, tampilkan pesan error
    echo "Username sudah ada. Silakan gunakan username lain atau masuk ke halaman login.";
} else {
    // Enkripsi password sebelum menyimpannya ke database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Menyimpan data ke dalam database menggunakan prepared statement
    $insert_query = "INSERT INTO akun (username, password, email, tipe) VALUES (?, ?, ?, 'pembeli')";
    $insert_stmt = $koneksi->prepare($insert_query);

    // Check if the statement is prepared successfully
    if (!$insert_stmt) {
        die("Error preparing insert statement: " . $koneksi->error);
    }

    $insert_stmt->bind_param("sss", $username, $hashed_password, $email); // Adjust the number of "s" placeholders
    $insert_stmt->execute();

    // Check for errors after insert
    if ($insert_stmt->error) {
        die("Error executing insert statement: " . $insert_stmt->error);
    }

    // Jika data berhasil disimpan, arahkan ke halaman login
    header("Location: ../../login");
}

$koneksi->close();
?>
