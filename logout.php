<?php
// session_start();

// Hapus semua variabel sesi
$_SESSION = array();

// Hancurkan sesi
session_unset();
session_destroy();

// Redirect ke halaman login atau halaman lainnya
header('Location: index.php');
exit();
?>
