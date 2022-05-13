<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="container">
    <div class="py-5 text-center">
        <h2>My Orders</h2>
    </div>
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">Price</th>
                    <th scope="col">Status</th>
                    <th scope="col">Detail</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item) { ?>
                    <tr>
                        <th scope="row"><?php echo $item->id ?></th>
                        <td><?php echo $item->created_at ?></td>
                        <td><?php echo number_format($item->price, 2) ?></td>
                        <td><?php echo $item->status ?></td>
                        <td><button class="btn btn-primary order-detail" data-id="<?= $item->id ?>" data-toggle="model" data-target="#orderModel">
                                <span class="oi oi-eye"></span>
                            </button>
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
<div class="modal fade" id="orderModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Order details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Loading ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>