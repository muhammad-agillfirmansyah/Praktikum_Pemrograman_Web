<?php
session_start(); // Memulai sesi untuk menyimpan data pengguna
include('config.php'); // Menghubungkan dengan database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Enkripsi password
    $telepon = $_POST['phone'];

    // Menyimpan data pengguna di database
    $sql = "INSERT INTO users (nama, email, password, telepon) VALUES ('$nama', '$email', '$password', '$telepon')";
    if (mysqli_query($conn, $sql)) {
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
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="register_login.css">
</head>
<body>
    <div class="container">
        <h2>Registrasi</h2>
        <form action="register.php" method="POST">
            <input type="text" name="name" placeholder="Nama Lengkap" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Kata Sandi" required>
            <input type="number" name="phone" placeholder="Nomor Telepon" required>
            <button type="submit">Daftar</button>
        </form>
        <p>Sudah punya akun? <a href="login.php">Login</a></p>
    </div>
</body>
</html>
