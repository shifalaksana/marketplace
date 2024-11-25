<?php
include "configpembeli.php";

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    
    // Cek apakah username ada dalam database
    $cek_user = mysqli_query($koneksi, "SELECT * FROM pembeli WHERE username='$username'");
    
    if (mysqli_num_rows($cek_user) > 0) {
        // Buat password baru secara acak
        $new_password = substr(md5(rand()), 0, 8); // Password baru, 8 karakter

        // Update password baru ke database
        $query = "UPDATE pembeli SET password='$new_password' WHERE username='$username'";
        if (mysqli_query($koneksi, $query)) {
            // Tampilkan password baru ke pengguna (hanya password asli, bukan yang sudah di-hash)
            echo "<script>alert('Password baru berhasil dibuat. Password baru Anda adalah: $new_password'); window.location.href='indexpembeli.php';</script>";
        } else {
            echo "<script>alert('Terjadi kesalahan saat memperbarui password.'); window.location.href='forget_passwordpembeli.php';</script>";
        }
    } else {
        echo "<script>alert('Username tidak ditemukan!'); window.location.href='forget_passwordpembeli.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }
        .forget-container {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            transform: scale(0.9);
            transition: transform 0.3s ease-in-out;
        }
        .forget-container:hover {
            transform: scale(1);
        }
        .forget-container h2 {
            color: #6a11cb;
            font-weight: bold;
            margin-bottom: 1.5rem;
            text-align: center;
        }
        .form-control {
            border-radius: 20px;
            padding: 0.75rem;
        }
        .btn-custom {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: white;
            border-radius: 20px;
            padding: 0.5rem 1.5rem;
            font-weight: bold;
        }
        .btn-custom:hover {
            background: linear-gradient(135deg, #2575fc, #6a11cb);
        }
        .popup-animation {
            animation: popup 0.6s ease-out;
        }
        @keyframes popup {
            from {
                transform: scale(0.7);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }
    </style>
</head>
<body>

<div class="forget-container popup-animation">
    <h2>Lupa Password Ya Powerians?</h2>
    <form action="forget_passwordpembeli.php" method="POST">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="username" name="username" required class="form-control" placeholder="Masukkan username Anda">
        </div>
        <div class="text-center">
            <input type="submit" name="submit" class="btn btn-custom" value="Reset Password">
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
