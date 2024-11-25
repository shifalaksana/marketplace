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

                                if (isset($_GET['id'])) {
                                    $id = $_GET['id'];

                                    $view = mysqli_query($koneksi,"SELECT * FROM kategoriproduk where id = '$id' ") or die (mysqli_error($koneksi));
                                    $data = mysqli_fetch_assoc($view);
                                
                                }

                                if (isset($_POST['submit'])) {
                                    $nama = $_POST['nama'];
                                    $sql = mysqli_query($koneksi,"UPDATE kategoriproduk set nama = '$nama' where id = '$id' ") or die (mysqli_error($koneksi));
                                    if ($sql){
                                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil ditambahkan</div>';
                                    } else {
                                        echo '<div class="alert alert-error alert-dismissible fade show" role="alert">Gagal ditambahkan</div>';
                                    }
                                }
                                ?>
                                <form action="utama.php?page=editkategoriproduk&id=<?php echo $data['id']; ?>" method="post">
                                    <div class="mb-4">
                                        <label for="nama" name="nama" class="form-label">Tambah Kategori</label>
                                        <input type="text" placeholder="Masukkan nama kategori" required class="form-control"value="<?php echo $data['nama']; ?>" name="nama" />
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