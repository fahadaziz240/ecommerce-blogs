<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
        <div class="row">
            <div class="col-6 offset-md-3 text-center">
            <h1 class="mb-3">Login</h1>
            <?if(isset($error)):?>
                <div class="alert alert-danger">
                
                </div>
            <?endif;?>
            <?=validation_errors()?>
            <?=form_open(base_url('home/login')) ?>
                 <div class="form-group">
              <input type="email" class="form-control" placeholder="Email"
               name="email" value="<?=set_value('email')?>">
            </div>     
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control" 
              name="password" value="<?=set_value('password')?>">
            </div>
            <button type="submit" class="btn btn-block btn-primary">Enter</button>
            <?= form_close()?>
            <div class="row">
                <div class="col-12">
                    <a class="btn btn-info mt-4" href="<?=base_url('home/register')?>">Register</a>
                </div>
            </div>    
        </div>
    </div>
</div>
 