<?php
session_start();

if (!defined('ROOT'))
  define('ROOT', $_SERVER['DOCUMENT_ROOT'] . '/vi-food-id');
require ROOT . "/module/backend/akun/cek-akun.php";

