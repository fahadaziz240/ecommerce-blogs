<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="container">
  <div class="row">
    <div class="col-6">
      <h1>Edit User</h1>
      <?= isset($error) ? $error : '' ?>
      <?= validation_errors() ?>
      <?= form_open_multipart(base_url('manager/edit_user/' . $users->id)) ?>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="emial" class="form-control" id="emial" name="email" value="<?= set_value('email', $users->email) ?>">
      </div>
      <div class="form-group">
        <label for="level">Level</label>
        <input type="number" min="0" step="1" class="form-control" id="level" name="level" value="<?= set_value('level', $users->level) ?>">
      </div>
      <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" class="form-control" id="first_name" name="first_name" value="<?= set_value('first_name', $users->first_name) ?>">
      </div>
      <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" class="form-control" id="last_name" name="last_name" value="<?= set_value('last_name', $users->last_name) ?>">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="text" class="form-control" id="password" name="password" value="<?= set_value($users->password) ?>">
      </div>

      <button type="submit" class="btn btn-success">Edit</button>
      <?= form_close() ?>
    </div>
  </div>
</div>