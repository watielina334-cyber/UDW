<?php
include "cek_login.php";
include "../config/database.php";

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id > 0) {
  mysqli_query($koneksi, "DELETE FROM berita WHERE id=$id");
}
header("Location: berita_data.php");
