<?php
session_start();
ob_start();
@include 'config.php';


$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:index.php');
   ob_end_flush();
};

if(isset($_POST['add_product'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $price = mysqli_real_escape_string($conn, $_POST['price']);
   $details = mysqli_real_escape_string($conn, $_POST['details']);
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folter = 'uploaded_img/'.$image;

   $select_product_name = mysqli_query($conn, "SELECT name FROM `products` WHERE name = '$name'") or die('query error');

   if(mysqli_num_rows($select_product_name) > 0){
      $message[] = 'product name already exist!';
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO `products`(name, details, price, image) VALUES('$name', '$details', '$price', '$image')") or die('query error');

      if($insert_product){
         if($image_size > 2000000){
            $message[] = 'image size is too large!';
         }else{
            move_uploaded_file($image_tmp_name, $image_folter);
            $message[] = 'product added successfully!';
         }
      }
   }

}

if(isset($_GET['delete'])){

   $delete_id = $_GET['delete'];
   $select_delete_image = mysqli_query($conn, "SELECT image FROM `products` WHERE id = '$delete_id'") or die('query error');
   $fetch_delete_image = mysqli_fetch_assoc($select_delete_image);
   unlink('uploaded_img/'.$fetch_delete_image['image']);
   mysqli_query($conn, "DELETE FROM `products` WHERE id = '$delete_id'") or die('query error');
   mysqli_query($conn, "DELETE FROM `wishlist` WHERE pid = '$delete_id'") or die('query error');
   mysqli_query($conn, "DELETE FROM `cart` WHERE pid = '$delete_id'") or die('query error');
   header('location:seller_products.php');
   ob_end_flush();

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Pabakal Na Products</title>

   <link rel="icon" href="image/logo.png" type="image/icon type">
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>
   
<?php @include 'seller_header.php'; ?>
<h2>All Products</h2>
<section class="show-products">

   <div class="box-container">

      <?php
         $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query error');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
      <div class="box">
         <div class="price">₱<?php echo $fetch_products['price']; ?></div>
         <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
         <div class="name"><?php echo $fetch_products['name']; ?></div>
         <div class="details"><?php echo $fetch_products['details']; ?></div>
         <a href="seller_update_products.php?update=<?php echo $fetch_products['id']; ?>" class="option-btn">update</a>
         <a href="seller_products.php?delete=<?php echo $fetch_products['id']; ?>" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
      </div>
      <?php
         }
      }else{
         echo '<div class="empty"><i class="fa fa-times-circle" aria-hidden="true"></i><p>no products added yet!</p></div';
      }
      ?>
   </div>

   </section>
   
<section class="add-products">
<form action="" method="POST" enctype="multipart/form-data">
   <h3>add new product</h3>
   <input type="text" class="box" required placeholder="enter product name" name="name">
   <input type="number" min="0" class="box" required placeholder="enter product price" name="price">
   <textarea name="details" class="box" required placeholder="enter product details" cols="30" rows="10"></textarea>
   <input type="file" accept="image/jpg, image/jpeg, image/png" required class="box" name="image">
   <input type="submit" value="add product" name="add_product" class="btn">
</form>

   

</section>












<script src="js/admin_script.js"></script>

</body>
</html>