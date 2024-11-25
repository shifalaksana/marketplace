<?php
include "configpembeli.php";

if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    
    // Cek apakah username dan password cocok
    $query = "SELECT * FROM pembeli WHERE username='$username' AND password='$password'";
    $login = mysqli_query($koneksi, $query);
    $r = mysqli_fetch_array($login);
    
    if (mysqli_num_rows($login) > 0) {
        session_start(); 
        $_SESSION['username'] = $r['username']; 
        $_SESSION['nama'] = $r['nama']; 
        $_SESSION['id_pembeli'] = $r['id'];
        header('location:index.php'); 
    } else { 
        echo "<script>alert('Username atau Password salah!'); window.location.href='indexpembeli.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        .login-container {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            transform: scale(0.9);
            transition: transform 0.3s ease-in-out;
        }
        .login-container:hover {
            transform: scale(1);
        }
        .login-container h2 {
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
        .login-links {
            display: flex;
            justify-content: space-between;
            margin-top: 1rem;
        }
        .login-links a {
            font-size: 0.9rem;
            text-decoration: none;
            color: #6a11cb;
            font-weight: bold;
        }
        .login-links a:hover {
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

<div class="login-container popup-animation">
    <h2>Welcome Back Powerians!</h2>
    <form action="indexpembeli.php" method="POST">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" required class="form-control" placeholder="Enter your username">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" required class="form-control" placeholder="Enter your password">
        </div>
        <div class="text-center">
            <input type="submit" name="submit" class="btn btn-custom" value="Login">
        </div>
        <div class="login-links">
            <a href="registerpembeli.php">Daftar</a>
            <a href="forget_passwordpembeli.php">Lupa Password?</a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>




