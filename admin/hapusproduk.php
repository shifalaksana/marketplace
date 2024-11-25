<?php
include 'config.php';

// Memeriksa apakah parameter 'id' ada di URL
if (isset($_GET['id'])) {
    $id_produk = $_GET['id'];

    // Query untuk mengambil data produk berdasarkan ID
    $query = "SELECT * FROM produk WHERE id_produk = '$id_produk'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        // Mengambil data produk yang akan dihapus
        $row = mysqli_fetch_assoc($result);
        $gambar = $row['gambar'];

        // Mengecek apakah gambar digunakan oleh produk lain
        $check_image_query = "SELECT COUNT(*) AS total FROM produk WHERE gambar = '$gambar'";
        $check_image_result = mysqli_query($koneksi, $check_image_query);
        $check_image_data = mysqli_fetch_assoc($check_image_result);

        // Menghapus gambar produk jika hanya digunakan oleh satu produk
        if ($check_image_data['total'] == 1 && !empty($gambar) && file_exists("../upload/" . $gambar)) {
            unlink("../upload/" . $gambar);
        }

        // Query untuk menghapus produk dari tabel
        $delete_query = "DELETE FROM produk WHERE id_produk = '$id_produk'";

        if (mysqli_query($koneksi, $delete_query)) {
            // Jika berhasil dihapus, arahkan ke halaman product list
            header("Location: utama.php?page=produk");
            exit;
        } else {
            // Jika query gagal, tampilkan pesan error
            echo "Error deleting product: " . mysqli_error($koneksi);
        }
    } else {
        echo "Produk tidak ditemukan.";
    }
} else {
    echo "ID produk tidak tersedia.";
}
?>