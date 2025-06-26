<?php include 'navbar.php'; ?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kontak - MN Beauty</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>

<section class="py-5">
  <div class="container">
    <h3 class="text-center mb-4">Hubungi Kami</h3>
    <div class="row justify-content-center">
      <div class="col-md-6">
        <form>
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" placeholder="Masukkan nama Anda" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="example@email.com" required>
          </div>
          <div class="mb-3">
            <label for="pesan" class="form-label">Pesan</label>
            <textarea class="form-control" id="pesan" rows="4" placeholder="Tulis pesan Anda di sini..." required></textarea>
          </div>
          <button type="submit" class="btn btn-pink w-100">Kirim Pesan</button>
        </form>
      </div>
    </div>

    <div class="text-center mt-5">
      <p><i class="fas fa-envelope"></i> Email: cs@mnbeauty.com</p>
      <p><i class="fas fa-phone"></i> WhatsApp: 0812-3456-7890</p>
      <p><i class="fas fa-map-marker-alt"></i> Alamat: Jl. Anggrek No. 123, Jakarta</p>
    </div>
  </div>
</section>

</body>
</html>
