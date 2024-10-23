<?php
include('config.php');

if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $query = "SELECT * FROM produk WHERE nama LIKE '%$search%'";
    $result = mysqli_query($conn, $query);
    
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
        echo "<td>Rp " . number_format($row['harga'], 0, ',', '.') . "</td>";
        echo "<td><a href='{$row['file_path']}' target='_blank'>Lihat File</a></td>";
        echo "<td><a href='cu.php?id={$row['id']}'>Edit</a> | <a href='delete.php?id={$row['id']}' onclick=\"return confirm('Apakah Anda yakin ingin menghapus produk ini?');\">Hapus</a></td>";
        echo "</tr>";
    }
}
?>
