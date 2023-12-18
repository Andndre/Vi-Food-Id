<?php

session_start();

if (!defined('ROOT')) {
    define('ROOT', $_SERVER['DOCUMENT_ROOT'] . '/vi-food-id');
}

require_once ROOT . "/module/backend/database/connection.php";

$kuantitas = $_POST['kuantitas'];
$menu = $_POST['menu'];
