<?php
include "config/database.php";

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$query = mysqli_query($koneksi, "SELECT * FROM fakultas WHERE id = $id");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "<h3>Data fakultas tidak ditemukan.</h3>";
    exit;
}
?>

<div class="detail-wrap">

    <div class="detail-header">
        <h1><?php echo $data['nama_fakultas']; ?></h1>
        <p class="detail-subtitle">Informasi lengkap fakultas</p>
    </div>

    <div class="detail-grid">

        <div class="detail-card detail-main">
            <h2>Sejarah / Deskripsi</h2>
            <p class="detail-text"><?php echo nl2br($data['deskripsi']); ?></p>
        </div>

        <div class="detail-card detail-side">
            <div class="detail-block">
                <h3>Program Studi</h3>
                <p><?php echo nl2br($data['program_studi']); ?></p>
            </div>

            <div class="detail-block">
                <h3>Kontak</h3>
                <p><?php echo nl2br($data['kontak']); ?></p>
            </div>

            <a class="detail-btn" href="index.php?page=fakultas">← Kembali ke Daftar Fakultas</a>
        </div>

    </div>
</div>