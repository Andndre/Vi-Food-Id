<?php
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    echo "Error: Tidak menerima method POST";
    exit();
}

require "../../module/backend/database/connection.php";

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
$query = "SELECT * FROM akun WHERE username = ?";
$stmt = mysqli_prepare($koneksi, $query);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Periksa apakah hasil query mengembalikan baris data
if (mysqli_num_rows($result) == 0) {
    echo "Error: Info login yang anda masukkan salah.";
    goto exit_tutup_database;
}

$user = mysqli_fetch_assoc($result); // Ambil data pengguna dari hasil query

if (!password_verify($password, $user['password'])) {
    echo "Error: Info login yang anda masukkan salah.";
    goto exit_tutup_database;
}

session_start();
$_SESSION['username'] = $username; // Simpan username dalam session
// Set cookie untuk menyimpan username
setcookie('username', $username, time() + (86400 * 30), '/'); // Cookie berlaku selama 30 hari (30 * 86400 detik)

// Tentukan hak akses pengguna (penjual atau pembeli)
$role = $user['tipe'];
// Alihkan berdasarkan hak akses pengguna
switch ($role) {
    case 'penjual':
        header("Location: ../../admin/dasboard/index.php");
        break;
    case 'pembeli':
        header("Location: ../../home/index.php");
        break;
    default:
        echo "Error: Peran tidak valid.";
        break;
}

exit_tutup_database:
    // Tutup statement dan koneksi ke database
    mysqli_stmt_close($stmt);
    mysqli_close($koneksi);
?>
