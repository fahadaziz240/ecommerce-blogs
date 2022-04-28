<div class="container">
    <div class="py-5 text-center">
        <h2>Checkout</h2>
    </div>

    <div class="row">
        <div class="col-md-8">
            <h4 class="mb-3">Billing Address</h4>
            <?= form_open() ?>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="First Name">First Name</label>
                    <input type="text" id="firstname" class="form-control" required name="firstname" value="<?= set_value('firstname', $user['first_name']) ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="lastname">Last Name</label>
                    <input type="text" id="lastname" class="form-control" required name="lastname" value="<?= set_value('lastname', $user['last_name']) ?>">
                </div>
            </div>

            <div class="mb-3">
                <label for="address">Address</label>
                <input type="text" id="Address" class="form-control" required name="Address" value="<?= set_value('Address') ?>" placeholder="123 main str">
            </div>
            <div class="mb-3">
                <label for="address_e">Address 2<span class="text-muted">(Optional)</span></label>
                <input type="text" id="address_e" class="form-control" required name="address_e" value="<?= set_value('address_e') ?>" placeholder="Appartment or Suite">
            </div>
            <div class="row">
                <div class="col-md-5 mb-3">
                    <label for="country">Country</label>
                    <select name="country" id="country" class="custom-select d-block w-100">
                        <option value="...">Choose Country</option>
                        <?php foreach ($country as $con) { ?>
                            <option value="<?php echo $con['code'] ?>"><?php echo $con['name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="state">State</label>
                    <input type="text" class="form-control" required value="<?= set_value('state') ?>" name="state" id="state">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="zip">Zip</label>
                    <input type="text" class="form-control" required value="<?= set_value('zip') ?>" name="zip" id="zip">
                </div>
            </div>
            <hr class="mb-4">
            <h4 class="mb-3">Payment</h4>
            <div class="d-block my-3">
                <div class=" d-block my-3 form-check">
                    <input class="form-check-input" name="payementmethod" type="radio" value="<? set_value('payementmethod') ?>" id="flexCheckChecked" required>
                    <label class="form-check-label" for="cash">
                        Cash on Delivery
                    </label>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Confirm</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>