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

// Memeriksa jika form login di-submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Mencegah SQL Injection
    $username = $conn->real_escape_string($username);

    // Memeriksa username di database
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Mengambil data pengguna
        $row = $result->fetch_assoc();

        // Memeriksa password
        if (password_verify($password, $row['password'])) {
            // Menyimpan data ke sesi
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];

            // Mengarahkan pengguna berdasarkan role
            if ($row['role'] == 'admin') {
                header("Location: admin.php"); // Halaman admin
            } else {
                header("Location: beranda.php"); // Halaman beranda untuk user
            }
            exit();
        } else {
            echo "<script>alert('Password salah!'); window.location.href='login.php';</script>";
        }
    } else {
        echo "<script>alert('Username tidak ditemukan!'); window.location.href='login.php';</script>";
    }
} else {
    echo "<script>alert('Akses tidak valid!'); window.location.href='login.php';</script>";
}

// Menutup koneksi
$conn->close();
?>
