<div class="container">
    <div class="row">
        <div class="col-6 offset-md-3 text-center">
            <h1 class="mb-3 py-5">Login</h1>
            <?php echo validation_errors() ?>
            <form action="<?php echo base_url('login/submit') ?>" method="POST">
                <div class="form-group">
                    <input type="email" class="form-control" required placeholder="Email" name="email" value="">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Password" required class="form-control" name="password" value="">
                </div>
                <button type="submit" class="btn btn-block btn-primary">Login</button>
                <?php echo form_close() ?>
                <div class="row">
                    <div class="col-12">
                        <a class="btn btn-info mt-4" href="<?php echo base_url('register') ?>">Register</a>
                    </div>
                </div>
        </div>
    </div>
</div>