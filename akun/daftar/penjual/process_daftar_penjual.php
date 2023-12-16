<?php

require "../../../module/backend/database/connection.php";

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Set error reporting to display all errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

function string_to_slug_method($string) {
    $string = strtolower(trim($string));
    $string = str_replace(' ', '-', $string);
    $slug = preg_replace('/[^a-z0-9-]/', '', $string);
    return $slug;
}

// Ambil data dari form
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$nomorHp = $_POST['nomor-hp'];
$namaTempatMakan = $_POST['tempat-makan'];
$konfirmasi = $_POST['password-confirm'];
$garisLintang = $_POST['garis-lintang'];
$garisBujur = $_POST['garis-bujur'];

if ($password != $konfirmasi) {
    echo "Password tidak sesuai dengan password sebelumnya";
    exit();
}

// Periksa apakah username sudah ada di database menggunakan prepared statement
$sql_username = "SELECT * FROM akun WHERE username=?";
$stmt_username = $koneksi->prepare($sql_username);
$stmt_username->bind_param("s", $username);
$stmt_username->execute();
$result_username = $stmt_username->get_result();

if ($result_username->num_rows > 0) {
    // Jika username sudah ada, tampilkan pesan error
    echo "Username sudah ada. Silakan gunakan username lain atau masuk ke halaman login.";
} else {
    // Periksa apakah email sudah ada di database menggunakan prepared statement
    $sql_email = "SELECT * FROM akun WHERE email=?";
    $stmt_email = $koneksi->prepare($sql_email);
    $stmt_email->bind_param("s", $email);
    $stmt_email->execute();
    $result_email = $stmt_email->get_result();

    if ($result_email->num_rows > 0) {
        // Jika email sudah ada, tampilkan pesan error
        echo "Email sudah terdaftar. Silakan gunakan email lain atau masuk ke halaman login.";
    } else {
        // Email belum terdaftar, lanjutkan dengan proses penyimpanan data
        // Enkripsi password sebelum menyimpannya ke database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Menyimpan data ke dalam database menggunakan prepared statement
        $insert_query_akun = "INSERT INTO akun (username, email, nomor_hp, password, tipe) VALUES (?, ?, ?, ?, 'penjual')";
        $insert_stmt_akun = $koneksi->prepare($insert_query_akun);

        // Check if the statement is prepared successfully
        if (!$insert_stmt_akun) {
            die("Error preparing akun insert statement: " . $koneksi->error);
        }

        $insert_stmt_akun->bind_param("ssss", $username, $email, $nomorHp, $hashed_password);

        $slug = $username . '-' . string_to_slug_method($namaTempatMakan);
        $insert_query_tempat_makan = "INSERT INTO tempat_makan (username, nama_tempat_makan, garis_lintang, garis_bujur, slug) VALUES (?, ?, ?, ?, ?)";
        $insert_stmt_tempat_makan = $koneksi->prepare($insert_query_tempat_makan);

        $insert_stmt_tempat_makan->bind_param("ssdds", $username, $namaTempatMakan, $garisLintang, $garisBujur, $slug);

        $insert_stmt_akun->execute();

        // Check for errors after akun insert
        if ($insert_stmt_akun->error) {
            die("Error executing akun insert statement: " . $insert_stmt_akun->error);
        }

        $insert_stmt_tempat_makan->execute();

        // Check for errors after tempat_makan insert
        if ($insert_stmt_tempat_makan->error) {
            die("Error executing tempat_makan insert statement: " . $insert_stmt_tempat_makan->error);
        }

        // Jika data berhasil disimpan, arahkan ke halaman login
        header("Location: ../login/index.php");
    }
}

$koneksi->close();
?>
