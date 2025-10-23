<?php
require_once '../act/db.php';
$database = new Database();
$conn = $database->getConnection();
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // pastiin user udah login
    if (!isset($_SESSION['user']['id'])) {
        echo "User belum login.";
        exit;
    }}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user']['id'];
   $kamar_id = $_POST['kamar_id'] ?? null;// ambil id kamar dari query string
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $jumlah_kamar = $_POST['jumlah_kamar'];
    $jumlah_tamu = $_POST['jumlah_tamu'];
    $total = $_POST['total']; // ini hasil dari JS lo
//     var_dump($_SESSION);
// var_dump($user_id, $kamar_id);
// exit;

    if ($kamar_id && $user_id) {
        $query = "INSERT INTO pesan (user_id, kamar_id, check_in, check_out, jumlah_kamar, jumlah_tamu, total_harga )
                  VALUES ('$user_id', '$kamar_id', '$check_in', '$check_out', '$jumlah_kamar', '$jumlah_tamu', '$total')";

        if (mysqli_query($conn, $query)) {
            $pesan_id = mysqli_insert_id($conn);
            header("Location: ../design/pembayaran.php?id_pesan=$pesan_id");
            exit;
        } else {
            echo "Gagal menyimpan pesanan: " . mysqli_error($conn);
        }
    } else {
        echo "Data tidak lengkap (user_id/kamar_id hilang)";
    }
} else {
    echo "Akses tidak valid.";
}
?>