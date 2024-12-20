<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Surat Keluar</title>
    <style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9; /* Latar belakang lembut */
    margin: 0;
}

/* Header Navigation */
.navbar {
    background-color: #004d00; /* Hijau tua */
    color: white; /* Warna teks putih */
    font-size: px; /* Ukuran font */
    font-weight: bold; 
    margin: 0;
}



.navbar h1 {
    font-size: 24px;
    font-weight: bold;
    padding: 10px 20px;
    
    
}

.menu {
    display: flex;
    background-color: #f8f9fa; /* Warna latar belakang abu-abu terang */
    list-style: none;
    padding: 10px;
    gap: 15px;
}

.menu li {
            background-color: #f8f9fa; /* Warna latar belakang abu-abu terang */
           
            
}

.menu a {
    text-decoration: none;
            color: black; /* Warna teks hitam */
            font-weight: bold;
      
}



        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 30px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        h2 {
            color: #004d00;
            text-align: center;
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
            text-align: left;
            padding: 10px;
        }

        th {
            background-color: #004d00;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .btn {
            text-decoration: none;
            padding: 8px 12px;
            font-size: 14px;
            color: white;
            border-radius: 5px;
            margin-right: 5px;
        }

        .btn-edit {
            background-color: #007bff;
        }

        .btn-delete {
            background-color: #d9534f;
        }

        .btn:hover {
            opacity: 0.9;
        }

        </style>
</head>
<body>
    <header>
        <div class="navbar">
            <h1>SIMPEL - Cetak Surat Masuk </h1>
            <ul class="menu">
                <li><a href="beranda.php">Beranda</a></li>
                <li><a href="agenda-surat-masuk.php">Agenda Surat Masuk</a></li>
                <li><a href="agenda-surat-keluar.php">Agenda Surat Keluar</a></li>
                <li><a href="cetak-buku-register.php">Cetak Buku Register</a></li>
                <li><a href="klasifikasi-surat.php">Klasifikasi Surat</a></li>
                <li><a href="logout.php">Keluar</a></li>
            </ul>
        </div>
    </header>
    </style>
</head>
<body>
    <div class="container">
        <h2>Data Surat Keluar</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Agenda</th>
                    <th>Kode Surat</th>
                    <th>Sifat Surat</th>
                    <th>Tanggal Surat</th>
                    <th>Tujuan Surat</th>
                    <th>No Urut</th>
                    <th>Keterangan</th>
                    <th>File</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Konfigurasi database
                $conn = new mysqli("localhost", "root", "", "pengadilan_agama");

                // Periksa koneksi
                if ($conn->connect_error) {
                    die("Koneksi gagal: " . $conn->connect_error);
                }

                // Query mengambil data surat keluar
                $sql = "SELECT * FROM surat_keluar ORDER BY created_at DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $no = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>" . htmlspecialchars($row['no_agenda']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['kode_surat']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['sifat_surat']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['tanggal_surat']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['tujuan_surat']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['no_urut']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['keterangan']) . "</td>";
                        echo "<td><a href='" . $row['file_surat'] . "' target='_blank'>Unduh</a></td>";
                        echo "<td>
                                <a href='edit-surat-keluar.php?id=" . $row['id'] . "' class='btn btn-edit'>Edit</a>
                                <a href='hapus-surat-keluar.php?id=" . $row['id'] . "' class='btn btn-delete' onclick='return confirm(\"Yakin ingin menghapus data ini?\")'>Hapus</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='10' style='text-align: center;'>Tidak ada data.</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
