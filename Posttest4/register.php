<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Toko HP</title>
    <link rel="stylesheet" href="register_login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="form-box">
            <h2>Create an Account</h2>
            <form action="register.php" method="post">
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" name="name" placeholder="Nama Lengkap" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-phone"></i>
                    <input type="number" name="phone" placeholder="Nomor Telepon" required>
                </div>
                <button type="submit" class="btn">Register</button>
            </form>
            <p class="switch">Sudah punya akun? <a href="login.php">Login</a></p>
        </div>
    </div>
</body>
</html>

<?php
session_start(); // Memulai sesi untuk menyimpan data pengguna

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan data dari form
    $nama = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $telepon = $_POST['phone'];

    // Simpan data di sesi
    $_SESSION['registered_name'] = $nama;
    $_SESSION['registered_email'] = $email;
    $_SESSION['registered_password'] = $password;

    // Menampilkan data yang sudah di-submit
    echo "<div class='container'>";
    echo "<h2>Registrasi Berhasil!</h2>";
    echo "<p><strong>Nama:</strong> " . htmlspecialchars($nama) . "</p>";
    echo "<p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>";
    echo "<p><strong>Nomor Telepon:</strong> " . htmlspecialchars($telepon) . "</p>";
    echo "<p>Anda akan diarahkan ke halaman login sebentar lagi.</p>";
    echo "</div>";

    // Redirect ke halaman login setelah 5 detik
    header("refresh:5;url=login.php");
    exit();
}
?>


