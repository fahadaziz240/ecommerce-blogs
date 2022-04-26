<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Categories <a class="btn btn-success" href="<?= base_url('manager/add_category') ?>">New Category</a></h1>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item) { ?>
                    <tr>
                        <th scope="row"><?php echo $item->id ?></th>
                        <td><?php echo $item->title ?></td>
                        <td>
                            <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?');" href="<?= base_url('manager/delete_category/' . $item->id) ?>"><span class="oi oi-trash"></span>
                            </a>
                            <a class="btn btn-info" href="<?= base_url('manager/edit_category/' . $item->id) ?>"><span class="oi oi-pencil"></span></a>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-12 m-auto">
            <?= $pagination ?>
        </div>
    </div>
</div>