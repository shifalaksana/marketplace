<?php
if(isset($_GET['id_produk'])){
    include 'configpembeli.php'; // pastikan file ini mengandung informasi koneksi ke database
    session_start();

    $id_produk = $_GET['id_produk'];
    $id_pembeli = $_SESSION['id_pembeli'];

    // Add to cart
    $sql = $koneksi->prepare("
        DELETE FROM `cart` WHERE id_produk = ? AND id_pembeli = ?
    ");
    $sql->bind_param("ii", $id_produk, $id_pembeli);

    // Execute the statement
    $sql->execute() or die($koneksi->error);

    header("Location: cart.php");
}
