
    <!-- ##### Header Area Start ##### -->
    <?php include('views/header.php'); ?>
    <!-- ##### Header Area End ##### -->

        <?php
            include('controllers/home_controller.php');
            $homeController = new HomeController();
            $homeController->checkRequest();
        ?>
        

    <!-- ##### Footer Area Start ##### -->
    <?php include('views/footer.php'); ?>
    <!-- ##### Footer Area End ##### -->
 