<?php
include "config/database.php";
$query = mysqli_query($koneksi, "SELECT * FROM berita ORDER BY id DESC");
?>

<h3>Berita Terbaru</h3>

<div class="berita-list">
<?php while ($data = mysqli_fetch_assoc($query)) { ?>
    
  <div class="berita-card">
    <a href="index.php?page=berita_detail&id=<?php echo $data['id']; ?>">
      <h4><?php echo $data['judul']; ?></h4>
      <p>
        <?php echo substr(strip_tags($data['isi']), 0, 120); ?>...
      </p>
      <span class="baca">Baca selengkapnya →</span>
    </a>
  </div>

<?php } ?>
</div>
