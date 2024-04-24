<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PabakalNa</title>
  <link rel="stylesheet" href="css/home.css">
</head>
<body>
  <header>
    <div class="title">
      <h1>PabakalNa</h1>
    </div>
    <nav>
      <ul>
        <li><a href="#">HOME</a></li>
        <li><a href="#">PRODUCTS</a></li>
        <li><a href="#">CART</a></li>
        <li><a href="logout.php">LOGOUT</a></li>
      </ul>
    </nav>
    <div class="search-bar">
      <input type="text" id="searchInput" placeholder="Search...">
    </div>
  </header>
  <main>
    <section class="product-list">
      <div class="product-card">
        <img src="product1.jpg" alt="Product 1">
        <h2>Product 1</h2>
        <p>Description of Product 1 goes here.</p>
        <button>Add to Cart</button>
      </div>
      <div class="product-card">
        <img src="product2.jpg" alt="Product 2">
        <h2>Product 2</h2>
        <p>Description of Product 2 goes here.</p>
        <button>Add to Cart</button>
      </div>
      <!-- Add more product cards as needed -->
    </section>
  </main>
  <footer>
    <p>&copy; 2024 PabakalNa. All rights reserved.</p>
  </footer>
</body>
</html>
