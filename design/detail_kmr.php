<?php
session_start();
$isLoggedIn = isset($_SESSION['user']);

require_once '../act/db.php';
$database = new Database();
$conn = $database->getConnection();

// ambil data buat seluruh kamar
// ambil id dari URL
if (isset($_GET['id'])) {
    $id_kamar = intval($_GET['id']); // amanin dari SQL Injection

    $query = "SELECT * FROM kamar WHERE kamar_id = $id_kamar";
    $hasil_kamar = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($hasil_kamar)) {

        // Ambil semua foto untuk kamar ini
        $queryFoto = "SELECT foto FROM foto_kamar WHERE kamar_id = $id_kamar";
        $hasilFoto = mysqli_query($conn, $queryFoto);

        $fotos = [];
        if ($hasilFoto && mysqli_num_rows($hasilFoto) > 0) {
            while ($f = mysqli_fetch_assoc($hasilFoto)) {
                $fotos[] = $f['foto'];
            }
        }

        // Ambil semua ulasan untuk kamar ini
        $queryUlasan = "
    SELECT u.*, us.nama AS nama_user, us.foto AS foto_user
    FROM ulasan u
    JOIN pesan p ON u.pesan_id = p.pesan_id
    JOIN user us ON u.user_id = us.user_id
    WHERE p.kamar_id = $id_kamar
    ORDER BY u.`tanggal-buat` DESC
";
        $hasilUlasan = mysqli_query($conn, $queryUlasan);

        // $row sekarang berisi data kamar yang sesuai
        $nama_kamar = $row['nama_kamar'];
        $alamat = $row['alamat'];
        $harga = $row['harga'];
        $tipe_kamar = $row['tipe_kamar'];
        $kapasitas = $row['kapasitas'];
        $rating = $row['rating'];
        $foto = $row['foto'];
        $status = $row['status'];
        // dll
    } else {
        echo "Kamar tidak ditemukan!";
        exit;
    }
} else {
    echo "ID kamar tidak ada!";
    exit;
}

