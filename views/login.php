<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
<!------ Include the above in your HEAD tag ---------->

<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <h1>Log in your account</h1>
                <form role="form" action="" method="post" id="login-form" autocomplete="off">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email or Username"
                                value="<?php if($showUserName) echo $_SESSION['user_email']?>"
                        >
                        <span class="error"><?php echo $errEmail;?></span>
                    </div>
                    <div class="form-group">
                        <label for="key">Password</label>
                        <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        <span class="error"><?php echo $errPass;?></span>
                    </div>
                    <div class="checkbox">
                        <!-- <input id="showPass" class="label" type="checkbox" value=""> Show password -->
                        <input class="label showPass" type="checkbox" onclick="showPassword()"> Show password
                        <br>
                    </div>
                    <input name="login" type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Log in">
                </form>
                <a href="" class="forget" data-toggle="modal" data-target=".forget-modal">Forgot your password?</a>
                <hr/>
            </div>
            <!-- /.col-xs-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<script>
    function showPassword() {
        var key_attr = $('#key').attr('type');
        if (key_attr != 'text') {
            // $('.checkbox').addClass('show');
            $('#key').attr('type', 'text');
        } else {
            // $('.checkbox').removeClass('show');
            $('#key').attr('type', 'password');
        }
    }
</script>
<div class="modal fade forget-modal" tabindex="-1" role="dialog" aria-labelledby="myForgetModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title">Recovery password</h4>
            </div>
            <div class="modal-body">
                <p>Type your email account</p>
                <input type="email" name="recovery-email" id="recovery-email" class="form-control" autocomplete="off">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-custom">Recovery</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
