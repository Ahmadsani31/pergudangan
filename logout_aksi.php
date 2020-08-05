<?php 
// mengaktifkan session php
session_start();

// menghapus semua session
unset($_SESSION['level']);
session_destroy();

// mengalihkan halaman ke halaman login
echo "<META HTTP-EQUIV='Refresh' Content='0; URL=login.php'>";
?>