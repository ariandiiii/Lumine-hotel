<?php
require_once '../act/db.php';
$database = new Database();
$conn = $database->getConnection();

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: admin.php");
    exit();
}

// Ambil data kamar berdasarkan ID
$q = mysqli_query($conn, "SELECT * FROM kamar WHERE kamar_id='$id'");
$data = mysqli_fetch_assoc($q);

if (!$data) {
    echo "<p class='text-center mt-10 text-red-500'>Data kamar tidak ditemukan!</p>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kamar - Lumine Hotel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">

    <!-- Navbar -->
    <nav class="fixed top-0 left-0 w-full z-50 bg-[#234046]/70 backdrop-blur-lg shadow-md">
        <div class="flex justify-between items-center px-8 py-4">
            <a href="admin.php" class="flex items-center space-x-2">
                <img src="../image/logobener.png" alt="logo" class="w-10">
                <p class="font-semibold text-white text-lg">
                    LUMINE <span class="text-[#e09f3e] font-bold">HOTEL</span>
                </p>
            </a>
        </div>
    </nav>

    <!-- Content -->
    <main class="pt-[100px] px-6 md:px-20">
        <div class="max-w-3xl mx-auto bg-white p-8 rounded-xl shadow-md">

            <h2 class="text-3xl font-bold text-[#234046] mb-6 text-center">Edit Data Kamar</h2>

            <form action="../act/edit_kamar.php" method="POST" enctype="multipart/form-data" class="space-y-5">
                <input type="hidden" name="kamar_id" value="<?php echo $data['kamar_id']; ?>">

                <div>
                    <label class="block font-semibold mb-1">Nama Kamar:</label>
                    <input type="text" name="nama_kamar" value="<?php echo $data['nama_kamar']; ?>" required
                        class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-[#e09f3e] outline-none">
                </div>

                <div>
                    <label class="block font-semibold mb-1">Tipe Kamar:</label>
                    <input type="text" name="tipe_kamar" value="<?php echo $data['tipe_kamar']; ?>" required
                        class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-[#e09f3e] outline-none">
                </div>

                <div>
                    <label class="block font-semibold mb-1">Harga:</label>
                    <input type="number" name="harga" value="<?php echo $data['harga']; ?>" required
                        class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-[#e09f3e] outline-none">
                </div>

                <div>
                    <label class="block font-semibold mb-1">Kapasitas:</label>
                    <input type="text" name="kapasitas" value="<?php echo $data['kapasitas']; ?>" required
                        class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-[#e09f3e] outline-none">
                </div>

                <div>
                    <label class="block font-semibold mb-1">Fasilitas:</label>
                    <input type="text" name="fasilitas" value="<?php echo $data['fasilitas']; ?>" required
                        class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-[#e09f3e] outline-none">
                </div>

                <div>
                    <label class="block font-semibold mb-1">Rating:</label>
                    <input type="text" name="rating" value="<?php echo $data['rating']; ?>" required
                        class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-[#e09f3e] outline-none">
                </div>

                <div>
                    <label class="block font-semibold mb-1">Status:</label>
                    <select name="status" required
                        class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-[#e09f3e] outline-none">
                        <option value="tersedia" <?php if ($data['status'] == 'tersedia') echo 'selected'; ?>>Tersedia</option>
                        <option value="penuh" <?php if ($data['status'] == 'penuh') echo 'selected'; ?>>Penuh</option>
                    </select>
                </div>

                <div>
                    <label class="block font-semibold mb-1">Foto Utama Sekarang:</label>
                    <img src="../<?php echo $data['foto']; ?>" alt="Foto Kamar" class="w-48 h-36 rounded-lg object-cover border border-gray-300">
                </div>

                <div>
                    <label class="block font-semibold mb-1">Ganti Foto (opsional):</label>
                    <input type="file" name="foto[]" multiple accept="image/*"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-[#e09f3e] outline-none">
                </div>

                <div class="flex justify-between items-center pt-4">
                    <a href="admin.php"
                        class="text-[#234046] font-medium hover:underline hover:text-[#e09f3e] transition">
                        ← Kembali ke Admin
                    </a>
                    <button type="submit" name="update"
                        class="bg-[#e09f3e] hover:bg-[#c58632] text-white font-semibold px-5 py-2 rounded-lg transition">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </main>

</body>

</html>