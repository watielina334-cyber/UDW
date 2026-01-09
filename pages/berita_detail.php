<?php
include "config/database.php";

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$query = mysqli_query($koneksi, "SELECT * FROM berita WHERE id = $id");
$data  = mysqli_fetch_assoc($query);

if (!$data) {
  echo "<div style='max-width:900px;margin:40px auto;padding:20px;background:#fff;border-radius:12px;box-shadow:0 10px 24px rgba(0,0,0,.08)'>
          <p>Berita tidak ditemukan.</p>
          <a href='index.php?page=berita'>← Kembali ke Berita</a>
        </div>";
  exit;
}
?>

<div class="berita-detail">
  <div class="berita-detail-card">
    <a class="back-link" href="index.php?page=berita">← Kembali ke Berita</a>

    <h1 class="berita-title"><?php echo $data['judul']; ?></h1>

    <?php if (!empty($data['foto'])) { ?>
      <img class="berita-img" src="assets/img/<?php echo $data['foto']; ?>" alt="<?php echo $data['judul']; ?>">
    <?php } ?>

    <div class="berita-content">
      <?php echo nl2br($data['isi']); ?>
    </div>
  </div>
</div>
