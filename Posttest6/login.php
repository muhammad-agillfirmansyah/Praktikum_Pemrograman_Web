<?php
session_start(); // Memulai sesi untuk mengakses data pengguna
include('config.php'); // Menghubungkan dengan database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Mencari pengguna di database
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Verifikasi password
        if (password_verify($password, $row['password'])) {
            // Menyimpan data pengguna di sesi
            $_SESSION['username'] = $row['nama'];
            $_SESSION['email'] = $row['email'];
            header("Location: index.php");
            exit();
        } else {
            echo "<div class='container'><p>Password salah!</p></div>";
        }
    } else {
        echo "<div class='container'><p>Email tidak ditemukan!</p></div>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="register_login.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Kata Sandi" required>
            <button type="submit">Masuk</button>
        </form>
        <p>Belum punya akun? <a href="register.php">Daftar</a></p>
    </div>
</body>
</html>
