<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="container">
    <div class="row">
        <div class="col-6 offset-md-3 text-center">
            <h1 class="mb-3 py-5">Login</h1>
            <?php if (isset($error)) { ?>
                <div class="alert alert-danger"><?php echo $error ?></div>
            <?php } ?>
            <?php echo validation_errors() ?>
            <?php echo form_open(base_url('home/login')) ?>
            <div class="form-group">
                <input type="email" class="form-control" required placeholder="Email" name="email" value="<?php echo set_value('email') ?>">
            </div>
            <div class="form-group">
                <input type="password" placeholder="Password" required class="form-control" name="password" value="<?php echo set_value('password') ?>">
            </div>
            <button type="submit" class="btn btn-block btn-primary">Login</button>
            <?php echo form_close() ?>
            <div class="row">
                <div class="col-12">
                    <a class="btn btn-info mt-4" href="<?php echo base_url('home/register') ?>">Register</a>
                </div>
            </div>
        </div>
    </div>
</div>