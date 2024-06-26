<?php
include '../db.php';

// Récupérer toutes les catégories
$sql = "SELECT * FROM categories";
$result = $conn->query($sql);
$categories = $result->fetch_all(MYSQLI_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $category_id = $_POST['category'];

    $sql = "INSERT INTO products (name, description, price, stock, category_id) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdii", $name, $description, $price, $stock, $category_id);

    if ($stmt->execute()) {
        echo "Product added successfully.";
    } else {
        echo "Error adding product.";
    }

    $stmt->close();
}

// Check if the form is submitted using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if file upload is successful
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // Handle image upload
        $image = $_FILES['image'];
        $image_name = $image['name'];
        $image_tmp_name = $image['tmp_name'];

        // Specify upload directory
        $upload_dir = 'uploads/'; // Change this to your desired upload directory
        $destination = $upload_dir . $image_name;

        // Move the uploaded file to a permanent location
        if (move_uploaded_file($image_tmp_name, $destination)) {
            // Image uploaded successfully
            // Now you can store the destination path in your database or perform other actions
            echo "Image uploaded successfully.";
        } else {
            // Error uploading image
            echo "Error uploading image.";
        }
    } else {
        // Handle file upload errors
        if ($_FILES['image']['error'] === UPLOAD_ERR_NO_FILE) {
            echo "No file uploaded.";
        } else {
            echo "Error uploading file. Error code: " . $_FILES['image']['error'];
        }
    }
} else {
    // Redirect or show an error if the form is not submitted via POST method
    echo "Form submission method not allowed.";
}




$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
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
            text-align: center;
        }

        h1 {
            color: #333333;
            margin-bottom: 20px;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            color: #333333;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #dddddd;
            border-radius: 4px;
            font-size: 16px;
        }

        textarea {
            resize: vertical;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        a {
            display: block;
            margin-top: 20px;
            color: #4CAF50;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
    <title>Add Product</title>
</head>

<body>
    <div class="container">
        <h1>Add Product</h1>
        <form method="post" action="">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" step="0.01" required>

            <label for="stock">Stock:</label>
            <input type="number" id="stock" name="stock" required>

            <label for="image">Image:</label>
            <input type="file" id="image" name="image" accept="image/">


            <label for="category">Category:</label>
            <select id="category" name="category" required>
                <?php foreach ($categories as $category): ?>
                    <option value="<?php echo $category['id']; ?>"><?php echo htmlspecialchars($category['name']); ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <input type="submit" value="Add Product">
        </form>
        <a href="list_product.php">Back to Product List</a>
    </div>
</body>

</html>