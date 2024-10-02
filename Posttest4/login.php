<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Toko HP</title>
    <link rel="stylesheet" href="register_login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="form-box">
            <h2>Login to Your Account</h2>
            <form action="login.php" method="post">
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="btn">Login</button>
            </form>
            <p class="switch">Belum punya akun? <a href="register.php">Register</a></p>
        </div>
    </div>
</body>
</html>

<?php
session_start(); // Memulai sesi untuk mengakses data pengguna

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data login dari form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Memeriksa apakah email dan password cocok dengan yang didaftarkan
    if ($email == $_SESSION['registered_email'] && $password == $_SESSION['registered_password']) {
        // Login berhasil, redirect ke halaman toko hp
        header("Location: index.php");
        exit();
    } else {
        // Login gagal, tampilkan pesan error
        echo "<div class='container'>";
        echo "<h2>Login Gagal!</h2>";
        echo "<p>Email atau password salah. Silakan coba lagi.</p>";
        echo "<p><a href='login.php'>Kembali ke login</a></p>";
        echo "</div>";
    }
}
?>

