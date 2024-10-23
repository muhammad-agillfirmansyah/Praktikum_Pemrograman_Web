<?php
include('config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil path file untuk dihapus
    $query = "SELECT file_path FROM produk WHERE id = $id"; // Menggunakan file_path
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $file_to_delete = $row['file_path']; // Menggunakan file_path yang benar

        // Hapus produk dari database
        $query = "DELETE FROM produk WHERE id = $id";
        if (mysqli_query($conn, $query)) {
            // Hapus file dari server
            if (file_exists($file_to_delete)) {
                unlink($file_to_delete);
            }
            echo "Produk berhasil dihapus.";
            header("Location: read.php"); // Redirect ke daftar produk setelah dihapus
            exit();
        } else {
            echo "Error saat menghapus produk: " . mysqli_error($conn);
        }
    } else {
        echo "Produk tidak ditemukan.";
    }
} else {
    echo "ID produk tidak diberikan.";
}
?>
