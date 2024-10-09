<?php
include('config.php'); // Menghubungkan dengan database

// Inisialisasi variabel
$nama = $harga = '';
$id = 0;

// Jika ada parameter id di URL, artinya ingin mengedit produk
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM produk WHERE id=$id");
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $nama = $row['nama'];
        $harga = $row['harga'];
    }
}

// Jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];

    if (isset($_POST['id']) && !empty($_POST['id'])) {
        // Update produk
        $id = $_POST['id'];
        $sql = "UPDATE produk SET nama='$nama', harga='$harga' WHERE id='$id'";
    } else {
        // Tambah produk baru
        $sql = "INSERT INTO produk (nama, harga) VALUES ('$nama', '$harga')";
    }

    if (mysqli_query($conn, $sql)) {
        // Redirect ke view.php setelah berhasil
        header("Location: read.php");
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
    <title>Form Produk</title>
    <link rel="stylesheet" href="crud.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo">Toko HP</div>
            <div class="menu">
                <a href="index.php">Home</a>
                <a href="read.php">Produk</a>
                <a href="cu.php">Tambah Produk</a>
                <a href="logout.php">Logout</a>
            </div>
        </nav>
    </header>

    <section class="form-section">
        <h2><?= ($id > 0) ? 'Edit Produk' : 'Tambah Produk'; ?></h2>
        <form action="cu.php" method="POST">
            <input type="hidden" name="id" value="<?= $id; ?>">
            <label for="nama">Nama Produk:</label>
            <input type="text" name="nama" value="<?= htmlspecialchars($nama); ?>" required><br>
            <label for="harga">Harga:</label>
            <input type="number" name="harga" value="<?= htmlspecialchars($harga); ?>" required><br>
            <button type="submit"><?= ($id > 0) ? 'Update Produk' : 'Tambah Produk'; ?></button>
        </form>
    </section>
</body>
</html>
