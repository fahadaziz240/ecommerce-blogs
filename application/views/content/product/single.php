<div class="container">
    <div class="row">
        <?php foreach ($all_products as $key => $value) { ?>
            <div class="col-md-5">
                <img src="<?php echo $value['image'] ?>" class="card-img-top" alt="...">
            </div>
            <div class="col-md-7">
                <h2 class="card-text"><a class="pro_title" href="<?php echo base_url('product/' . $value['id']) ?>"><?php echo $value["title"] ?></a></h2>
                <h5 class="price">PKR :
                    <?php echo (int)($value["price"]) ?>
                </h5>
                <label>Quantity</label>
                <input type="number" name="quant[1]" class="form-control input-number" value="1" min="1" max="100">
                <br>
                <button type="button" class="btn btn-default cart">Add to Cart</button>
                <h4 class="p-desc">Description</h4>
                <p class="card-text p-text"><?php echo  $value["description"] ?></p>
            </div>
    </div>
<?php } ?>
</div>