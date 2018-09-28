<?php
    include '../../models/product_db.php';
    include '../../models/category_db.php';
    // include '../../models/database.php';
    class AdminController
    {
        public function checkRequest()
        {
            $action = "";
            $action = isset($_GET['view']) ? $_GET['view'] : 'table';
            switch ($action) {
                case 'table':
                    $products = new ProductModel();
                    $result = $products->getListProduct();
                    include('table.php');
                    break;
                case 'productForm':
                    $errName = $errDes = $errPrice = $errCat = $errdate = $errQuantity = $errFile = "";
                    $checkSubmit = true;
                    if (isset($_POST['submit_add'])) {
                        $product_name = isset($_POST['product_name']) ? $_POST['product_name'] : "";
                        $product_des = isset($_POST['product_des']) ? $_POST['product_des'] : "";
                        $price = isset($_POST['product_price']) ? $_POST['product_price'] : "";
                        $price_reduce = isset($_POST['product_reduce']) ? $_POST['product_reduce'] : 0;
                        $product_cat_id = isset($_POST['product_cat_id']) ? $_POST['product_cat_id'] : "";
                        $product_quantity = isset($_POST['product_quantity']) ? $_POST['product_quantity'] : "";
                        $date_post = isset($_POST['product_dateCreate']) ? $_POST['product_dateCreate'] : "";
                        $fileUpload = isset($_FILES['file']) ? $_FILES['file'] : "";
                        $fileName = isset($fileUpload['name']) ? uniqid().'_'.$fileUpload['name'] : "";
                        // var_dump($_FILES['file']);
                        if ($product_name == '') {
                            $checkSubmit = false;
                            $errName = "Please input name of product!";
                        }
                        if ($product_des == '') {
                            $checkSubmit = false;
                            $errDes = "Please input description of product!";
                        }
                        if ($price == '') {
                            $checkSubmit = false;
                            $errPrice = "Please input price of product!";
                        }
                        if ($product_cat_id == '') {
                            $checkSubmit = false;
                            $errCat = "Please input categories of product!";
                        }
                        if ($product_quantity == '') {
                            $checkSubmit = false;
                            $errQuantity = "Please input quantity of product!";
                        }
                        if ($date_post == '') {
                            $checkSubmit = false;
                            $errdate = "Please input date post of product!";
                        }
                        if ($fileUpload == '') {
                            $checkSubmit = false;
                            $errFile = "Please input file picture of product!";
                        }
                        if ($checkSubmit) {
                            // var_dump($_SERVER['PHP_SELF']);
                            $targetUpload = "../../img/uploads/".$fileName;
                            
                            move_uploaded_file($fileUpload['tmp_name'], $targetUpload);
                            // $datePost = date('Y-m-d', strtotime($_POST['date_post']));
                            $product = new ProductModel();
                            $product->insertProduct($product_name, $product_des, $product_cat_id, $fileName, $price, $price_reduce, $product_quantity, $date_post);
                            header("Location: index.php");
                        }
                    } elseif(isset($_POST['cancel'])){
                        header("Location: index.php");
                    }
                    $categories = new CategoryModel();
                    $result = $categories->getCategories();
                    include('formProduct.php');
                    break;
                case 'categoryForm':
                    $errName = "";
                    $checkSubmit = true;
                    if (isset($_POST['submit_cat'])) {
                        $cat_name = isset($_POST['cat_name']) ? $_POST['cat_name'] : "";
                        if ($cat_name == '') {
                            $checkSubmit = false;
                            $errName = "Please input name of category!";
                        }
                        if ($checkSubmit) {
                            $category = new categoryModel();
                            $category->insertCategory($cat_name);
                            header("Location: index.php");
                        }
                    }
                    include('formCategory.php');
                    break;
                case 'edit':
                    $errName = $errDes = $errPrice = $errCat = $errdate = $errQuantity = $errFile = "";
                    $checkSubmit = true;
                    if (isset($_POST['submit_edit'])) {
                        $product_id = isset($_GET['editid']) ? $_GET['editid'] : "";
                        $product_name = isset($_POST['product_name']) ? $_POST['product_name'] : "";
                        $product_des = isset($_POST['product_des']) ? $_POST['product_des'] : "";
                        $price = isset($_POST['product_price']) ? $_POST['product_price'] : "";
                        $price_reduce = isset($_POST['product_reduce']) ? $_POST['product_reduce'] : 0;
                        $product_cat_id = isset($_POST['product_cat_id']) ? $_POST['product_cat_id'] : "";
                        $product_quantity = isset($_POST['product_quantity']) ? $_POST['product_quantity'] : "";
                        $date_update = isset($_POST['product_dateUpdate']) ? $_POST['product_dateUpdate'] : "";
                        $fileUpload = isset($_FILES['file']) ? $_FILES['file'] : "";
                        $fileName = isset($fileUpload['name']) ? uniqid().'_'.$fileUpload['name'] : "";
                        // var_dump($_FILES['file']);
                        if ($product_name == '') {
                            $checkSubmit = false;
                            $errName = "Please input name of product!";
                        }
                        if ($product_des == '') {
                            $checkSubmit = false;
                            $errDes = "Please input description of product!";
                        }
                        if ($price == '') {
                            $checkSubmit = false;
                            $errPrice = "Please input price of product!";
                        }
                        if ($product_cat_id == '') {
                            $checkSubmit = false;
                            $errCat = "Please input categories of product!";
                        }
                        if ($product_quantity == '') {
                            $checkSubmit = false;
                            $errQuantity = "Please input quantity of product!";
                        }
                        if ($date_update == '') {
                            $checkSubmit = false;
                            $errdate = "Please input date post of product!";
                        }
                        if ($fileUpload == '') {
                            $checkSubmit = false;
                            $errFile = "Please input file picture of product!";
                        }
                        if ($checkSubmit) {
                            // var_dump($_SERVER['PHP_SELF']);exit();
                            $targetUpload = "../../img/uploads/".$fileName;
                            move_uploaded_file($fileUpload['tmp_name'], $targetUpload);
                            if ($_FILES['file']['name'] == "") {
                                $product = new ProductModel();
                                $product->updateProductNotImage($product_id,$product_name, $product_des, $product_cat_id, $price, $price_reduce, $product_quantity, $date_update);
                            } else {
                                $product = new ProductModel();
                                $fileImg = "../../img/uploads/".$product->getFileName($product_id);
                                unlink($fileImg);
                                $product->updateProductWithImage($product_id,$product_name, $product_des, $product_cat_id, $price, $price_reduce, $product_quantity, $date_update,$fileName);
                            }
                            header("Location: index.php");
                        }
                    }elseif(isset($_POST['cancel'])){
                        header("Location: index.php");
                    }
                    $product = new ProductModel();
                    $result = $product->getProductById($_GET['editid']);
                    $categories = new CategoryModel();
                    $resultcat = $categories->getCategories();
                    include('editProduct.php');
                    break;
                case 'delete':
                    $product = new ProductModel();
                    $fileImg = "../../img/uploads/".$product->getFileName($_GET['deleteid']);
                    unlink($fileImg);
                    $product->deleteProduct($_GET['deleteid']);
                    header("Location: index.php");
            }
        }

    }
