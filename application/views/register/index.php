<div class="container">
    <div class="row">
        <div class="col-6 offset-md-3 text-center">
            <h1 class="mb-3">Register</h1>
            <?php validation_errors() ?>
            <form action="<?php base_url('register') ?>" method="POST" ?>
                <div class="form-group">
                    <input type="text" class="form-control" required name="username" value="" placeholder="Username">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" required name="email" value="" placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" required name="password" value="" placeholder="Password">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" required name="passconf" value="" placeholder="Confirm Password">
                </div>
                <button type="submit" class="btn btn-block btn-primary">Register</button>
            </form>
            <div class="row">
                <div class="col-12">
                    <a class="btn btn-info mt-4" href="<?= base_url('login') ?>">Back to Login</a>
                </div>
            </div>
        </div>
    </div>
</div>