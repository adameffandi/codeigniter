<!DOCTYPE html>
<html>
  <head>
  	<title>CodeIgniter</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/master.css">
    <script
      src="http://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous">
    </script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
      <a class="navbar-brand" href="<?php echo base_url(); ?>">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>/about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>/posts">Posts</a>
          </li>
        </ul>
        <a class="nav-link" href="<?php echo base_url('/posts/create'); ?>/posts">Create Post</a>

        <!-- <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> -->
      </div>
    </nav>

    <div class="main-div">
      <div class="container-fluid">
