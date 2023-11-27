<?php
$host = "localhost";
$dbname = "fuzzy";
$username = "root";
$password = "";

// Buat koneksi menggunakan MySQLi
$conn = new mysqli($host, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>