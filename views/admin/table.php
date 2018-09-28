
    

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Products Table</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
               
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTable clothings
                        </div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Product Name</th>
                                        <th>Product Description</th>
                                        <th>Product Category</th>
                                        <th>Product Price</th>
                                        <th>Price Reduce (%)</th>
                                        <th>Quantity</th>
                                        <th>Date Create</th>
                                        <th>Date Update</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="product">
                                    <?php
                                        while ($row = mysqli_fetch_array($result)):
                                    ?>
                                    <tr>
                                        <td><?php echo $row['id']?></td>
                                        <td>
                                            <!-- <a role="button" href=""> -->
                                                <?php echo $row['product_name']?> 
                                                <br> 
                                                <!-- <img src="https://cdn.pixabay.com/photo/2017/10/05/06/46/asia-2818562_960_720.jpg" style="width:100px"> -->
                                                <img src="../../img/uploads/<?php echo $row['product_image']?>" style="width:100px">
                                            <!-- </a>  -->
                                        </td>
                                        <td><?php echo $row['product_des']?></td>
                                        <td class="center">
                                            <?php 
                                            $categories = new CategoryModel();
                                            echo $categories->get_category_name($row['product_cat'])?>
                                        </td>
                                        <td class="center"><?php echo $row['product_price']?></td>
                                        <td class="center"><?php echo $row['product_reduce']?></td>
                                        <td class="center"><?php echo $row['product_quantity']?></td>
                                        <td class="center"><?php echo $row['product_dateCreate']?></td>
                                        <td class="center"><?php echo $row['product_dateUpdate']?></td>
                                        <td class="center">
                                            <button class="btn btn-danger js-delete" data-product-id="<?php echo $row['id'] ?>" ><span class="glyphicon glyphicon-remove"></span></button></br>
                                            <a style="margin-top: 5px" class="btn btn-primary" href="index.php?view=edit&editid=<?php echo $row['id'] ?> " ><span class="glyphicon glyphicon-pencil"></span></a>
                                        </td>
                                    </tr>
                                    <?php endwhile ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
        <!-- /#page-wrapper -->


