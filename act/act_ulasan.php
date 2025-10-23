<?php
require_once '../act/db.php';
$database = new Database();
$conn = $database->getConnection();
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user']['id'] ?? null;
    $pesan_id = $_POST['pesan_id'] ?? null;
    $rating = $_POST['rating'] ?? null;
    $komen = $_POST['komen'] ?? '';

    if (!$user_id || !$pesan_id || !$rating) {
        echo "Data tidak lengkap.";
        exit;
    }

    $query = "INSERT INTO ulasan (pesan_id, user_id, rating, komen)
              VALUES ('$pesan_id', '$user_id', '$rating', '$komen')";
    if (mysqli_query($conn, $query)) {
        header("Location: ../design/pembayaran.php?id_pesan=$pesan_id&status=lunas");
        exit;
    } else {
        echo "Gagal menyimpan ulasan: " . mysqli_error($conn);
    }
} else {
    echo "Akses tidak valid.";
}
?>
