<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <a class="navbar-brand" href="<?= site_url() ?>">Shop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?= site_url() ?>">Home <span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <?php if (!isset($_SESSION['username']) && !isset($_SESSION['email'])) { ?>
            <a href="<?php echo base_url('login') ?>" class="nav-link text-right">Login <i class="fa fa-angle-right"></i></a>
            <a class="nav-link text-right" href="<?php echo base_url('register') ?>">Register</a>
            <a class="nav-link text-right" href="<?php echo base_url() . 'cart' ?>">Cart</a>
        <?php } ?>
        <?php if (isset($_SESSION['username']) && isset($_SESSION['email'])) { ?>
            <a href="<?php echo base_url('logout/index') ?>" class="nav-link text-right">Logout <i class="fa fa-angle-right"></i></a>
            <a class="nav-link text-right" href="<?php echo base_url() . 'cart' ?>">Cart</a>
        <?php } ?>


    </div>
</nav>