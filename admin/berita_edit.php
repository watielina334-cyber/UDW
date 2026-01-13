<?php
include "cek_login.php";
include "../config/database.php";

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) die("ID tidak valid");

$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM berita WHERE id=$id"));

if (isset($_POST['update'])) {
    $judul   = $_POST['judul'] ?? '';
    $penulis = $_POST['penulis'] ?? '';
    $tanggal = $_POST['tanggal'] ?? '';
    $isi     = $_POST['isi'] ?? '';
    $foto_lama = $_POST['foto_lama'] ?? '';

    // kalau upload foto baru
    if (!empty($_FILES['foto']['name'])) {
        $foto = $_FILES['foto']['name'];
        $tmp  = $_FILES['foto']['tmp_name'];

        // folder simpan foto (sesuaikan dengan project kamu)
        move_uploaded_file($tmp, "../assets/img/" . $foto);

        $query = "UPDATE berita SET 
                    judul='$judul',
                    penulis='$penulis',
                    foto='$foto',
                    tanggal='$tanggal',
                    isi='$isi'
                  WHERE id=$id";
    } else {
        // tidak upload foto baru, foto tetap
        $query = "UPDATE berita SET 
                    judul='$judul',
                    penulis='$penulis',
                    tanggal='$tanggal',
                    isi='$isi'
                  WHERE id=$id";
    }

    mysqli_query($koneksi, $query);
    header("Location: berita_data.php");
    exit;
}
?>

<link rel="stylesheet" href="../assets/css/admin-berita.css">
<div class="berita-wrapper">
<h3 class="berita-label">Edit Berita</h3>

<form method="post" enctype="multipart/form-data">              <!-- POST adalah metode HTTP untuk mengirim data secara tersembunyi melalui body request-->
    <input type="hidden" name="foto_lama" value="<?= $data['foto']; ?>">

    <div class="berita-grid">
        <input type="text" name="judul" value="<?= $data['judul']; ?>" class="berita-control" required>
        <input type="text" name="penulis" value="<?= $data['penulis']; ?>" class="berita-control" required>

        <div>
            <small>Foto lama: <?= $data['foto']; ?></small><br>
            <input type="file" name="foto" class="berita-control">
        </div>

        <input type="date" name="tanggal" value="<?= $data['tanggal']; ?>" class="berita-control" required>
    </div>

    <textarea name="isi" class="berita-control" required><?= $data['isi']; ?></textarea>
    <button type="submit" name="update" class="berita-btn">Update</button>
</form>
</div>
