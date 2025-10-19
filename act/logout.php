<?php
session_start();
session_unset();  // hapus semua data session
session_destroy(); // tutup session
header("Location: ../design/home.php");
exit;
?>
