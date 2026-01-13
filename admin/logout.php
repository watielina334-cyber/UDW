<?php
session_start();                        # session_start: Memulai atau melanjutkan session yang sedang aktif
session_destroy();                      # Menghapus semua data session dan User dianggap sudah logout
header("Location: login.php");
exit;
