<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
  

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

      <a class="navbar-brand" href="<?php echo base_url(); ?>">Blog CI</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li> -->

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle"  id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="<?php echo base_url();?>channels">Channels</a>
              <a class="dropdown-item" href="<?php echo base_url();?>department">Departments</a>
              <a class="dropdown-item" href="<?php echo base_url();?>employees">Employees</a>
              <a class="dropdown-item" href="<?php echo base_url();?>posts">Posts</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle"  id="channels" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Channels</a>
            <div class="dropdown-menu" aria-labelledby="channels">
              <a class="dropdown-item" href="#">PHP</a>
              <a class="dropdown-item" href="#">CCS3</a>
              <a class="dropdown-item" href="#">HTML5</a>
              <a class="dropdown-item" href="#">jQuery</a>
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
