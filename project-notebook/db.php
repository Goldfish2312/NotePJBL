<?php
$host = 'localhost'; // host database
$username = 'root';  // username database
$password = '';      // password database
$dbname = 'notepad'; // nama database

// Membuat koneksi ke database
$conn = mysqli_connect($host, $username, $password, $dbname);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
