<?php
include('config.php'); // Menghubungkan dengan database

// Query untuk mengambil semua produk
$query = "SELECT * FROM produk";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
    <link rel="stylesheet" href="crud.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo">Toko HP</div>
            <div class="menu">
                <a href="index.php">Home</a>
                <a href="cu.php">Tambah Produk</a>
                <a href="logout.php">Logout</a>
            </div>
        </nav>
    </header>

    <section class="product-section">
        <h2>Daftar Produk</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>File</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= htmlspecialchars($row['nama']); ?></td>
                    <td>Rp <?= number_format($row['harga'], 0, ',', '.'); ?></td>
                    <td><a href="<?= $row['file_path']; ?>" target="_blank">Lihat File</a></td>
                    <td>
                        <a href="cu.php?id=<?= $row['id']; ?>">Edit</a> | 
                        <a href="delete.php?id=<?= $row['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </section>
</body>
</html>