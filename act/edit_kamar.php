<?php
require_once '../act/db.php';
$database = new Database();
$conn = $database->getConnection();

if (isset($_POST['update'])) {
    $id = $_POST['kamar_id'];
    $nama = $_POST['nama_kamar'];
    $tipe = $_POST['tipe_kamar'];
    $harga = $_POST['harga'];
    $kapasitas = $_POST['kapasitas'];
    $fasilitas = $_POST['fasilitas'];
    $status = $_POST['status'];

    // update data utama kamar (tanpa ubah foto dulu)
    $update = mysqli_query($conn, "
        UPDATE kamar SET 
            nama_kamar='$nama',
            tipe_kamar='$tipe',
            harga='$harga',
            kapasitas='$kapasitas',
            fasilitas='$fasilitas',
            status='$status'
        WHERE kamar_id='$id'
    ");

    if (!$update) {
        echo "Gagal update data kamar: " . mysqli_error($conn);
        exit;
    }

    // kalau ada foto baru diupload
    if (!empty($_FILES['foto']['name'][0])) {

        // ambil semua foto lama buat dihapus
        $qLama = mysqli_query($conn, "SELECT foto FROM foto_kamar WHERE kamar_id='$id'");
        while ($f = mysqli_fetch_assoc($qLama)) {
            $path = "../" . $f['foto'];
            if (file_exists($path)) {
                unlink($path);
            }
        }

        // hapus data foto lama dari tabel foto_kamar
        mysqli_query($conn, "DELETE FROM foto_kamar WHERE kamar_id='$id'");

        // upload semua foto baru
        foreach ($_FILES['foto']['name'] as $key => $nama_foto) {
            $target = "../upload/" . basename($nama_foto);
            if (move_uploaded_file($_FILES['foto']['tmp_name'][$key], $target)) {
                $path_foto = "upload/" . $nama_foto;
                mysqli_query($conn, "INSERT INTO foto_kamar (kamar_id, foto) VALUES ('$id', '$path_foto')");
            }
        }

        // update foto utama (foto pertama)
        $foto_utama = "upload/" . $_FILES['foto']['name'][0];
        mysqli_query($conn, "UPDATE kamar SET foto='$foto_utama' WHERE kamar_id='$id'");
    }

    // balik ke halaman admin
    header("Location: ../design/admin.php");
    exit;
}
