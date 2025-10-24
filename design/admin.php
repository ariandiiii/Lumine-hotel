<?php
require_once '../act/db.php';
$database = new Database();
$conn = $database->getConnection();

session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: ../index.php");
    exit();
}

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

    <!-- ini nabbar -->
    <nav id="navbar" class=" fixed top-0 left-0 w-full z-[50]  bg-[#234046]/60 backdrop-blur-md transition-all duration-300 ">
        <div class="flex flex-row  px-[50px] py-[20px] items-center justify-between">
            <a href="../index.php">
                <div class="flex flex-row text-center items-center gap-[5px] ">
                    <img src="../image/logobener.png" alt="" class="w-[45px]">
                    <p class="font-semibold text-white text-[19px]">LUMINE <span class="font-bold text-[#e09f3e]">HOTEL</span> </p>
                </div>
            </a>
            <!-- Kalo udah login -->
            <div class="relative inline-block cursor-pointer">
                <div id="dropdownButton" class="flex flex-row gap-[5px] items-center">
                    <img src="../upload/<?= htmlspecialchars($_SESSION['user']['foto'] ?? 'user.png'); ?>"
                        alt="Profile"
                        class="w-[35px] h-[35px] rounded-full object-cover border border-white">
                    <p id="nama" class="text-white font-semibold">
                        <?= htmlspecialchars($_SESSION['user']['nama']); ?>
                    </p>
                </div>

                <!-- Dropdown Menu -->
                <div id="dropdownMenu"
                    class="hidden absolute right-0 mt-2 w-48 bg-[#963f2e] shadow-lg rounded-lg border border-gray-200 transition-all duration-200 z-50">
                    <ul class="py-1 text-white">
                        <li>
                            <a href="../act/logout.php" class="block px-4 py-2 hover:bg-[#C56B5B] rounded">
                                LOG OUT
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>

    </nav>

    <section class="pt-[100px]">
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
    </section>

    
    <!-- ini buat dropdown -->
    <script>
        const btn = document.getElementById('dropdownButton');
        const menu = document.getElementById('dropdownMenu');

        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });

        // biar nutup kalo klik di luar dropdown
        document.addEventListener('click', (e) => {
            if (!btn.contains(e.target) && !menu.contains(e.target)) {
                menu.classList.add('hidden');
            }
        });
    </script>
</body>

</html>