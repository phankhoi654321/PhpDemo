
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Product Form</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Basic Form Elements
                </div>
                <?php
                                while ($row = mysqli_fetch_array($result)):
                            ?>
                <div class="panel-body">
                    <!-- <form action="index.php?view=edit&editid=<?php echo $row['id']?>" method="post" enctype="multipart/form-data"> -->
                    <form action=""  method="post" enctype="multipart/form-data">
                        <div>
                            
                            <div class="col-lg-6">
                                <h1>Product information</h1>
                                <div class="form-group <?php if (!empty($errName)) {
                                echo 'has-error';
                            } ?>">
                                    <label>Product Name</label>
                                    <input name="product_name" class="form-control" placeholder="Product Name" value="<?php echo $row['product_name'];?>">     
                                    <span class="error"><?php echo $errName;?></span>
                                </div>
                                <div class="form-group  <?php if (!empty($errCat)) {
                                echo 'has-error';
                            } ?>">
                                    <label>Selects Category</label>
                                    <select name="product_cat_id" class="form-control">
                                        <!-- <option value="">Select Category</option> -->
                                        <option selected value="<?php echo $row['product_cat'];?>">
                                            <?php $categories = new CategoryModel();
                                            echo $categories->get_category_name($row['product_cat']);?>
                                        </option>
                                        <?php
                                            while ($rowcat = mysqli_fetch_array($resultcat)):
                                        ?>
                                        <option value="<?php echo $rowcat['id']?>"><?php echo $rowcat['cat_name'] ?></option>
                                        <?php endwhile ?>
                                    </select>
                                    <span class="error"><?php echo $errCat;?></span>
                                </div>
                                <div class="form-group <?php if (!empty($errDes)) {
                                            echo 'has-error';
                                        }?>">
                                    <label>Product Description</label>
                                    <textarea name="product_des" class="form-control" rows="3"> <?php echo $row['product_des'];?> </textarea>
                                    <span class="error"><?php echo $errDes;?></span>
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="file">
                                    <span class="error"><?php echo $errFile;?></span>
                                </div>
                                <div class="form-group">
                                    <button name="submit_edit" type="submit" class="btn btn-default">Submit Button</button>
                                    <button name="reset" type="reset" class="btn btn-default">Reset Button</button>
                                    <button name="cancel" type="" class="btn btn-default">Cancel</button>
                                </div>
                            </div>    
                                <!-- /.col-lg-6 (nested) -->
                            <div class="col-lg-6">
                                <h1>Product Price</h1>
                                <label>Price</label> <span class="error"><?php echo $errPrice;?></span>
                                <div class="form-group input-group <?php if (!empty($errPrice)) {
                                            echo 'has-error';
                                        } ?>">
                                    <span class="input-group-addon">$</span>
                                    <input type="number" name="product_price" class="form-control" placeholder="Product Price" value="<?php echo $row['product_price'];?>">
                                </div>

                                <label>Price Reduce</label>
                                <div class="form-group input-group">
                                    <span class="input-group-addon">%</span>
                                    <input type="number" name="product_reduce" class="form-control" placeholder="Price Reduce" value="<?php echo $row['product_reduce'];?>">
                                </div>
                                <div class="form-group <?php if (!empty($errQuantity)) {
                                            echo 'has-error';
                                        } ?>">
                                    <label>Quantity</label>
                                    <input name="product_quantity" type="number" class="form-control" placeholder="Quantity" value="<?php echo $row['product_quantity'];?>">
                                    <span class="error"><?php echo $errQuantity;?></span>
                                </div>
                                <div class="form-group">
                                    <label>Date update</label>
                                    <input name="product_dateUpdate" type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                                    <p class="help-block">This is today on format: Month/Day/Year</p>
                                </div>
                            </div>
                            <!-- /.col-lg-6 (nested) -->
                            <!-- <button name="submit" type="submit" class="btn btn-default">Submit Button</button>
                            <button name="reset" type="reset" class="btn btn-default">Reset Button</button> -->
                        </div>


                            
                            

                        <!-- /.row (nested) -->
                        <?php endwhile ?>
                    </form>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>