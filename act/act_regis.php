<?php
require_once '../act/db.php';

$database = new Database();
$conn = $database->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim($_POST['nama']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $nmr_telpon = ''; // kalau lo tambahin nanti, tinggal ambil aja dari form
    $foto = '';

    // validasi data kosong
    if (empty($nama) || empty($email) || empty($password)) {
        echo "<script>alert('Semua field wajib diisi!'); window.location='../design/home.php';</script>";
        exit;
    }

    // cek apakah email udah terdaftar
    $stmt = $conn->prepare("SELECT email FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "<script>alert('Email sudah terdaftar!'); window.location='../design/home.php';</script>";
        exit;
    }
    $stmt->close();

    // handle upload foto
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === 0) {
        $targetDir = "../upload/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $fileName = time() . "_" . basename($_FILES["foto"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($fileType, $allowedTypes)) {
            move_uploaded_file($_FILES["foto"]["tmp_name"], $targetFilePath);
            $foto = $fileName;
        } else {
            echo "<script>alert('Format foto tidak didukung! (Gunakan JPG, JPEG, PNG, atau GIF)'); window.location='../design/home.php';</script>";
            exit;
        }
    }

    // hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // insert user baru
    $stmt = $conn->prepare("INSERT INTO user (nama, email, nmr_telpon, foto, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nama, $email, $nmr_telpon, $foto, $hashedPassword);

    if ($stmt->execute()) {
        echo "<script>alert('Regis berhasil.'); window.location='../design/home.php';</script>";
    } else {
        echo "<script>alert('Registrasi gagal, coba lagi!'); window.location='../design/home.php';</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: ../design/home.php");
    exit;
}
?>
