<section class="content-main">
                <div class="content-header">
                    <div>
                        <h2 class="content-title card-title">Kategori Produk</h2>
                        <p>List Kategori Produk</p>
                    </div>
                    <div>
                        <a href="utama.php?page=tambahkategoriproduk" class="btn btn-primary btn-sm rounded">Tambah Data</a>
                    </div>
                </div>
                <div class="card mb-4">
                    <header class="card-header">
                        <div class="row align-items-center">
                            <div class="col col-check flex-grow-0">
                            </div>
                        </div>
                    </header>
                    <!-- card-header end// -->
                    <div class="card-body">
                    <?php
                            include "config.php";
                            
                            $no=1;
                            $sql = mysqli_query($koneksi, "SELECT * FROM kategoriproduk ORDER BY id") or die(mysqli($koneksi));
                            while ($data = mysqli_fetch_assoc($sql)) {
                        ?>
                        <article class="itemlist">
                            <div class="row align-items-center">
                                <div class="col col-check flex-grow-0">
                                    <div class="form-check">
                                        <?php echo $no++; ?>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4 col-8 flex-grow-1 col-name">
                                    <a class="itemside" href="#">
                                        <div class="info">
                                            <h6 class="mb-0"><?php echo $data['nama']; ?></h6>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-2 col-sm-2 col-4 col-action text-end">
                                    <a href="utama.php?page=editkategoriproduk&id=<?php echo $data['id']; ?>" class="btn btn-sm font-sm rounded btn-brand"> <i class="material-icons md-edit"></i> Edit </a>
                                    <a href="utama.php?page=deletekategoriproduk&id=<?php echo $data['id']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-sm font-sm btn-light rounded"> <i class="material-icons md-delete_forever"></i> Delete </a>
                                </div>
                            </div>
                            <!-- row .// -->
                        </article>
                        <?php } ?>
                        <!-- itemlist  .// -->
                        
                        <!-- itemlist  .// -->
                    </div>
                    <!-- card-body end// -->
                </div>
                <!-- card end// -->
                
            </section>