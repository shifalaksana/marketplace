<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'configpembeli.php'; // pastikan file ini mengandung informasi koneksi ke database
    session_start();

    $id_pembeli = $_SESSION['id_pembeli'];
    $id_produk = $_POST['id_produk']; 
    $qty = isset($_POST['qty']) ? $_POST['qty']  : 1;

    // Add to cart
    $sql = $koneksi->prepare("
        INSERT INTO `cart` (id_produk, id_pembeli, qty)
        VALUES (?, ?, ?)
        ON DUPLICATE KEY UPDATE qty = qty + VALUES(qty)
    ");
    $sql->bind_param("iii", $id_produk, $id_pembeli, $qty);

    // Execute the statement
    $sql->execute() or die($koneksi->error);

    // Get the last inserted order ID
    $id_cart = $koneksi->insert_id;

    header("Location: cart.php");
}
