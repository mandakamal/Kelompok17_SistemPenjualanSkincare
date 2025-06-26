<!-- admin/tambah.php -->
<?php include '../config.php'; ?>
<!DOCTYPE html>
<html>
<head><title>Tambah Produk</title></head>
<body>
<h2>Tambah Produk</h2>
<form method="POST" action="">
  Nama: <input type="text" name="nama"><br>
  Harga: <input type="number" name="harga"><br>
  Kategori: <select name="kategori">
    <option value="makeup">Makeup</option>
    <option value="skincare">Skincare</option>
  </select><br>
  Best Seller? <input type="checkbox" name="best_seller" value="1"><br>
  <button type="submit" name="simpan">Simpan</button>
</form>
<?php
if (isset($_POST['simpan'])) {
  $nama = $_POST['nama'];
  $harga = $_POST['harga'];
  $kategori = $_POST['kategori'];
  $best = isset($_POST['best_seller']) ? 1 : 0;
  mysqli_query($conn, "INSERT INTO produk(nama, harga, kategori, best_seller) VALUES('$nama', '$harga', '$kategori', '$best')");
  echo "<script>alert('Produk ditambahkan');location.href='index.php';</script>";
}
?>
</body>
</html>