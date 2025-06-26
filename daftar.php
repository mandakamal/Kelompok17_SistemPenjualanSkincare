<?php
include 'config.php';

$success = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nama = $_POST['nama'];
  $email = $_POST['email'];

  $insert = mysqli_query($conn, "INSERT INTO user (nama, email) VALUES ('$nama', '$email')");
  if ($insert) {
    $success = "Berhasil mendaftar! Terima kasih, $nama 🩷";
  } else {
    $success = "Gagal mendaftar. Silakan coba lagi.";
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Pendaftaran - MN Beauty</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'navbar.php'; ?>

<section class="py-5">
  <div class="container">
    <h3 class="text-center mb-4">Form Pendaftaran</h3>

    <?php if ($success): ?>
      <div class="alert alert-success text-center">
        <?= $success ?>
      </div>
    <?php endif; ?>

    <div class="row justify-content-center">
      <div class="col-md-6">
        <form method="POST">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" name="nama" id="nama" required>
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Alamat Email</label>
            <input type="email" class="form-control" name="email" id="email" required>
          </div>

          <button type="submit" class="btn btn-pink w-100">Daftar</button>
        </form>
      </div>
    </div>
  </div>
</section>

</body>
</html>
