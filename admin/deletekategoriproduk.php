<?php

include "config.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = mysqli_query($koneksi,"DELETE FROM kategoriproduk WHERE id= '$id'") or die (mysqli_error($koneksi));

    if ($sql){
        echo ("<SCRIPT LANGUAGE='JavaScript'> window.alert('Berhasil dihapus!'); window.location.href='utama.php?page=kategoriproduk' </SCRIPT>");
    } else {
        echo ("<SCRIPT LANGUAGE='JavaScript'> window.alert('Gagal dihapus!'); window.location.href='utama.php?page=kategoriproduk' </SCRIPT>");
    }


}



?>