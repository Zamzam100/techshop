<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: index.html");
    exit();
}

$sql = "SELECT * FROM products";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechShop - Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="nav-container">
                <h1 class="logo">TechShop</h1>
                <div class="nav-links">
                    <a href="home.php">Home</a>
                    <a href="#products">Products</a>
                    <a href="#about">About</a>
                    <a href="#contact">Contact</a>
                    <span class="user-info">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</span>
                    <a href="logout.php" class="logout-btn">Logout</a>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <section class="hero">
            <div class="hero-content">
                <h2>Welcome to TechShop</h2>
                <p>Your one-stop shop for the latest tech gadgets and accessories</p>
                <a href="#products" class="btn">Shop Now</a>
            </div>
        </section>

        <section id="products" class="products-section">
            <div class="container">
                <h2>Featured Products</h2>
                <div class="products-grid">
                    <?php foreach ($products as $product): ?>
                    <div class="product-card">
                        <div class="product-image">
                            <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                        </div>
                        <div class="product-info">
                            <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                            <p><?php echo htmlspecialchars($product['description']); ?></p>
                            <div class="product-price">$<?php echo number_format($product['price'], 2); ?></div>
                            <button class="btn add-to-cart">Add to Cart</button>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section id="about" class="about-section">
            <div class="container">
                <h2>About TechShop</h2>
                <p>We are passionate about technology and committed to providing our customers with the latest and greatest gadgets.</p>
            </div>
        </section>

        <section id="contact" class="contact-section">
            <div class="container">
                <h2>Contact Us</h2>
                <p>Email: support@techshop.com</p>
                <p>Phone: 1-800-TECHSHOP</p>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2023 TechShop. All rights reserved.</p>
        </div>
    </footer>

    <script>
        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', function() {
                alert('Product added to cart!');
            });
        });
    </script>
</body>
</html>