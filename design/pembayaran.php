<?php
session_start();
$isLoggedIn = isset($_SESSION['user']);

require_once '../act/db.php';
$database = new Database();
$conn = $database->getConnection();

// ambil id_pesan dari URL
if (isset($_GET['id_pesan'])) {
    $id_pesan = intval($_GET['id_pesan']);

    // ambil data pesanan + info kamar
    $query = "
    SELECT p.*, k.nama_kamar, k.tipe_kamar, k.harga, b.status
    FROM pesan p
    JOIN kamar k ON p.kamar_id = k.kamar_id
    LEFT JOIN bayar b ON p.pesan_id = b.pesan_id
    WHERE p.pesan_id = $id_pesan
";

    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $pesanan = mysqli_fetch_assoc($result);
        // Cek apakah user sudah pernah memberi ulasan untuk pesanan ini
        $user_id = $_SESSION['user']['user_id'] ?? null;
        $sudahUlas = false;

        if ($user_id) {
            $cekUlas = $conn->prepare("SELECT 1 FROM ulasan WHERE user_id = ? AND pesan_id = ?");
            $cekUlas->bind_param("ii", $user_id, $id_pesan);
            $cekUlas->execute();
            $cekUlas->store_result();

            if ($cekUlas->num_rows > 0) {
                $sudahUlas = true;
            }
            $cekUlas->close();
        }

        $jumlah_kamar = isset($pesanan['jumlah_kamar']) ? (int)$pesanan['jumlah_kamar'] : 1;
        $jumlah_tamu  = isset($pesanan['jumlah_tamu']) ? (int)$pesanan['jumlah_tamu'] : 1;
    } else {
        echo "<p>Pesanan tidak ditemukan.</p>";
        exit;
    }
} else {
    echo "<p>ID Pesanan tidak ditemukan.</p>";
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../image/logobener.png" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Pembayaran</title>
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

            <?php if ($isLoggedIn): ?>
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
            <?php else: ?>
                <!-- Kalo belum login -->
                <div>
                    <button id="openLogin">
                        <p class="bg-[#335c67] px-[15px] py-[8px] rounded-[30px] hover:scale-105 transition-all duration-200 text-white">
                            Gabung | Daftar
                        </p>
                    </button>
                </div>
            <?php endif; ?>
        </div>

    </nav>
    <!-- tombol back -->
    <div class="mt-[109px] px-[50px]">
        <a href="../index.php" class="mt-[100px] text-[17px] font-semibold">
            <p>
                < Kembali</p>
        </a>
    </div>

    <!-- kata kata singkat -->
    <div class="mt-[20px] px-[50px]">
        <p class="font-semibold text-[18px]">Pembayaran pesanan</p>
        <?php if ($pesanan['status'] === 'lunas'): ?>
            <p class=" text-[#6B7280]">Pembayaran anda sudah lunas</p>
        <?php else: ?>
            <p class=" text-[#6B7280]">Lengkapi pembayaran untuk mengkonfirmasi pemesanan kamar Anda</p>
        <?php endif; ?>
    </div>

    <!-- detail pesanan -->
    <section class="px-[50px] mt-[20px]">
        <div class="flex flex-row gap-[10px] justify-between">
            <div class="flex flex-row justify-between w-2/2 gap-[10px] border border-[#6B7280] p-[13px] rounded-[10px]">
                <!-- detail pesanan -->
                <div class="w-1/2">
                    <?php if ($pesanan['status'] === 'lunas'): ?>
                        <p class="text-[18px] font-semibold">Pesanan anda</p>
                    <?php else: ?>
                        <p class="text-[18px] font-semibold">Detail pesanan</p>
                    <?php endif; ?>
                    <div class="flex flex-row gap-[5px] items-center mt-[10px]">
                        <img src="../image/schedule.png" alt="" class="w-[25px] h-[25px]">
                        <div>
                            <p class="text-[14px]  text-[#6B7280]">Check-in</p>
                            <p class="text-[16px] "><?= htmlspecialchars($pesanan['check_in']); ?></p>
                        </div>
                    </div>
                    <div class="flex flex-row gap-[5px] items-center">
                        <img src="../image/schedule.png" alt="" class="w-[25px] h-[25px]">
                        <div>
                            <p class="text-[14px] text-[#6B7280]">Check-out</p>
                            <p class="text-[16px] "><?= htmlspecialchars($pesanan['check_out']); ?></p>
                        </div>
                    </div>
                    <div class="flex flex-row gap-[5px] items-center">
                        <img src="../image/group.png" alt="" class="w-[25px] h-[25px]">
                        <div>
                            <p class="text-[14px] text-[#6B7280]">Tipe kamar</p>
                            <p class="text-[16px] "><?= htmlspecialchars($pesanan['tipe_kamar']); ?></p>
                        </div>
                    </div>
                    <div class="flex flex-row gap-[5px] items-center">
                        <img src="../image/group.png" alt="" class="w-[25px] h-[25px]">
                        <div>
                            <p class="text-[14px] text-[#6B7280]">Jumlah tamu</p>
                            <p class="text-[16px] "><?= htmlspecialchars($pesanan['jumlah_tamu']); ?> orang</p>
                        </div>
                    </div>
                </div>

                <!-- metode pembayaran -->
                <div class="w-2/2">
                    <?php if ($pesanan['status'] === 'lunas'): ?>
                        <!-- FORM ULASAN -->
                        <p class="text-[18px] font-semibold">Beri Ulasan Anda</p>

                        <form action="../act/act_ulasan.php" method="POST" class="flex flex-col gap-[10px] w-full">
                            <input type="hidden" name="pesan_id" value="<?= $pesanan['pesan_id']; ?>">

                            <label class="text-[15px] font-medium">Rating</label>
                            <select name="rating" class="border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-[#335C67]">
                                <option value="5">5 - Sangat Puas</option>
                                <option value="4">4 - Puas</option>
                                <option value="3">3 - Cukup</option>
                                <option value="2">2 - Kurang</option>
                                <option value="1">1 - Buruk</option>
                            </select>

                            <label class="text-[15px] font-medium">Komentar</label>
                            <textarea name="komen" rows="4" placeholder="Tulis pengalaman menginapmu di sini..." class="border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-[#335C67]"></textarea>

                            <button type="submit" class="mt-[10px] bg-[#335C67] text-white py-2 rounded-lg hover:bg-[#4A7A6F] transition-all duration-200">
                                Kirim Ulasan
                            </button>
                        </form>


                    <?php else: ?>

                        <form action="../act/act_bayar.php" method="POST">
                            <div class="flex flex-col gap-[10px] w-full">
                                <p class="text-[18px] font-semibold">Metode pembayaran</p>
                                <!-- pembayaran make kartu debit-->
                                <label class="relative flex mt-[5px] px-[20px] flex-col w-full border-2 border-gray-300 rounded-xl cursor-pointer hover:scale-103 duration-200 transition-all peer-checked:border-[#335C67] peer-checked:bg-[#335C67]/10">
                                    <input type="radio" name="payment" value="card-debit" class="hidden peer">
                                    <!-- Icon -->
                                    <div class="flex flex-row items-center gap-[5px]">
                                        <img src="../image/credit-card.png" alt="" class="w-[30px] ">
                                        <div class="flex flex-col leading-tight">
                                            <span class="font-medium text-black peer-checked:text-[#335C67]">Kartu debit</span>
                                            <span class="font-medium text-[14px] text-[#6B7280] peer-checked:text-[#335C67]">Pembayaran dengan kartu debit</span>
                                        </div>
                                    </div>
                                    <!--Penanda kalau udah dipilih -->
                                    <div class="hidden peer-checked:block absolute top-1 right-1 bg-[#335C67] text-white text-[10px] px-[4px] py-[1px] rounded-full">
                                        ✓
                                    </div>
                                </label>

                                <!-- pembayaran pake kartu kredit -->
                                <label class="relative flex p-[5px] px-[20px] flex-col w-full border-2 border-gray-300 rounded-xl cursor-pointer hover:scale-103 duration-200 transition-all peer-checked:border-[#335C67] peer-checked:bg-[#335C67]/10">
                                    <input type="radio" name="payment" value="card-kredit" class="hidden peer">
                                    <!-- Icon -->
                                    <div class="flex flex-row items-center gap-[5px]">
                                        <img src="../image/credit-card.png" alt="" class="w-[30px] ">
                                        <div class="flex flex-col leading-tight">
                                            <span class="font-medium text-black peer-checked:text-[#335C67]">Kartu kredit</span>
                                            <span class="font-medium text-[14px] text-[#6B7280] peer-checked:text-[#335C67]">Pembayaran dengan kartu kredit</span>
                                        </div>
                                    </div>
                                    <!-- Penanda kalau udah dipilih -->
                                    <div class="hidden peer-checked:block absolute top-1 right-1 bg-[#335C67] text-white text-[10px] px-[4px] py-[1px] rounded-full">
                                        ✓
                                    </div>
                                </label>

                                <!-- pembayaran pake kartu cash -->
                                <label class="relative flex p-[5px] px-[20px] flex-col w-full border-2 border-gray-300 rounded-xl cursor-pointer hover:scale-103 duration-200 transition-all peer-checked:border-[#335C67] peer-checked:bg-[#335C67]/10">
                                    <input type="radio" name="payment" value="card" class="hidden peer">
                                    <!-- Icon -->
                                    <div class="flex flex-row items-center gap-[5px]">
                                        <img src="../image/dollar-note.png" alt="" class="w-[35px] ">
                                        <div class="flex flex-col leading-tight">
                                            <span class="font-medium text-black peer-checked:text-[#335C67]">Tunai</span>
                                            <span class="font-medium text-[14px] text-[#6B7280] peer-checked:text-[#335C67]">Bayar ditempat</span>
                                        </div>
                                    </div>
                                    <!--Penanda kalau udah dipilih -->
                                    <div class="hidden peer-checked:block absolute top-1 right-1 bg-[#335C67] text-white text-[10px] px-[4px] py-[1px] rounded-full">
                                        ✓
                                    </div>
                                </label>
                            </div>
                        <?php endif; ?>

                </div>

            </div>

            <!-- buat bayar -->
            <div class="w-1/2 ">
                <div class="flex flex-col gap-[10px]">
                    <div class="border border-[#6B7280] rounded-[10px] p-[12px]">
                        <input type="hidden" name="pesan_id" value="<?= $pesanan['pesan_id']; ?>">
                        <input type="hidden" name="metode_pembayaran" id="metodeInput">
                        <p class="text-[18px] font-semibold">Ringkasan pembayaran</p>
                        <div class="flex flex-col gap-[5px] mt-[10px]">
                            <div class="flex flex-row justify-between ">
                                <p class=" text-[#6B7280]">Harga permalam</p>
                                <p class="text-[17px] font-semibold"> Rp.<?= number_format($pesanan['harga'], 0, ',', '.'); ?></p>
                            </div>
                            <div class="flex flex-row justify-between ">
                                <p class=" text-[#6B7280]">Kamar yang dipesan</p>
                                <p class="text-[17px] font-semibold"><?= $jumlah_kamar; ?> kamar</p>
                            </div>
                            <hr class="border-[#6B7280]">
                            <div class="flex flex-row justify-between ">
                                <p class=" font-semibold text-[17px]">Total</p>
                                <p class="text-[17px] font-semibold"> Rp.<?= number_format($pesanan['total_harga'], 0, ',', '.'); ?></p>
                            </div>
                            <hr class="border-[#6B7280]">
                            <div class="flex flex-row justify-between ">
                                <p class=" text-[#6B7280]">Status pembayaran</p>
                                <?php
                                $status = $pesanan['status'] ?? 'menunggu';
                                $warna = [
                                    'menunggu' => 'bg-[#cd9b59]',
                                    'lunas' => 'bg-[#4CAF50]',
                                    'gagal' => 'bg-[#C56B5B]'
                                ];
                                ?>
                                <p class="<?= $warna[$status] ?? 'bg-[#cd9b59]' ?> inline-block px-[5px] py-[2px] rounded-[5px] text-white text-[14px]">
                                    <?= ucfirst($status); ?>
                                </p>
                            </div>

                        </div>
                    </div>
                    <input type="hidden" name="pesan_id" value="<?= $pesanan['pesan_id']; ?>">
                    <input type="hidden" name="metode_pembayaran" id="metodeInput">

                    <?php if ($status === 'menunggu'): ?>
                        <div class="flex flex-row gap-[5px]">
                            <button type="submit" name="aksi" value="batal" class="text-[15px] font-semibold bg-[#963f2e] w-full py-[5px] rounded-[5px] text-white hover:scale-103 cursor-pointer hover:bg-[#C56B5B] transition-all duration-200">Batal pembayaran</button>
                            <button type="submit" name="aksi" value="bayar" class="text-[15px] font-semibold bg-[#56694f] w-full py-[5px] rounded-[5px] text-white hover:scale-103 cursor-pointer hover:bg-[#768E6B] transition-all duration-200">Bayar sekarang</button>
                        </div>
                    <?php endif; ?>

                    <p class=" text-[#6B7280] text-center text-[14px]">
                        <?php
                        if ($status === 'menunggu') {
                            echo "Dengan melanjutkan, Anda menyetujui syarat dan ketentuan kami";
                        } elseif ($status === 'lunas') {
                            echo "Terima kasih sudah memesan hotel di Lumine Hotel.";
                        } else {
                            echo "Pesanan ini telah dibatalkan.";
                        }
                        ?>
                    </p>


                </div>
                </form>
            </div>
        </div>

    </section>

    <!-- footer -->
    <footer class="px-[50px] py-[20px] mt-[40px] bg-[#20393F] text-white" data-aos="fade-in">
        <div class="flex flex-col gap-[15px]">
            <div class="flex text-[25px] gap-[20px]">
                <p class="font-bold">LUMINE <span class="text-[#e09f3e]">HOTEL</span></p>
                <p>The World Fastest Growing Hotel Chain </p>
            </div>
            <hr class="border-[#4D8791]">
            <div class="flex flex-row gap-[10px]">
                <div class="flex-2">
                    <p class="text-[20px] font-semibold">Tentang kami</p>
                    <p>Hotel kami menawarkan pengalaman menginap yang tidak akan terlupakan dengan fasilitas yang mewah dan pelayanan yang terbaik</p>
                </div>
                <div class="flex flex-col flex-1 gap-[4px]">
                    <p class="text-[20px] font-semibold">Hubungi kami</p>
                    <div class="flex flex-row gap-[5px] items-center">
                        <img src="../image/placeholder.png" alt="" class="w-[20px] h-[20px]">
                        <p class="italic">Jl. depok kecamatan bogor kota makasar</p>
                    </div>

                    <div class="flex flex-row gap-[5px] items-center">
                        <img src="../image/phone-call.png" alt="" class="w-[20px] h-[20px]">
                        <p>+6289483948</p>
                    </div>
                    <div class="flex flex-row gap-[5px] items-center">
                        <img src="../image/gmail.png" alt="" class="w-[20px] h-[20px]">
                        <p>lumine@gmail.com</p>
                    </div>

                </div>
            </div>
            <hr class="border-[#4D8791]">
            <div class="text-[12px] flex flex-row justify-between">
                <p>2025 hotel kami. semua hak dilindungi</p>
                <div class="flex flex-row gap-[10px]">
                    <p>Kebijakan privasi</p>
                    <p>Syarat dan ketentuan</p>
                </div>
            </div>
        </div>
    </footer>

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

<!-- alert buat yg pesan -->
    <script>
        const metodeInputs = document.querySelectorAll('input[name="payment"]');
        const metodeInputHidden = document.getElementById('metodeInput');

        metodeInputs.forEach(radio => {
            radio.addEventListener('change', () => {
                let val = radio.value;
                if (val === 'card-debit') val = 'debit';
                else if (val === 'card-kredit') val = 'kartu kredit';
                else val = 'tunai';
                metodeInputHidden.value = val;
            });
        });

        document.querySelector('form').addEventListener('submit', (e) => {
            const aksi = e.submitter?.value; // tombol mana yang diklik
            const metode = document.getElementById('metodeInput')?.value;

            // cuma validasi kalau klik "bayar"
            if (aksi === 'bayar' && (!metode || metode === 'tidak_dipilih')) {
                e.preventDefault();
               Swal.fire({
                            icon: 'error',
                            title: 'Metode pembayaran masih kosong',
                            text: 'Siliahkan isi metode pembayaran terlebih dahulu'
                        });
            }
        });
    </script>

</body>

</html>