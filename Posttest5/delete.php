<?php
include('config.php'); // Menghubungkan dengan database

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM produk WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        // Redirect ke view.php setelah berhasil menghapus
        header("Location: read.php");
        exit();
    } else {
        echo "Error menghapus data: " . mysqli_error($conn);
    }
} else {
    // Jika tidak ada ID yang dikirimkan, redirect ke view.php
    header("Location: read.php");
    exit();
}
?>
