<?php
include 'config.php';
include 'navbar.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Skincare - MN Beauty</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>

<section class="py-5">
  <div class="container">
    <h3 class="text-center mb-4">BEST SELLER</h3>
    <div class="row">
      <?php
        $res = mysqli_query($conn, "SELECT * FROM produk WHERE kategori='skincare'");
        if (mysqli_num_rows($res) > 0) {
          while ($p = mysqli_fetch_assoc($res)) {
      ?>
      <div class="col-md-4 mb-4">
        <div class="card shadow-sm h-100">
          <div class="card-body text-center">
            <h5 class="card-title"><?= $p['nama'] ?></h5>
            <p class="text-muted">Kategori: <?= ucfirst($p['kategori']) ?></p>
            <p><strong>Rp <?= number_format($p['harga']) ?></strong></p>
            <a href="keranjang.php?add=<?= $p['id'] ?>" class="btn btn-pink">Tambah ke Keranjang</a>
          </div>
        </div>
      </div>
      <?php }} else { ?>
        <p class="text-center">Produk skincare tidak ditemukan.</p>
      <?php } ?>
    </div>
  </div>
</section>

</body>
</html>
