<div class="container">
    <h2 class="mb-4">All Categories</h2>
    <div class="row">
        <?php foreach ($all_categories as $key => $value) { ?>
            <div class="col-md-4">
                <div class="card">
                    <img src="<?php echo $value['image'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <b>
                            <p class="card-text"><a href="<?php echo base_url('category/' . $value['id'] . '/products') ?>"> <?php echo $value["title"] ?></a></p>
                        </b>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>