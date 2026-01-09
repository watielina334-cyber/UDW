<?php
include "cek_login.php";
include "../config/database.php";

$id = $_GET['id'];
$data = mysqli_fetch_assoc(
    mysqli_query($koneksi, "SELECT * FROM fakultas WHERE id='$id'")
);

if (isset($_POST['update'])) {
    mysqli_query($koneksi,
        "UPDATE fakultas SET
        nama_fakultas='$_POST[nama]',
        deskripsi='$_POST[deskripsi]',
        program_studi='$_POST[prodi]',
        kontak='$_POST[kontak]'
        WHERE id='$id'"
    );
    header("Location: fakultas_data.php");
}
?>

<div class="form-wrapper">
    <h3>Edit Fakultas</h3>

    <form method="post">
        <input
            type="text"
            name="nama"
            class="form-control"
            value="<?= $data['nama_fakultas']; ?>"
            placeholder="Nama Fakultas"
            required
        >

        <textarea
            name="deskripsi"
            class="form-control"
            placeholder="Deskripsi"
            required
        ><?= $data['deskripsi']; ?></textarea>

        <textarea
            name="prodi"
            class="form-control"
            placeholder="Program Studi"
            required
        ><?= $data['program_studi']; ?></textarea>

        <input
            type="text"
            name="kontak"
            class="form-control"
            value="<?= $data['kontak']; ?>"
            placeholder="Kontak"
            required
        >

        <button name="update" class="btn-submit">Update</button>
    </form>
</div>
<link rel="stylesheet" href="../assets/css/admin-fakultas.css">