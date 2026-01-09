<?php include "cek_login.php"; ?>

<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard Admin</title>
  <link rel="stylesheet" href="../assets/css/admin-dashboard.css">
</head>
<body>

  <div class="admin-wrap">
    <div class="admin-card">
      <h3 class="admin-title">Dashboard Admin</h3>
      <p class="admin-subtitle">Selamat datang, <b><?= $_SESSION['admin']; ?></b></p>

      <ul class="admin-menu">
        <li><a class="btn btn-primary" href="fakultas_data.php">Kelola Fakultas</a></li>
        <li><a class="btn btn-primary" href="berita_data.php">Kelola Berita</a></li>
        <li><a class="btn btn-danger" href="logout.php">Logout</a></li>
      </ul>
    </div>
  </div>

</body>
</html>
