<?php
require_once '../act/db.php';
$database = new Database();
$conn = $database->getConnection();

session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: ../index.php");
    exit();
}

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
    <script src="https://cdn.tailwindcss.com"></script>
        <style>
        ::-webkit-scrollbar {
            height: 6px;
            width: 7px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: #ccc;
            border-radius: 9999px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #999;
        }
    </style>
    <title>Admin Kamar - Lumine Hotel</title>
</head>

<body class="bg-gray-100 text-gray-800">

    <!-- Navbar -->
    <nav class="fixed top-0 left-0 w-full z-50 bg-[#234046]/70 backdrop-blur-lg shadow-md">
        <div class="flex justify-between items-center px-8 py-4">
            <a href="../index.php" class="flex items-center space-x-2">
                <img src="../image/logobener.png" alt="logo" class="w-10">
                <p class="font-semibold text-white text-lg">
                    LUMINE <span class="text-[#e09f3e] font-bold">HOTEL</span>
                </p>
            </a>

            <!-- Profile Dropdown -->
            <div class="relative">
                <div id="dropdownButton" class="flex items-center space-x-2 cursor-pointer">
                    <img src="../upload/<?= htmlspecialchars($_SESSION['user']['foto'] ?? 'user.png'); ?>"
                        class="w-9 h-9 rounded-full object-cover border-2 border-white">
                    <p class="text-white font-medium"><?= htmlspecialchars($_SESSION['user']['nama']); ?></p>
                </div>

                <div id="dropdownMenu"
                    class="hidden absolute right-0 mt-2 w-44 bg-[#963f2e] rounded-lg shadow-md overflow-hidden">
                    <a href="../act/logout.php"
                        class="block px-4 py-2 text-white hover:bg-[#C56B5B] transition">LOG OUT</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="pt-[100px] px-6 md:px-20">
        <div class="max-w-6xl mx-auto">

            <!-- Tambah Kamar -->
            <div class="bg-white p-6 rounded-xl shadow-md mb-10">
                <h2 class="text-2xl font-semibold text-[#234046] mb-4">Tambah Kamar</h2>
                <form action="../act/tam_kamar.php" method="POST" enctype="multipart/form-data"
                    class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <input type="text" name="nama_kamar" placeholder="Nama kamar" required
                        class="border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-[#e09f3e] outline-none">
                    <input type="text" name="tipe_kamar" placeholder="Tipe kamar" required
                        class="border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-[#e09f3e] outline-none">
                    <input type="number" name="harga" placeholder="Harga" required
                        class="border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-[#e09f3e] outline-none">
                    <input type="text" name="kapasitas" placeholder="Kapasitas" required
                        class="border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-[#e09f3e] outline-none">
                    <input type="text" name="fasilitas" placeholder="Fasilitas" required
                        class="border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-[#e09f3e] outline-none">
                    <input type="text" name="alamat" placeholder="Alamat" required
                        class="border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-[#e09f3e] outline-none">
                    <input type="text" name="rating" placeholder="Rating" required
                        class="border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-[#e09f3e] outline-none">

                    <select name="status" id="status" required
                        class="border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-[#e09f3e] outline-none">
                        <option value="">-- Pilih Status --</option>
                        <?php foreach ($enumValues as $value): ?>
                            <option value="<?= $value; ?>"><?= ucfirst($value); ?></option>
                        <?php endforeach; ?>
                    </select>

                    <input type="file" name="foto[]" multiple accept="image/*" required
                        class="border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-[#e09f3e] outline-none">

                    <div class="md:col-span-2 text-right">
                        <button type="submit" name="submit"
                            class="bg-[#e09f3e] hover:bg-[#c58632] text-white font-semibold px-5 py-2 rounded-lg transition">
                            Tambah Kamar
                        </button>
                    </div>
                </form>
            </div>

            <!-- Daftar Kamar -->
            <div class="bg-white p-6 rounded-xl shadow-md overflow-x-auto">
                <h2 class="text-2xl font-semibold text-[#234046] mb-4">Daftar Kamar</h2>

                <table class="min-w-full border-collapse border border-gray-300">
                    <thead class="bg-[#234046] text-white">
                        <tr>
                            <th class="border border-gray-300 px-4 py-2">ID</th>
                            <th class="border border-gray-300 px-4 py-2">Nama</th>
                            <th class="border border-gray-300 px-4 py-2">Tipe</th>
                            <th class="border border-gray-300 px-4 py-2">Harga</th>
                            <th class="border border-gray-300 px-4 py-2">Kapasitas</th>
                            <th class="border border-gray-300 px-4 py-2">Fasilitas</th>
                            <th class="border border-gray-300 px-4 py-2">Status</th>
                            <th class="border border-gray-300 px-4 py-2">Rating</th>
                            <th class="border border-gray-300 px-4 py-2">Foto</th>
                            <th class="border border-gray-300 px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $q = mysqli_query($conn, "SELECT * FROM kamar ORDER BY kamar_id DESC");
                        if (mysqli_num_rows($q) > 0) {
                            while ($row = mysqli_fetch_assoc($q)) {
                                echo "<tr class='hover:bg-gray-50'>";
                                echo "<td class='border px-4 py-2 text-center'>{$row['kamar_id']}</td>";
                                echo "<td class='border px-4 py-2'>{$row['nama_kamar']}</td>";
                                echo "<td class='border px-4 py-2'>{$row['tipe_kamar']}</td>";
                                echo "<td class='border px-4 py-2 text-[#e09f3e] font-semibold'>Rp" . number_format($row['harga'], 0, ',', '.') . "</td>";
                                echo "<td class='border px-4 py-2 text-center'>{$row['kapasitas']}</td>";
                                echo "<td class='border px-4 py-2'>{$row['fasilitas']}</td>";
                                echo "<td class='border px-4 py-2 text-center'>{$row['status']}</td>";
                                echo "<td class='border px-4 py-2 text-center'>{$row['rating']}</td>";
                                echo "<td class='border px-4 py-2 text-center'>";
                                if (!empty($row['foto'])) {
                                    echo "<img src='../{$row['foto']}' class='w-20 h-20 object-cover rounded-md mx-auto'>";
                                } else {
                                    echo "-";
                                }
                                echo "</td>";
                                echo "<td class='border px-4 py-2 text-center'>
                                    <a href='../design/edit_admin.php?id={$row['kamar_id']}' class='text-blue-600 hover:underline'>Edit</a> |
                                    <a href='../act/hapus_kamar.php?id={$row['kamar_id']}' onclick='return confirm(\"Yakin mau hapus kamar ini?\")' class='text-red-600 hover:underline'>Hapus</a>
                                </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='10' class='text-center py-4 text-gray-500'>Belum ada data kamar.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script>
        const btn = document.getElementById('dropdownButton');
        const menu = document.getElementById('dropdownMenu');
        btn.addEventListener('click', () => menu.classList.toggle('hidden'));
        document.addEventListener('click', (e) => {
            if (!btn.contains(e.target) && !menu.contains(e.target)) menu.classList.add('hidden');
        });
    </script>
</body>

</html>