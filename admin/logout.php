<?php  
session_start(); 
session_destroy(); 
header('Location: index.php'); // Gunakan huruf kapital pada 'Location' dan tidak ada titik dua
exit; // Tambahkan exit untuk menghentikan eksekusi skrip setelah redirect
?>
