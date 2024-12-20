<?php
// proses-surat-masuk.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan data dari form
    $kepada = $_POST['kepada'];
    $tanggal_disposisi = $_POST['tanggal_disposisi'];
    $isi_disposisi = $_POST['isi_disposisi'];
    $sifat = $_POST['sifat'];
    $batas_waktu = $_POST['batas_waktu'];
    $catatan = $_POST['catatan'];

    // Koneksi ke database (sesuaikan dengan pengaturan database Anda)
    $servername = "localhost";  // Ganti dengan host database Anda
    $username = "root";         // Ganti dengan username database Anda
    $password = "";             // Ganti dengan password database Anda
    $dbname = "pengadilan_agama";         // Ganti dengan nama database Anda

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Memeriksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Query untuk menyimpan data surat masuk ke database
    $sql = "INSERT INTO surat_masuk (kepada, tanggal_disposisi, isi_disposisi, sifat, batas_waktu, catatan)
            VALUES ('$kepada', '$tanggal_disposisi', '$isi_disposisi', '$sifat', '$batas_waktu', '$catatan')";

    if ($conn->query($sql) === TRUE) {
        // Jika berhasil disimpan, arahkan kembali ke halaman beranda
        header("Location: beranda.php");
        exit();
    } else {
        // Jika ada kesalahan saat menyimpan, tampilkan pesan error
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Menutup koneksi
    $conn->close();
}
?>
