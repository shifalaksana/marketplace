<?php
include "configpembeli.php";

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);

    // Periksa apakah username sudah terdaftar
    $cek_user = mysqli_query($koneksi, "SELECT * FROM pembeli WHERE username='$username'");
    if (mysqli_num_rows($cek_user) > 0) {
        echo "<script>alert('Username sudah digunakan!'); window.location.href='registerpembeli.php';</script>";
    } else {
        // Insert data ke tabel login
        $query = "INSERT INTO pembeli (username, password, nama) VALUES ('$username', '$password', '$nama')";
        if (mysqli_query($koneksi, $query)) {
            echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location.href='indexpembeli.php';</script>";
        } else {
            echo "<script>alert('Registrasi gagal! Coba lagi.'); window.location.href='registerpembeli.php';</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
        .register-container {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            transform: scale(0.9);
            transition: transform 0.3s ease-in-out;
        }
        .register-container:hover {
            transform: scale(1);
        }
        .register-container h2 {
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
        .login-link {
            text-align: center;
            margin-top: 1rem;
        }
        .login-link a {
            font-size: 0.9rem;
            text-decoration: none;
            color: #6a11cb;
            font-weight: bold;
        }
        .login-link a:hover {
            color: #2575fc;
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

<div class="register-container popup-animation">
    <h2>Ayo Gabung Menjadi Powerians!</h2>
    <form action="registerpembeli.php" method="POST">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" required class="form-control" placeholder="Masukkan nama Anda">
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" required class="form-control" placeholder="Masukkan username">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" required class="form-control" placeholder="Masukkan password">
        </div>
        <div class="text-center">
            <input type="submit" name="submit" class="btn btn-custom" value="Daftar">
        </div>
        <div class="login-link">
            <p>Sudah punya akun? <a href="indexpembeli.php">Login di sini</a></p>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
