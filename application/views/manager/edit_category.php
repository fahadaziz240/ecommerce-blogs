<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="container">
  <div class="row">
    <div class="col-6">
      <h1>Edit Category</h1>
      <?= validation_errors() ?>
      <?= form_open(base_url('manager/edit_category/' . $item->id)) ?>
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="<?= set_value('title' . $item->title) ?>">
      </div>
      <button type="submit" class="btn btn-success">Edit</button>
      <?= form_close() ?>
    </div>
  </div>
</div>