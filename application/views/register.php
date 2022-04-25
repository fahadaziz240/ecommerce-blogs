<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="container">
  <div class="row">
    <div class="col-6 offset-md-3 text-center">
      <h1 class="mb-3">Register</h1>
      <?php if (isset($success) && $success) { ?>
        <div class="alert alert-success">
          Registration Completed Successful <a href="<?php base_url() ?>">Home</a>
        </div>
    </div>
  </div>
<?php } else { ?>
  <?= validation_errors() ?>
  <?= form_open(base_url('home/register')) ?>
  <div class="form-group">
    <input type="email" class="form-control" required name="email" value="<?php echo set_value('email') ?>" placeholder="Email">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" required name="first_name" value="<?php echo set_value('first_name') ?>" placeholder="First Name">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" required name="last_name" value="<?php echo set_value('last_name') ?>" placeholder="Last Name">
  </div>
  <div class="form-group">
    <input type="password" class="form-control" required name="password" value="<?php echo set_value('password') ?>" placeholder="Password">
  </div>
  <div class="form-group">
    <input type="password" class="form-control" required name="passconf" value="<?php echo set_value('passconf') ?>" placeholder="Confirm Password">
  </div>
  <button type="submit" class="btn btn-block btn-primary">Register</button>
  <?= form_close() ?>
  <div class="row">
    <div class="col-12">
      <a class="btn btn-info mt-4" href="<?= base_url('home/login') ?>">Back to Login</a>
    </div>
  </div>
<?php } ?>