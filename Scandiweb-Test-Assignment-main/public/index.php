<?php

use MyApp\classes\Product;

include_once('../private/initialize.php'); 
 include('../private/shared/head.php'); 
$products = Product::select_all();

// Delete the selected items
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['deleteId'])) {

  Product::delete();
}
 
 ?>
 <!-- Have different page title for each page -->
<?php $page_title = 'Product List'; ?>
<?php include('../private/shared/head.php'); ?>
<style>
form{
  margin: auto;
  width: ;
}
</style>
<body>
  <div class="container">
    <header>
      <nav>
        <h1>Product List</h1>
        
        <div id='nav-buttons'>
          <a href="./new_product.php"><button id='add-product-btn' type='button'>ADD</button></a>
          <button id='delete-product-btn' form='product_list' type='submit' name='delete'>MASS DELETE</button>
        </div>
    
      </nav>


    </header>
    <hr>
    <main>
      <!-- Get all the products from the database and display them -->
      <form action="" id="product_list" method="POST">
        <?php foreach ($products as $product) { ?>
        <div class="product-container">
          <input type="checkbox" name="deleteId[]" value="<?= $product->id ?>" class="delete-checkbox">
          <div class="product-info">
            <span><?= $product->sku; ?></span><br>
            <span><?= $product->name; ?></span><br>
            <span><?= $product->price; ?>.00$</span><br>
            <span>
              <?php
          $weight = $product->weight_kg != 0.0 ? "Weight: " . $product->weight_kg . "KG" : '';
          if (!empty($weight)) {
            echo '<span>' . $weight . '</span><br>';
          }?>
          <?php
          $size = $product->size != 0 ?  "Size: " . $product->size . "MB" : '';
          
          if (!empty($size)) {
            echo '<span>' . $size . '</span><br>';
          }
          ?>
          <?php
        
          
          if (!empty($dimensions)) {
            echo '<span>' . $dimensions . '</span><br>';
            $dimensions = $product->length != '0' ? "Dimensions: " . extract_from_database_array($product->dimensions) : '';
          }
          ?>
              
            </span>
          </div>
        </div>
        <?php } ?>
      </form>
      <hr class="hr">
      <?php include('../private/shared/footer.php'); ?>
    </main>
  </div>
</body>
</html>