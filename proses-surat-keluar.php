<?php
// Konfigurasi koneksi ke database
$servername = "localhost";
$username = "root"; // Ganti dengan username database Anda
$password = "";     // Ganti dengan password database Anda
$dbname = "pengadilan_agama"; // Ganti dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$no_agenda = $_POST['no_agenda'];
$kode_surat = $_POST['kode_surat'];
$sifat_surat = $_POST['sifat_surat'];
$tanggal_surat = $_POST['tanggal_surat'];
$tujuan_surat = $_POST['tujuan_surat'];
$no_urut = $_POST['no_urut'];
$keterangan = $_POST['keterangan'];

// Proses file yang diunggah
$file_surat = $_FILES['file_surat'];
$target_dir = "uploads/";
$target_file = $target_dir . basename($file_surat["name"]);
$file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Validasi file
if ($file_type != "pdf" && $file_type != "doc" && $file_type != "docx" && $file_type != "jpg" && $file_type != "png") {
    echo "File tidak valid. Hanya file PDF, DOC, DOCX, JPG, dan PNG yang diperbolehkan.";
    exit;
}

// Pindahkan file ke folder uploads
if (move_uploaded_file($file_surat["tmp_name"], $target_file)) {
    // Simpan data ke database
    $sql = "INSERT INTO surat_keluar (no_agenda, kode_surat, sifat_surat, tanggal_surat, tujuan_surat, file_surat, no_urut, keterangan) 
            VALUES ('$no_agenda', '$kode_surat', '$sifat_surat', '$tanggal_surat', '$tujuan_surat', '$target_file', '$no_urut', '$keterangan')";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil disimpan. <a href='cetak-surat-masuk.php'>Lihat Surat Keluar</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "File gagal diunggah.";
}

// Tutup koneksi
$conn->close();
?>
