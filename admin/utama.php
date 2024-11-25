<!DOCTYPE html>
<html lang="en">
    <head>
    <?php
// include "config.php";
session_start();
if(empty($_SESSION['username']) AND empty($_SESSION['password'])) {
include "index.php";
} else {

?>
        <meta charset="utf-8" />
        <title>Starpowers Admin</title>
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta property="og:title" content="" />
        <meta property="og:type" content="" />
        <meta property="og:url" content="" />
        <meta property="og:image" content="" />
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/icons/Logo Warna Starpowers.png" />
        <!-- Template CSS -->
        <link href="assets/css/main.css?v=1.1" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <div class="screen-overlay"></div>
        <aside class="navbar-aside" id="offcanvas_aside">
            <div class="aside-top">
                <a href="utama.php" class="brand-wrap">
                    <img src="assets/imgs/icons/logo biru sp full.png" class="logo" alt="Nest Dashboard" />
                    <h5 class="content-title card-title">Halo, Admin Marketplace Starpowers!</h5>
                </a>
                <div>
                    <button class="btn btn-icon btn-aside-minimize"><i class="text-muted material-icons md-menu_open"></i></button>
                </div>
            </div>
            <nav>
            <?php
            $currentPage = isset($_GET["page"]) ? ($_GET["page"]) : '';
            ?>
                <ul class="menu-aside">
                    <li class="menu-item">
                        <a class="menu-link" href="utama.php?page=dashboard">
                            <i class="icon material-icons md-home"></i>
                            <span class="text">Dashboard</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link" href="utama.php?page=kategoriproduk">
                            <i class="icon material-icons  md-shopping_bag"></i>
                            <span class="text">Kategori Produk</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link" href="utama.php?page=produk">
                            <i class="icon material-icons  md-shopping_cart"></i>
                            <span class="text">Produk</span>
                        </a>
                    </li>
                </ul>
                <hr />
                <ul class="menu-aside">
                    <!-- <li class="menu-item has-submenu">
                        <a class="menu-link" href="#">
                            <i class="icon material-icons md-settings"></i>
                            <span class="text">Settings</span>
                        </a>
                        <div class="submenu">
                            <a href="page-settings-1.html">Setting sample 1</a>
                            <a href="page-settings-2.html">Setting sample 2</a>
                        </div>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link" href="page-blank.html">
                            <i class="icon material-icons md-local_offer"></i>
                            <span class="text"> Starter page </span>
                        </a>
                    </li> -->
                </ul>
                <br />
                <br />
            </nav>
        </aside>
        <main class="main-wrap">
            <header class="main-header navbar">
                <div class="col-search">
                    <form class="searchform">
                        <div class="input-group">
                            <input list="search_terms" type="text" class="form-control" placeholder="Search term" />
                            <button class="btn btn-light bg" type="button"><i class="material-icons md-search"></i></button>
                        </div>
                        <datalist id="search_terms">
                            <option value="Products"></option>
                            <option value="New orders"></option>
                            <option value="Apple iphone"></option>
                            <option value="Ahmed Hassan"></option>
                        </datalist>
                    </form>
                </div>
                <div class="col-nav">
                    <button class="btn btn-icon btn-mobile me-auto" data-trigger="#offcanvas_aside"><i class="material-icons md-apps"></i></button>
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link btn-icon" href="#">
                                <i class="material-icons md-notifications animation-shake"></i>
                                <span class="badge rounded-pill">3</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-icon darkmode" href="#"> <i class="material-icons md-nights_stay"></i> </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="requestfullscreen nav-link btn-icon"><i class="material-icons md-cast"></i></a>
                        </li>
                        <li class="dropdown nav-item">
                            <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" id="dropdownLanguage" aria-expanded="false"><i class="material-icons md-public"></i></a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownLanguage">
                                <a class="dropdown-item text-brand" href="#"><img src="assets/imgs/theme/flag-us.png" alt="English" />English</a>
                                <a class="dropdown-item" href="#"><img src="assets/imgs/theme/flag-fr.png" alt="Français" />Français</a>
                                <a class="dropdown-item" href="#"><img src="assets/imgs/theme/flag-jp.png" alt="Français" />日本語</a>
                                <a class="dropdown-item" href="#"><img src="assets/imgs/theme/flag-cn.png" alt="Français" />中国人</a>
                            </div>
                        </li>
                        <li class="dropdown nav-item">
                            <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" id="dropdownAccount" aria-expanded="false"> <img class="img-xs rounded-circle" src="assets/imgs/icons/logo biru.png" alt="User" /></a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownAccount">
                                <a class="dropdown-item" href="#"><i class="material-icons md-perm_identity"></i>Edit Profile</a>
                                <a class="dropdown-item" href="#"><i class="material-icons md-settings"></i>Account Settings</a>
                                <a class="dropdown-item" href="#"><i class="material-icons md-account_balance_wallet"></i>Wallet</a>
                                <a class="dropdown-item" href="#"><i class="material-icons md-receipt"></i>Billing</a>
                                <a class="dropdown-item" href="#"><i class="material-icons md-help_outline"></i>Help center</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="logout.php"><i class="material-icons md-exit_to_app"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </header>
           
            <?php
        // session_start();
        if (isset($_GET['page']) && ($_GET['page']  == 'dashboard')) {
            include "dashboard.php";
        } elseif (isset($_GET['page']) &&($_GET['page'] == 'kategoriproduk')) {
            include "kategoriproduk.php";
        } elseif (isset($_GET['page']) &&($_GET['page'] == 'tambahkategoriproduk')) {
            include "tambahkategoriproduk.php";
        } elseif (isset($_GET['page']) &&($_GET['page'] == 'editkategoriproduk')) {
            include "editkategoriproduk.php";
        } elseif (isset($_GET['page']) &&($_GET['page'] == 'deletekategoriproduk')) {
            include "deletekategoriproduk.php";
        } elseif (isset($_GET['page']) &&($_GET['page'] == 'logout')) {
            include "logout.php";
        } elseif (isset($_GET['page']) &&($_GET['page'] == 'produk')) {
            include "produk.php"; 
        } elseif (isset($_GET['page']) &&($_GET['page'] == 'tambahproduk')) {
            include "tambahproduk.php"; 
        } elseif (isset($_GET['page']) &&($_GET['page'] == 'hapusproduk')) {
            include "hapusproduk.php";
        } elseif (isset($_GET['page']) &&($_GET['page'] == 'editproduk')) {
            include "editproduk.php";  
        }
        ?>
            <!-- content-main end// -->
            <footer class="main-footer font-xs">
                <div class="row pb-30 pt-15">
                    <div class="col-sm-6">
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        &copy; Nest - HTML Ecommerce Template .
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end">All rights reserved</div>
                    </div>
                </div>
            </footer>
        </main>
        <script src="assets/js/vendors/jquery-3.6.0.min.js"></script>
        <script src="assets/js/vendors/bootstrap.bundle.min.js"></script>
        <script src="assets/js/vendors/select2.min.js"></script>
        <script src="assets/js/vendors/perfect-scrollbar.js"></script>
        <script src="assets/js/vendors/jquery.fullscreen.min.js"></script>
        <script src="assets/js/vendors/chart.js"></script>
        <!-- Main Script -->
        <script src="assets/js/main.js?v=1.1" type="text/javascript"></script>
        <script src="assets/js/custom-chart.js" type="text/javascript"></script>
    </body>
</html>
<?php }?>