<div class="container">
    <div class="d-flex justify-content-between align-items-center;">
        <h2 class="mb-4">Products</h2>
    </div>
    <div class="row">
        <?php foreach ($all_products as $key => $value) { ?>

            <div class="col-md-4">
                <div class="card">
                    <a href=" <?php echo base_url('product/' . $value['id']) ?>"> <img src=" <?php echo $value['image'] ?>" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                        <p class="card-text"><?php echo (int)($value["price"]) ?></p>
                        <b>
                            <p class="card-text"><a href="<?php echo base_url('product/' . $value['id']) ?>"><?php echo $value["title"] ?></a></p>
                        </b>
                        <p class="card-text"><?php echo substr($value["description"], 0, 150) . '....' ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>