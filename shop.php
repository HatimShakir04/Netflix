<?php
echo '<!DOCTYPE html>';
echo '<html lang="en">';
echo '<head>';
echo '<meta charset="UTF-8">';
echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
echo '<title>Shop - ZenChrono</title>';
echo '<link rel="stylesheet" href="shstyles.css">';
echo '</head>';
echo '<body>';
echo '<header>';
echo '<div class="logo">ZenChrono</div>';
echo '<nav>';
echo '<ul>';
echo '<li><a href="../landing-page.html">Home</a></li>';
echo '<li><a href="shop.php">Shop</a></li>';
echo '<li><a href="../about.html">About</a></li>';
echo '<li><a href="../contact.html">Contact</a></li>';
echo '<li><a href="../cart.html"><i class="cart-icon">🛒</i> Cart</a></li>';
echo '<li><a href="../user.html">Login</a></li>';
echo '</ul>';
echo '</nav>';
echo '</header>';
echo '<section class="shop">';
echo '<h2>Available Watches</h2>';
echo '<div class="product-grid">';
include 'db_connect.php';

// Fetch products from the database
$sql = "SELECT * FROM watches";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="product">';
        echo '<img src="images/' . $row['image'] . '" alt="' . $row['name'] . '">';
        echo '<h3>' . $row['name'] . '</h3>';
        echo '<p>' . $row['description'] . '</p>';
        echo '<p>$' . $row['price'] . '</p>';
        echo '<button onclick="addToCart(\'' . $row['name'] . '\', ' . $row['price'] . ', 1)">Add to Cart</button>';
        echo '</div>';
    }
} else {
    echo '<p>No products found.</p>';
}
echo '</div>';
echo '</section>';
echo '<footer>';
echo '<p>&copy; 2025 ZenChrono. All Rights Reserved.</p>';
echo '</footer>';
?>
<script>
    function addToCart(productName, price, quantity) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        cart.push({ productName, price, quantity });
        localStorage.setItem('cart', JSON.stringify(cart));
        alert(`Added ${quantity} item(s) of ${productName} to cart at $${price} each.`);
    }
</script>
</body>
</html>
