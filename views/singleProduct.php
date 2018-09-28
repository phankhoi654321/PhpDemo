
    <!-- ##### Right Side Cart Area ##### -->
    <?php include('shoppingCart.php') ?>
    <!-- ##### Right Side Cart End ##### -->

    <?php while ($row = mysqli_fetch_array($result)) : ?>
    <!-- ##### Single Product Details Area Start ##### -->
    <section class="single_product_details_area d-flex align-items-center">

        <div class="single_product_thumb clearfix center">
            <img src="img/uploads/<?php echo $row['product_image']?>" alt="">
        </div>

        <!-- Single Product Description -->
        
        <div class="single_product_desc clearfix">
            <span>
                <?php
                    $category = new CategoryModel();
                    $catName = $category->get_category_name($row['product_cat']);
                    echo $catName
                ?>
            </span>
            <h2><?php echo $row['product_name']?></h2>
            <p class="product-price">$ <?php echo $row['product_price']?></p>
            <p class="product-desc"><?php echo $row['product_des']?></p>
            <!-- Cart -->
            <form method="post">
                <div class="cart-fav-box d-flex align-items-center">
                    <!-- <button type="submit" name="addtocart" value="5" class="btn essence-btn">Add to cart</button> -->
                    <a href="<?php echo $_SERVER['PHP_SELF']?>?page=shop&cart=add&addId=<?php echo $row['id']?>" class="btn essence-btn">Add to Cart</a>
                </div>
            </form>
        </div>
    </section>
    <!-- ##### Single Product Details Area End ##### -->
    <?php endwhile ?>

