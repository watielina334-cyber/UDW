<?php include "config/database.php"; ?>

<h3>Daftar Fakultas</h3>
<ul class="fakultas-list">
    <?php
    $query = mysqli_query($koneksi, "SELECT * FROM fakultas");
    while ($data = mysqli_fetch_assoc($query)) {

        // nama fakultas + logonya
        $logo = "assets/img/default.png";

        if ($data['nama_fakultas'] == "Fakultas Pertanian") {
            $logo = "assets/img/logo-faperta.png";
        } elseif ($data['nama_fakultas'] == "Fakultas Teknologi Bisnis dan Sains") {
            $logo = "assets/img/logo-ftbs.png";
        } elseif ($data['nama_fakultas'] == "Fakultas Ilmu Kesehatan") {
            $logo = "assets/img/fak-kes.png";
        } elseif ($data['nama_fakultas'] == "Fakultas Ilmu Sosial dan Ilmu Politik") {
            $logo = "assets/img/logo-fisip.png";
        }

    ?>

        <!-- agar foto bisa mengarah ke fakultas detail -->
        <li class="fakultas-card">
            <a class="fakultas-link" href="index.php?page=fakultas_detail&id=<?php echo $data['id']; ?>">
                <img src="<?php echo $logo; ?>" alt="<?php echo $data['nama_fakultas']; ?>">
                <p><?php echo $data['nama_fakultas']; ?></p>
            </a>
        </li>

    <?php } ?>
</ul>
<link rel="stylesheet" href="assets/css/style.css">