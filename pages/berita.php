<?php
include "config/database.php";
$query = mysqli_query($koneksi, "SELECT * FROM berita ORDER BY id DESC");
?>

<h3>Berita Terbaru</h3>

<div class="berita-list">
<?php while ($data = mysqli_fetch_assoc($query)) { ?>       <!-- mysqli_fetch_assoc: Mengambil 1 baris data dari hasil query Bentuknya array asosiatif -->
    
  <div class="berita-card">
    <a href="index.php?page=berita_detail&id=<?php echo $data['id']; ?>">
      <h4><?php echo $data['judul']; ?></h4>
      <p>
        <?php echo substr(strip_tags($data['isi']), 0, 120); ?>...      <!-- substr: Mengambil 120 karakter pertama Dipakai sebagai preview / ringkasan -->
      </p>
      <span class="baca">Baca selengkapnya →</span>
      <!-- <span> adalah elemen HTML inline yang digunakan untuk memberi gaya atau menandai sebagian kecil teks tanpa memengaruhi struktur layout.-->
    </a>
  </div>

<?php } ?>
</div>
