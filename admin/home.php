<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Welcome <?php echo $_SESSION['nama']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7f9fc;
        }
        .navbar-custom {
            background-color: #007bff;
        }
        .navbar-custom .navbar-brand, 
        .navbar-custom .nav-link {
            color: white;
        }
        .welcome-section {
            padding: 50px 0;
            text-align: center;
        }
        .welcome-section h1 {
            font-size: 2.5rem;
            color: #007bff;
        }
        .welcome-section p {
            font-size: 1.25rem;
            color: #555;
        }
        .action-btn {
            margin-top: 20px;
        }
        .card-custom {
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container">
        <a class="navbar-brand" href="#">URBANIK</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Product</a>
                </li>
				<li class="nav-item">
                    <a class="nav-link" href="#">Service</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Artikel</a>
                </li>
				<li class="nav-item">
                    <a class="nav-link" href="#">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Welcome Section -->
<div class="welcome-section">
    <div class="container">
        <h1>Welcome, <?php echo $_SESSION['nama']; ?>!</h1>
        <p>Selamat datang di halaman beranda. Di sini kamu bisa mengelola laporan penjualan baju dan aktivitas lainnya.</p>
        <a href="laporan.php" class="btn btn-primary action-btn">Lihat Laporan Penjualan</a>
    </div>
</div>

<!-- Features Section (Optional) -->
<div class="container my-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-custom p-3">
                <div class="card-body text-center">
                    <h5 class="card-title">Feature 1</h5>
                    <p class="card-text">Deskripsi singkat fitur 1 yang ada di aplikasi ini.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-custom p-3">
                <div class="card-body text-center">
                    <h5 class="card-title">Feature 2</h5>
                    <p class="card-text">Deskripsi singkat fitur 2 yang ada di aplikasi ini.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-custom p-3">
                <div class="card-body text-center">
                    <h5 class="card-title">Feature 3</h5>
                    <p class="card-text">Deskripsi singkat fitur 3 yang ada di aplikasi ini.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>