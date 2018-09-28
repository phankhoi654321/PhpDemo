<?php 
    
    include('models/cartModel.php');
    $cart = new CartModel();
    $_SESSION['done'] = false;
    class CartController{
        
        public function checkRequest($cart){
            
            // $_done;
            $cartAction = isset($_GET['cart']) ? $_GET['cart'] : '';
            switch($cartAction){
                case 'add':
                    $cart->add($_GET['addId']);
                    $_SESSION['done']=true;
                    break;
                case 'remove':
                    $cart->remove($_GET['removeId']);
                    $_SESSION['done']=true;
                    break;
                case 'delete':
                    $cart->delete($_GET['deleteId']);
                    $_SESSION['done']=true;
                    break;   
            }
        }
    }
?>