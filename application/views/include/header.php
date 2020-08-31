<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Shotot Bazar</title>
    <link rel="shortcut icon" href="<?php echo base_url();?>/assets/img/logo.png" type="image/x-icon">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/rakib/css/r-style.css">
</head>

<body onload="firstItem()">
    <div class="container">
        <div class="row page-header">        
        <div class="col-sm-1 logo">
            <img src="<?php echo base_url(); ?>/assets/img/logo.png" alt="logo">
            </div>
            <div class="col-sm-10">
                <a href="<?php echo base_url();?>/dashboard"><h2>Shotota Bazar</h2></a>
            </div>
            <div class="col-sm-1">
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle user-menu" type="button" data-toggle="dropdown">
                        <?php echo "Rakib Islam" ?>
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <!-- <li><a href="#">View Profile</a></li>
                        <li><a href="#">Edit Profile</a></li> -->
                        <li><a href="#">Change Password</a></li>
                        <li class="divider"></li>
                        <li><a href="logout">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>