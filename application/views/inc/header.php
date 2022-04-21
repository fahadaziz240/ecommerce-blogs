<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css')?>" >
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css')?>" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?= site_url()?>">Shop</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
   <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?= site_url()?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php foreach($categories as $category):?>
              <a class="dropdown-item" href="<?= base_url('category/'.$category->id)?>"><?= $category->title?></a>
            <?php endforeach;?>
        </div>
      </li>
    </ul>
   
    <?if(isset($user['logged']) && $user['logged']):?>
      <div class="dropdown">
      <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"
       data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
       <?=$user['username']?>
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
        <?if($user['level'] == 1):?>
        <li><a href="<?=base_url('manager/items')?>">Product</a></li>
        <li><a href="<?=base_url('manager/categories')?>">Categories</a></li>
        <?endif;?>
        <div class="dropdown-divider"></div>
        <li><a class="dropdown-item" href="<?=base_url('home/logout')?>">Logout</a></li>
      </ul>
      </div>
    <?else:?>
      <a class="nav-link" href="<?=base_url('home/login')?>">Enter</a>
    <?endif;?>
      <form class="form-inline my-2 my-lg-0 action="" method="get"">
      <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>