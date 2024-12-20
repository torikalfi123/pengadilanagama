<?php
// Memulai sesi
session_start();

// Konfigurasi koneksi ke database
$host = "localhost";
$user = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$database = "pengadilan_agama"; // Ganti dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($host, $user, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Menangkap data dari form
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

// Mencegah SQL Injection
$username = $conn->real_escape_string($username);
$password = $conn->real_escape_string($password);
$role = $conn->real_escape_string($role);

// Hash password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Query untuk menambahkan pengguna baru
$sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$hashedPassword', '$role')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Akun berhasil dibuat!'); window.location.href='login.php';</script>";
} else {
    echo "<script>alert('Gagal membuat akun: " . $conn->error . "'); window.location.href='hubungi-admin.php';</script>";
}

// Menutup koneksi
$conn->close();
?>
