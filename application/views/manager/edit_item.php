<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="container">
  <div class="row">
    <div class="col-6">
      <h1>Edit Items</h1>

      <?= isset($error) ? $error : '' ?>
      <?= validation_errors() ?>
      <?= form_open_multipart(base_url('manager/edit_item/' . $items->id)) ?>
      <div class="form-group">

        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="<?php echo set_value('title', $items->title) ?>">
      </div>
      <div class="form-group">
        <label for="price">Price</label>
        <input type="number" class="form-control" min="0" step="0.01" id="price" name="price" value="<?php echo set_value('price', $items->price) ?>">
      </div>
      <div class=" form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control-file" id="image" name="image">
      </div>
      <div class="row">
        <div class="col-6">
          <img src="<?= base_url('uploads/' . $items->image) ?>" class="img-fluid">
        </div>
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description"><?php echo set_value('description', $items->description) ?></textarea>
      </div>
      <button type="submit" class="btn btn-success">Edit</button>
      <?= form_close() ?>
    </div>
  </div>
</div>