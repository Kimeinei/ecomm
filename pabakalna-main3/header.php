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
        <a hrefhome.php class="logo">Pabakal <span>Na</span></i></a>
            <nav class="navbar">
                    <ul>
                        <li><a href="home.php">home</a></li>
                        <li><a href="#">pages +</a>
                            <ul>
                                <li><a href="about.php">about</a></li>
                                <li><a href="contact.php">contact</a></li>
                            </ul>
                        </li>
                        <li><a href="shop.php">shop</a></li>
                        <li><a href="orders.php">orders</a></li>
                    </ul>
            </nav>

        <div class="icons">
            <a href="search_page.php" class="fas fa-search"></a>

            <?php
                $select_wishlist_count = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE user_id = '$user_id'") or die('query failed');
                $wishlist_num_rows = mysqli_num_rows($select_wishlist_count);
            ?>
            <a href="wishlist.php"><i class="fas fa-heart"></i><span>(<?php echo $wishlist_num_rows; ?>)</span></a>
            <?php
                $select_cart_count = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
                $cart_num_rows = mysqli_num_rows($select_cart_count);
            ?>
            <a href="cart.php"><i class="fas fa-shopping-cart"></i><span>(<?php echo $cart_num_rows; ?>)</span></a>
            <div id="user-btn" class="fas fa-user"></div>
            <div id="menu-btn" class="fas fa-bars"></div>
        </div>

        <div class="account-box">
        <i class="fa fa-user-circle" aria-hidden="true"></i>
            <h1 style="text-align: center; font-weight: bold; font-size: 28px; color: var(--black);">Account</h1>;
            <p>username : <span><?php echo $_SESSION['user_name']; ?></span></p>
            <p>email : <span><?php echo $_SESSION['user_email']; ?></span></p>
            <a href="logout.php" class="delete-btn">logout</a>
        </div>

    </div>

</header>