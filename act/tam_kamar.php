<?php
require_once '../act/db.php';
$database = new Database();
$conn = $database->getConnection();

if(isset($_POST['submit'])){
    $nama = $_POST['nama_kamar'];
    $tipe = $_POST['tipe_kamar'];
    $harga = $_POST['harga'];
    $kapasitas = $_POST['kapasitas'];
    $fasilitas = $_POST['fasilitas'];
    $rating = $_POST['rating'];
    $status = $_POST['status'];

    //  Simpan data kamar dulu
    $query = "INSERT INTO kamar (nama_kamar, tipe_kamar, harga, rating, kapasitas, fasilitas, foto, status)
              VALUES ('$nama', '$tipe', '$harga', '$rating', '$kapasitas', '$fasilitas', '', '$status')";
    if(mysqli_query($conn, $query)){
        // ambil id kamar yang baru dimasukin
        $kamar_id = mysqli_insert_id($conn);

        //  Upload semua foto
        foreach ($_FILES['foto']['name'] as $key => $nama_foto) {
            $target = "../upload/" . basename($nama_foto);
            if(move_uploaded_file($_FILES['foto']['tmp_name'][$key], $target)){
                // simpan ke tabel foto_kamar
                $path_foto = "upload/" . $nama_foto;
                $sqlFoto = "INSERT INTO foto_kamar (kamar_id, foto) VALUES ('$kamar_id', '$path_foto')";
                mysqli_query($conn, $sqlFoto);
            }
        }

        //  Update kolom foto utama 
        if (!empty($_FILES['foto']['name'][0])) {
            $foto_utama = "upload/" . $_FILES['foto']['name'][0];
            mysqli_query($conn, "UPDATE kamar SET foto='$foto_utama' WHERE kamar_id='$kamar_id'");
        }

        //  balik ke admin
        header("Location: ../design/admin.php");
        exit;
    } else {
        echo "Gagal simpan kamar: " . mysqli_error($conn);
    }
}
?>
