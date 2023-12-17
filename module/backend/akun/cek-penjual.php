<?php
if (isset($_SESSION['role']) && $_SESSION['role'] !== 'penjual') {
  header('Location: ../../akun/login');
  exit();
}
?>
