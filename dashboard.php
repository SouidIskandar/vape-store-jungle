

<!DOCTYPE html>
<html>
<head>
 <style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

body {
  background-color: #f7f7f7;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

h1 {
  text-align: center;
  color: #333;
  margin-bottom: 20px;
  font-weight: bold;
  font-size: 24px;
}

.container {
  background-color: #fff;
  padding: 30px 40px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  border-radius: 12px;
  text-align: center;
  width: 350px;
}

a {
  display: block;
  margin: 15px 0;
  padding: 15px 20px;
  color: #337ab7;
  text-decoration: none;
  font-size: 20px;
  border-radius: 8px;
  transition: background-color 0.3s, color 0.3s;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

a:hover {
  background-color: #337ab7;
  color: #fff;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}
 </style>
    <title>Admin Dashboard</title>
</head>
<body>
    <div class="container">
        <h1>Admin Dashboard</h1>
        <a href="list_product.php">Manage Products</a>
        <a href="category.php">Manage Category</a>
        <a href="list_orders.php">Manage Orders</a>
    </div>
</body>
</html>
