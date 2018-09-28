
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
                <div class="panel-body">
                    <form role="form" method="post" enctype="multipart/form-data">
                        <div>
                            <div class="col-lg-6">
                                <h1>Product information</h1>
                                <div class="form-group <?php if(!empty($errName)) echo 'has-error'; ?>">
                                    <label>Product Name</label>
                                    <input name="product_name" class="form-control" placeholder="Product Name">
                                    <span class="error"><?php echo $errName;?></span>
                                </div>
                                <div class="form-group  <?php if(!empty($errCat)) echo 'has-error'; ?>">
                                    <label>Selects Category</label>
                                    <select name="product_cat_id" class="form-control">
                                        <option value="">Select Category</option>
                                        <?php 
                                            while($row = mysqli_fetch_array($result)):
                                        ?>
                                        <option value="<?php echo $row['id']?>"><?php echo $row['cat_name'] ?></option>
                                        <?php endwhile ?>
                                    </select>
                                    <span class="error"><?php echo $errCat;?></span>
                                </div>
                                <div class="form-group <?php if(!empty($errDes)) echo 'has-error'; ?>">
                                    <label>Product Description</label>
                                    <textarea name="product_des" class="form-control" rows="3"></textarea>
                                    <span class="error"><?php echo $errDes;?></span>
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="file">
                                    <span class="error"><?php echo $errFile;?></span>
                                </div>
                                <div class="form-group">
                                    <button name="submit_add" type="submit" class="btn btn-default">Submit Button</button>
                                    <button name="reset" type="reset" class="btn btn-default">Reset Button</button>
                                </div>
                            </div>    
                                <!-- /.col-lg-6 (nested) -->
                            <div class="col-lg-6">
                                <h1>Product Price</h1>
                                <label>Price</label> <span class="error"><?php echo $errPrice;?></span>
                                <div class="form-group input-group <?php if(!empty($errPrice)) echo 'has-error'; ?>">
                                    <span class="input-group-addon">$</span>
                                    <input type="number" name="product_price" class="form-control" placeholder="Product Price">
                                </div>
                                <label>Price Reduce</label>
                                <div class="form-group input-group">
                                    <span class="input-group-addon">%</span>
                                    <input type="number" name="product_reduce" class="form-control" placeholder="Price Reduce">
                                </div>
                                <!-- <label>Price reduce</label>
                                <div class="form-group">
                                    <label class="radio-inline">
                                    <input type="radio" name="product_reduce" id="optionsRadiosInline1" value="0" checked>0%
                                    </label>
                                    <label class="radio-inline">
                                    <input type="radio" name="product_reduce" id="optionsRadiosInline2" value="0.25">25%
                                    </label>
                                    <label class="radio-inline">
                                    <input type="radio" name="product_reduce" id="optionsRadiosInline3" value="0.5">50%
                                    </label>
                                </div> -->
                                <div class="form-group <?php if(!empty($errQuantity)) echo 'has-error'; ?>">
                                    <label>Quantity</label>
                                    <input name="product_quantity" type="number" class="form-control" placeholder="Quantity">
                                    <span class="error"><?php echo $errQuantity;?></span>
                                </div>
                                <div class="form-group">
                                    <label>Date create</label>
                                    <input name="product_dateCreate" type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                                    <p class="help-block">This is today on format: Month/Day/Year</p>
                                </div>
                            </div>
                            <!-- /.col-lg-6 (nested) -->
                            <!-- <button name="submit" type="submit" class="btn btn-default">Submit Button</button>
                            <button name="reset" type="reset" class="btn btn-default">Reset Button</button> -->
                        </div>


                            
                            

                        <!-- /.row (nested) -->
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