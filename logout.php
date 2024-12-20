<?php
// logout.php

// Mulai sesi
session_start();

// Menghapus semua sesi
session_unset();

// Menghancurkan sesi
session_destroy();

// Mengarahkan kembali ke halaman login
header("Location: login.php");
exit();
?>
