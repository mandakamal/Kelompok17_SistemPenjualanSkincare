<?php
include 'config.php';
include 'navbar.php';
session_start();

if (!isset($_SESSION['keranjang'])) {
  $_SESSION['keranjang'] = [];
}

// Tambahkan produk ke keranjang
if (isset($_GET['add'])) {
  $id = $_GET['add'];
  if (!isset($_SESSION['keranjang'][$id])) {
    $_SESSION['keranjang'][$id] = 1;
  } else {
    $_SESSION['keranjang'][$id]++;
  }
}

// Hapus produk
if (isset($_GET['hapus'])) {
  $id = $_GET['hapus'];
  unset($_SESSION['keranjang'][$id]);
}

// Konfirmasi pesanan
$show_thankyou = false;
if (isset($_GET['konfirmasi'])) {
  $_SESSION['keranjang'] = [];
  $show_thankyou = true;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Keranjang Belanja - MN Beauty</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>

<section class="py-5">
  <div class="container">
    <h3 class="text-center mb-4">🛒 Keranjang Belanja</h3>

    <?php if ($show_thankyou): ?>
      <div class="alert alert-success text-center">
        <strong>TERIMA KASIH SUDAH BERBELANJA DI MN BEAUTY 💕</strong>
      </div>
    <?php endif; ?>

    <?php if (!empty($_SESSION['keranjang'])): ?>
    <table class="table table-bordered align-middle text-center bg-white shadow-sm">
      <thead class="table-pink">
        <tr>
          <th>Nama Produk</th>
          <th>Harga</th>
          <th>Jumlah</th>
          <th>Subtotal</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $total = 0;
        foreach ($_SESSION['keranjang'] as $id => $qty):
          $res = mysqli_query($conn, "SELECT * FROM produk WHERE id = $id");
          $produk = mysqli_fetch_assoc($res);
          $subtotal = $produk['harga'] * $qty;
          $total += $subtotal;
        ?>
        <tr>
          <td><?= $produk['nama'] ?></td>
          <td>Rp <?= number_format($produk['harga']) ?></td>
          <td><?= $qty ?></td>
          <td>Rp <?= number_format($subtotal) ?></td>
          <td><a href="keranjang.php?hapus=<?= $id ?>" class="btn btn-sm btn-danger">Hapus</a></td>
        </tr>
        <?php endforeach; ?>
        <tr>
          <td colspan="3" class="text-end"><strong>Total</strong></td>
          <td colspan="2"><strong>Rp <?= number_format($total) ?></strong></td>
        </tr>
      </tbody>
    </table>

    <div class="text-center mt-3">
      <a href="keranjang.php?konfirmasi=true" class="btn btn-success px-4">Konfirmasi Pesanan</a>
    </div>

    <?php else: ?>
      <p class="text-center text-muted">Keranjang kamu masih kosong 🛍️</p>
    <?php endif; ?>
  </div>
</section>

</body>
</html>
