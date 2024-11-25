<!DOCTYPE html>
<html lang="en">

<!-- index28:48-->
<head>
  <?php
  // include "config.php";
  session_start();
  if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    include "indexpembeli.php";
  } else {
  ?>
    <?php
    // Koneksi ke database
    include 'configpembeli.php'; // pastikan file ini mengandung informasi koneksi ke database

    // Ambil cart dari database
    $query = "SELECT * FROM cart c JOIN produk p ON p.id_produk = c.id_produk WHERE c.id_pembeli = " . $_SESSION['id_pembeli'];
    $result = mysqli_query($koneksi, $query);
    $total_harga = 0;
    ?>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Starpowers Marketplace</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/logo biru.png" <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="css/slick.css" />
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="default-style.css">
    <link type="text/css" rel="stylesheet" href="css/style.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->


<body>
  <!-- HEADER -->
  <header>
    <!-- TOP HEADER -->
    <div id="top-header">
      <div class="container">
        <ul class="header-links pull-left">
          <li><a href="#"><i class="fa fa-phone"></i> +62823-2049-2916</a></li>
          <li><a href="#"><i class="fa fa-envelope-o"></i> starpowers@gmail.com</a></li>
          <li><a href="#"><i class="fa fa-map-marker"></i> Jl. Sariasih blok 3 no 9, Bandung</a></li>
        </ul>
        <ul class="header-links pull-right">
          <li><a href="#"><i class="fa fa-dollar"></i> Rp</a></li>
          <li><a href="#"><i class="fa fa-user-o"></i> Akun Saya</a></li>
          <li><a href="logoutpembeli.php" class="text-danger"><i class="material-icons md-exit_to_app"></i> Logout</a></li>
        </ul>
      </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
      <!-- container -->
      <div class="container">
        <!-- row -->
        <div class="row">
          <!-- LOGO -->
          <div class="col-md-3">
            <div class="header-logo">
              <a href="index.php" class="logo">
                <img src="./img/logo putih sp full.png"
                  alt="Logo Starpowers berwarna putih dengan tulisan 'Name White'">
              </a>
            </div>
          </div>
          <!-- /LOGO -->

          <!-- SEARCH BAR -->
          <div class="col-md-6">
            <div class="header-search">
              <form>
                <select class="input-select">
                  <option value="0">All</option>
                  <option value="1">Skincare</option>
                  <option value="1">Bodycare</option>
                  <option value="1">Parfume</option>
                </select>
                <input class="input" placeholder="Search here">
                <button class="search-btn">Search</button>
              </form>
            </div>
          </div>
          <!-- /SEARCH BAR -->

          <!-- ACCOUNT -->
          <div class="col-md-3 clearfix">
            <div class="header-ctn">
              <!-- Wishlist -->
              <div>
                <a href="#">
                  <i class="fa fa-heart-o"></i>
                  <span>Your Wishlist</span>
                  <div class="qty">2</div>
                </a>
              </div>
              <!-- /Wishlist -->

              <!-- Menu Toogle -->
              <div class="menu-toggle">
                <a href="#">
                  <i class="fa fa-bars"></i>
                  <span>Menu</span>
                </a>
              </div>
              <!-- /Menu Toogle -->
            </div>
          </div>
          <!-- /ACCOUNT -->
        </div>
        <!-- row -->
      </div>
      <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
  </header>
  <!-- /HEADER -->

  <!-- SECTION -->
  <div class="section">
    <!-- Container -->
    <div class="container">
      <!-- Row -->
      <div class="row">
        <section class="h-100 h-custom" style="background-color: #FFFFFF;">
          <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
              <div class="col-12">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                  <div class="card-body p-0">
                    <div class="row g-0">
                      <form action="checkout.php" method="post" id="checkout-form">
                        <div class="col-lg-8">
                          <div class="p-5">
                            <div class="d-flex justify-content-between align-items-center mb-5">
                              <h1 class="fw-bold mb-0">Shopping Cart</h1>
                            </div>
                            <hr class="my-4">

                            <?php
                            $total_harga = 0; // Initialize total price
                            while ($row = mysqli_fetch_assoc($result)) {
                              $initial_qty = isset($row['qty']) ? $row['qty'] : 1; // Default to 1 if 'qty' is not set
                              $subtotal = $initial_qty * $row['harga']; // Calculate subtotal for this product
                              $total_harga += $subtotal; // Add to total price
                            ?>
                              <div class="row mb-4 d-flex justify-content-between align-items-center">
                                <!-- Add a checkbox for product selection -->
                                <div class="col-12">
                                  <label>
                                    <input type="checkbox" class="select-product" name="products[<?php echo $row['id_produk']; ?>][selected]" value="1" data-price="<?php echo $row['harga']; ?>">
                                  </label>
                                </div>
                                <div class="col-md-2 col-lg-2 col-xl-2">
                                  <img src="../upload/<?php echo $row['gambar']; ?>" style="height: 100px; width: 100px;" alt="<?php echo $row['nama_produk']; ?>">
                                  <input type="hidden" name="products[<?php echo $row['id_produk']; ?>][image]" value="<?php echo $row['gambar']; ?>">
                                </div>
                                <div class="col-md-3 col-lg-3 col-xl-3">
                                  <h6 class="text-muted">Product</h6>
                                  <h6 class="mb-0"><?php echo $row['nama_produk'] ?></h6>
                                  <input type="hidden" name="products[<?php echo $row['id_produk']; ?>][name]" value="<?php echo $row['nama_produk']; ?>">
                                </div>
                                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                  <button type="button" class="btn btn-link px-2"
                                    onclick="updateQuantity(this, 1, '<?php echo $row['id_produk']; ?>', <?php echo $row['harga']; ?>)">
                                    <i class="fas fa-plus"></i>
                                  </button>
                                  <input id="quantity-<?php echo $row['id_produk']; ?>"
                                    min="1" name="products[<?php echo $row['id_produk']; ?>][quantity]"
                                    value="<?php echo $initial_qty; ?>" type="number"
                                    class="form-control form-control-sm quantity-input"
                                    onchange="updatePrice('<?php echo $row['id_produk']; ?>', <?php echo $row['harga']; ?>)" />
                                  <button type="button" class="btn btn-link px-2"
                                    onclick="updateQuantity(this, -1, '<?php echo $row['id_produk']; ?>', <?php echo $row['harga']; ?>)">
                                    <i class="fas fa-minus"></i>
                                  </button>
                                </div>
                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                  <h6 class="mb-0" id="price-<?php echo $row['id_produk']; ?>">Rp <?php echo number_format($subtotal, 0, '.', ','); ?></h6>
                                  <input type="hidden" name="products[<?php echo $row['id_produk']; ?>][price]" value="<?php echo $subtotal ?>">
                                </div>
                                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                  <a href="delete_cart.php?id_produk=<?php echo $row['id_produk']; ?>" class="text-muted"><i class="fas fa-times"></i></a>
                                </div>
                              </div>
                              <hr class="my-4">
                            <?php
                            }
                            ?>

                          </div>
                        </div>
                        <div class="col-lg-4 bg-body-tertiary">
                          <div class="p-5">

                            <hr class="my-4">

                            <div class="d-flex justify-content-between mb-5">
                              <h5 class="text-uppercase">Total price</h5>
                              <h5 id="total-price">Rp <?php echo number_format($total_harga, 0, '.', ','); ?></h5>
                              <input type="hidden" id="hidden-total-price" name="total_price" value="<?php echo $total_harga; ?>">
                            </div>

                            <button type="submit" class="btn btn-dark btn-block btn-lg">Checkout</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <!-- /Row -->
    </div>
    <!-- /Container -->
  </div>
  <!-- /SECTION -->

  <!-- jQuery Plugins -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/slick.min.js"></script>
  <script src="js/nouislider.min.js"></script>
  <script src="js/jquery.zoom.min.js"></script>
  <script src="js/main.js"></script>

</body>

</html>
<?php } ?>
<script>
  // Initialize total price to 0 before selection
  function updateTotalPrice() {
    let totalPrice = 0;

    // Loop through all selected products and sum their prices
    document.querySelectorAll('.select-product:checked').forEach(checkbox => {
      const productId = checkbox.name.split('[')[1].split(']')[0]; // Extract product ID
      const quantityInput = document.getElementById(`quantity-${productId}`);
      const pricePerUnit = parseFloat(checkbox.dataset.price); // Get the price per unit from the checkbox data-price attribute

      if (quantityInput && !isNaN(pricePerUnit)) {
        const currentQuantity = parseInt(quantityInput.value) || 0; // Ensure valid quantity
        totalPrice += currentQuantity * pricePerUnit; // Add product price to total
      }
    });

    // Update the displayed total price
    document.getElementById('total-price').textContent = `Rp ${totalPrice.toLocaleString()}`;
    document.getElementById('hidden-total-price').value = totalPrice;
  }

  // Update quantity and price for each product
  function updateQuantity(button, delta, productId, pricePerUnit) {
    const quantityInput = document.getElementById(`quantity-${productId}`);
    let currentQuantity = parseInt(quantityInput.value);
    currentQuantity = Math.max(1, currentQuantity + delta); // Ensure quantity is at least 1
    quantityInput.value = currentQuantity;

    // Update price for the specific product
    const productPriceElement = document.getElementById(`price-${productId}`);
    const newPrice = currentQuantity * pricePerUnit;
    productPriceElement.textContent = `Rp ${newPrice.toLocaleString()}`;

    updateTotalPrice(); // Update the total price whenever a quantity changes

    // Redirect to update_cart.php with the new quantity
    console.log('currentQuantity:', currentQuantity)
    const url = `update_cart.php?id_produk=${productId}&qty=${currentQuantity}`;
    console.log('url:', url)
    window.location.href = url;
  }

  // Event listener to update total price when a checkbox is toggled
  document.addEventListener('DOMContentLoaded', function() {
    // Ensure initial total price is 0 when the page loads
    updateTotalPrice();

    // Add event listener to all checkboxes for product selection
    document.querySelectorAll('.select-product').forEach(checkbox => {
      checkbox.addEventListener('change', function() {
        updateTotalPrice(); // Recalculate total price when selection changes
      });
    });

    // Add event listener to all quantity inputs for manual text value change
    document.querySelectorAll('.quantity-input').forEach(input => {
      input.addEventListener('change', function() {
        const productId = this.id.split('-')[1]; // Get product ID from input ID
        const pricePerUnit = document.querySelector(`input[name="products[${productId}][selected]"]`).dataset.price;
        updateQuantity(null, 0, productId, parseFloat(pricePerUnit)); // Update the quantity and price
      });
    });
  });
</script>