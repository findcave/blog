<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(!$this->session->userdata('username')){
    redirect('auth');
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">


        <link rel="icon" href="../../../../favicon.ico">

        <title>Blog using Codeigniter</title>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css"
              integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy"
              crossorigin="anonymous">

        <script
            src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>

        <!--------------------------------------------Select 2----------------------------------------------------->
        <script src="<?php echo base_url();?>public/select2/js/select2.full.js"></script>
        <link href="<?php echo base_url();?>public/select2/css/select2.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>public/toast/toastr-master/build/toastr.css" rel="stylesheet"/>
        <script src="<?php echo base_url();?>public/toast/toastr-master/toastr.js"></script>

        <script src="https://use.fontawesome.com/b09ec1e50e.js"></script>


        <!-- Custom styles for this template -->
        <style rel="stylesheet">
            body {
                min-height: 75rem;
                padding-top: 4.5rem;
            }
        </style>
    </head>

    <body>

    <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">

        <a class="navbar-brand">Welcome <?php echo $_SESSION['username'];?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">


                <?php if($this->session->userdata('usertype') == 1) { ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url(); ?>admin">Home</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle"  id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item" href="<?php echo base_url();?>channels">Channels</a>
                            <a class="dropdown-item" href="<?php echo base_url();?>tags">Tags</a>
                            <a class="dropdown-item" href="<?php echo base_url();?>admin/show">Publish Post</a>
                        </div>
                    </li>
                <?php }?>

                <?php if($this->session->userdata('usertype') == 2) { ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url(); ?>user">Home</span></a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle"  id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item" href="<?php echo base_url();?>user/show">My Posts</a>
                        </div>
                    </li>

                <?php }?>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"  id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Settings</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="<?php echo base_url();?>auth/edit">Reset Password</a>
                        <a class="nav-link" href="<?php echo base_url(); ?>auth/signout">Sign Out</a>
                    </div>
                </li>


            </ul>
            <form class="form-inline mt-2 mt-md-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <main role="main" class="container">
