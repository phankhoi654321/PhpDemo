
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Category Form</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Create Category
                </div>
                <div class="panel-body">
                    <form role="form" method="post" enctype="multipart/form-data">
                        <div>
                            <div class="col-lg-6">
                                <h1>Category information</h1>
                                <div class="form-group <?php if(!empty($errName)) echo 'has-error'; ?>">
                                    <label>Category Name</label>
                                    <input name="cat_name" class="form-control" placeholder="Category Name">
                                    <span class="error"><?php echo $errName;?></span>
                                </div>
                                <div class="form-group">
                                    <button name="submit_cat" type="submit" class="btn btn-default">Submit Button</button>
                                    <button name="reset" type="reset" class="btn btn-default">Reset Button</button>
                                </div>
                            </div>    
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