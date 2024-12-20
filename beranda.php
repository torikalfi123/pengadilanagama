<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMPel - Sistem Informasi Persuratan Pengadilan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #004d00;
            color: white;
            padding: 10px 20px;
        }
        header h1 {
            margin: 0;
            font-size: 24px;
        }
        nav {
            background-color: #f8f9fa;
            display: flex;
            padding: 10px;
            gap: 15px;
        }
        nav a {
            text-decoration: none;
            color: black;
            font-weight: bold;
        }
        nav a:hover {
            text-decoration: underline;
            color: #004d00;
        }
        .content {
            padding: 20px;
            text-align: center;
        }
        .logo {
            max-width: 100px;
        }
        .info {
            margin-top: 20px;
            text-align: center;
        }
        .info p {
            margin: 5px 0;
        }
        .welcome {
            background-color: #004d00;
            color: white;
            padding: 15px;
            font-size: 18px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1>SIMPEL</h1>
    </header>
    <nav>
        <a href="beranda.php">Beranda</a>
        <a href="agenda-surat-masuk.php">Agenda Surat Masuk</a>
        <a href="agenda-surat-keluar.php">Agenda Surat Keluar</a>
        <a href="cetak-buku-register.php">Cetak Buku Register</a>
        <a href="klasifikasi-surat.php">Klasifikasi Surat</a>
        <a href="logout.php">Keluar</a>
    </nav>
    <div class="content">
        <img src="logo pengadilan agama.png" alt="Logo Pengadilan Agama Pontianak" class="logo">
        <div class="info">
            <h2>PENGADILAN AGAMA PONTIANAK KELAS I.A</h2>
            <p>Alamat: Jl. Jendral Ahmad Yani Nomor 8 Pontianak, Kalimantan Barat</p>
            <p>Telepon: 0561-711856</p>
            <p>Email: pa_pontianak07@yahoo.co.id</p>
            <p>Website: <a href="https://pa-pontianak.go.id" target="_blank">www.pa-pontianak.go.id</a></p>
        </div>
        <div class="welcome">
            Selamat Datang  <br>
            SIMPEL (Sistem Informasi Persuratan Pengadilan)
        </div>
    </div>
</body>
</html>
