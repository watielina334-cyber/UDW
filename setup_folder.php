<?php
// ===============================
// Script Pembuat Struktur Folder
// ===============================

$folders = [
    'assets/css',
    'assets/js',
    'assets/img',
    'config',
    'pages',
    'admin'
];

$files = [
    'index.php',
    'config/database.php',

    'pages/header.php',
    'pages/footer.php',
    'pages/home.php',
    'pages/profil.php',
    'pages/fakultas.php',
    'pages/fakultas_detail.php',
    'pages/berita.php',
    'pages/berita_detail.php',
    'pages/kontak.php',

    'admin/login.php',
    'admin/dashboard.php',
    'admin/fakultas_data.php',
    'admin/fakultas_tambah.php',
    'admin/fakultas_edit.php',
    'admin/fakultas_hapus.php',
    'admin/berita_data.php',
    'admin/berita_tambah.php',
    'admin/berita_edit.php',
    'admin/berita_hapus.php',
    'admin/logout.php'
];

// Buat folder
foreach ($folders as $folder) {
    if (!is_dir($folder)) {
        mkdir($folder, 0777, true);         //0777 → izin akses (read, write, execute)
        echo "Folder dibuat: $folder <br>";
    }
}

// Buat file
foreach ($files as $file) {
    if (!file_exists($file)) {          //file_exists() → cek file sudah ada atau belum
        file_put_contents($file, "<?php\n// $file\n");
        echo "File dibuat: $file <br>";
    }
}

echo "<hr><strong>Struktur folder berhasil dibuat!</strong>";
?>
