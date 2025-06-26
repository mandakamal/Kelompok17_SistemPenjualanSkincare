<!-- admin/edit.php -->
<?php include '../config.php';
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM produk WHERE id=$id")); ?>
<!DOCTYPE html>
<html>
<head><title>Edit Produk</title></head>
<body>
<h2>Edit Produk</h2>
<form method="POST">
  Nama: <input type="text" name="nama" value="<?= $data['nama'] ?>"><br>
  Harga: <input type="number" name="harga" value="<?= $data['harga'] ?>"><br>
  Kategori:
  <select name="kategori">
    <option value="makeup" <?= $data['kategori']=='makeup'?'selected':'' ?>>Makeup</option>
    <option value="skincare" <?= $data['kategori']=='skincare'?'selected':'' ?>>Skincare</option>
  </select><br>
  Best Seller? <input type="checkbox" name="best_seller" value="1" <?= $data['best_seller']?'checked':'' ?>><br>
  <button type="submit" name="update">Update</button>
</form>
<?php
if (isset($_POST['update'])) {
  $nama = $_POST['nama'];
  $harga = $_POST['harga'];
  $kategori = $_POST['kategori'];
  $best = isset($_POST['best_seller']) ? 1 : 0;
  mysqli_query($conn, "UPDATE produk SET nama='$nama', harga='$harga', kategori='$kategori', best_seller='$best' WHERE id=$id");
  echo "<script>alert('Produk diperbarui');location.href='index.php';</script>";
}
?>
</body>
</html>