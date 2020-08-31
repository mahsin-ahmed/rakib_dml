<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <title>Company Name</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/skins/all.css">
</head>

<body class="login example2">
    <div class="main-login col-sm-4 col-sm-offset-4">
        <div style="font-size: 20px" class="logo"><i class="clip-clip"></i> Company short name
        </div>
        <div class="box-login">
            <h2 class="text-center" style="font-weight:bolder;">Login</h2>
            <form method="POST" class="form-login" action="user_login">
                <div class="errorHandler alert alert-danger no-display">
                    <i class="fa fa-remove-sign"></i>USER NAME OR PASSWORD INCORRECT!
                </div>

                <?php 
                if (1){ 
                    ?>
                <div class="login-erro" style="color: #f00; font-size: 12px;  text-align: center">
                    <?php 
                    echo $this->session->flashdata('error');
                    ?>
                </div>

                <div class="login-erro" style="color: green; font-size: 12px;  text-align: center">
                    <?php 
                    echo $this->session->flashdata('logout');
                    ?>
                </div>
                <?php 
                } 
                ?>

                <fieldset>
                    <div class="form-group">
                        <span class="input-icon">
                            <input style="font-size: 12px; padding-left: 24px !important;" type="text" class="form-control" name="userid" placeholder="Userid" required>
                            <i class="fa fa-user" style="margin-top: -5px;"></i> </span>
                    </div>
                    <div class="form-group form-actions">
                        <span class="input-icon">
                            <input style="font-size: 12px; padding-left: 24px !important;" type="password" required class="form-control password" name="password" placeholder="Password">
                            <i class="fa fa-lock" style="margin-top: -5px;"></i></span>
                    </div>
                    <div class="form-actions">
                        <button type="submit" name="submit" class="btn btn-success pull-right" style="width: 30%;">
                            Login
                        </button>
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="box-forgot">
            <h3>Forget Password?</h3>
            <p>
                Enter your e-mail address below to reset your password.
            </p>
            <form class="form-forgot">
                <div class="errorHandler alert alert-danger no-display">
                    <i class="fa fa-remove-sign"></i> You have some form errors. Please check below.
                </div>
            </form>
        </div>

        <div class="copyright"><?php echo date('Y') ?> &copy; Company name here 
        </div>
    </div>
    <script src="<?php echo base_url(); ?>assets/plugins/jQuery-lib/2.0.3/jquery.min.js"></script>
    <!--<![endif]-->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/iCheck/jquery.icheck.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/perfect-scrollbar/src/perfect-scrollbar.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-cookie/jquery.cookie.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/login.js"></script>
     <script>
        jQuery(document).ready(function() {
            Main.init();
            Login.init();
        });

    </script>
</body>

</html>
