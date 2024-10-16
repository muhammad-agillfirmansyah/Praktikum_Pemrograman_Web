<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="crud.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo">Toko HP</div>
            <div class="menu">
                <a href="read.php">Daftar Produk</a>
                <a href="logout.php">Logout</a>
            </div>
        </nav>
    </header>

    <section class="form-section">
        <h2>Tambah Produk</h2>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <label for="nama_produk">Nama Produk</label>
            <input type="text" name="nama_produk" required>

            <label for="harga">Harga</label>
            <input type="number" name="harga" required>

            <label for="file_upload">Upload File</label>
            <input type="file" name="file_upload" accept=".jpg,.jpeg,.png,.pdf" required>

            <button type="submit">Tambah Produk</button>
        </form>
    </section>
</body>
</html>
