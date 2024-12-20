<?php
include 'koneksi.php'; // Pastikan path file benar

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mendapatkan file_surat agar bisa dihapus
    $query = "SELECT file_surat FROM surat_keluar WHERE id = $id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Hapus file surat dari folder uploads
        if (!empty($row['file_surat']) && file_exists($row['file_surat'])) {
            unlink($row['file_surat']);
        }

        // Hapus data dari database
        $sql = "DELETE FROM surat_keluar WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
            echo "Data berhasil dihapus. <a href='cetak-surat-masuk.php'>Kembali ke daftar surat keluar</a>";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Data tidak ditemukan.";
    }
} else {
    echo "ID tidak ditemukan.";
}
?>