// ambil data buat seluruh kamar
$kamar = "SELECT * FROM kamar";
$rekom_kamar = mysqli_query($conn, $kamar);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../image/logobener.png" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    <title>Detail kamar</title>
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

    <!-- ini foto kamar -->
    <section class="px-[50px] pt-[70px] mb-[90px] mt-10 flex gap-1 h-[300px]">
        <?php if (!empty($fotos)): ?>
            <div class="flex-2 w-1/2 h-full">
                <img src="../<?= htmlspecialchars($fotos[0]); ?>"
                    alt="Foto utama kamar"
                    class="openbutton w-full h-75 object-cover rounded-l-[25px] hover:cursor-pointer">
            </div>
            <div class="grid grid-cols-2 w-1/2 h-full gap-1">
                <?php for ($i = 1; $i < count($fotos); $i++): ?>
                    <img src="../<?= htmlspecialchars($fotos[$i]); ?>"
                        alt="Foto kamar <?= $i + 1; ?>"
                        class="openbutton w-full h-[148px] object-cover <?= $i === 2 ? 'rounded-tr-[25px]' : ($i === count($fotos) - 1 ? 'rounded-br-[25px]' : ''); ?> hover:cursor-pointer">
                <?php endfor; ?>
            </div>
        <?php else: ?>
            <div class="w-full h-[300px] flex items-center justify-center bg-gray-100 rounded-[25px]">
                <p class="text-gray-500 italic">Belum ada foto untuk kamar ini.</p>
            </div>
        <?php endif; ?>
    </section>


    <!-- deskripsi kamar -->
    <section class="px-[50px] mt-[20px] ">
        <div class="flex flex-row gap-[20px]">
            <!-- deskripsi kamar -->
            <div class="w-2/3">
                <div class="flex flex-row justify-between items-center">
                    <div class="leading-tight">
                        <?php
                        // Tentukan warna latar belakang berdasarkan status
                        $warnaStatus = $status === 'tersedia' ? '#caedb8' : '#de2121ff';
                        $teksStatus = ucfirst($status); // jadikan huruf pertama kapital
                        ?>
                        <p class="inline-block px-[5px] rounded-[5px] py-[3px]" style="background-color: <?= $warnaStatus; ?>;">
                            <?= htmlspecialchars($teksStatus); ?>
                        </p>

                        <p class="text-[30px] font-semibold"> <?= htmlspecialchars($nama_kamar); ?></p>
                    </div>
                    <p class="text-[30px] font-semibold text-[#b0323a]">Rp.<?= number_format($harga, 0, ',', '.'); ?></p>
                </div>
                <p class="text-[16px] text-[#6B7280]"><?= htmlspecialchars($alamat); ?></p>
                <div class="flex flex-row gap-[20px] mt-[10px]">
                    <div class="w-2/3">
                        <p class="mt-[5px] text-[19px] font-semibold">Deskripsi kamar</p>
                        <div class="flex flex-row justify-between">
                            <p>Tipe kamar</p>
                            <p class="text-[16px] font-semibold"><?= htmlspecialchars($tipe_kamar); ?></p>
                        </div>
                        <div class="flex flex-row justify-between">
                            <p>Kapasitas</p>
                            <p class="text-[16px] font-semibold"><?= htmlspecialchars($kapasitas); ?></p>
                        </div>
                       
                    </div>
                    <div class="w-2/3">
                        <p class="mt-[5px] text-[19px] font-semibold">Fasilitas kamar</p>
                        <div class="mt-[5px] flex flex-wrap gap-[9px]">
                            <?php
                            // ambil fasilitas dari DB, pisahkan berdasarkan koma
                            $fasilitas_array = explode(',', $row['fasilitas'] ?? $fasilitas);
                            foreach ($fasilitas_array as $f) {
                                echo '<p class="border border-[#6B7280] px-[7px] rounded-[8px] font-semibold">' . htmlspecialchars(trim($f)) . '</p>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="w-1/3 flex flex-row gap-[5px] items-center">
                        <p class="text-[25px] bg-[#335c67] inline-block px-[10px] py-[5px] text-white rounded-[5px]"><?= htmlspecialchars($rating); ?> <span class="text-[15px]">/5</span> </p>
                        <p class="text-[13px] leading-tight" style="<?php
                                                                    if ($rating >= 4.0) {
                                                                        echo 'font-size: 13px;'; // hijau dan tebel
                                                                    } elseif ($rating >= 3.0) {
                                                                        echo 'font-size: 18px;'; // kuning/orange
                                                                    } else {
                                                                        echo 'font-size: 18px;'; // merah
                                                                    }
                                                                    ?>"> <?php
                                                                            if ($rating >= 4.0) {
                                                                                echo "Sangat baik";
                                                                            } elseif ($rating >= 3.0) {
                                                                                echo "Baik";
                                                                            } else {
                                                                                echo "Jelek";
                                                                            }
                                                                            ?>
                        </p>
                    </div>
                </div>

                <!-- ulasan -->
                <div class="mt-[10px]">
                    <p class="text-[19px] font-semibold mb-[10px]">Ulasan kamar</p>
                    <div class="grid grid-cols-2 gap-[10px] overflow-y-auto max-h-[300px] pr-[10px] p-[5px]">
                        <?php if (mysqli_num_rows($hasilUlasan) > 0): ?>
                            <?php while ($ulasan = mysqli_fetch_assoc($hasilUlasan)): ?>
                                <div class="flex flex-col w-[375px] p-[8px] shadow-[0_0px_25px_rgba(0,0,0,0.2)] rounded-[10px] gap-[5px]">
                                    <div class="flex flex-row justify-between items-center ">
                                        <div class="flex flex-row items-center gap-[5px] leading-tight">
                                            <img src="../upload/<?= htmlspecialchars($ulasan['foto_user'] ?? 'user.png'); ?>" alt="" class="w-[40px] h-[40px] rounded-full object-cover">
                                            <div>
                                                <p class="text-[17px] font-semibold"><?= htmlspecialchars($ulasan['nama_user']); ?></p>
                                                <p class="text-[13px] text-gray-500">
                                                    <?= date('d M Y', strtotime($ulasan['tanggal-buat'])); ?>
                                                </p>
                                            </div>
                                        </div>
                                        <p class="bg-[#335c67] inline-block px-[5px] rounded-[5px] text-[17px] text-white">
                                            <?= htmlspecialchars($ulasan['rating']); ?>/5
                                        </p>
                                    </div>
                                    <div>
                                        <p class="text-[14px]"><?= htmlspecialchars($ulasan['komen']); ?></p>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <p class="text-gray-500 italic">Belum ada ulasan untuk kamar ini.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- kotak pesan -->
            <div class="w-1/3">
                <div class="border border-[#6B7280] p-[10px] rounded-[10px] sticky">
                    <form action="../act/act_pesan.php" method="POST">
                        <div class="flex flex-col gap-[5px]">
                            <div class="grid grid-cols-2 gap-[5px]">
                                <input type="hidden" name="kamar_id" value="<?= $row['kamar_id']; ?>">

                                <div>
                                    <p>Check-in</p>
                                    <input type="date" name="check_in" id="checkin" class="border border-[#6B7280] w-full w-full p-[5px] rounded-[10px]">
                                </div>
                                <div>
                                    <p>Check-out</p>
                                    <input type="date" name="check_out" id="checkout" class="border border-[#6B7280] w-full w-full p-[5px] rounded-[10px]">
                                </div>
                                <div>
                                    <p>Kamar yang dipesan</p>
                                    <input type="number" name="jumlah_kamar" id="jumlahKamar" placeholder="1" min="1" value="1" class="border border-[#6B7280] w-full p-[5px] rounded-[10px]">
                                </div>
                                <div>
                                    <p>Jumlah tamu</p>
                                    <input type="number" name="jumlah_tamu" id="jumlah_tamu" placeholder="1" min="1" value="1" class="border border-[#6B7280] w-full p-[5px] rounded-[10px]">
                                </div>
                            </div>
                            <div class="justify-center items-center text-center ">
                                <div class="flex flex-row justify-between items-center ">
                                    <p class="text-[17px]">Harga permalam</p>
                                    <p class="text-[17px] font-semibold">Rp.<?= number_format($harga, 0, ',', '.'); ?></p>
                                </div>
                                <div class="flex flex-row justify-between items-center">
                                    <p class="text-[15px]" id="infoMalam">1 malam x 1 kamar</p>
                                    <p class="text-[15px] font-semibold" id="subtotal">Rp.<?= number_format($harga, 0, ',', '.'); ?></p>
                                </div>
                                <hr class="border-[#6B7280]">
                                <div class="flex flex-row justify-between items-center mb-[5px]">
                                    <p class="text-[17px]">Total</p>
                                    <input type="hidden" name="total" id="totalInput">
                                    <p class="text-[17px] font-semibold text-[#b0323a]" id="total">Rp.<?= number_format($harga, 0, ',', '.'); ?></p>
                                </div>



                                <?php if ($isLoggedIn): ?>
                                    <?php if ($status === 'tersedia'): ?>
                                        <button type="submit" class="text-center justify-center items-center text-white font-semibold bg-[#56694f] py-[5px] rounded-[10px] w-full hover:scale-103 hover:bg-[#6E8667] transition-all duration-200">
                                            Pesan sekarang
                                        </button>
                                    <?php else: ?>
                                        <button type="button" disabled class="text-center justify-center items-center text-white font-semibold bg-gray-400 py-[5px] rounded-[10px] w-full cursor-not-allowed">
                                            Kamar Penuh
                                        </button>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <button type="button" id="btnpesan"
                                        class="text-center justify-center items-center text-white font-semibold bg-gray-400 py-[5px] rounded-[10px] w-full hover:scale-103 transition-all duration-200 cursor-not-allowed">
                                        Login terlebih dahulu
                                    </button>
                                <?php endif; ?>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- rekomendasi kamar -->
    <section class="px-[50px]  mt-[40px]" data-aos="fade-right">
        <p class="text-[24px] mb-[5px] font-semibold">Rekomendasi Kamar terbaik</p>
        <div class="swiper">
            <div class="swiper-wrapper flex flex-row gap-[10px] pb-[15px]  whitespace-nowrap max-w-full ">

                <?php while ($row = mysqli_fetch_assoc($rekom_kamar)): ?>
                    <?php
                    // Tentukan warna latar dan warna teks berdasarkan status kamar
                    if ($row['status'] === 'tersedia') {
                        $warnaStatus = '#caedb8'; // hijau muda
                        $warnaTeks = '#000000';   // teks hitam
                    } else {
                        $warnaStatus = '#de2121ff'; // merah
                        $warnaTeks = '#ffffff';     // teks putih
                    }
                    $teksStatus = ucfirst($row['status']);
                    ?>
                    <div class="swiper-slide min-w-[280px]  shadow-[0_0px_25px_rgba(0,0,0,0.2)] rounded-[10px]  inline-block ">
                        <a href="../design/detail_kmr.php?id=<?= $row['kamar_id']; ?>">
                            <div>
                                <img src="../<?= htmlspecialchars($row['foto']); ?>" alt="" class="rounded-t-[10px] w-[300px] h-[200px]">
                            </div>
                            <div>
                                <div class="p-[10px]">
                                    <!-- <p></p> -->
                                    <p class="text-[12px] inline-block px-[5px] rounded-[3px] font-semibold"
                                        style="background-color: <?= $warnaStatus ?>; color: <?= $warnaTeks ?>;">
                                        <?= htmlspecialchars($teksStatus); ?>
                                    </p>
                                    <p class="text-[23px] font-semibold"> <?= htmlspecialchars($row['nama_kamar']); ?></p>
                                    <div class="flex flex-row gap-[3px] items-center">
                                        <!-- <img src="../image/loca2.png" alt="" class="w-[15px] h-[15px]"> -->
                                        <p><?= htmlspecialchars($row['tipe_kamar']); ?></p>
                                    </div>
                                    <div class="flex flex-row bg-[#335c67] inline-flex gap-[3px] py-[2px] px-[5px] rounded-[5px] text-white items-center">
                                        <img src="../image/star.png" alt="" class="w-[15px] h-[15px]">
                                        <p><?= htmlspecialchars($row['rating']); ?></p>
                                    </div>
                                    <div class="flex flex-row items-center justify-between mt-[10px]">
                                        <div class="leading-tight">
                                            <p class="text-[18px] font-semibold">Harga</p>
                                            <p class="text-[#b0323a] font-semibold"> Rp.<?= number_format($row['harga'], 0, ',', '.'); ?></p>
                                        </div>
                                        <div>
                                            <a href="../design/detail_kmr.php?id=<?= $row['kamar_id']; ?>">
                                                <p class="bg-[#335c67] py-[5px] inline-block px-[10px] hover:scale-105 transition-all duration-200 rounded-[7px] text-white">Lihat detail</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endwhile; ?>



            </div>

            <!-- tanda buat slider -->
            <div class="swiper-pagination mt-[500px]"></div>
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



    <!-- modal foto -->
    <div id="modal" class="hidden fixed inset-0 bg-black/50 flex justify-center items-center z-50">
        <div class=" rounded-xl shadow-2xl w-[700px] relative">
            <button id="closeModal" class="absolute top-3 right-3 text-white hover:text-black text-xl font-bold">&times;</button>

            <div id="foto" class="">
                <div class="swiper">
                    <div class="swiper-wrapper flex flex-row gap-[10px] pb-[15px]  whitespace-nowrap max-w-full items-center ">

                        <img src="../image/r1.jpg" alt="" class=" w-full h-full">


                    </div>
                    <!-- tanda buat slider -->
                    <div class="swiper-pagination mt-[500px]"></div>
                </div>

            </div>

        </div>
    </div>

    <!-- modal login regis -->
    <div id="modalLogin" class="hidden fixed inset-0 bg-black/50 flex justify-center items-center z-50">
        <div class="bg-white rounded-xl shadow-2xl w-[400px] p-6 relative">
            <button id="closeModalLogin" class="absolute top-3 right-3 text-gray-500 hover:text-black text-xl font-bold">&times;</button>

            <div id="loginForm">
                <h2 class="text-2xl font-bold mb-4 text-center">Login</h2>
                <form action="../act/act_login.php" method="POST">
                    <input type="email" name="email" placeholder="Email" class="border w-full p-2 rounded mb-3">
                    <input type="password" name="password" placeholder="Kata sandi" class="border w-full p-2 rounded mb-3">
                    <button class="bg-[#335c67] text-white w-full py-2 rounded hover:opacity-90">Masuk</button>
                </form>
                <p class="text-sm text-center mt-4">
                    Belum punya akun?
                    <button id="showRegister" class="text-[#335c67] font-semibold hover:underline">Daftar</button>
                </p>
            </div>

            <div id="registerForm" class="hidden">
                <h2 class="text-2xl font-bold mb-4 text-center">Daftar</h2>
                <form action="../act/act_regis.php" method="POST" enctype="multipart/form-data">
                    <input type="text" name="nama" placeholder="Nama lengkap" class="border w-full p-2 rounded mb-3">
                    <input type="email" name="email" placeholder="Email" class="border w-full p-2 rounded mb-3">
                    <input type="password" name="password" placeholder="Kata sandi" class="border w-full p-2 rounded mb-3">
                    <input type="file" name="foto" placeholder="Foto profile" class="border w-full p-2 rounded mb-3">
                    <button type="submit" class="bg-[#335c67] text-white w-full py-2 rounded hover:opacity-90">Daftar</button>
                </form>
                <p class="text-sm text-center mt-4">
                    Sudah punya akun?
                    <button id="showLogin" class="text-[#335c67] font-semibold hover:underline">Masuk</button>
                </p>
            </div>
        </div>
    </div>

    <!-- script modal login regis -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const modalLogin = document.getElementById('modalLogin');
            const openLogin = document.getElementById('openLogin');
            const closeModalLogin = document.getElementById('closeModalLogin');
            const loginForm = document.getElementById('loginForm');
            const registerForm = document.getElementById('registerForm');
            const showRegister = document.getElementById('showRegister');
            const showLogin = document.getElementById('showLogin');

            if (openLogin) {
                openLogin.addEventListener('click', () => {
                    modalLogin.classList.remove('hidden');
                    modalLogin.classList.add('flex', 'animate-fadeIn');
                });
            }

            if (closeModalLogin) {
                closeModalLogin.addEventListener('click', () => {
                    modalLogin.classList.add('hidden');
                    modalLogin.classList.remove('animate-fadeIn');
                });
            }

            if (showRegister && showLogin) {
                showRegister.addEventListener('click', () => {
                    loginForm.classList.add('hidden');
                    registerForm.classList.remove('hidden');
                });

                showLogin.addEventListener('click', () => {
                    registerForm.classList.add('hidden');
                    loginForm.classList.remove('hidden');
                });
            }

            modalLogin.addEventListener('click', (e) => {
                if (e.target === modalLogin) {
                    modalLogin.classList.add('hidden');
                    modalLogin.classList.remove('animate-fadeIn');
                }
            });
        });
    </script>

    <!-- ini script buat yg modal foto -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const modal = document.getElementById('modal');
            const closeModal = document.getElementById('closeModal');
            const openbuttons = document.querySelectorAll('.openbutton');
            const fotoContainer = document.querySelector('#foto .swiper-wrapper'); 

            // Setiap kali gambar diklik
            openbuttons.forEach(btn => {
                btn.addEventListener('click', () => {
                    // Ambil  gambar yang diklik
                    const src = btn.getAttribute('src');

                    //  ulang  modal dengan gambar tersebut
                    fotoContainer.innerHTML = `
                <img src="${src}" alt="Foto kamar" class="w-full h-full object-contain rounded-[15px]">
            `;

                    // Tampilkan modal
                    modal.classList.remove('hidden');
                });
            });

            // Tutup modal kalo tombol X diklik
            closeModal.addEventListener('click', () => {
                modal.classList.add('hidden');
            });

            // Tutup modal kalo klik di luar gambar
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    modal.classList.add('hidden');
                }
            });
        });
    </script>

    <!-- ainmasi navbar -->
    <script>
        const navbar = document.getElementById('navbar');
        const nama = document.getElementById('nama');
        navbar.classList.add('shadow-2xl');


        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                // pas discroll
                navbar.classList.add('bg-black/10');
                navbar.classList.remove('bg-#234046/60');
                nama.style.color = '#335c67';
            } else {
                // pas di atas
                navbar.classList.add('bg-#234046/60');
                navbar.classList.remove('bg-black/10');
                nama.style.color = '#ffffff';
            }
        });
    </script>

    <!-- slider rekomendasi kamar -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper(".swiper", {
            slidesPerView: 4,
            spaceBetween: 20,
            grabCursor: true,
            keyboard: {
                enabled: true,
            },
            mousewheel: {
                forceToAxis: true, // biar bisa scroll horizontal
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                320: {
                    slidesPerView: 1.2
                },
                640: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 3
                },
                1280: {
                    slidesPerView: 4
                },
            },
        });
    </script>

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

        const modalLogin = document.getElementById('modalLogin');
        const openLogin = document.getElementById('openLogin');
        const closeModalLogin = document.getElementById('closeModalLogin');
        const loginForm = document.getElementById('loginForm');
        const registerForm = document.getElementById('registerForm');
        const showRegister = document.getElementById('showRegister');
        const showLogin = document.getElementById('showLogin');

        openLogin.onclick = () => modalLogin.classList.remove('hidden');
        closeModalLogin.onclick = () => modalLogin.classList.add('hidden');

        showRegister.onclick = () => {
            loginForm.classList.add('hidden');
            registerForm.classList.remove('hidden');
        };

        showLogin.onclick = () => {
            registerForm.classList.add('hidden');
            loginForm.classList.remove('hidden');
        };

        modalLogin.addEventListener('click', (e) => {
            if (e.target === modalLogin) {
                modalLogin.classList.add('hidden');
            }
        });
    </script>

    <!-- buat alert yg pesan -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const formPesan = document.querySelector('form[action="../act/act_pesan.php"]');
            const checkin = document.getElementById('checkin');
            const checkout = document.getElementById('checkout');
            const jumlahKamar = document.getElementById('jumlahKamar');
            const jumlahTamu = document.getElementById('jumlah_tamu');

            <?php if ($isLoggedIn): ?>
                // User sudah login, maka kita validasi isi data form
                formPesan.addEventListener('submit', function(e) {
                    e.preventDefault(); // cegah submit otomatis

                    // ambil nilai input
                    const ci = checkin.value.trim();
                    const co = checkout.value.trim();
                    const jk = jumlahKamar.value.trim();
                    const jt = jumlahTamu.value.trim();

                    // validasi sederhana
                    if (!ci || !co || !jk || !jt) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Data belum lengkap',
                            text: 'Silakan isi semua data sebelum melakukan pemesanan.'
                        });
                        return;
                    }

                    // validasi tanggal (check-in < check-out)
                    if (new Date(ci) >= new Date(co)) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Tanggal tidak valid',
                            text: 'Tanggal check-out harus setelah tanggal check-in.'
                        });
                        return;
                    }

                    // jika semua valid, baru submit form
                    formPesan.submit();
                });
            <?php else: ?>
                // User belum login → alert login sudah ada
                document.getElementById("btnpesan").addEventListener("click", function(e) {
                    e.preventDefault();
                    Swal.fire({
                        icon: 'info',
                        title: 'Silakan login terlebih dahulu',
                        text: 'Anda harus login sebelum dapat melakukan pemesanan.'
                    });
                });
            <?php endif; ?>
        });
    </script>


    <!-- ini buat ngitung yg jumlah permalam -->
    <script>
        const checkin = document.getElementById('checkin');
        const checkout = document.getElementById('checkout');
        const jumlahKamar = document.getElementById('jumlahKamar');
        const infoMalam = document.getElementById('infoMalam');
        const subtotal = document.getElementById('subtotal');
        const total = document.getElementById('total');
        const totalInput = document.getElementById('totalInput');

        const hargaPerKamar = <?= $harga; ?>;

        function updateHarga() {
            const ci = new Date(checkin.value);
            const co = new Date(checkout.value);
            let malam = 1; // default 1 malam

            if (checkin.value && checkout.value && co > ci) {
                const diffTime = co - ci;
                malam = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
            }

            const kamar = parseInt(jumlahKamar.value) || 1;
            const sub = malam * kamar * hargaPerKamar;

            infoMalam.textContent = `${malam} malam x ${kamar} kamar`;
            subtotal.textContent = `Rp.${sub.toLocaleString('id-ID')}`;
            total.textContent = `Rp.${sub.toLocaleString('id-ID')}`;
            totalInput.value = sub; // ini penting biar dikirim ke PHP
        }

        // trigger tiap user ganti tanggal / jumlah kamar
        checkin.addEventListener('change', updateHarga);
        checkout.addEventListener('change', updateHarga);
        jumlahKamar.addEventListener('input', updateHarga);
    </script>



</body>

</html>