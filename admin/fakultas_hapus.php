<?php
include "cek_login.php";
include "../config/database.php";

$id = $_GET['id'];              # GET adalah metode HTTP untuk mengirim data lewat URL.
mysqli_query($koneksi, "DELETE FROM fakultas WHERE id='$id'");
header("Location: fakultas_data.php");
