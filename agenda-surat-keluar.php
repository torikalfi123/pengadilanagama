<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Surat Keluar</title>
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




/* Container */
.container {
    width: 90%;
    max-width: 900px;
    margin: 30px auto;
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

/* Header Logo Section */
.header-logo {
    display: flex;
    align-items: center;
    gap: 20px;
    margin-bottom: 20px;
}

.header-logo img {
    width: 100px;
    height: auto;
}

.header-logo .info {
    font-size: 14px;
}

/* Form Section */
.form-section h2 {
    text-align: center;
    color: #004d00;
    margin-bottom: 20px;
}

form {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 15px;
}

label {
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
}

input, select, textarea {
    width: 100%;
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

textarea {
    resize: none;
    height: 60px;
}

/* Form Buttons */
.form-buttons {
    grid-column: span 2;
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
}

.btn {
    padding: 10px 20px;
    font-size: 16px;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.btn-back {
    background-color: #d9534f;
}

.btn-save {
    background-color: #28a745;
}

.btn:hover {
    opacity: 0.9;
}

/* Table Styling (Jika Diperlukan untuk Tabel Surat Keluar) */
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

    </style>
</head>
<body>
    <header>
        <div class="navbar">
            <h1>SIMPEL - Agenda Surat Keluar</h1>
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
    <div class="container">
        <div class="header-logo">
            <img src="logo pengadilan agama.png" alt="Logo Pengadilan Agama">
            <div class="info">
                <h3>PENGADILAN AGAMA PONTIANAK KELAS I.A</h3>
                <p>Alamat: Jl. Jendral Ahmad Yani No. 8 Pontianak, Kalimantan Barat</p>
                <p>Telp: 0561-711856, Email: pa_pontianak07@yahoo.co.id</p>
                <p>Website: www.pa-pontianak.go.id</p>
            </div>
        </div>
        <div class="form-section">
            <h2>TAMBAH DATA SURAT KELUAR</h2>
            <form action="proses-surat-keluar.php" method="POST" enctype="multipart/form-data">
                <div>
                    <label for="no_agenda">No Agenda</label>
                    <input type="text" id="no_agenda" name="no_agenda" required>
                </div>
                <div>
                    <label for="kode_surat">Kode Surat</label>
                    <input type="text" id="kode_surat" name="kode_surat" required>
                </div>
                <div>
                    <label for="sifat_surat">Sifat Surat</label>
                    <select id="sifat_surat" name="sifat_surat" required>
                        <option value="Rahasia">Rahasia</option>
                        <option value="Segera">Segera</option>
                        <option value="Penting">Penting</option>
                        <option value="Biasa">Biasa</option>
                    </select>
                </div>
                <div>
                    <label for="tanggal_surat">Tanggal Surat</label>
                    <input type="date" id="tanggal_surat" name="tanggal_surat" required>
                </div>
                <div>
                    <label for="tujuan_surat">Tujuan Surat</label>
                    <input type="text" id="tujuan_surat" name="tujuan_surat" required>
                </div>
                <div>
                    <label for="file_surat">File Surat</label>
                    <input type="file" id="file_surat" name="file_surat" accept=".pdf,.doc,.docx,.jpg,.png" required>
                </div>
                <div>
                    <label for="no_urut">No Urut</label>
                    <input type="text" id="no_urut" name="no_urut" required>
                </div>
                <div>
                    <label for="keterangan">Keterangan</label>
                    <textarea id="keterangan" name="keterangan"></textarea>
                </div>
                <div class="form-buttons">
                    <a href="agenda-surat-keluar.php" class="btn btn-back">Kembali</a>
                    <button type="submit" class="btn btn-save">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
