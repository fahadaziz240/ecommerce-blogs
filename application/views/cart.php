<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            Shopping Cart
        </div>
        <div class="col-12">
            <?php if (!isset($items) || count($items) == 0) { ?>
                <div class="alert alert-warning">Your cart is empty</div>
            <?php } else { ?>
                <?php foreach ($items as $id => $item) { ?>
                    <div class="row">
                        <div class="col-2">
                            <img src="<?php echo base_url('uploads/' . $item->image) ?>" alt="" class="img-thumbnail">
                        </div>
                        <div class="col-6">
                            <h3><?php echo $item->title ?></h3>
                        </div>
                        <div class="col-3">
                            <h3><?php echo $item->price ?></h3>
                        </div>
                        <div class="col-1">
                            <a class="btn btn-danger Delete" href="<?php echo base_url() . 'cart?del=' . ($id + 1) ?>">
                                <span class="oi oi-trash"></span>
                            </a>
                        </div>
                    </div>
                <?php } ?>
                <hr>
                <div class="row">
                    <div class="col-8">
                        <h2>Total :</h2>
                    </div>
                    <div class="col-4">
                        <h4><?php echo $total ?> USD</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 offset-md-8">
                        <a class="btn btn-success btn-block" href="<?php echo base_url('checkout') ?>">Checkout</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>