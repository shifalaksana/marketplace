<?php
include 'config.php'; // Ensure the database connection is established

// Fetch all categories
$categoryQuery = "SELECT id, nama FROM kategoriproduk";
$categoryResult = mysqli_query($koneksi, $categoryQuery);

// Define product number dynamically
$countQuery = "SELECT COUNT(*) AS total FROM produk";
$countResult = mysqli_query($koneksi, $countQuery);
$countRow = mysqli_fetch_assoc($countResult);
$productNumber = $countRow['total'] + 1;

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Ensure category ID is in POST
    if (isset($_POST['id'])) {
        $categoryId = $_POST['id'];
    } else {
        // Handle missing category ID
        echo '<div style="color:red">Please select a category.</div>';
        exit;
    }

    // Retrieve other data from form
    $productName = $_POST['nama_produk'];
    $description = $_POST['deskripsi'];
    $price = $_POST['harga'];
    $stock = $_POST['stok'];

    // Handle image upload
    $imageName = $_FILES['gambar']['name'];
    $targetDir = "../upload/";
    $targetFile = $targetDir . basename($imageName);

    if (move_uploaded_file($_FILES['gambar']['tmp_name'], $targetFile)) {
        // Insert data into the product table
        $insertQuery = "INSERT INTO produk (id, nama_produk, deskripsi, harga, stok, gambar) 
                        VALUES ('$categoryId', '$productName', '$description', '$price', '$stock', '$imageName')";
        $insertResult = mysqli_query($koneksi, $insertQuery);

        if ($insertResult) {
            echo '<script>alert("Product added successfully."); document.location="utama.php?page=produk";</script>';
        } else {
            echo '<div style="color:red">Failed to add product.</div>';
        }
    } else {
        echo '<div style="color:red">Failed to upload image.</div>';
    }
}
?>

<section class="content-main">
    <div class="row">
        <div class="col-9">
            <div class="content-header">
                <h2 class="content-title">Add New Product</h2>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Basic Information</h4>
                </div>
                <form action="utama.php?page=tambahproduk" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="mb-4">
                            <label for="no" class="form-label">No</label>
                            <input type="text" placeholder="Auto-generated number" class="form-control" value="<?php echo $productNumber; ?>" disabled />
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Category</label>
                            <select name="id" class="form-control" required>
                                <option value="" disabled selected>Select category</option>
                                <?php
                                // Loop to display each category as an option
                                while ($categoryRow = mysqli_fetch_assoc($categoryResult)) {
                                    echo "<option value='" . htmlspecialchars($categoryRow['id']) . "'>" . htmlspecialchars($categoryRow['nama']) . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Product Name</label>
                            <input type="text" name="nama_produk" placeholder="Enter product name" class="form-control" />
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Description</label>
                            <textarea name="deskripsi" placeholder="Enter product description" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Price</label>
                            <input type="number" name="harga" placeholder="Enter price" class="form-control" />
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Stock</label>
                            <input type="number" name="stok" placeholder="Enter stock quantity" class="form-control" />
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Image</label>
                            <input type="file" name="gambar" class="form-control" accept="image/*" />
                        </div>
                    </div>
                    <div>
                        <button type="submit" name="submit" class="btn btn-md rounded font-sm hover-up">Save</button>
                        <a href="utama.php?page=produk" class="btn btn-light rounded font-sm mr-5 text-body hover-up">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>