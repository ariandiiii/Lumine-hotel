<?php
require_once '../act/db.php';
$database = new Database();
$conn = $database->getConnection();

if(isset($_GET['id'])){
    $id = $_GET['id'];

    // ambil nama file foto buat dihapus
    $q = mysqli_query($conn, "SELECT foto FROM kamar WHERE kamar_id='$id'");
    $d = mysqli_fetch_assoc($q);
    if(!empty($d['foto']) && file_exists("../" . $d['foto'])){
        unlink("../" . $d['foto']);
    }

    // hapus semua foto tambahan di tabel foto_kamar
    mysqli_query($conn, "DELETE FROM foto_kamar WHERE kamar_id='$id'");

    // hapus kamar utama
    $hapus = mysqli_query($conn, "DELETE FROM kamar WHERE kamar_id='$id'");

    if($hapus){
        header("Location: ../design/admin.php");
        exit;
    } else {
        echo "Gagal hapus kamar: " . mysqli_error($conn);
    }
}
?>
