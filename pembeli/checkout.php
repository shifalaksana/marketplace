<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$products = $_POST['products']; // Array of products
	$total_price = $_POST['total_price']; // Total price

	// foreach ($products as $id => $product) {
	//     echo "Product ID: $id<br>";
	//     echo "Name: " . $product['name'] . "<br>";
	//     echo "Quantity: " . $product['quantity'] . "<br>";
	//     echo "Price: " . $product['price'] . "<br><hr>";
	// }

	// echo "Total Price: Rp $total_price";
}
?>

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
											<form action="create_order.php" method="post">
												<div class="col-lg-8">
													<div class="p-5">
														<div class="d-flex justify-content-between align-items-center mb-5">
															<h1 class="fw-bold mb-0">Creating Order</h1>
														</div>
														<hr class="my-4">

														<?php
														foreach ($products as $id => $row) {
															if (isset($row['selected'])) {
														?>
																<div class="row mb-4 d-flex justify-content-between align-items-center">
																	<div class="col-md-2 col-lg-2 col-xl-2">
																		<img src="../upload/<?php echo $row['image']; ?>" style="height: 100px;" alt="<?php echo $row['name']; ?>">
																		<input type="hidden" name="products[<?php echo $id; ?>][image]" value="<?php echo $row['image']; ?>">
																	</div>
																	<div class="col-md-3 col-lg-3 col-xl-3">
																		<h6 class="text-muted">Product</h6>
																		<h6 class="mb-0"><?php echo $row['name'] ?></h6>
																		<input type="hidden" name="products[<?php echo $id; ?>][name]" value="<?php echo $row['name']; ?>">
																	</div>
																	<div class="col-md-3 col-lg-3 col-xl-3">
																		<h6 class="text-muted">Quantity</h6>
																		<h6 class="mb-0"><?php echo $row['quantity']; ?></h6>
																		<input type="hidden" name="products[<?php echo $id; ?>][quantity]" value="<?php echo $row['quantity']; ?>">
																	</div>
																	<div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
																		<h6 class="mb-0">Rp <?php echo number_format($row['price'], 0, '.', ','); ?></h6>
																		<input type="hidden" name="products[<?php echo $id; ?>][price]" value="<?php echo $row['price'] ?>">
																	</div>
																</div>
																<hr class="my-4">
														<?php
															}
														}
														?>
													</div>
												</div>
												<div class="col-lg-4 bg-body-tertiary">
													<div class="p-5">
														<hr class="my-4">

														<div class="d-flex justify-content-between mb-5">
															<h5 class="text-uppercase">Pengiriman</h5>
															<select id="shipping_method" name="shipping_method" class="form-select">
																<option value="JNE">JNE</option>
																<option value="J&%">J&T</option>
																<option value="Sicepat">Sicepat</option>
															</select>
														</div>
														<br>

														<div class="d-flex justify-content-between mb-5">
															<h5 class="text-uppercase">Payment Method</h5>
															<select id="payment_method" name="payment_method" class="form-select">
																<option value="QRIS">QRIS</option>
																<option value="Bank Transfer">Bank Transfer</option>
																<option value="Cash on Delivery">Cash on Delivery</option>
															</select>
														</div>
														<br>

														<div class="d-flex justify-content-between mb-5">
															<h5 class="text-uppercase">Total price</h5>
															<h5 id="total-price">Rp <?php echo number_format($total_price, 0, '.', ','); ?></h5>
															<input type="hidden" name="total_price" value="<?php echo $total_price; ?>">
														</div>

														<button type="submit" class="btn btn-dark btn-block btn-lg">Create Order</button>
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