<?php
include 'config.php';

// Query untuk mengambil semua data dari tabel produk
$query = "SELECT id_produk, id, nama_produk, deskripsi, harga, stok, gambar FROM produk";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die("Query gagal: " . mysqli_error($koneksi)); // Menampilkan error jika query gagal
}

if (mysqli_num_rows($result) > 0) {
    // Inisialisasi nomor urut
    $nomor = 1;
?>
<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Product List</h2>
        </div>
        <div>
            <a href="utama.php?page=tambahproduk" class="btn btn-primary btn-sm rounded">Create new</a>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
        <?php
        // Menampilkan data produk dengan penomoran dinamis
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <article class="itemlist">
                <div class="row align-items-center">
                    <div class="col-lg-1 col-sm-1 col-2">
                        <!-- Menampilkan nomor urut produk -->
                        <h6 class="mb-0"><?php echo $nomor++; ?></h6>
                    </div>
                    <div class="col-lg-3 col-sm-3 col-6 col-image">
                        <!-- Menampilkan gambar produk dengan posisi rata kiri -->
                        <?php if (!empty($row['gambar']) && file_exists("../upload/" . $row['gambar'])) { ?>
                            <img src="../upload/<?php echo htmlspecialchars($row['gambar']); ?>" alt="<?php echo htmlspecialchars($row['nama_produk']); ?>" class="img-fluid" style="max-width: 100px; height: auto;">
                        <?php } else { ?>
                            <img src="../assets/images/no-image.png" alt="No image available" class="img-fluid" style="max-width: 100px; height: auto;">
                        <?php } ?>
                    </div>
                    <div class="col-lg-3 col-sm-3 col-6 flex-grow-1 col-name">
                        <a class="itemside" href="#">
                            <div class="info">
                                <h6 class="mb-0"><?php echo htmlspecialchars($row['nama_produk']); ?></h6>
                                <p class="text-muted"><?php echo htmlspecialchars($row['deskripsi']); ?></p>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2 col-sm-2 col-4 col-price">
                        <span>Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></span>
                    </div>
                    <div class="col-lg-2 col-sm-2 col-4 col-stock">
                        <span>Stock: <?php echo $row['stok']; ?></span>
                    </div>
                    <div class="col-lg-1 col-sm-1 col-2 col-category">
                        <!-- Menampilkan kategori produk -->
                        <?php
                        // Query untuk mendapatkan nama kategori berdasarkan id_kategori
                        $kategori_query = "SELECT nama FROM kategoriproduk WHERE id = '" . $row['id'] . "'";
                        $kategori_result = mysqli_query($koneksi, $kategori_query);

                        if ($kategori_result && mysqli_num_rows($kategori_result) > 0) {
                            $kategori_row = mysqli_fetch_assoc($kategori_result);
                            echo htmlspecialchars($kategori_row['nama']);
                        } else {
                            echo "No category";
                        }
                        ?>
                    </div>
                </div>
                <!-- Menambahkan tombol Edit dan Delete di bawah gambar -->
                <div class="row">
                    <div class="col-12 col-action text-end">
                        <a href="utama.php?page=editproduk&id=<?php echo $row['id_produk']; ?>" class="btn btn-sm font-sm rounded btn-brand"> 
                            <i class="material-icons md-edit"></i> Edit 
                        </a>
                        <a href="hapusproduk.php?id=<?php echo $row['id_produk']; ?>" class="btn btn-sm font-sm btn-light rounded" onclick="return confirm('Are you sure you want to delete this product?');"> 
                            <i class="material-icons md-delete_forever"></i> Delete 
                        </a>
                    </div>
                </div>
            </article>
            <?php
        }
        ?>
        </div>
    </div>
</section>
<?php
} else {
    echo "Data tidak ditemukan.";
}
?>
<script src="../assets/js/vendors/jquery-3.6.0.min.js"></script>
<script src="../assets/js/vendors/bootstrap.bundle.min.js"></script>
<script src="../assets/js/vendors/select2.min.js"></script>
<script src="../assets/js/vendors/perfect-scrollbar.js"></script>
<script src="../assets/js/vendors/jquery.fullscreen.min.js"></script>
<script src="../assets/js/main.js" type="text/javascript"></script>
</body>
</html>
