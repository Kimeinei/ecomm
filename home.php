<?php
session_start();
@include 'config.php';

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:index.php');
}

if(isset($_POST['add_to_wishlist'])){
   // Your existing code for adding to wishlist
}

if(isset($_POST['add_to_cart'])){
   // Your existing code for adding to cart
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Pabakal Na Shop</title>

   <link rel="icon" href="image/logo.png" type="image/icon type">
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
   
<?php @include 'header.php'; ?>
<section class="banner">
    <!-- Banner section content -->
</section>

<section class="home">

   <div class="content">
      <h3>Collections</h3>
      <p>Welcome to PABAKAL's Collections, where Bicol University 
         student entrepreneurs showcase their innovative creations, 
         infusing each product with passion and creativity. Discover
         a curated collection of unique treasures, handcrafted with 
         care and designed to enrich your life. Join us in celebrating 
         the entrepreneurial spirit of our students and uncover the 
         hidden gems waiting to be discovered.</p>
      <a href="about.php" class="btn">discover more</a>
   </div>

</section>

<section class="products">

   <h1 class="title">latest products</h1>

   <div class="box-container">

      <?php
         $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 9") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
      <div class="box">
         <!-- Existing product details -->
         <a href="view_page.php?pid=<?php echo $fetch_products['id']; ?>" class="fas fa-eye"></a>
         <div class="price">₱<?php echo $fetch_products['price']; ?>/-</div>
         <img src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="" class="image">
         <div class="name"><?php echo $fetch_products['name']; ?></div>
         <input type="number" name="product_quantity" value="1" min="0" class="qty">
         <input type="hidden" name="product_id" value="<?php echo $fetch_products['id']; ?>">
         <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
         <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
         <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
         <input type="submit" value="add to wishlist" name="add_to_wishlist" class="option-btn">
         <input type="submit" value="add to cart" name="add_to_cart" class="btn">
         
         <!-- Reviews Section -->
         <div class="reviews">
            <h3>Product Reviews</h3>
            <?php
               $product_id = $fetch_products['id'];
               $reviews_query = mysqli_query($conn, "SELECT * FROM `reviews` WHERE product_id = '$product_id'");
               if (mysqli_num_rows($reviews_query) > 0) {
                  while ($review = mysqli_fetch_assoc($reviews_query)) {
            ?>
            <div class="review">
               <p><strong>Rating:</strong> <?php echo $review['rating']; ?></p>
               <p><strong>Comment:</strong> <?php echo $review['comment']; ?></p>
            </div>
            <?php
                  }
               } else {
                  echo '<p>No reviews yet.</p>';
               }
            ?>
            <!-- Add New Review Form -->
            <form action="" method="post">
               <input type="hidden" name="product_id" value="<?php echo $fetch_products['id']; ?>">
               <input type="number" min="1" max="5" name="rating" placeholder="Rating (1-5)" required>
               <textarea name="comment" placeholder="Enter your review" required></textarea>
               <button type="submit" name="add_review">Add Review</button>
            </form>
         </div>
      </div>
      <?php
            }
         } else {
            echo '<p class="empty">no products added yet!</p>';
         }
      ?>

   </div>

   <div class="more-btn">
      <a href="shop.php" class="option-btn">load more</a>
   </div>

</section>

<section class="home-contact">

   <div class="content">
      <h3>have any questions?</h3>
      <p>Feel free to ask! I'm here to assist with any inquiries or help you may need.</p>
      <a href="contact.php" class="btn">contact us</a>
   </div>

</section>

<?php @include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>
