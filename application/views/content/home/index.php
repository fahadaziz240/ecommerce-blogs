 <div class="container">

     <div class="d-flex justify-content-between align-items-center;">
         <h2 class="mb-4">Products by Category</h2>

         <a href="<?php echo base_url('category/index')  ?>">
             <h5>View More</h5>
         </a>
     </div>
     <div class="row">
         <?php foreach ($all_categories as $key => $value) { ?>
             <div class="col-md-4">
                 <div class="card">
                     <a href="<?php echo base_url('category/' . $value['id'] . '/products') ?>"> <img src="<?php echo $value['image'] ?>" class="card-img-top" alt="..."></a>
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
         <h2 class="mb-4">Products by Popularity</h2>
     </div>
     <div class="row">
         <?php foreach ($all_popularity as $key => $value) { ?>
             <div class="col-md-4">
                 <div class="card">
                     <a href="<?php echo base_url('product/' . $value['id']) ?>"> <img src="<?php echo $value['image'] ?>" class="card-img-top" alt="..."></a>

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

 <div class="container">

     <div class="d-flex justify-content-between align-items-center;">
         <h2 class="mb-4">Featured Products</h2>
     </div>
     <div class="row">
         <?php foreach ($all_featured as $key => $value) { ?>
             <div class="col-md-4">
                 <div class="card">
                     <a href="<?php echo base_url('product/' . $value['id']) ?>"> <img src="<?php echo $value['image'] ?>" class="card-img-top" alt="..."></a>

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