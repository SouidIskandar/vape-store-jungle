<?php
include '../db.php';

// Check if the product ID is provided
$response = "";

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Fetch product details from the database to confirm deletion
    $sql = "SELECT * FROM products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();

    if (!$product) {
        echo "Product not found!";
        exit();
    }

    // Delete product if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sql = "DELETE FROM products WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $product_id);

        if ($stmt->execute()) {
            $response = "success";
            header("Location: list_product.php");
            exit();
        } else {
            $response = "error";
        }
    }

    $stmt->close();
} else {
    echo "No product ID provided!";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<style>
    body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    background-color: #fff;
    padding: 20px 40px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    text-align: center;
    width: 400px;
}

h1 {
    color: #333;
    margin-bottom: 20px;
}

p {
    font-size: 18px;
    color: #333;
}

strong {
    color: #e74c3c;
}

form {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 20px;
}

input[type="submit"] {
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    background-color: #e74c3c;
    color: white;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #c0392b;
}

a {
    padding: 10px 20px;
    background-color: #3498db;
    color: white;
    text-decoration: none;
    border-radius: 4px;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

a:hover {
    background-color: #2980b9;
}

.success, .error {
    margin-top: 20px;
    padding: 10px;
    border-radius: 4px;
    text-align: center;
    display: none;
}

.success {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.error {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

</style>    <title>Delete Product</title>
</head>
<body>
    <div class="container">
        <h1>Delete Product</h1>
        <p>Are you sure you want to delete the product: <strong><?php echo htmlspecialchars($product['name']); ?></strong>?</p>
        <form method="post" action="">
            <input type="submit" value="Yes, Delete">
            <a href="list_product.php">Cancel</a>
        </form>
        <div class="success">Product deleted successfully.</div>
        <div class="error">Error deleting product.</div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const response = "<?php echo $response; ?>";
            if (response === "success") {
                document.querySelector(".success").style.display = "block";
            } else if (response === "error") {
                document.querySelector(".error").style.display = "block";
            }
        });
    </script>
</body>
</html>
