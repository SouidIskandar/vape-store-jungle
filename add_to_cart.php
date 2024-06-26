<?php
session_start();

// Initialize the cart if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Get the product ID and quantity from the POST request
$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];

// Check if the product is already in the cart
if (isset($_SESSION['cart'][$product_id])) {
    // If it is, increase the quantity
    $_SESSION['cart'][$product_id] += $quantity;
} else {
    // If not, add it to the cart with the specified quantity
    $_SESSION['cart'][$product_id] = $quantity;
}

// Redirect back to the product listing page (or any other page you prefer)
header('Location: shop.php');
exit();
?>
