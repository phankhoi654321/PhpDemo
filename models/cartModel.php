<?php
    // include('product_db.php');
    class CartModel
    {
        public function add($id)
        {
            $product = new ProductModel();
            $resultCart = $product->getProductById($id);
            while ($row = mysqli_fetch_array($resultCart)) {
                $_SESSION['product_' . $_GET['addId']] = isset($_SESSION['product_' . $_GET['addId']]) ? $_SESSION['product_' . $_GET['addId']] : 0;
                if ($row['product_quantity'] != $_SESSION['product_' . $_GET['addId']]) {
                    $_SESSION['product_' . $_GET['addId']] += 1;
                } else {
                }
            }
        }

        public function remove($id)
        {
            $_SESSION['product_' . $_GET['removeId']]--;
            if ($_SESSION['product_' . $_GET['removeId']] < 1) {
                unset($_SESSION['item_total']);
            } else {
            }
        }

        public function delete($id)
        {
            $_SESSION['product_' . $_GET['deleteId']] = 0;
            unset($_SESSION['item_total']);
        }

        public function getProductInCart($name)
        {
            $product2 = new ProductModel();
            $length = strlen($name);
            $id = substr($name, 8, $length);
            $result4 = $product2->getProductById($id);
            return $result4;
        }
    }
