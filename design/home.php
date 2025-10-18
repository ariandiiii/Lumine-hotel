<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../image/logobener.png" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <title>Home</title>
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
</head>

<body>
    <!-- ini bagian header navbar -->
    <div class="relative bg-[url('../image/bg.jpg')] bg-cover bg-center pb-[90px] rounded-b-[50px]" data-aos="fade-in">
        <div class="absolute inset-0 bg-gradient-to-b from-black/40 via-black/40 to-transparent"></div>

        <nav class="relative bg-gradient-to-b from-black to-transparent ">
            <a href="../design/home.php">
                <div class="flex flex-row  px-[50px] py-[20px] items-center justify-between">
                    <div class="flex flex-row text-center items-center gap-[5px] ">
                        <img src="../image/logobener.png" alt="" class="w-[45px]">
                        <p class="font-semibold text-white text-[19px]">LUMINE <span class="font-bold text-[#e09f3e]">HOTEL</span> </p>
                    </div>
            </a>
            <div>
                <button id="openLogin">
                    <p class="bg-[#335c67] px-[15px] py-[8px] rounded-[30px] hover:scale-105 transition-all duration-200 text-white">Gabung | Daftar</p>
                </button>
            </div>
        </nav>

        <section class="relative px-[20px] pl-[50px] mt-[10px]">
            <div class="leading-tight">
                <p class="text-[20px] font-semibold text-white">Nikmati liburan anda dengan menginap di</p>
                <p class="text-[60px] font-bold text-white">LUMINE <span class="text-[#e09f3e]">HOTEL</span> </p>
                <p class="text-[20px] font-semibold text-white">Ayo Pesan Sekarang</p>
            </div>

        </section>
    </div>

    <!-- ini bagian yg promo harga -->
    <section class="px-[50px] mt-[40px] " data-aos="fade-up">
        <div class="py-[8px] bg-[#D1D5DB] rounded-[10px]">
            <div class="flex flex-row gap-[10px] items-center bg-[url('../image/h2.png')] bg-cover bg-center px-[25px] p-[10px] relative overflow-hidden rounded-r-[10px] text-black">
                <div class="absolute inset-0 bg-gradient-to-r from-white/100 to-transparent rounded-r-[10px]"></div>
                <div class="relative font-bold text-[20px]">
                    <p>Hotel terbaik</p>
                    <p>Untukmu</p>
                </div>
                <div class="relative w-[3px] h-[60px] bg-black rounded-[10px]"></div>
                <div class="relative font-semibold text-[25px]">
                    <p>Mulai dari</p>
                    <p>Rp<span class="text-[30px] font-bold">100rb</span></p>
                </div>
            </div>
        </div>
    </section>

    <!-- ini bagian rekomendasi kamar -->
    <section class="px-[50px]  mt-[40px]" data-aos="fade-right">
        <p class="text-[24px] mb-[5px] font-semibold">Rekomendasi Kamar terbaik</p>
        <div class="swiper">
            <div class="swiper-wrapper flex flex-row gap-[10px] pb-[15px]  whitespace-nowrap max-w-full ">

                <div class="swiper-slide min-w-[280px]  shadow-[0_0px_25px_rgba(0,0,0,0.2)] rounded-[10px]  inline-block ">
                    <a href="">
                        <div>
                            <img src="../image/h1.png" alt="" class="rounded-t-[10px]">
                        </div>
                        <div>
                            <div class="p-[10px]">
                                <p class="text-[23px] font-semibold">Luxury hotel</p>
                                <div class="flex flex-row gap-[3px] items-center">
                                    <img src="../image/loca2.png" alt="" class="w-[15px] h-[15px]">
                                    <p>bali</p>
                                </div>
                                <div class="flex flex-row bg-[#335c67] inline-flex gap-[3px] py-[2px] px-[5px] rounded-[5px] text-white items-center">
                                    <img src="../image/star.png" alt="" class="w-[15px] h-[15px]">
                                    <p>4,5</p>
                                </div>
                                <div class="flex flex-row items-center justify-between mt-[10px]">
                                    <div class="leading-tight">
                                        <p class="text-[18px] font-semibold">Harga</p>
                                        <p class="text-[#b0323a] font-semibold">1.000.000</p>
                                    </div>
                                    <div>
                                        <a href="../design/detail_kmr.php">
                                            <p class="bg-[#335c67] py-[5px] inline-block px-[10px] hover:scale-105 transition-all duration-200 rounded-[7px] text-white">Lihat detail</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide min-w-[280px]  shadow-[0_0px_25px_rgba(0,0,0,0.2)] rounded-[10px]  inline-block ">
                    <a href="">
                        <div>
                            <img src="../image/h1.png" alt="" class="rounded-t-[10px]">
                        </div>
                        <div>
                            <div class="p-[10px]">
                                <p class="text-[23px] font-semibold">Luxury hotel</p>
                                <div class="flex flex-row gap-[3px] items-center">
                                    <img src="../image/loca2.png" alt="" class="w-[15px] h-[15px]">
                                    <p>bali</p>
                                </div>
                                <div class="flex flex-row bg-[#335c67] inline-flex gap-[3px] py-[2px] px-[5px] rounded-[5px] text-white items-center">
                                    <img src="../image/star.png" alt="" class="w-[15px] h-[15px]">
                                    <p>4,5</p>
                                </div>
                                <div class="flex flex-row items-center justify-between mt-[10px]">
                                    <div class="leading-tight">
                                        <p class="text-[18px] font-semibold">Harga</p>
                                        <p class="text-[#b0323a] font-semibold">1.000.000</p>
                                    </div>
                                    <div>
                                        <a href="../design/detail_kmr.php">
                                            <p class="bg-[#335c67] py-[5px] inline-block px-[10px] hover:scale-105 transition-all duration-200 rounded-[7px] text-white">Lihat detail</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide min-w-[280px]  shadow-[0_0px_25px_rgba(0,0,0,0.2)] rounded-[10px]  inline-block ">
                    <a href="">
                        <div>
                            <img src="../image/h1.png" alt="" class="rounded-t-[10px]">
                        </div>
                        <div>
                            <div class="p-[10px]">
                                <p class="text-[23px] font-semibold">Luxury hotel</p>
                                <div class="flex flex-row gap-[3px] items-center">
                                    <img src="../image/loca2.png" alt="" class="w-[15px] h-[15px]">
                                    <p>bali</p>
                                </div>
                                <div class="flex flex-row bg-[#335c67] inline-flex gap-[3px] py-[2px] px-[5px] rounded-[5px] text-white items-center">
                                    <img src="../image/star.png" alt="" class="w-[15px] h-[15px]">
                                    <p>4,5</p>
                                </div>
                                <div class="flex flex-row items-center justify-between mt-[10px]">
                                    <div class="leading-tight">
                                        <p class="text-[18px] font-semibold">Harga</p>
                                        <p class="text-[#b0323a] font-semibold">1.000.000</p>
                                    </div>
                                    <div>
                                        <a href="../design/detail_kmr.php">
                                            <p class="bg-[#335c67] py-[5px] inline-block px-[10px] hover:scale-105 transition-all duration-200 rounded-[7px] text-white">Lihat detail</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide min-w-[280px]  shadow-[0_0px_25px_rgba(0,0,0,0.2)] rounded-[10px]  inline-block ">
                    <a href="">
                        <div>
                            <img src="../image/h1.png" alt="" class="rounded-t-[10px]">
                        </div>
                        <div>
                            <div class="p-[10px]">
                                <p class="text-[23px] font-semibold">Luxury hotel</p>
                                <div class="flex flex-row gap-[3px] items-center">
                                    <img src="../image/loca2.png" alt="" class="w-[15px] h-[15px]">
                                    <p>bali</p>
                                </div>
                                <div class="flex flex-row bg-[#335c67] inline-flex gap-[3px] py-[2px] px-[5px] rounded-[5px] text-white items-center">
                                    <img src="../image/star.png" alt="" class="w-[15px] h-[15px]">
                                    <p>4,5</p>
                                </div>
                                <div class="flex flex-row items-center justify-between mt-[10px]">
                                    <div class="leading-tight">
                                        <p class="text-[18px] font-semibold">Harga</p>
                                        <p class="text-[#b0323a] font-semibold">1.000.000</p>
                                    </div>
                                    <div>
                                        <a href="../design/detail_kmr.php">
                                            <p class="bg-[#335c67] py-[5px] inline-block px-[10px] hover:scale-105 transition-all duration-200 rounded-[7px] text-white">Lihat detail</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide min-w-[280px]  shadow-[0_0px_25px_rgba(0,0,0,0.2)] rounded-[10px]  inline-block ">
                    <a href="">
                        <div>
                            <img src="../image/h1.png" alt="" class="rounded-t-[10px]">
                        </div>
                        <div>
                            <div class="p-[10px]">
                                <p class="text-[23px] font-semibold">Luxury hotel</p>
                                <div class="flex flex-row gap-[3px] items-center">
                                    <img src="../image/loca2.png" alt="" class="w-[15px] h-[15px]">
                                    <p>bali</p>
                                </div>
                                <div class="flex flex-row bg-[#335c67] inline-flex gap-[3px] py-[2px] px-[5px] rounded-[5px] text-white items-center">
                                    <img src="../image/star.png" alt="" class="w-[15px] h-[15px]">
                                    <p>4,5</p>
                                </div>
                                <div class="flex flex-row items-center justify-between mt-[10px]">
                                    <div class="leading-tight">
                                        <p class="text-[18px] font-semibold">Harga</p>
                                        <p class="text-[#b0323a] font-semibold">1.000.000</p>
                                    </div>
                                    <div>
                                        <a href="../design/detail_kmr.php">
                                            <p class="bg-[#335c67] py-[5px] inline-block px-[10px] hover:scale-105 transition-all duration-200 rounded-[7px] text-white">Lihat detail</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>


            </div>

            <!-- tanda buat slider -->
            <div class="swiper-pagination mt-[500px]"></div>
        </div>
    </section>

    <!-- ini bagian destinasi populer -->
    <section>
        <div class="flex flex-col text-center px-[50px] mt-[40px] gap-[15px]" data-aos="fade-zoom">
            <div>
                <div class="flex flex-row items-center justify-center gap-[5px]">
                    <img src="../image/loca2.png" alt="" class="w-[25px] h-[25px]">
                    <p class="text-[25px] font-semibold"> Destinasi Populer</p>
                </div>
                <p>Jelajahi destinasi wisata populer di Indonesia dan temukan hotel terbaik di setiap kota</p>
            </div>

            <div class="flex flex-row justify-center gap-[20px] ">
                <div class="relative w-[200px] h-[200px] rounded-[10px] hover:scale-105 transition-all duration-200">
                    <img src="../image/bali.jpg" alt="" class="w-[200px] h-[200px] rounded-[10px] hover:scale-105 transition-all duration-200">
                    <div class="absolute inset-0 bg-black/10 rounded-[10px] flex justify-start items-end ">
                        <div class="flex flex-col leading-tight p-[5px] text-start">
                            <p class="text-white text-[20px] font-semibold">Bali</p>
                            <p class="text-white text-[13px] font-semibold">Pulau dewata dengan pantai indah</p>
                            <p class="text-white text-[13px] font-semibold">100 Hotel tersedia</p>
                        </div>
                    </div>
                </div>
                <div class="relative w-[200px] h-[200px] rounded-[10px] hover:scale-105 transition-all duration-200">
                    <img src="../image/jakarta.jpg" alt="" class="w-[200px] h-[200px] rounded-[10px] hover:scale-105 transition-all duration-200">
                    <div class="absolute inset-0 bg-black/30 rounded-[10px] flex justify-start items-end ">
                        <div class="flex flex-col leading-tight p-[5px] text-start">
                            <p class="text-white text-[20px] font-semibold">Jakarta</p>
                            <p class="text-white text-[13px] font-semibold">Kota dengan penduduk terpadat</p>
                            <p class="text-white text-[13px] font-semibold">100 Hotel tersedia</p>
                        </div>
                    </div>
                </div>
                <div class="relative w-[200px] h-[200px] rounded-[10px] hover:scale-105 transition-all duration-200">
                    <img src="../image/bandung.jpeg" alt="" class="w-[200px] h-[200px] rounded-[10px] hover:scale-105 transition-all duration-200">
                    <div class="absolute inset-0 bg-black/30 rounded-[10px] flex justify-start items-end ">
                        <div class="flex flex-col leading-tight p-[5px] text-start">
                            <p class="text-white text-[20px] font-semibold">Bandung</p>
                            <p class="text-white text-[13px] font-semibold">Kota dengan seribu kuliner</p>
                            <p class="text-white text-[13px] font-semibold">100 Hotel tersedia</p>
                        </div>
                    </div>
                </div>
                <div class="relative w-[200px] h-[200px] rounded-[10px] hover:scale-105 transition-all duration-200">
                    <img src="../image/jogja.jpeg" alt="" class="w-[200px] h-[200px] rounded-[10px] hover:scale-105 transition-all duration-200">
                    <div class="absolute inset-0 bg-black/30 rounded-[10px] flex justify-start items-end ">
                        <div class="flex flex-col leading-tight p-[5px] text-start">
                            <p class="text-white text-[20px] font-semibold">Yogyakarta</p>
                            <p class="text-white text-[13px] font-semibold">Kota dengan pemandangan indah dan nyaman</p>
                            <p class="text-white text-[13px] font-semibold">100 Hotel tersedia</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ini bagian seluruh kamar -->
    <section class="px-[50px] mt-[40px]">
        <div data-aos="fade-up">
            <p class="text-[24px] mb-[5px] font-semibold">Seluruh kamar</p>
            <div class="grid grid-cols-2 gap-[10px]">

                <div class="flex flex-1 flex-row gap-[10px] shadow-[0_0px_20px_rgba(0,0,0,0.2)] rounded-sm">
                    <div>
                        <img src="../image/h1.png" alt="" class="w-[250px] rounded-l-sm">
                    </div>
                    <div class="min-w-[55%] p-[10px]">
                        <p class="text-[25px] font-semibold">Nama hotel</p>
                        <div class="flex flex-row gap-[3px] items-center">
                            <img src="../image/loca2.png" alt="" class="w-[15px] h-[15px]">
                            <p>Alamat</p>
                        </div>
                        <div class="flex flex-row bg-[#335c67] inline-flex gap-[3px] py-[2px] px-[5px] rounded-[5px] text-white items-center">
                            <img src="../image/star.png" alt="" class="w-[15px] h-[15px]">
                            <p>4,5</p>
                        </div>
                        <div class="flex flex-row items-center justify-between mt-[10px]">
                            <div class="leading-tight">
                                <p class="text-[18px] font-semibold">Harga</p>
                                <p class="text-[#b0323a] font-semibold">1.000.000</p>
                            </div>
                            <div>
                                <a href="../design/detail_kmr.php">
                                    <p class="bg-[#335c67] py-[5px] inline-block px-[10px] hover:scale-105 transition-all duration-200 rounded-[7px] text-white">Lihat detail</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-1 flex-row gap-[10px] shadow-[0_0px_20px_rgba(0,0,0,0.2)] rounded-sm">
                    <div>
                        <img src="../image/h1.png" alt="" class="w-[250px] rounded-l-sm">
                    </div>
                    <div class="min-w-[55%] p-[10px]">
                        <p class="text-[25px] font-semibold">Nama hotel</p>
                        <div class="flex flex-row gap-[3px] items-center">
                            <img src="../image/loca2.png" alt="" class="w-[15px] h-[15px]">
                            <p>Alamat</p>
                        </div>
                        <div class="flex flex-row bg-[#335c67] inline-flex gap-[3px] py-[2px] px-[5px] rounded-[5px] text-white items-center">
                            <img src="../image/star.png" alt="" class="w-[15px] h-[15px]">
                            <p>4,5</p>
                        </div>
                        <div class="flex flex-row items-center justify-between mt-[10px]">
                            <div class="leading-tight">
                                <p class="text-[18px] font-semibold">Harga</p>
                                <p class="text-[#b0323a] font-semibold">1.000.000</p>
                            </div>
                            <div>
                                <a href="../design/detail_kmr.php">
                                    <p class="bg-[#335c67] py-[5px] inline-block px-[10px] hover:scale-105 transition-all duration-200 rounded-[7px] text-white">Lihat detail</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-1 flex-row gap-[10px] shadow-[0_0px_20px_rgba(0,0,0,0.2)] rounded-sm">
                    <div>
                        <img src="../image/h1.png" alt="" class="w-[250px] rounded-l-sm">
                    </div>
                    <div class="min-w-[55%] p-[10px]">
                        <p class="text-[25px] font-semibold">Nama hotel</p>
                        <div class="flex flex-row gap-[3px] items-center">
                            <img src="../image/loca2.png" alt="" class="w-[15px] h-[15px]">
                            <p>Alamat</p>
                        </div>
                        <div class="flex flex-row bg-[#335c67] inline-flex gap-[3px] py-[2px] px-[5px] rounded-[5px] text-white items-center">
                            <img src="../image/star.png" alt="" class="w-[15px] h-[15px]">
                            <p>4,5</p>
                        </div>
                        <div class="flex flex-row items-center justify-between mt-[10px]">
                            <div class="leading-tight">
                                <p class="text-[18px] font-semibold">Harga</p>
                                <p class="text-[#b0323a] font-semibold">1.000.000</p>
                            </div>
                            <div>
                                <a href="../design/detail_kmr.php">
                                    <p class="bg-[#335c67] py-[5px] inline-block px-[10px] hover:scale-105 transition-all duration-200 rounded-[7px] text-white">Lihat detail</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-1 flex-row gap-[10px] shadow-[0_0px_20px_rgba(0,0,0,0.2)] rounded-sm">
                    <div>
                        <img src="../image/h1.png" alt="" class="w-[250px] rounded-l-sm">
                    </div>
                    <div class="min-w-[55%] p-[10px]">
                        <p class="text-[25px] font-semibold">Nama hotel</p>
                        <div class="flex flex-row gap-[3px] items-center">
                            <img src="../image/loca2.png" alt="" class="w-[15px] h-[15px]">
                            <p>Alamat</p>
                        </div>
                        <div class="flex flex-row bg-[#335c67] inline-flex gap-[3px] py-[2px] px-[5px] rounded-[5px] text-white items-center">
                            <img src="../image/star.png" alt="" class="w-[15px] h-[15px]">
                            <p>4,5</p>
                        </div>
                        <div class="flex flex-row items-center justify-between mt-[10px]">
                            <div class="leading-tight">
                                <p class="text-[18px] font-semibold">Harga</p>
                                <p class="text-[#b0323a] font-semibold">1.000.000</p>
                            </div>
                            <div>
                                <a href="../design/detail_kmr.php">
                                    <p class="bg-[#335c67] py-[5px] inline-block px-[10px] hover:scale-105 transition-all duration-200 rounded-[7px] text-white">Lihat detail</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </section>

    <!-- ini footer -->
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

    <!-- ini bagian buat login ama regis -->
    <div id="modal" class="hidden fixed inset-0 bg-black/50 flex justify-center items-center z-50">
        <div class="bg-white rounded-xl shadow-2xl w-[400px] p-6 relative">


            <button id="closeModal" class="absolute top-3 right-3 text-gray-500 hover:text-black text-xl font-bold">&times;</button>

            <!-- form loging-->
            <div id="loginForm" class="">
                <h2 class="text-2xl font-bold mb-4 text-center">Login</h2>
                <form action="">
                    <input type="email" placeholder="Email" class="border w-full p-2 rounded mb-3">
                    <input type="password" placeholder="Kata sandi" class="border w-full p-2 rounded mb-3">
                    <button class="bg-[#335c67] text-white w-full py-2 rounded hover:opacity-90">Masuk</button>
                </form>
                <p class="text-sm text-center mt-4">
                    Belum punya akun?
                    <button id="showRegister" class="text-[#335c67] font-semibold hover:underline">Daftar</button>
                </p>
            </div>

            <!-- form regis -->
            <div id="registerForm" class="hidden">
                <h2 class="text-2xl font-bold mb-4 text-center">Daftar</h2>
                <form action="">
                    <input type="text" placeholder="Nama lengkap" class="border w-full p-2 rounded mb-3">
                    <input type="email" placeholder="Email" class="border w-full p-2 rounded mb-3">
                    <input type="password" placeholder="Kata sandi" class="border w-full p-2 rounded mb-3">
                    <input type="file" placeholder="Foto profile" class="border w-full p-2 rounded mb-3">
                    <button class="bg-[#335c67] text-white w-full py-2 rounded hover:opacity-90">Daftar</button>
                </form>
                <p class="text-sm text-center mt-4">
                    Sudah punya akun?
                    <button id="showLogin" class="text-[#335c67] font-semibold hover:underline">Masuk</button>
                </p>
            </div>

        </div>
    </div>

    <!-- script buat animasi, modal login regis sama slider-->
    <!-- inni buat animasi sama modal yg login regis-->
    <script>
        AOS.init({
            duration: 900,
            once: false,
            offset: 100
        });

        const modal = document.getElementById('modal');
        const openLogin = document.getElementById('openLogin');
        const closeModal = document.getElementById('closeModal');
        const loginForm = document.getElementById('loginForm');
        const registerForm = document.getElementById('registerForm');
        const showRegister = document.getElementById('showRegister');
        const showLogin = document.getElementById('showLogin');

        openLogin.onclick = () => modal.classList.remove('hidden');
        closeModal.onclick = () => modal.classList.add('hidden');
        showRegister.onclick = () => {
            loginForm.classList.add('hidden');
            registerForm.classList.remove('hidden');
        };
        showLogin.onclick = () => {
            registerForm.classList.add('hidden');
            loginForm.classList.remove('hidden');
        };

        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.add('hidden');
            }
        });
    </script>

    <!-- ini buat slider yg di rekomendasi kamarr -->
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



</body>

</html>