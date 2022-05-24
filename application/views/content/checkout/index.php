<div class="container">
    <div class="row">
        <div class="col-md-8">

            <?php echo validation_errors(); ?>
            <form method="POST" action=<?= base_url() . "checkout/submit" ?>>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputUsername">Username</label>
                        <input type="text" name="username" class="form-control" id="inputUsername" placeholder="Username">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Address</label>
                    <input type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St">
                </div>
                <div class="form-row">
                    <div class=" form-group col-md-6">
                        <label for="inputState">Country</label>
                        <select name="country" id="inputState" class="form-control">
                            <option value="Pakistan"> Pakistan </option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState">State</label>
                        <select name="state" id="inputState" class="form-control">
                            <option value="Punjab"> Punjab </option>
                            <option value="KPK"> KPK </option>
                            <option value="Sindh"> Sindh </option>
                            <option value="Balochistan"> Balochistan </option>
                        </select>
                    </div>
                </div>
                <button type=" submit" class="btn btn-primary">Check Out</button>
            </form>
        </div>
    </div>
</div>