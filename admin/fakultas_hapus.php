<?php
include "cek_login.php";
include "../config/database.php";

$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM fakultas WHERE id='$id'");
header("Location: fakultas_data.php");
