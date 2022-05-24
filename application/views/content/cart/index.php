<div class="container">
    <table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:50%">Product</th>
                <th style="width:10%">Price</th>
                <th style="width:8%">Quantity</th>
                <th style="width:22%" class="text-center">Subtotal</th>
                <th style="width:10%"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($all_cart['products'] as $key => $value) { ?>
                <tr>
                    <td data-th="Product">
                        <div class="row">

                            <div class="col-sm-2 hidden-xs"><img src="<?= $value['product']['image']  ?>" alt="..." class="img-responsive" style="width:80px" /></div>
                            <div class="col-sm-10">
                                <h4 class="nomargin"><?= $value['product']['title'] ?></h4>
                                <p><?= substr($value['product']['description'], 0, 100) . "..." ?></p>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price"><?php echo "PKR " . $value['product']['price'] ?></td>
                    <td data-th="Quantity">
                        <input type="number" class="form-control text-center" value="<?php echo $value['product']['quantity']; ?>">
                    </td>
                    <td data-th="Subtotal" class="text-center"><?php echo "PKR " . $value['product']['total']  ?></td>


                    <td class="actions" data-th="">
                        <button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                    </td>
                </tr>


            <?php }  ?>
        </tbody>
        <tfoot>
            <tr>
                <td><a href="<?php echo base_url('home') ?>" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                <td colspan="2" class="hidden-xs"></td>
                <td class="hidden-xs text-center"><strong>Total $ <?php echo $all_cart['grandTotal'] ?></strong></td>
                <td>
                    <?php if (isset($_SESSION['username']) && isset($_SESSION['email'])) { ?>
                        <a href="<?php echo base_url('checkout') ?>" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a>
                    <?php } else { ?>
                        <a href="<?php echo base_url('login') ?>" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a>
                    <?php } ?>
                </td>
            </tr>
        </tfoot>
    </table>
</div>