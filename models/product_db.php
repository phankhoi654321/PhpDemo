<?php
    include 'database.php';

    class ProductModel extends Database
    {
        public function getListProduct()
        {
            $sql = "SELECT * FROM products";
            $listProducts = mysqli_query($this->conn, $sql);
            return $listProducts;
        }

        public function insertProduct($productName, $productDes, $productCat, $productImage, $productPrice, $productReduce, $productQuantity, $productDateCreate)
        {
            $sql = "INSERT INTO products (product_name, product_des, product_cat, product_image, product_price, product_reduce, product_quantity, product_dateCreate) 
            VALUES ('$productName', '$productDes', '$productCat', '$productImage', '$productPrice', '$productReduce', '$productQuantity', '$productDateCreate')";
            $result = mysqli_query($this->conn, $sql);
        }
        
        public function getProductById($id)
        {
            $sql = "SELECT * FROM products WHERE id = {$id}";
            $result = mysqli_query($this->conn, $sql);
            return $result;
        }

        public function updateProductNotImage($product_id, $product_name, $product_des, $product_cat_id, $price, $price_reduce, $product_quantity, $date_update)
        {
            $sql="UPDATE products SET product_name = '$product_name', 
                                    product_des = '$product_des',   
                                    product_cat = '$product_cat_id', 
                                    product_price = '$price', 
                                    product_reduce = '$price_reduce', 
                                    product_quantity = '$product_quantity',
                                    product_dateUpdate = '$date_update'
                                    WHERE id = '$product_id'";

            $result = mysqli_query($this->conn, $sql);
            return $result;
        }

        public function updateProductWithImage($product_id, $product_name, $product_des, $product_cat_id, $price, $price_reduce, $product_quantity, $date_update, $fileName)
        {
            $sql="UPDATE products SET
                                    product_name = '$product_name', 
                                    product_des = '$product_des', 
                                    product_cat = '$product_cat_id', 
                                    product_price = '$price', 
                                    product_reduce = '$price_reduce', 
                                    product_quantity = '$product_quantity',
                                    product_dateUpdate = '$date_update', 
                                    product_image = '$fileName'
                                    WHERE id = '$product_id'";

            $result = mysqli_query($this->conn, $sql);
            return $result;
        }

        public function getFileName($id)
        {
            
            $sql = "SELECT product_image FROM products WHERE id = {$id}";
            $result = mysqli_query($this->conn, $sql);
            $row = mysqli_fetch_array($result);
            $nameImg = $row['product_image'];
            return $nameImg;
        }

        public function deleteProduct($id) {
            $sql = "DELETE FROM products WHERE id = {$id}";
            mysqli_query($this->conn, $sql);
        }
    }

    // $product = new ProductModel();
    // $product->insertProduct('iphone', 'abc', 'dienthoai', 'dienthoai.jpg', '12.55', '0.5', '2', '2001/2/2');
