<!DOCTYPE html>
<html>
  <head>
  	<title>CodeIgniter</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/master.css">

    <!-- jquery -->
    <script
      src="http://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous">
    </script>

    <!-- ckeditor -->
    <script src="//cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
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
            <a class="nav-link" href="<?php echo base_url(); ?>about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>posts">Posts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>categories">Categories</a>
          </li>
        </ul>
        <?php if (!$this->session->userdata('logged_in')): ?>
          <a href="<?php echo base_url(); ?>users" class="btn btn-outline-primary my-2 my-sm-0">Login/Register</a>
        <?php else: ?>
          <a href="<?php echo base_url(); ?>/users/logout" class="btn btn-outline-danger my-2 my-sm-0">Logout</a>
        <?php endif; ?>

        <!-- <a class="nav-link" href="<?php echo base_url('/posts/create'); ?>/posts">Create Post</a> -->

        <!-- <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> -->
      </div>
    </nav>

    <div class="main-div">
      <div class="container-fluid">
        <!-- Flash message -->
        <div class="flash-message-section">
          <?php if ($this->session->flashdata('success')): ?>
            <?php echo '<p class="alert alert-success">'.$this->session->flashdata('success').'</p>'; ?>
          <?php endif; ?>
          <?php if ($this->session->flashdata('danger')): ?>
            <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('danger').'</p>'; ?>
          <?php endif; ?>
          <?php if ($this->session->flashdata('check_username_exists')): ?>
            <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('check_username_exists').'</p>'; ?>
          <?php endif; ?>
          <?php if ($this->session->flashdata('check_email_exists')): ?>
            <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('check_email_exists').'</p>'; ?>
          <?php endif; ?>
        </div>
