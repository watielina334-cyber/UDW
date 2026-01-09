<?php
include "cek_login.php";
include "../config/database.php";

if (isset($_POST['simpan'])) {
    mysqli_query($koneksi,
        "INSERT INTO fakultas 
        (nama_fakultas, deskripsi, program_studi, kontak)
        VALUES (
            '$_POST[nama]',
            '$_POST[deskripsi]',
            '$_POST[prodi]',
            '$_POST[kontak]'
        )"
    );
    header("Location: fakultas_data.php");
}
?>

<div class="form-wrapper">
    <h3>Tambah Fakultas</h3>

    <form method="post">
        <input name="nama" class="form-control" placeholder="Nama Fakultas" required>

        <textarea name="deskripsi" class="form-control" placeholder="Deskripsi" required></textarea>

        <textarea name="prodi" class="form-control" placeholder="Program Studi" required></textarea>

        <input name="kontak" class="form-control" placeholder="Kontak" required>

        <button name="simpan" class="btn-submit">Simpan</button>
    </form>
</div>
<link rel="stylesheet" href="../assets/css/admin-fakultas.css">