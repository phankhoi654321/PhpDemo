
<nav class="classy-navbar" id="essenceNav">
    <!-- Logo -->
    <a class="nav-brand" href="<?php echo $_SERVER['PHP_SELF'] ?>"><img src="img/core-img/logo.png" alt=""></a>
    <!-- Navbar Toggler -->
    <div class="classy-navbar-toggler">
        <span class="navbarToggler"><span></span><span></span><span></span></span>
    </div>
    <!-- Menu -->
    <div class="classy-menu">
        <!-- close btn -->
        <div class="classycloseIcon">
            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
        </div>
        <!-- Nav Start -->
        <div class="classynav">
            <div>
                <ul>
                    <li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?page=shop">Shop</a>
                    <li>
                        <a href="<?php  if(isset($_SESSION['user_email'])) echo 'views/admin/index.php'; 
                                        else echo $_SERVER['PHP_SELF'] . '?page=login'; $_SESSION['gotoAdmin'] = true;
                                ?>">Admin</a>
                    </li>
                    <li style="display: <?php if(isset($_SESSION['user_email'])) echo 'none'?>"><a href="<?php echo $_SERVER['PHP_SELF'] ?>?page=login">Login</a></li>
                    <li style="display: <?php if(isset($_SESSION['user_email'])) echo 'none'?>"><a href="<?php echo $_SERVER['PHP_SELF'] ?>?page=register">Register</a></li>
                    <!-- <li style="display: <?php //if(isset($_SESSION['user_email'])) echo ''; else echo 'none';?>"> <a href="<?php //echo $_SERVER['PHP_SELF'] ?>?page=logout"> Logout</a></li> -->
                </ul>
            </div>
        </div>
        <!-- Nav End -->
    </div>
</nav>
