<?php
include "cek_login.php";
include "../config/database.php";

/*
====================================================
REVISI UTAMA:
- Cek keberadaan tabel terlebih dahulu
- Jika tidak ada → hentikan eksekusi sebelum SELECT
====================================================
*/

// Cek tabel berita
$cek = mysqli_query($koneksi, "SHOW TABLES LIKE 'berita'");

// JIKA TABEL TIDAK ADA → STOP DI SINI (ANTI FATAL ERROR)
if (mysqli_num_rows($cek) == 0) {
?>
    <h3>Data Berita</h3>

    <div style="padding:15px; background:#f8d7da; color:#721c24;">
        <b>PERHATIAN:</b><br>
        Tabel <b>berita</b> belum tersedia di database <b>dwu_db</b>.
        <br><br>
        Silakan buat tabel berita terlebih dahulu sesuai modul praktikum.
    </div>

    <!--
    📝 TUGAS MAHASISWA:
    1. Buat tabel berita di database MySQL
    2. Tambahkan minimal 2 data berita
    3. Setelah itu refresh halaman ini
    -->

<?php
    exit; // 🔴 PENTING: menghentikan eksekusi sebelum SELECT
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/admin-berita.css">
</head>

<body>
    <h3>Data Berita</h3>

    <a href="berita_tambah.php">+ Tambah Berita</a>
    <hr>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Foto</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;
        $query = mysqli_query($koneksi, "SELECT * FROM berita ORDER BY tanggal DESC");

        while ($data = mysqli_fetch_assoc($query)) {
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['judul']; ?></td>
                <td><?= $data['penulis']; ?></td>
                <td><?= $data['foto']; ?></td>
                <td><?= $data['tanggal']; ?></td>
                <td>
                    <a href="berita_edit.php?id=<?= $data['id']; ?>">Edit</a> |
                    <a href="berita_hapus.php?id=<?= $data['id']; ?>"
                        onclick="return confirm('Yakin ingin menghapus berita ini?')">
                        Hapus
                    </a>
                </td>
            </tr>
        <?php } ?>
    </table>


</body>

</html>