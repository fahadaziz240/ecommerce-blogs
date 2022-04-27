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
                    <input type="text" id="firstname" class="form-control" required name="firstname" value="<?= set_value('firstname') ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="lastname">Last Name</label>
                    <input type="text" id="lastname" class="form-control" required name="lastname" value="<?= set_value('lastname') ?>">
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
                        <option value="Pakistan">Pakistan</option>
                        <option value="USA">United State</option>
                        <option value="UAE">United Arab Emirates</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="state">State</label>
                    <input type="text" class="form-control" required name="state" id="state">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="zip">Zip</label>
                    <input type="text" class="form-control" required name="zip" id="zip">
                </div>
            </div>
            <hr class="mb-4">
            <h4 class="mb-4">Payment</h4>
            <div class="d-block my-3">
                <div class="custom-control custom-radio">
                    <input type="radio" id="paypal" name="paymentmethod" class="custom-control-input" required>
                    <label class="custom-control-label" for="cash">Cash on Delivery</label>
                </div>
                <div class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Confirm</button>
                </div>
            </div>
            <?= form_close() ?>
        </div>
    </div>