<?php
    include '../../models/product_db.php';
    include '../../models/category_db.php';

    class CartController
    {
        public function checkRequest()
        {
            $cartAction = "";
            $cartAction = isset($_GET['cart']) ? $_GET['cart'] : '';
            switch($cartAction) {
                case 'add':
                    // $product = new ProductModel();
                    // $resultCart = $product->getProductById($_GET['addId']);
                    
                    include('views/shoppingCart.php');
                    // while ($row = mysqli_fetch_array($result)) {
                    //     if ($row['product_quantity'] != $_SESSION['product_' . $_GET['add']]) {
                    //         $_SESSION['product_' . $_GET['add']] += 1;
                    //         header("Location: checkout.php");
                    //     } else {
                    //         set_message("We only have {$row['product_quantity']} " . $row['product_title'] . " available in store");
                    //         header("Location: checkout.php");
                    //     }
                    // }
                    break;
            }
        }
    }
