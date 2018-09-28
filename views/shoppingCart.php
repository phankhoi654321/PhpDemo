<?php
    include('models/cartModel.php');
    // include('models/product_db.php');
?>
<?php
    $_done=false;
?>
<div class="cart-bg-overlay">

    <div class="right-side-cart-area">

        <!-- Cart Button -->
        <div class="cart-content d-flex">
            
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Sub-total</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $cart = new CartModel();
                    $_GET['cart'] = isset($_GET['cart']) ? $_GET['cart'] : '';
                    if($_GET['cart'] == 'add') {
                        $cart->add($_GET['addId']);
                        $_done=true;
                    } 
                    if($_GET['cart'] == 'remove') {
                        $cart->remove($_GET['removeId']);
                        $_done=true;
                    } 
                    if($_GET['cart'] == 'delete') {
                        $cart->delete($_GET['deleteId']);
                        $_done=true;
                    }
                    $total = 0;
                    $item_quantity = 0;
                    $quantity =1;
                    foreach ($_SESSION as $name => $value) :
                        if ($value > 0) :
                            if (substr($name, 0, 8) == "product_") :
                                $result = $cart->getProductInCart($name);
                                while ($row = mysqli_fetch_array($result)) :
                                    $sub = $row['product_price'] * $value;
                                    $item_quantity += $value;
                                ?>  
                            <tr>
                                <td> <?php echo $row['product_name'] ?><br>
                                    <img width='100' src="img/uploads/<?php echo $row['product_image'] ?>" class="cart-thumb" alt="">
                                </td>
                                <td>$<?php echo $row['product_price'] ?></td>
                                <td>$<?php echo $value ?></td>
                                <td>$<?php echo $sub ?></td>
                                <td>
                                    <a class='btn btn-warning' href="<?php echo $_SERVER['PHP_SELF'] . '?page=shop&cart=remove&removeId='. $row['id']?>">
                                        -
                                    </a>  
                
                                    <a class='btn btn-success' href="<?php echo $_SERVER['PHP_SELF'] . '?page=shop&cart=add&addId='. $row['id']?>">
                                        +
                                    </a>
                
                                    <a class='btn btn-danger' href="<?php echo $_SERVER['PHP_SELF'] . '?page=shop&cart=delete&deleteId='. $row['id']?>">
                                        x
                                    </a>
                                </td>
                            </tr>
                                <?php
                                    $quantity++;
                                    $total += $sub;
                                    // $_SESSION['item_total'] = $total += $sub;
                                    $_SESSION['item_quantity'] = $item_quantity;  
                                ?>  
                                <?php endwhile ?>
                            <?php endif ?>
                        <?php endif ?>
                    <?php endforeach ?>
                    <tr>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td>Total: $<?php echo $total; ?></td>
                     <td></td>
                    </tr>
            </tbody>
            </table> 
        

        </div>
       
        <div class="cart-button">
            <a href="#" id="rightSideCart"><img src="img/core-img/bag.svg" alt=""> <span><?php echo $item_quantity ?></span></a>
        </div>
    </div>
    
</div>

<?php
    if ($_done) {
        header("Location: " . $_SERVER['PHP_SELF'] . '?page=shop');
        exit;
    }

?>