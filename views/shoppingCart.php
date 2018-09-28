
                <?php
                    // session_start();
                    // $product2 = new ProductModel();
                    // $idDefault = isset($_GET['addId']) ? $_GET['addId'] : '0';
                    // $resultCart = $product2->getProductById($idDefault);

                    $done=false;
                ?>
                    
                
<div class="cart-bg-overlay"></div>

    <div class="right-side-cart-area">

        <!-- Cart Button -->
        <div class="cart-content d-flex">
            <!-- <div class="cart-list"> -->
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
                $product2 = new ProductModel();
                    if (isset($_GET['addId'])) {
                        $done = true;
                        $resultCart = $product2->getProductById($_GET['addId']);
                        
                        while ($row = mysqli_fetch_array($resultCart)) {
                            $_SESSION['product_' . $_GET['addId']] = isset($_SESSION['product_' . $_GET['addId']]) ? $_SESSION['product_' . $_GET['addId']] : 0;
                            if ($row['product_quantity'] != $_SESSION['product_' . $_GET['addId']]) {
                                $_SESSION['product_' . $_GET['addId']] += 1;
                            } else {
                            }
                        }
                    }
                    $total = 0;
                    $item_quantity = 0;
                    $quantity =1;
                    foreach ($_SESSION as $name => $value) :
                        if ($value > 0) :
                            if (substr($name, 0, 8) == "product_") :
                                $length = strlen($name);
                                $id = substr($name, 8, $length);
                                $result4 = $product2->getProductById($id);
                                while ($row = mysqli_fetch_array($result4)) :
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
                                    <a class='btn btn-warning' href="cart.php?remove={$row['product_id']}">
                                        -
                                    </a>  
                
                                    <a class='btn btn-success' href="<?php echo $_SERVER['PHP_SELF'] . '?page=shop&cart=add&addId='. $row['id']?>">
                                        +
                                    </a>
                
                                    <a class='btn btn-danger' href="cart.php?delete={$row['product_id']}">
                                        x
                                    </a>
                                </td>
                            </tr>
                                <?php
                                    $quantity++;
                                    $total += $sub;
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
    if ($done) {
        header("Location: " . $_SERVER['PHP_SELF'] . '?page=shop');
        exit;
    }

?>