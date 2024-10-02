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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    echo "<h2>Registration Successful!</h2>";
    echo "<p>Nama: " . htmlspecialchars($name) . "</p>";
    echo "<p>Email: " . htmlspecialchars($email) . "</p>";
    echo "<p>Nomor Telepon: " . htmlspecialchars($phone) . "</p>";

    // After successful registration, redirect to Toko HP
    header("Location: login.php");
    exit();
}
?>