<?php
session_start();
if (isset($_SESSION['tipe_akun']) !== 'penjual') {
  header('Location: ../login/index.php'); 
  exit();
}
?>
