<?php
$host = 'localhost'; // Host database
$user = 'root';      // Username database (default: root)
$pass = '';          // Password database (kosongkan jika default)
$db   = 'pengadilan_agama'; // Ganti dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}
?>
