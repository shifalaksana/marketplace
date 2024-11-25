<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'configpembeli.php'; // pastikan file ini mengandung informasi koneksi ke database
    session_start();

    $products = $_POST['products']; // Array of products
    $total_price = $_POST['total_price']; // Total price

    // foreach ($products as $id => $product) {
    //     echo "Product ID: $id<br>";
    //     echo "Name: " . $product['name'] . "<br>";
    //     echo "Quantity: " . $product['quantity'] . "<br>";
    //     echo "Price: " . $product['price'] . "<br><hr>";
    // }

    // echo "Total Price: Rp $total_price";

    $id_pembeli = $_SESSION['id_pembeli'];

    // Set values for variables
    $shipping_method = 'JNE';
    $payment_method = 'Bank BCA';

    // Create order
    $sql = $koneksi->prepare("INSERT INTO `order` (id_pembeli, shipping_method, payment_method, total_price) VALUES (?, ?, ?, ?)");
    $sql->bind_param("issd", $id_pembeli, $shipping_method, $payment_method, $total_price);

    // Execute the statement
    $sql->execute() or die($koneksi->error);

    // Get the last inserted order ID
    $id_order = $koneksi->insert_id;

    $fail = false;

    if ($id_order) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil membuat order</div>';
    } else {
        $fail = true;
        echo '<div class="alert alert-error alert-dismissible fade show" role="alert">Gagal membuat order</div>';
    }

    foreach ($products as $id => $product) {
        // Create order detail
        $sql = $koneksi->prepare("INSERT INTO `order_detail` (id_order, id_produk, qty, subtotal) VALUES (?, ?, ?, ?)");
        $sql->bind_param("iiid", $id_order, $id, $product['quantity'], $product['price']);

        // Execute the statement
        $sql->execute() or die($koneksi->error);
        if ($sql) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil membuat order detail</div>';
        } else {
            $fail = true;
            echo '<div class="alert alert-error alert-dismissible fade show" role="alert">Gagal membuat order detail</div>';
        }
    }

    if ($fail == false) {
        header("Location: order_detail.php?id_order=$id_order");
    }
    exit();
}
