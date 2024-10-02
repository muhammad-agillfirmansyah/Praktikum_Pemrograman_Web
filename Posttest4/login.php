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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    echo "<h2>Login Successful!</h2>";
    echo "<p>Email: " . htmlspecialchars($email) . "</p>";
    echo "<p>Password: " . htmlspecialchars($password) . "</p>";

    // After successful login, redirect to Toko HP
    header("Location: index.php");
    exit();
}
?>