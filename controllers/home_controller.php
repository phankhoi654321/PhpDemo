<?php
include 'models/productModel.php';
include 'models/categoryModel.php';
include 'models/userModel.php';

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
                case 'login':
                    $errEmail = $errPass = "";
                    $checkSubmit = true;
                    $user = new UserModel();
                    $showUserName = false;
                    
                    if (isset($_POST['login'])) {
                        $user_email = isset($_POST['email']) ? $_POST['email'] : "";
                        $user_pass = isset($_POST['password']) ? $_POST['password'] : "";
                        $user_email_db = $user->getUserEmail($user_email);
                        $user_pass_db = $user->getPassword($user_email);
                        $passVerify = password_verify($user_pass, $user_pass_db);
                        
                        if ($user_email == '') {
                            $showUserName = false;
                            $checkSubmit = false;
                            $errEmail = "Please input email!";
                        } elseif($user_email != $user_email_db) {
                            $checkSubmit = false;
                            $errEmail = "Email Wrong, please try again!";
                        } else{
                            $showUserName = true;
                        }
                        if ($user_pass == '') {
                            $checkSubmit = false;
                            $errPass = "Please input password!";
                        } elseif(!$passVerify) {
                            $_SESSION['user_email'] = $user_email;
                            $checkSubmit = false;
                            $errPass = "Password Wrong, please try again!";
                        }
                        if ($checkSubmit) {
                            // $_SESSION['user_pass'] = $user_pass_db;
                            $_SESSION['user_email'] = $user_email;
                            // var_dump($_SESSION['gotoAdmin']);exit;
                            if($_SESSION['gotoAdmin']) {
                                header("Location: views/admin/index.php");
                            } else {
                                header("Location: index.php");
                            }
                            
                        }
                    }
                    include('views/login.php');
                    break;
                case 'register':
                    $errName = $errEmail = $errPass = $errConPass = $errPhone = $errBirth = "";
                     $checkSubmit = true;
                     if (isset($_POST['register'])) {
                         $user_name = isset($_POST['full_name']) ? $_POST['full_name'] : "";
                         $user_email = isset($_POST['email']) ? $_POST['email'] : "";
                         $user_pass = isset($_POST['password']) ? $_POST['password'] : "";
                         $user_conPass = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : "";
                         $user_gender = isset($_POST['gender']) ? $_POST['gender'] : "";
                         $user_phone = isset($_POST['phone']) ? $_POST['phone'] : "";
                         $user_birthday = isset($_POST['birthday']) ? $_POST['birthday'] : "";
                        if ($user_name == '') {
                            $checkSubmit = false;
                            $errName = "Please input fullname!";
                        }
                        if ($user_email == '') {
                            $checkSubmit = false;
                            $errEmail = "Please input email!";
                        }
                        if ($user_pass == '') {
                            $checkSubmit = false;
                            $errPass = "Please input password!";
                        }
                        if ($user_conPass == '' || $user_conPass != $user_pass) {
                            $checkSubmit = false;
                            $errConPass = "Please input confirm password!";
                        }
                        if ($user_phone == '') {
                            $checkSubmit = false;
                            $errPhone = "Please input Phone number!";
                        }
                        if ($user_birthday == '') {
                            $checkSubmit = false;
                            $errBirth = "Please input Birthday!";
                        }

                        if ($checkSubmit) {
                            $passHash = password_hash($user_pass, PASSWORD_DEFAULT);
                            $user = new UserModel();
                            $user->addUser($user_name, $user_email, $passHash, $user_gender, $user_birthday);
                            header("Location: index.php");
                        }
                    } elseif(isset($_POST['cancel'])){
                        header("Location: index.php");
                    }
                    include('views/register.php');
                    break;
                case'logout':
                    unset($_SESSION['user_pass']); 
                    unset($_SESSION['user_email']); 
                    unset($_SESSION['gotoAdmin']); 
                    header("Location: index.php");
                    break;
            }
        }
    }
