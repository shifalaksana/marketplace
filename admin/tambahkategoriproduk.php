<section class="content-main">
                <div class="row">
                    <div class="col-9">
                        <div class="content-header">
                            <h2 class="content-title">Tambah Kategori</h2>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h4>Kategori</h4>
                            </div>
                            <div class="card-body">
                                <?php 
                                include "config.php";

                                if (isset($_POST['submit'])) {
                                    $nama = $_POST['nama'];
                                    $sql = mysqli_query($koneksi,"INSERT INTO kategoriproduk (nama) VALUES ('$nama')") or die (mysqli_error($koneksi));
                                    if ($sql){
                                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil ditambahkan</div>';
                                    } else {
                                        echo '<div class="alert alert-error alert-dismissible fade show" role="alert">Gagal ditambahkan</div>';
                                    }
                                }
                                ?>
                                <form action="utama.php?page=tambahkategoriproduk" method="post">
                                    <div class="mb-4">
                                        <label for="nama" name="nama" class="form-label">Tambah Kategori</label>
                                        <input type="text" placeholder="Masukkan nama kategori" required class="form-control" name="nama" />
                                    </div>
                                <!-- row.// -->
                            </div>
                        </div>
                        <div>
                                <button class="btn btn-md rounded font-sm hover-up" name="submit">Add</button>
                                <a href="utama.php?page=kategoriproduk"class="btn btn-light rounded font-sm mr-5 text-body hover-up">Kembali</a>
                            </div>
                        <!-- card end// -->
                    </div>
                </div>
            </section>