<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Surat Masuk</title>
    <style>
        /* Reset dasar */
        body, h1, h2, h3, p, ul, li, a, input, textarea, button {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Gaya dasar */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9; /* Latar belakang lembut */
            margin: 0;
            padding: 0;
        }

        /* Header */
        header {
            background-color: #004d00; /* Warna hijau */
            padding: 10px 20px;
        }

        header h1 {
            color: white; /* Warna teks putih */
            font-size: 24px; /* Ukuran font */
            font-weight: bold;
            margin: 0;
        }

        /* Navigasi */
        nav {
            background-color: #f8f9fa; /* Warna latar belakang abu-abu terang */
            display: flex;
            padding: 10px;
            gap: 15px;
        }

        nav a {
            text-decoration: none;
            color: black; /* Warna teks hitam */
            font-weight: bold;
            
            
        }

        nav a:hover {
            text-decoration: underline;
            color: #004d00; /* Warna hijau saat hover */
            
        }

        /* Kontainer utama */
        .container {
            width: 90%;
            max-width: 800px;
            margin: 30px auto; /* Tengah secara horizontal */
            background: #fff;
            padding: 20px;
            border-radius: 10px; /* Sudut membulat */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Bayangan */
        }

        /* Gaya judul */
        h1 {
            color: #004d00; /* Warna hijau */
            font-size: 24px;
            margin-bottom: 20px;
        }

        /* Formulir */
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-weight: bold;
           
        }

        input, textarea {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd; /* Warna perbatasan abu-abu */
            border-radius: 5px; /* Sudut membulat */
            width: 100%;
        }

        input:focus, textarea:focus {
            outline: none;
            border-color: #004d00; /* Warna perbatasan hijau saat fokus */
        }

        textarea {
            resize: none;
            height: 80px; /* Ketinggian tetap */
        }

        /* Tombol */
        .buttons {
            display: flex;
            justify-content: space-between;
        }

        .btn {
            padding: 10px 20px;
            font-size: 16px;
            color: #fff; /* Teks putih */
            border-radius: 5px; /* Sudut membulat */
            text-align: center;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-back {
            background-color: #d9534f; /* Merah */
        }

        .btn-save {
            background-color: #004d00; /* Hijau */
        }

        .btn:hover {
            opacity: 0.9; /* Efek hover */
        }

        /* Informasi tambahan */
        .info {
            margin-top: 20px;
            text-align: center;
        }

        .info p {
            margin: 5px 0;
            color: #333; /* Teks abu gelap */
            font-size: 14px;
        }
    </style>
</head>
<body>
    <header>
        <h1>SIMPEL - Cetak Buku Register
                    </h1>
    </header>
    <nav>
        <a href="beranda.php">Beranda</a>
        <a href="agenda-surat-masuk.php">Agenda Surat Masuk</a>
        <a href="agenda-surat-keluar.php">Agenda Surat Keluar</a>
        <a href="cetak-buku-register.php">Cetak Buku Register</a>
        <a href="klasifikasi-surat.php">Klasifikasi Surat</a>
        <a href="logout.php">Keluar</a>
    </nav>
    <div class="container">
        <a href="cetak-surat-masuk.php">Surat Masuk</a>
          
            </div>
        </form>
    </div>
</body>
</html>
