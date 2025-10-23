<?php
session_start();
require_once '../act/db.php';

$database = new Database();
$conn = $database->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Cek login
    if (!isset($_SESSION['user']['id'])) {
        echo "User belum login.";
        exit;
    }

    $user_id = $_SESSION['user']['id'];
    $pesan_id = $_POST['pesan_id'] ?? null;
    $aksi = $_POST['aksi'] ?? null;

    // Ambil metode pembayaran dari form (bisa dari hidden input atau radio)
    $metode_pembayaran = $_POST['metode_pembayaran']
        ?? $_POST['payment']
        ?? 'tidak_dipilih';

    if (!$pesan_id || !$aksi) {
        echo "Data tidak lengkap.";
        exit;
    }

    // Ambil total harga dari tabel pesan
    $result = mysqli_query($conn, "SELECT total_harga FROM pesan WHERE pesan_id = '$pesan_id'");
    $data = mysqli_fetch_assoc($result);
    $total = $data['total_harga'] ?? 0;

    // Tentukan status berdasarkan tombol
    if ($aksi === 'bayar') {
        $status = 'lunas';
    } elseif ($aksi === 'batal') {
        $status = 'gagal';
    } else {
        $status = 'menunggu';
    }

    // Amankan input metode pembayaran
    $metode_pembayaran = mysqli_real_escape_string($conn, $metode_pembayaran);

    // Masukkan / update ke tabel bayar
    $query = "
        INSERT INTO bayar (pesan_id, user_id, total,  metode_pembayaran, status)
        VALUES ('$pesan_id','$user_id', '$total', '$metode_pembayaran', '$status')
        ON DUPLICATE KEY UPDATE
        user_id = VALUES(user_id),
        total = VALUES(total),
        metode_pembayaran = VALUES(metode_pembayaran),
        status = VALUES(status)
    ";

    if (mysqli_query($conn, $query)) {

        // Optional: update juga status di tabel pesan biar sinkron
        // mysqli_query($conn, "UPDATE pesan SET status = '$status' WHERE pesan_id = '$pesan_id'");

        // Redirect ke halaman pembayaran
        header("Location: ../design/pembayaran.php?id_pesan=$pesan_id&status=$status");
        exit;
    } else {
        echo "Gagal menyimpan pembayaran: " . mysqli_error($conn);
    }
} else {
    echo "Akses tidak valid.";
}
