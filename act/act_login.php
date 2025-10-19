<?php
session_start();
require_once '../act/db.php'; // pastiin nama file ini sesuai

// buat object database
$database = new Database();
$conn = $database->getConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // siapkan statement biar aman dari SQL Injection
    $stmt = $conn->prepare("SELECT user_id, nama, email, foto, password FROM user WHERE email = ? LIMIT 1");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // cek apakah email ditemukan
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // cek password (hash)
        if (password_verify($password, $user['password'])) {
            // buat session user
            $_SESSION['user'] = [
                'id' => $user['user_id'],
                'nama' => $user['nama'],
                'email' => $user['email'],
                'foto' => $user['foto']
            ];

            header("Location: ../design/home.php");
            exit();
        } else {
            echo "<script>alert('Password salah!'); window.location='../design/home.php';</script>";
        }
    } else {
        echo "<script>alert('Email tidak ditemukan!'); window.location='../design/home.php';</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: ../design/home.php");
    exit();
}
?>
