<!-- index.php -->
<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>MN Beauty - Tampil Cantik Setiap Hari</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'navbar.php'; ?>

<!-- Hero Banner -->
<section class="hero-banner text-center py-5">
  <div class="container">
    <img src="logo.jpg" alt="Logo MN Beauty" class="img-fluid w-25">
    <h2 class="mt-4">Flash Sale Skincare & Makeup</h2>
    <p>Dapatkan diskon besar setiap hari hanya di MN Beauty!</p>
    <a href="makeup.php" class="btn btn-pink">Lihat Produk</a>
  </div>
</section>

<!-- Produk Unggulan -->
<section class="produk-unggulan py-5 bg-light">
  <div class="container">
    <h3 class="text-center mb-4">Best Seller Kami</h3>
    <div class="row">
      <?php
        $res = mysqli_query($conn, 'SELECT * FROM produk WHERE best_seller=1 LIMIT 3');


        while ($p = mysqli_fetch_assoc($res)) {
      ?>
      <div class="col-md-4 mb-3">
        <div class="card shadow-sm h-100">
          <div class="card-body text-center">
            <h5><?= $p['nama'] ?></h5>
            <p class="text-muted">Kategori: <?= ucfirst($p['kategori']) ?></p>
            <p><strong>Rp <?= number_format($p['harga']) ?></strong></p>
            <a href="keranjang.php?add=<?= $p['id'] ?>\" class="btn btn-sm btn-pink\">Tambah ke Keranjang</a>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</section>

<!-- Footer -->
<footer class="text-center py-4 bg-pink text-white">
  <p>© 2025 MN Beauty | Tampil Cantik & Percaya Diri</p>
</footer>

</body>
</html>

