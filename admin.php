<?php
// Memulai sesi
session_start();

// Periksa apakah pengguna sudah login dan memiliki akses admin
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    echo "<script>alert('Akses ditolak! Anda bukan admin.'); window.location.href='login.php';</script>";
    exit();
}

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

// Menangani form tambah akun
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_user'])) {
    $new_username = $_POST['username'];
    $new_password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password
    $new_role = $_POST['role'];

    $sql_add = "INSERT INTO users (username, password, role, created_at) VALUES ('$new_username', '$new_password', '$new_role', NOW())";
    if ($conn->query($sql_add) === TRUE) {
        echo "<script>alert('Akun berhasil ditambahkan!'); window.location.href='admin.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan akun: " . $conn->error . "');</script>";
    }
}

// Menangani penghapusan akun
if (isset($_GET['delete'])) {
    $delete_username = $_GET['delete'];
    $sql_delete = "DELETE FROM users WHERE username = '$delete_username'";
    if ($conn->query($sql_delete) === TRUE) {
        echo "<script>alert('Akun berhasil dihapus!'); window.location.href='admin.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus akun: " . $conn->error . "');</script>";
    }
}

// Query untuk mengambil data pengguna
$sql = "SELECT username, role, created_at FROM users";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Kelola Pengguna</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #004d00;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #004d00;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .form-container {
            margin-top: 30px;
        }
        .form-container form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .form-container input, .form-container select, .form-container button {
            padding: 10px;
            font-size: 16px;
        }
        .form-container button {
            background-color: #004d00;
            color: white;
            border: none;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #006400;
        }
        .logout {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 16px;
        }
        .logout a {
            color: #004d00;
            text-decoration: none;
            font-weight: bold;
        }
        .logout a:hover {
            text-decoration: underline;
        }
        .delete-link {
            color: red;
            text-decoration: none;
            font-weight: bold;
        }
        .delete-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Kelola Pengguna</h1>
        
        <!-- Tabel Daftar Pengguna -->
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Tanggal Dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['username']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['role']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
                        echo "<td><a href='?delete=" . htmlspecialchars($row['username']) . "' class='delete-link'>Hapus</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Tidak ada pengguna ditemukan.</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- Form Tambah Pengguna -->
        <div class="form-container">
            <h2>Tambah Pengguna Baru</h2>
            <form action="" method="POST">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <select name="role" required>
                    <option value="user">Karyawan</option>
                    <option value="staff">Ketua</option>
                    <option value="admin">Admin</option>
                </select>
                <button type="submit" name="add_user">Tambah Pengguna</button>
            </form>
        </div>

        <!-- Logout -->
        <div class="logout">
            <a href="logout.php">Logout</a>
        </div>
    </div>
</body>
</html>
<?php
// Menutup koneksi
$conn->close();
?>
