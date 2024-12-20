<?php
// Hubungkan dengan database
include 'koneksi.php';

// Ambil ID surat keluar dari URL
$id = $_GET['id'];

// Cek apakah ID ada atau tidak
if (!$id) {
    echo "ID tidak ditemukan.";
    exit;
}

// Ambil data surat keluar berdasarkan ID
$sql = "SELECT * FROM surat_keluar WHERE id = '$id'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    echo "Data tidak ditemukan.";
    exit;
}

// Ambil data surat
$data = $result->fetch_assoc();

// Jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $no_agenda = $_POST['no_agenda'];
    $kode_surat = $_POST['kode_surat'];
    $sifat_surat = $_POST['sifat_surat'];
    $tanggal_surat = $_POST['tanggal_surat'];
    $tujuan_surat = $_POST['tujuan_surat'];
    $keterangan = $_POST['keterangan'];

    // Update data ke database
    $update_sql = "UPDATE surat_keluar 
                   SET no_agenda = '$no_agenda', 
                       kode_surat = '$kode_surat',
                       sifat_surat = '$sifat_surat',
                       tanggal_surat = '$tanggal_surat',
                       tujuan_surat = '$tujuan_surat',
                       keterangan = '$keterangan'
                   WHERE id = '$id'";

    if ($conn->query($update_sql) === TRUE) {
        echo "Data berhasil diperbarui.";
        header("Location: cetak-surat-masuk.php");
        exit;
    } else {
        echo "Terjadi kesalahan: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Surat Keluar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f9;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        form div {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        input, textarea, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            opacity: 0.9;
        }
        a {
            color: #d9534f;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Surat Keluar</h2>
        <form action="" method="POST">
            <div>
                <label for="no_agenda">No Agenda</label>
                <input type="text" id="no_agenda" name="no_agenda" value="<?= $data['no_agenda']; ?>" required>
            </div>
            <div>
                <label for="kode_surat">Kode Surat</label>
                <input type="text" id="kode_surat" name="kode_surat" value="<?= $data['kode_surat']; ?>" required>
            </div>
            <div>
                <label for="sifat_surat">Sifat Surat</label>
                <select id="sifat_surat" name="sifat_surat" required>
                    <option value="Rahasia" <?= $data['sifat_surat'] == 'Rahasia' ? 'selected' : ''; ?>>Rahasia</option>
                    <option value="Segera" <?= $data['sifat_surat'] == 'Segera' ? 'selected' : ''; ?>>Segera</option>
                    <option value="Penting" <?= $data['sifat_surat'] == 'Penting' ? 'selected' : ''; ?>>Penting</option>
                    <option value="Biasa" <?= $data['sifat_surat'] == 'Biasa' ? 'selected' : ''; ?>>Biasa</option>
                </select>
            </div>
            <div>
                <label for="tanggal_surat">Tanggal Surat</label>
                <input type="date" id="tanggal_surat" name="tanggal_surat" value="<?= $data['tanggal_surat']; ?>" required>
            </div>
            <div>
                <label for="tujuan_surat">Tujuan Surat</label>
                <input type="text" id="tujuan_surat" name="tujuan_surat" value="<?= $data['tujuan_surat']; ?>" required>
            </div>
            <div>
                <label for="keterangan">Keterangan</label>
                <textarea id="keterangan" name="keterangan"><?= $data['keterangan']; ?></textarea>
            </div>
            <button type="submit">Simpan</button>
            <a href="halaman-surat-keluar.php">Batal</a>
        </form>
    </div>
</body>
</html>
