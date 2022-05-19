<div class="container">
    <div class="row">
        <?php foreach ($all_products as $key => $value) { ?>
            <div class="col-md-5">
                <a href="<?php echo base_url('product/' . $value['id']) ?>"> <img src="<?php echo $value['image'] ?>" class="card-img-top" alt="..."></a>
            </div>
            <div class="col-md-7">
                <h2 class="card-text"><a class="pro_title" href="<?php echo base_url('product/' . $value['id']) ?>"><?php echo $value["title"] ?></a></h2>
                <h5 class="price">PKR :
                    <?php echo (int)($value["price"]) ?>
                </h5>
                <form action="<?php echo base_url('cart/add_to_cart') ?>" method="POST">
                    <label>Quantity</label>
                    <input type="number" name="quantity" class="form-control input-number" value="1" min="1" max="100">
                    <input type="hidden" name="product_id" value="<?php echo $value['id']; ?>">
                    <br>
                    <button type="submit" class="btn btn-default cart">Add to Cart</button>
                </form>
                <h4 class="p-desc">Description</h4>
                <p class="card-text p-text"><?php echo  $value["description"] ?></p>
            </div>
    </div>
<?php } ?>
</div>