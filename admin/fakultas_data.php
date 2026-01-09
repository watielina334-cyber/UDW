<?php
include "cek_login.php";
include "../config/database.php";
?>
<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Data Fakultas</title>
    <link rel="stylesheet" href="../assets/css/admin-data.css">
</head>

<body>

    <div class="page">
        <h3>Data Fakultas</h3>

        <a class="btn-add" href="fakultas_tambah.php">+ Tambah Fakultas</a>
        <hr>

        <div class="table-wrap">
            <table class="table">
                <tr>
                    <th>No</th>
                    <th>Nama Fakultas</th>
                    <th>Deskripsi Fakultas</th>
                    <th>Prodi</th>
                    <th>Kontak</th>
                    <th>Aksi</th>
                </tr>

                <?php
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM fakultas");
                while ($data = mysqli_fetch_assoc($query)) {
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $data['nama_fakultas']; ?></td>
                        <td><?= $data['deskripsi']; ?></td>
                        <td><?= $data['program_studi']; ?></td>
                        <td><?= $data['kontak']; ?></td>
                        <td>
                            <a class="link-edit" href="fakultas_edit.php?id=<?= $data['id']; ?>">Edit</a>
                            <span class="sep">|</span>
                            <a class="link-del" href="fakultas_hapus.php?id=<?= $data['id']; ?>"
                                onclick="return confirm('Hapus data?')">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>

</body>

</html>