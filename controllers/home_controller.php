<?php
include 'models/product_db.php';
include 'models/category_db.php';

    class HomeController
    {
        public function checkRequest()
        {
            $page = isset($_GET['page']) ? $_GET['page'] : 'home';
            switch ($page) {
            case 'home':
                include('views/home.php');
                break;
            case 'shop':
                include('views/shop.php');
                break;
            case 'singleProduct':
                $products = new ProductModel();
                $result = $products->getProductById($_GET['productId']);
                include('views/singleProduct.php');
                break;

        }
        }
    }
