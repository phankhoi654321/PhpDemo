<?php 
ob_start();
session_start();
// session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Essence - Fashion Ecommerce Template</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="public/css/core-style.css">
    <link rel="stylesheet" href="public/css/style.css">
    <!-- <link rel="stylesheet" href="public/css/bootstrap.min.css"> -->

</head>

<body>

    <header class="header_area">
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
            <!-- Classy Menu -->
            <?php include('navBar.php'); ?>

            <!-- Header Meta Data -->
            <div class="header-meta d-flex clearfix justify-content-end">
                <!-- Search Area -->
                <!-- <div class="search-area">
                    <form action="#" method="post">
                        <input type="search" name="search" id="headerSearch" placeholder="Type for search">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div> -->
                <!-- Favourite Area -->
                <!-- <div class="favourite-area">
                    <a href="#"><img src="img/core-img/heart.svg" alt=""></a>
                </div> -->
                <!-- User Login Info -->
                <!-- <div class="user-login-info">
                    <a href="#"><img src="img/core-img/user.svg" alt=""></a>
                </div> -->
                <!-- Cart Area -->
                <div class="cart-area">
                    <?php //include('shoppingCart.php') ?>
                    <a href="#" id="essenceCartBtn"><img src="img/core-img/bag.svg" alt=""> <span>
                        <?php echo $_SESSION['item_quantity'] = isset($_SESSION['item_quantity']) ? $_SESSION['item_quantity'] : 0; ?>
                    </span></a>
                </div>
            </div>

        </div>
    </header>