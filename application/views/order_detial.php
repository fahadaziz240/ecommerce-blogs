<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            Shopping Cart
        </div>
        <div class="col-12">
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
                </div>
            <?php } ?>
        </div>
    </div>
</div>