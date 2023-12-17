<?php

function getDb() {
	static $db;

	if($db === null) {		
		$host = "localhost";
		$password = "";
		$username = "root";
		$database = "vi-food";
		$koneksi = mysqli_connect($host, $username, $password, $database); 
		$db = $koneksi;
	}
	
	return $db;
}

$koneksi = getDb();
