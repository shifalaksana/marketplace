<?php  
session_start(); 

if(empty($_SESSION['username'])) {  
    header('location:indexpembeli.php');  
    exit();
} else { 
?> 
<html> 
<head>
    <title>Dashboard</title> 
</head> 
<body> 
    <?php 
    if(isset($_GET['page'])) { 
        if($_GET['page'] == 'home') { 
            include "homepembeli.php"; 
        } elseif($_GET['page'] == 'logout') { 
            include "logoutpembeli.php"; 
        }
    } else {
        echo "<p>Page not found!</p>";
    }
    ?> 
</body> 
</html> 
<?php } ?>
