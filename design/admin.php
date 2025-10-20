<?php
require_once '../act/db.php';
$database = new Database();
$conn = $database->getConnection();

// ambil data enum status
$query = "SHOW COLUMNS FROM kamar LIKE 'status'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
preg_match("/^enum\('(.*)'\)$/", $row['Type'], $matches);
$enumValues = explode("','", $matches[1]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Admin Kamar</title>
</head>

<body>

    <h2>Tambah Kamar</h2>
    <form action="../act/tam_kamar.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="nama_kamar" placeholder="nama kamar" required class="border">
        <input type="text" name="tipe_kamar" placeholder="tipe kamar" required class="border">
        <input type="number" name="harga" placeholder="harga" required class="border">
        <input type="text" name="kapasitas" placeholder="kapasitas" required class="border">
        <input type="text" name="fasilitas" placeholder="fasilitas" required class="border">
        <input type="text" name="rating" placeholder="rating" required class="border">

        <label for="status">Status Kamar:</label>
        <select name="status" id="status" required class="border">
            <option value="">-- Pilih Status --</option>
            <?php foreach ($enumValues as $value): ?>
                <option value="<?= $value; ?>"><?= ucfirst($value); ?></option>
            <?php endforeach; ?>
        </select><br>
        <input type="file" name="foto[]" multiple accept="image/*" required class="border">

        <button type="submit" name="submit">Tambah Kamar</button>
    </form>

    <hr>

    <h2>Daftar Kamar</h2>
    <table border="1" class="gap-[10px]">
        <tr>
            <th>ID</th>
            <th>Nama Kamar</th>
            <th>Tipe</th>
            <th>Harga</th>
            <th>Kapasitas</th>
            <th>Fasilitas</th>
            <th>Status</th>
            <th>rating</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>

        <?php
        $q = mysqli_query($conn, "SELECT * FROM kamar ORDER BY kamar_id DESC");
        if (mysqli_num_rows($q) > 0) {
            while ($row = mysqli_fetch_assoc($q)) {
                echo "<tr>";
                echo "<td>{$row['kamar_id']}</td>";
                echo "<td>{$row['nama_kamar']}</td>";
                echo "<td>{$row['tipe_kamar']}</td>";
                echo "<td>Rp{$row['harga']}</td>";
                echo "<td>{$row['kapasitas']}</td>";
                echo "<td>{$row['fasilitas']}</td>";
                echo "<td>{$row['status']}</td>";
                echo "<td>{$row['rating']}</td>";
                echo "<td>";
                if (!empty($row['foto'])) {
                    echo "<img src='../{$row['foto']}' width='100'>";
                } else {
                    echo "-";
                }
                echo "</td>";
                echo "<td>
                    <a href='../design/edit_admin.php?id={$row['kamar_id']}'>Edit</a> |
                    <a href='../act/hapus_kamar.php?id={$row['kamar_id']}' onclick='return confirm(\"Yakin mau hapus kamar ini?\")'>Hapus</a>
                  </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='9'>Belum ada data kamar.</td></tr>";
        }
        ?>
    </table>

</body>

</html>