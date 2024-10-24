<?php
session_start(); // Memulai sesi untuk mengecek login

// Jika pengguna belum login, redirect ke halaman login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include('config.php'); // Menghubungkan dengan database

// Query untuk mendapatkan semua produk
$query = "SELECT * FROM produk";
$result = mysqli_query($conn, $query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko HP</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo">Toko HP</div>
            <div class="menu" id="menu">
                <a href="#home">Home</a>
                <a href="#products">Produk</a>
                <a href="#about">About Me</a>
                <a href="#contact">Kontak</a>
                <a href="read.php">Lihat produk Yang Ada</a>
                <a href="cu.php">Tambah Produk</a>
                <a href="logout.php">Logout</a>
            </div>
            <div class="hamburger" id="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <button id="theme-toggle">Light Mode</button>
        </nav>
    </header>

    <!-- Ucapan Selamat Datang yang Elegan -->
    <section class="welcome-section">
        <h1>Selamat Datang, <span><?php echo htmlspecialchars($_SESSION['username']); ?></span>!</h1>
        <p>Kami sangat senang menyambut Anda di Toko HP. Temukan produk terbaik kami di bawah ini!</p>
    </section>

    <!-- Hero Section with Image -->
    <section class="hero" id="home">
        <div class="hero-content">
            <h1>Toko HP Terbaik</h1>
            <p>Temukan HP impianmu dengan harga terjangkau.</p>
            <button id="popup-btn" class="cta-btn">Penawaran Khusus</button>
        </div>
    </section>

    

    <main>
        <section id="products" class="product-section">
            <h2>Produk Unggulan</h2>
            <div class="product-list">
                <div class="product">
                    <img src="hp1.jpeg" alt="HP 1">
                    <h3>Realme 9i</h3>
                    <p>Layar: 6.6 inci IPS LCD, resolusi 1080 x 2412 piksel, refresh rate 90Hz <hr>
                        Prosesor: Qualcomm Snapdragon 680 4G <hr>
                        RAM: 4GB atau 6GB <hr>
                        Penyimpanan Internal: 64GB atau 128GB, dapat diperluas dengan microSD hingga 1TB <hr>
                        Kamera Belakang: Triple kamera dengan 50MP (utama), 2MP (makro), dan 2MP (depth) <hr>
                        Kamera Depan: 16MP <hr>
                        Baterai: 5000mAh dengan pengisian cepat 33W <hr>
                        Sistem Operasi: Android 11, dapat diupgrade ke Android 13 dengan Realme UI 4. <hr></p>
                    <p>Harga: Rp 2.000.000</p>
                    <button class="btn-buy">Beli Sekarang</button>
                </div>
                <div class="product">
                    <img src="hp2.jpeg" alt="HP 2">
                    <h3>Poco X3 Pro</h3>
                    <p>Dimensi: 165.3 x 76.8 x 9.4 mm, berat: 215 gram <hr>
                        Chipset: Snapdragon 860 Octa Core up to 2.96 GHz <hr>
                        GPU: Adreno 640 <hr>
                        RAM: 6GB/8GB <hr>
                        ROM: 128 GB/256 GB <hr>
                        Layar: IPS LCD, 6.67 inci Full HD+ 2400 x 1080 piksel <hr>
                        Kamera Depan: 20MP F2.2 <hr></p>
                    <p>Harga: Rp 4.099.000</p>
                    <button class="btn-buy">Beli Sekarang</button>
                </div>
                <div class="product">
                    <img src="hp3.jpeg" alt="HP 3">
                    <h3>Poco X5 Pro</h3>
                    <p>Ukuran layar: 6,67 inci, AMOLED, 1080 x 2400 piksel, rasio 20:9, Corning Gorilla Glass 5 <hr>
                        OS: Android 12 <hr>
                        Chip: Qualcomm SM7325 Snapdragon 778G 5G <hr>
                        CPU Octa-core (1x2.4 GHz Cortex-A78 & 3x2.2 GHz Cortex-A78 & 4x1.9 GHz Cortex-A55) dan GPU Adreno 642L <hr>
                        Kamera ultra-lebar: 8 MP <hr>
                        Kamera makro: 2 MP <hr>
                        Kamera depan: 16 MP <hr>
                        Kecepatan pengisian daya: 67 W, hingga 100% (Mode Boost) dalam 46 menit <hr>
                        Kapasitas baterai: 5000 mAh (standar) <hr>
                        Pemutaran video (maksimal): 20 jam. <hr></p>
                    <p>Harga: Rp 3.683.000</p>
                    <button class="btn-buy">Beli Sekarang</button>
                </div>
                <div class="product">
                    <img src="hp4.jpeg" alt="HP 4">
                    <h3>Oppo Reno 6</h3>
                    <p>Layar: 6.4 inci AMOLED, resolusi 1080 x 2400 piksel, refresh rate 90Hz <hr>
                        Prosesor: Qualcomm Snapdragon 720G <hr>
                        RAM: 8GB <hr>
                        Penyimpanan Internal: 128GB, dapat diperluas dengan microSD <hr>
                        Kamera Belakang: Quad kamera dengan 64MP (utama), 8MP (ultrawide), 2MP (makro), dan 2MP (depth) <hr>
                        Kamera Depan: 44MP <hr>
                        Baterai: 4310mAh dengan pengisian cepat 50W <hr>
                        Sistem Operasi: Android 11 dengan ColorOS 11.1 <hr>
                        Fitur Lain: Sensor sidik jari di bawah layar, dual SIM, USB Type-C, dan NFC. <hr></p>
                    <p>Harga: Rp 7.999.000</p>
                    <button class="btn-buy">Beli Sekarang</button>
                </div>
                <div class="product">
                    <img src="hp5.jpeg" alt="HP 5">
                    <h3>Samsung S23 Ultra</h3>
                    <p>Layar: 6.8 inci Dynamic AMOLED 2X, resolusi 1440 x 3088 piksel, refresh rate 120Hz <hr>
                        Prosesor: Qualcomm Snapdragon 8 Gen 2 <hr>
                        RAM: 8GB atau 12GB <hr>
                        Penyimpanan Internal: 256GB, 512GB, atau 1TB (tanpa slot kartu microSD) <hr>
                        Kamera Belakang: Quad kamera dengan 200MP (utama), 10MP (telefoto 3x zoom), 10MP (periskop telefoto 10x zoom), dan 12MP (ultrawide) <hr>
                        Kamera Depan: 12MP <hr>
                        Baterai: 5000mAh dengan pengisian cepat 45W, pengisian nirkabel 15W, dan pengisian balik nirkabel 4.5W <hr>
                        Sistem Operasi: Android 13, dapat diupgrade ke Android 14 dengan One UI 6.1 <hr>
                        Fitur Lain: Sensor sidik jari di bawah layar, stylus S Pen dengan integrasi Bluetooth, tahan air dan debu IP68, dan speaker stereo. <hr></p>
                    <p>Harga: Rp 25.999.000</p>
                    <button class="btn-buy">Beli Sekarang</button>
                </div>
                <div class="product">
                    <img src="hp6.jpeg" alt="HP 6">
                    <h3>Vivo V27</h3>
                    <p>Layar: 6.78 inci AMOLED, resolusi 1080 x 2400 piksel, refresh rate 120Hz <hr>
                        Prosesor: MediaTek Dimensity 7200 <hr>
                        RAM: 8GB atau 12GB <hr>
                        Penyimpanan Internal: 128GB atau 256GB (tanpa slot kartu microSD) <hr>
                        Kamera Belakang: Triple kamera dengan 50MP (utama, OIS), 8MP (ultrawide), dan 2MP (makro) <hr>
                        Kamera Depan: 50MP <hr>
                        Baterai: 4600mAh dengan pengisian cepat 66W <hr>
                        Sistem Operasi: Android 13 dengan Funtouch OS 13 <hr>
                        Fitur Lain: Sensor sidik jari di bawah layar, NFC, dan USB Type-C. <hr></p>
                    <p>Harga: Rp 5.768.000</p>
                    <button class="btn-buy">Beli Sekarang</button>
                </div>
            </div>
        </section>

        <section id="about">
            <h2>About Me</h2>
            <p><b>Muh Agill Firmansyah</b></p>
            <p><b>NIM:</b> 2309106018</p>
            <p><b>Kelas:</b> A'23</p>
            <p>Kami menyediakan berbagai macam HP berkualitas dengan harga terjangkau.</p>
        </section>

        <section id="contact">
            <h2>Kontak</h2>
            <p>Email: info@tokohp.com</p>
            <p>Telepon: 0812-3456-7890</p>
            <p>Alamat: Jl. lama No. 123, Kota Baru</p>
        </section>
    </main>

    <footer>
        <p>© 2024 Toko HP</p>
        <div class="social-icons">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
    </footer>

    <div id="popup" class="popup">
        <div class="popup-content">
            <span class="close-btn" id="close-btn">×</span>
            <p style="color: darkgreen;">Diskon 50% untuk pembelian pertama!</p>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>

