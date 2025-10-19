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
        <div class="flex flex-row  px-[50px] py-[20px] items-center justify-between">
            <a href="../design/home.php">
                <div class="flex flex-row text-center items-center gap-[5px] ">
                    <img src="../image/logobener.png" alt="" class="w-[45px]">
                    <p class="font-semibold text-white text-[19px]">LUMINE <span class="font-bold text-[#e09f3e]">HOTEL</span> </p>
                </div>
            </a>

            <div class="relative inline-block cursor-pointer">
                <div id="dropdownButton" class="flex flex-row gap-[5px] items-center">
                    <img src="../image/user.png" alt="" class="w-[35px] h-[35px]">
                    <p class="text-white">
                        Ariandi saputra
                    </p>
                </div>
                <!-- Dropdown Menu -->
                <div id="dropdownMenu" class="hidden absolute mt-2 w-48 bg-[#963f2e] shadow-lg rounded-lg hover:bg-[#C56B5B] hover:scale-103 border border-gray-200 transition-all duration-200 z-50">
                    <ul class="py-1 text-white  ">
                        <li><a href="#" class="block px-4 py-2">LOG OUT</a></li>
                     
                    </ul>
                </div>
            </div>
        </div>
        </div>
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

    <!-- detail pesanan -->
    <section class="px-[50px] mt-[20px]">
        <div class="flex flex-row gap-[10px] justify-between">
            <div class="flex flex-row justify-between w-2/2 gap-[10px] border border-[#6B7280] p-[13px] rounded-[10px]">
                <!-- detail pesanan -->
                <div class="w-1/2">
                    <p class="text-[18px] font-semibold">Detail pesanan</p>
                    <div class="flex flex-row gap-[5px] items-center mt-[10px]">
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

                <!-- metode pembayaran -->
                <div class="w-2/2">
                    <form action="">
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
                    </form>

                </div>

            </div>

            <!-- buat bayar -->
            <div class="w-1/2 ">
                <div class="flex flex-col gap-[10px]">
                    <div class="border border-[#6B7280] rounded-[10px] p-[12px]">
                        <p class="text-[18px] font-semibold">Ringkasan pembayaran</p>
                        <div class="flex flex-col gap-[5px] mt-[10px]">
                            <div class="flex flex-row justify-between ">
                                <p class=" text-[#6B7280]">Harga permalam</p>
                                <p class="text-[17px] font-semibold">Rp.100.000</p>
                            </div>
                            <div class="flex flex-row justify-between ">
                                <p class=" text-[#6B7280]">Lama menginap</p>
                                <p class="text-[17px] font-semibold">2 Hari</p>
                            </div>
                            <hr class="border-[#6B7280]">
                            <div class="flex flex-row justify-between ">
                                <p class=" font-semibold text-[17px]">Total</p>
                                <p class="text-[17px] font-semibold">2 Hari</p>
                            </div>
                            <hr class="border-[#6B7280]">
                            <div class="flex flex-row justify-between ">
                                <p class=" text-[#6B7280]">Status pembayran</p>
                                <p class="bg-[#cd9b59] inline-block px-[5px] py-[2px] rounded-[5px] text-white text-[14px]">Menunggu</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-row gap-[5px]">
                        <button class="text-[15px] font-semibold bg-[#963f2e] w-full py-[5px] rounded-[5px] text-white  hover:scale-103 cursor-pointer hover:bg-[#C56B5B] transition-all duration-200">Batal pembayaran</button>
                        <button class="text-[15px] font-semibold bg-[#56694f] w-full py-[5px] rounded-[5px] text-white  hover:scale-103 cursor-pointer hover:bg-[#768E6B] transition-all duration-200">Bayar sekarang</button>
                    </div>
                    <p class=" text-[#6B7280] text-center text-[14px]">Dengan melanjutkan, Anda menyetujui syarat dan ketentuan kami</p>

                </div>
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
</body>

</html>