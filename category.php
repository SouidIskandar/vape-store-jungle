<?php
include '../db.php';

// Ajouter une nouvelle catégorie
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_category'])) {
    $name = $_POST['name'];
    $sql = "INSERT INTO categories (name) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $stmt->close();
}

// Supprimer une catégorie
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM categories WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

// Récupérer toutes les catégories
$sql = "SELECT * FROM categories";
$result = $conn->query($sql);
$categories = $result->fetch_all(MYSQLI_ASSOC);

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

input[type="text"] {
    width: 70%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #dddddd;
    border-radius: 4px;
    font-size: 16px;
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

ul {
    list-style: none;
    padding: 0;
}

li {
    background-color: #f9f9f9;
    margin-bottom: 10px;
    padding: 10px;
    border: 1px solid #dddddd;
    border-radius: 4px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

li a {
    color: #ff4c4c;
    text-decoration: none;
}

li a:hover {
    text-decoration: underline;
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

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {
    background-color: #f1f1f1;
}

.dropdown:hover .dropdown-content {
    display: block;
}

   </style>
    <title>Manage Categories</title>
</head>
<body>
    <div class="container">
        <h1>Manage Categories</h1>
        <form method="post" action="">
            <input type="text" name="name" required placeholder="Category Name">
            <input type="submit" name="add_category" value="Add Category">
        </form>
        <ul>
            <?php foreach ($categories as $category): ?>
                <li>
                    <?php echo htmlspecialchars($category['name']); ?>
                    <a href="?delete=<?php echo $category['id']; ?>" onclick="return confirm('Are you sure you want to delete this category?');">Delete</a>
                </li>
            <?php endforeach; ?>
        </ul>
        <a href="dashboard.php">Back to Dashboard</a>
    </div>

   
   
</body>
</html>
