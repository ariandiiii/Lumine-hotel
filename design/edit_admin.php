<?php
require_once '../act/db.php';
$database = new Database();
$conn = $database->getConnection();
$id = $_GET['id'];

// Ambil data kamar berdasarkan ID
$q = mysqli_query($conn, "SELECT * FROM kamar WHERE kamar_id='$id'");
$data = mysqli_fetch_assoc($q);
?>

<h2>Edit Kamar</h2>

<form action="../act/edit_kamar.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="kamar_id" value="<?php echo $data['kamar_id']; ?>">

    <label>Nama Kamar:</label><br>
    <input type="text" name="nama_kamar" value="<?php echo $data['nama_kamar']; ?>" required><br><br>

    <label>Tipe Kamar:</label><br>
    <input type="text" name="tipe_kamar" value="<?php echo $data['tipe_kamar']; ?>" required><br><br>

    <label>Harga:</label><br>
    <input type="number" name="harga" value="<?php echo $data['harga']; ?>" required><br><br>

    <label>Kapasitas:</label><br>
    <input type="text" name="kapasitas" value="<?php echo $data['kapasitas']; ?>" required><br><br>

    <label>Fasilitas:</label><br>
    <input type="text" name="fasilitas" value="<?php echo $data['fasilitas']; ?>" required><br><br>

    <label>Status:</label><br>
    <select name="status" required>
        <option value="tersedia" <?php if ($data['status'] == 'tersedia') echo 'selected'; ?>>Tersedia</option>
        <option value="penuh" <?php if ($data['status'] == 'penuh') echo 'selected'; ?>>Penuh</option>
    </select><br><br>

    <label>Foto Utama Sekarang:</label><br>
    <img src="../<?php echo $data['foto']; ?>" width="200" style="border-radius:10px;"><br><br>

    <label>Ganti Foto (optional):</label><br>
    <input type="file" name="foto[]" multiple accept="image/*" required class="border"><br><br>

    <button type="submit" name="update">Simpan Perubahan</button>
</form>

<br>
<a href="admin.php">Kembali ke Admin</a>