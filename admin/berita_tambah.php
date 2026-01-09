<?php
include "cek_login.php";
include "../config/database.php";

if (isset($_POST['simpan'])) {

    $judul   = $_POST['judul'];
    $isi     = $_POST['isi'];
    $penulis = $_POST['penulis'];
    $tanggal = $_POST['tanggal'];

    // upload foto
    $namaFoto = null;
    if (!empty($_FILES['foto']['name'])) {
        $ext = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));
        $allow = ['jpg','jpeg','png','webp'];

        if (in_array($ext, $allow)) {
            // bikin nama file unik biar ga ketimpa
            $namaFoto = 'berita_' . date('Ymd_His') . '_' . rand(1000,9999) . '.' . $ext;

            // folder simpan
            $folder = "../assets/img/berita/";
            if (!is_dir($folder)) {
                mkdir($folder, 0777, true);
            }

            move_uploaded_file($_FILES['foto']['tmp_name'], $folder . $namaFoto);
        }
    }

    mysqli_query($koneksi,
        "INSERT INTO berita (judul, isi, penulis, tanggal, foto)
         VALUES ('$judul', '$isi', '$penulis', '$tanggal', " . ($namaFoto ? "'$namaFoto'" : "NULL") . ")"
    );

    header("Location: berita_data.php");
}
?>

<link rel="stylesheet" href="../assets/css/admin-berita.css">

<div class="berita-wrapper">
    <h3>Tambah Berita</h3>

    <form method="post" enctype="multipart/form-data">
        <label class="berita-label">Judul Berita</label>
        <input name="judul" class="berita-control" placeholder="Contoh: Pengumuman Libur Semester" required>

        <div class="berita-grid">
            <div>
                <label class="berita-label">Penulis</label>
                <input name="penulis" class="berita-control" placeholder="Nama penulis" required>
            </div>

            <div>
                <label class="berita-label">Tanggal</label>
                <input type="date" name="tanggal" class="berita-control" value="<?= date('Y-m-d'); ?>" required>
            </div>
        </div>

        <label class="berita-label">Isi Berita</label>
        <textarea name="isi" class="berita-control" placeholder="Tulis isi berita..." required></textarea>

        <label class="berita-label">Foto (opsional)</label>
        <input type="file" name="foto" class="berita-control" accept=".jpg,.jpeg,.png,.webp">

        <button name="simpan" class="berita-btn">Simpan</button>
    </form>
</div>
