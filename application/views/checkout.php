<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="container">
    <div class="py-5 text-center">
        <h2>Checkout</h2>
    </div>
    <div class="row">
        <div class="col-md-8">
            <h4 class="mb-3">Billing Address</h4>
            <?= isset($error) ? $error : '' ?>
            <?= validation_errors() ?>
            <form action="<?php echo base_url('checkout_post') ?>" method="POST">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" name="firstname" value="<?php echo $user['first_name'] ?>" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control" name="lastname" value="<?php echo $user['last_name'] ?>" readonly>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" value="" placeholder="123 Main Street" required>
                </div>
                <div class="mb-3">
                    <label for="address2">Address 2<span class="text-muted">(Optional)</span></label>
                    <input type="text" class="form-control" name="address2" value="" placeholder="Apartment or Suite" required>
                </div>
                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="country">Country</label>
                        <select name="country" id="country" class="custom-select d-block w-100">
                            <option value="">Choose...</option>
                            <?php foreach ($country as $con) : ?>
                                <option value="<?php echo $con['code']  ?>"><?php echo $con['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="state">State</label>
                        <input type="text" name="state" value="" class="form-control">
                    </div>
                    <div class="col-md-3  mb-3">
                        <label for="zip">Zip</label>
                        <input type="text" name="zip" value="" class="form-control">
                    </div>
                </div>
                <hr class="mb-4">
                <h4 class="mb-4">Payement</h4>
                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input type="radio" name="payment" class="custom-control-input" required />
                        <label class="custom-control-label" for="cash">Cash On Delivery</label>
                    </div>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Confirm</button>
            </form>
        </div>
    </div>
</div>