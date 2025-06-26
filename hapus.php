<!-- admin/hapus.php -->
<?php
include '../config.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM produk WHERE id=$id");
echo "<script>alert('Produk dihapus');location.href='index.php';</script>";
?>
