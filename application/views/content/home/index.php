 <div class="container">

     <div class="d-flex justify-content-between align-items-center;">
         <h2 class="mb-4">Products by Category</h2>

         <a href="<?php echo base_url() . 'category' ?>">
             <h5>View More</h5>
         </a>
     </div>
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
 <br>
 <div class="container">

     <div class="d-flex justify-content-between align-items-center;">
         <h2 class="mb-4">Products</h2>

         <a href="<?php echo base_url() . 'product' ?>">
             <h5>View More</h5>
         </a>
     </div>
     <div class="row">
         <?php foreach ($all_products as $key => $value) { ?>
             <div class="col-md-4">
                 <div class="card">
                     <img src="<?php echo $value['image'] ?>" class="card-img-top" alt="...">
                     <div class="card-body">
                         <b>
                             <p class="card-text"><a href="<?php echo base_url('product/' . $value['id']) ?>"> <?php echo $value["title"] ?></a></p>
                         </b>
                     </div>
                 </div>
             </div>
         <?php } ?>
     </div>
 </div>