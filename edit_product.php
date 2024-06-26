<?php
include '../db.php';

// Check if the product ID is provided
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Fetch product details from the database
    $sql = "SELECT * FROM products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();

    if (!$product) {
        $alert_message = "<div class='error-message'>Product not found!</div>";
    }

    $stmt->close();
} else {
    $alert_message = "<div class='error-message'>No product ID provided!</div>";
}

// Fetch all categories
$sql = "SELECT * FROM categories";
$result = $conn->query($sql);
$categories = $result->fetch_all(MYSQLI_ASSOC);

// Update product details if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $category_id = $_POST['category'];

    // Handle image upload
    $image = $_FILES['image'];
    $imageName = $image['name'];
    $imageTmpName = $image['tmp_name'];
    $imageSize = $image['size'];
    $imageError = $image['error'];
    $imageType = $image['type'];

    if ($imageName) {
        $imageExt = explode('.', $imageName);
        $imageActualExt = strtolower(end($imageExt));

        $allowed = array('jpg', 'jpeg', 'png', 'gif');

        if (in_array($imageActualExt, $allowed)) {
            if ($imageError === 0) {
                if ($imageSize < 5000000) { // Limit to 5MB
                    $imageNameNew = uniqid('', true) . "." . $imageActualExt;
                    $imageDestination = 'uploads/' . $imageNameNew;
                    move_uploaded_file($imageTmpName, $imageDestination);

                    // Update the product with the new image
                    $sql = "UPDATE products SET name = ?, description = ?, price = ?, stock = ?, category_id = ?, image = ? WHERE id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ssdissi", $name, $description, $price, $stock, $category_id, $imageDestination, $product_id);
                } else {
                    $alert_message = "<div class='error-message'>Your file is too big!</div>";
                }
            } else {
                $alert_message = "<div class='error-message'>There was an error uploading your file!</div>";
            }
        } else {
            $alert_message = "<div class='error-message'>You cannot upload files of this type!</div>";
        }
    } else {
        // Update the product without changing the image
        $sql = "UPDATE products SET name = ?, description = ?, price = ?, stock = ?, category_id = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssdiii", $name, $description, $price, $stock, $category_id, $product_id);
    }

    if ($stmt->execute()) {
        $alert_message = "<div class='success-message'>Product updated successfully.</div>";
        // Refresh product data
        $stmt->close();
        $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $product = $result->fetch_assoc();
        $stmt->close();
    } else {
        $alert_message = "<div class='error-message'>Error updating product.</div>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 400px;
            max-width: 100%;
        }

        h1 {
            text-align: center;
            color: #333333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555555;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #dddddd;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
            height: 100px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #4CAF50;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .success-message {
            color: green;
            font-weight: bold;
            background-color: #e0f7fa;
            padding: 10px;
            border: 1px solid green;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .error-message {
            color: red;
            font-weight: bold;
            background-color: #ffebee;
            padding: 10px;
            border: 1px solid red;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .product-image {
            display: block;
            max-width: 100%;
            margin-bottom: 20px;
            border-radius: 4px;
        }
    </style>
    <title>Edit Product</title>
</head>
<body>
    <div class="container">
        <h1>Edit Product</h1>
        <?php if (isset($alert_message)) echo $alert_message; ?>
        <form method="post" action="edit_product.php?id=<?php echo $product_id; ?>" enctype="multipart/form-data">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required>
            
            <label for="description">Description:</label>
            <textarea id="description" name="description" required><?php echo htmlspecialchars($product['description']); ?></textarea>
            
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" value="<?php echo htmlspecialchars($product['price']); ?>" step="0.01" required>
            
            <label for="stock">Stock:</label>
            <input type="number" id="stock" name="stock" value="<?php echo htmlspecialchars($product['stock']); ?>" required>
            
            <label for="category">Category:</label>
            <select id="category" name="category" required>
                <?php foreach ($categories as $category): ?>
                    <option value="<?php echo $category['id']; ?>" <?php if ($category['id'] == $product['category_id']) echo 'selected'; ?>>
                        <?php echo htmlspecialchars($category['name']); ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="image">Product Image:</label>
            <?php if ($product['image']): ?>
                <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" class="product-image">
            <?php endif; ?>
            <input type="file" id="image" name="image" accept="image/*">
            
            <input type="submit" value="Update Product">
        </form>
        <a href="list_product.php">Back to Product List</a>
    </div>
</body>
</html>
