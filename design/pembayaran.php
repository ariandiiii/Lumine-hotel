<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../image/logobener.png" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Pembayaran</title>
</head>

<body>
    <!-- ini nabbar -->
    <nav id="navbar" class=" fixed top-0 left-0 w-full z-[50]  bg-[#234046]/60 backdrop-blur-md transition-all duration-300 ">
        <a href="../design/home.php">
            <div class="flex flex-row  px-[50px] py-[20px] items-center justify-between">
                <div class="flex flex-row text-center items-center gap-[5px] ">
                    <img src="../image/logobener.png" alt="" class="w-[45px]">
                    <p class="font-semibold text-white text-[19px]">LUMINE <span class="font-bold text-[#e09f3e]">HOTEL</span> </p>
                </div>

                <div>
                    <button id="openLogin">
                        <p class="bg-[#335c67] px-[15px] py-[8px] rounded-[30px] hover:scale-105 transition-all duration-200 text-white">Gabung | Daftar</p>
                    </button>
                </div>
            </div>
        </a>
    </nav>

    <!-- in i tombol back -->
    <div class="mt-[109px] px-[50px]">
        <a href="../design/detail_kmr.php" class="mt-[100px] text-[17px] font-semibold">
            <p>
                < Kembali</p>
        </a>
    </div>

    <!-- kata kata singkat -->
    <div class="mt-[20px] px-[50px]">
        <p class="font-semibold text-[18px]">Pembayaran pesanan</p>
        <p class=" text-[#6B7280]">Lengkapi pembayaran untuk mengkonfirmasi pemesanan kamar Anda</p>
    </div>

    <section class="px-[50px] mt-[20px]">
        <div class="flex flex-row gap-[10px] justify-between">
            <div class="flex flex-col w-2/2 gap-[5px] border border-[#6B7280] p-[13px] rounded-[10px]">
                <p class="text-[18px] font-semibold">Detail pesanan</p>
                <div class="flex flex-row gap-[5px] items-center">
                    <img src="../image/schedule.png" alt="" class="w-[25px] h-[25px]">
                    <div>
                        <p class="text-[14px]  text-[#6B7280]">Check-in</p>
                        <p class="text-[16px] ">20 okktober 2025</p>
                    </div>
                </div>
                <div class="flex flex-row gap-[5px] items-center">
                    <img src="../image/schedule.png" alt="" class="w-[25px] h-[25px]">
                    <div>
                        <p class="text-[14px] text-[#6B7280]">Check-out</p>
                        <p class="text-[16px] ">21 okktober 2025</p>
                    </div>
                </div>
                <div class="flex flex-row gap-[5px] items-center">
                    <img src="../image/group.png" alt="" class="w-[25px] h-[25px]">
                    <div>
                        <p class="text-[14px] text-[#6B7280]">Tipe kamar</p>
                        <p class="text-[16px] ">Deluxe</p>
                    </div>
                </div>
                <div class="flex flex-row gap-[5px] items-center">
                    <img src="../image/group.png" alt="" class="w-[25px] h-[25px]">
                    <div>
                        <p class="text-[14px] text-[#6B7280]">Jumlah tamu</p>
                        <p class="text-[16px] ">2 orang</p>
                    </div>
                </div>
            </div>
            <div class="w-1/2">
                <p>Ringkasan pembayaran</p>
            </div>
        </div>

    </section>
</body>

</html>