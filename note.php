//product php
<div class="container">
        <div class="row">
            <?php
            $sql = "SELECT * FROM products";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='col-md-4'>";
                    echo "<h3>" . $row['name'] . "</h3>";
                    echo "<p>" . $row['description'] . "</p>";
                    echo "<p>$" . $row['price'] . "</p>";
                    echo "</div>";
                }
            } else {
                echo "No products found";
            }
            ?>
        </div>
    </div>



    <script>
// Fonction pour afficher ou masquer le formulaire d'inscription
function toggleRegisterForm() {
    var registerForm = document.getElementById('registerForm');
    if (registerForm.style.display === 'none') {
        registerForm.style.display = 'block';
    } else {
        registerForm.style.display = 'none';
    }
}

// Associer la fonction au clic sur le bouton d'inscription
document.getElementById('registerBtn').addEventListener('click', toggleRegisterForm);
</script>



//admin page

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        /* Custom styles for the admin dashboard */
        body {
            background-color: #f8f9fa; /* Light grey */
        }

        .container {
            margin-top: 50px;
        }

        h1 {
            color: #28a745; /* Green */
        }

        table {
            background-color: #fff; /* White */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #007bff; /* Blue */
            color: #fff; /* White */
        }

        td {
            border-bottom: 1px solid #dee2e6; /* Light grey */
        }

        tr:hover {
            background-color: #f8f9fa; /* Light grey */
        }

        .no-orders {
            color: #dc3545; /* Red */
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Admin Dashboard</h1>
        <h2>Orders</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Order Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../db.php';

                $sql = "SELECT orders.id, users.username, products.name, orders.quantity, orders.total, orders.order_date 
                        FROM orders
                        JOIN users ON orders.user_id = users.id
                        JOIN products ON orders.product_id = products.id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['username'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['quantity'] . "</td>";
                        echo "<td>" . $row['total'] . "</td>";
                        echo "<td>" . $row['order_date'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='no-orders'>No orders found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>





<style>


   </style>