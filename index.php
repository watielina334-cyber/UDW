<?php
include "pages/header.php";

$page = isset($_GET['page']) ? $_GET['page'] : "home";
$file = "pages/" . $page . ".php";

echo '<div class="content">';  // pembungkus konten (buat dorong footer)
if (file_exists($file)) {
    include $file;
} else {
    echo "<h3>Halaman tidak ditemukan</h3>";
}
echo '</div>';

include "pages/footer.php";
?>
