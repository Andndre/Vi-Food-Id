<?php
require "connection.php";

// Form submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Query untuk memeriksa apakah username sudah ada di database
    $query = "SELECT * FROM akun WHERE username = '$username'";
    $result = mysqli_query($koneksi, $query);

    // Periksa apakah hasil query mengembalikan baris data
    if (mysqli_num_rows($result) > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['username'] = $username; // Simpan username dalam session

            // Set cookie untuk menyimpan username
            setcookie('username', $username, time() + (86400 * 30), '/'); // Cookie berlaku selama 30 hari (30 * 86400 detik)

            // Determine user role (penjual or pembeli)
            $role = $user['tipe'];
            // Redirect based on user role
            if ($role == 'penjual') {
                header("Location: ../penjual/dashboard/index.php");
            } elseif ($role == 'pembeli') {
                header("Location: ../home/index.php");
            } else {
                echo "Error: Role tidak valid.";
            }
            exit();
        } else {
            echo "Error: Password salah.";
        }
    } else {
        echo "Error: Username belum terdaftar.";
    }

    // Tutup koneksi ke database
    mysqli_close($koneksi);
}
?>
