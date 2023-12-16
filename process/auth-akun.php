<?php
if (!isset($_COOKIE['username'])) {
  header('Location: ../login/index.php'); 
  exit();
}
?>