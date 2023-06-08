<?php include_once('../private/initialize.php'); ?>

<?php


use MyApp\classes\Book;
use MyApp\classes\DVD;
use MyApp\classes\Furniture;

$errors = validate_inputs();

if(isset($_POST['submit']) && empty($errors)){
  $result = '';
  $args = [];
  $args['sku'] = $_POST['sku'] ?? NULL;
  $args['name'] = $_POST['name'] ?? NULL;
  $args['price'] = $_POST['price'] ?? NULL;
  $args['weight_kg'] = $_POST['weight_kg'] ?? NULL;
  $args['size'] = $_POST['size'] ?? NULL;
  $args['width'] = $_POST['width'] ?? NULL;
  $args['length'] = $_POST['length'] ?? NULL;
  $args['height'] = $_POST['height'] ?? NULL;

  if ($_POST['weight_kg'] != NULL) {
    $book = new Book($args);
    $result = $book->save();
    
  }

  if ($_POST['size'] != NULL) {
    $dvd = new DVD($args);
    $result = $dvd->save();
  }

  if ($_POST['width'] != NULL && $_POST['length'] != NULL && $_POST['height'] != NULL) {
    $furniture = new Furniture($args);
    $result = $furniture->save(); 
  }

  if ($result === true) {
    header('Location: index.php');
    exit;
  } else {
  
  }
}

?>
<!-- Have different page title for each page -->
<?php $page_title = 'Product Add'; ?>
<?php include('../private/shared/head.php'); ?>
<style>


form {
  display: flex;
  flex-direction: column;

  justify-content: flex-start;
  margin-right: 1000px;
  margin-top: 30px;
}

.form-group {
  margin-bottom: 40px;
}


hr{
  border: 1px solid black;
  margin-bottom: 10px;
  margin-top: -2px;
  margin-left: 280px;
  margin-right: 280px;
}
.hr{
  border: 1px solid black;
  margin-bottom: 10px;
  margin-top: 220px;
  margin-left: 280px;
  margin-right: 280px;
}
h1{
  color: black;
  font-weight: bold;

}
body {
  height: 100vh;
}
header{
  margin-top: 20px;
}
nav{

position: relative;
top: 40px;

}
#submit {
  background-color: white;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
  padding: 10px;
  margin-right: 15px;
  width: 70px;
  height: 40px;

}
button[type='button']{
  background-color: white;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
  padding: 10px;
  margin-right: 15px;
  width: 70px;
  height: 40px;
}
header{
  margin-top: 20px;
}
.form-group label {
  margin-bottom: 5px;
  margin-right: 30px;
}

.form-group input {
  margin-bottom: 10px;
  border: 2px solid black;
  
}
.form-group select{

   margin-right: 50px;
    border: 1px solid #ccc;
    border-radius: 3px;
  }
  form{
    text-align: center;
  }


</style>
<body>
<div class="container">
  <header>

    <nav>

      <h1>Product Add</h1>
      <div id='form-buttons'>
        <button name='submit' id="submit" type="submit" form='product_form' >Save</button>
        <a href="./index.php">
          <button type='button'>Cancel</button>
        </a>
      </div>
    </nav>
  </header>
  <hr>
  <?= $errors ;?>
  <form  action="" id="product_form" method="POST">
  <div class="form-group">
    
    <label for="sku">SKU</label>
    <input type="text" name="sku" id="sku" maxlength="9" placeholder="VKR12345" value="<?= $_POST['sku'] ?? ''; ?>">
  </div>

  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" maxlength="30" placeholder="Product name" value="<?= $_POST['name'] ?? ''; ?>">
  </div>

  <div class="form-group">
    <label for="price">Price ($)</label>
    <input type="text" name="price" id="price" placeholder="0.0" value="<?= $_POST['price'] ?? ''; ?>">
  </div>

  <div class="form-group">
    <label for="productType">Type Switcher</label>
    <select name="typeSwitcher" id="productType">
      <option value="dvd" id="DVD" <?= get_selected_type('dvd'); ?>>DVD</option>
      <option value="book" id="Book" <?= get_selected_type('book'); ?>>Book</option>
      <option value="furniture" id="Furniture" <?= get_selected_type('furniture'); ?>>Furniture</option>
    </select>
  </div>

  <div class="form-group" id="size-container">
    <p>Please provide a size in megabyte (MB).</p>
    <label for="size">Size (MB)</label>
    <input type="text" name="size" id="size" placeholder="0" maxlength="5" value="<?= $_POST['size'] ?? ''; ?>">
  </div>

  <div class="form-group" id="weight-container">
    <p>Please provide a weight in kilograms (KG).</p>
    <label for="weight">Weight (KG)</label>
    <input type="text" name="weight_kg" id="weight" placeholder="0.0" maxlength="3" value="<?= $_POST['weight_kg'] ?? ''; ?>">
  </div>

  <div class="form-group" id="dimensions-container">
    <p>Please provide dimensions in HxWxL (height/width/length) format.</p>
    <label for="height">Height (CM)</label>
    <input type="text" name="height" id="height" placeholder="0" maxlength="5" value="<?= $_POST['height'] ?? ''; ?>"><br>
    <label for="width">Width (CM)</label>
    <input type="text" name="width" id="width" placeholder="0" maxlength="5" value="<?= $_POST['width'] ?? ''; ?>"><br>
    <label for="length">Length (CM)</label>
    <input type="text" name="length" id="length" placeholder="0" maxlength="5" value="<?= $_POST['length'] ?? ''; ?>"><br>
  </div>
</form>
<hr class="hr">
<?php include('../private/shared/footer.php'); ?>  
<script src="https://code.jquery.com/jquery-3.6.3.min.js"
  integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
  crossorigin="anonymous"></script>
<script src='./script.js'></script>
</body>
</html>
