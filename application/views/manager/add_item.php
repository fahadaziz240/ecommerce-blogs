<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="container">
  <div class="row">
    <div class="col-6">
      <h1>Add Items</h1>
      <?= isset($error) ? $error : '' ?>
      <?= validation_errors() ?>
      <?= form_open_multipart(base_url('manager/add_item')) ?>
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="<?= set_value('title') ?>">
      </div>
      <div class="form-group">
        <label for="price">Price</label>
        <input type="number" class="form-control" min="0" step="0.01" id="price" name="price" value="<?= set_value('price') ?>>
            </div>
            <div class=" form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control-file" id="image" name="image">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description"><?= set_value('description') ?></textarea>
      </div>
      <button type="submit" class="btn btn-success">Add item</button>
      <?= form_close() ?>
    </div>
  </div>
</div>