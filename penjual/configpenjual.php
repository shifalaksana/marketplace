<?php
$server = 'localhost';
$username= 'root';
$password = '';
$database = 'db_login';
$koneksi = mysqli_connect($server,$username,$password,$database);
if(mysqli_connect_errno()){
echo 'koneksi gagal';
}
// else {
// echo 'koneksi berhasil';
// }
?>