<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Users</h1>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Email</th>
                    <th scope="col">Name</th>
                    <th scope="col">Level</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item) { ?>
                    <tr>
                        <th scope="row"><?php echo $item->id ?></th>
                        <td><?php echo $item->email ?></td>
                        <td><?php echo $item->first_name ?><?php echo $item->last_name ?></td>
                        <td>


                            <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?');" href="<?= base_url('manager/delete_user/' . $item->id) ?>"><span class="oi oi-trash"></span>
                            </a>
                            <a class="btn btn-info" href="<?= base_url('manager/edit_user/' . $item->id) ?>"><span class="oi oi-pencil"></span></a>

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