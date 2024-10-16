<?php
session_start();
include('config.php');

$id = null;
$nama = '';
$harga = '';
$file_path = '';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM produk WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    if ($row = mysqli_fetch_assoc($result)) {
        $nama = $row['nama'];
        $harga = $row['harga'];
        $file_path = $row['file_path'];
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];

    // Upload file
    $target_dir = "uploads/";
    $timestamp = date("Y-m-d H.i.s"); // Format penamaan file
    $file_extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
    $target_file = $target_dir . $timestamp . '.' . $file_extension;

    // Batas maksimal ukuran file (5MB)
    $max_file_size = 5 * 1024 * 1024;

    if ($_FILES["file"]["size"] > $max_file_size) {
        echo "Ukuran file terlalu besar. Maksimal ukuran file adalah 5MB.";
        exit();
    }

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        if ($id) {
            $sql = "UPDATE produk SET nama='$nama', harga='$harga', file_path='$target_file' WHERE id='$id'";
        } else {
            $sql = "INSERT INTO produk (nama, harga, file_path) VALUES ('$nama', '$harga', '$target_file')";
        }

        if (mysqli_query($conn, $sql)) {
            // Redirect ke daftar produk setelah berhasil menambah atau mengedit
            header("Location: read.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Error saat mengupload file.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $id ? 'Edit Produk' : 'Tambah Produk'; ?></title>
    <link rel="stylesheet" href="crud.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo">Toko HP</div>
            <div class="menu">
                <a href="index.php">Home</a>
                <a href="read.php">Daftar Produk</a>
                <a href="logout.php">Logout</a>
            </div>
        </nav>
    </header>

    <div class="form-section">
        <h2><?php echo $id ? 'Edit Produk' : 'Tambah Produk'; ?></h2>
        <form method="POST" enctype="multipart/form-data">
            <label for="nama">Nama Produk:</label>
            <input type="text" name="nama" required value="<?= htmlspecialchars($nama); ?>">
            
            <label for="harga">Harga:</label>
            <input type="number" name="harga" required value="<?= htmlspecialchars($harga); ?>">
            
            <label for="file">Upload File:</label>
            <input type="file" name="file" required>
            
            <button type="submit">Simpan</button>
        </form>
    </div>
</body>
</html>
