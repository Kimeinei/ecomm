<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">
   <div class="flex">
   <div class="header-nav">
      <a href="seller_page.php" class="logo">Pabakal<span>Na</span></a>
      <nav class="navbar">
         <a href="seller_page.php">home</a>
         <a href="seller_products.php">products</a>
         <a href="seller_orders.php">orders</a>
         <a href="seller_contacts.php">messages</a>
      </nav>
   </div>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="account-box">
      <i class="fa fa-user-circle" aria-hidden="true"></i>
         <p>username : <span><?php echo $_SESSION['admin_name']; ?></span></p>
         <p>email : <span><?php echo $_SESSION['admin_email']; ?></span></p>
         <a href="logout.php" class="delete-btn">logout</a>
         <!--<div>new <a href="index.php">login</a> | <a href="register.php">register</a> </div>-->
      </div>

   </div>

</header>