<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="container">
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Price</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <? foreach ($items as $item) : ?>
                    <tr>
                        <th scope="row"><? $item->id ?></th>
                        <td><? $item->title ?></td>
                        <td><? $item->price ?></td>
                        <td>@mdo</td>
                    </tr>
                <? endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-12 m-auto">
            <?= $pagination ?>
        </div>
    </div>
</div>