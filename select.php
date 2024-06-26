<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passer Commande</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Passer Commande</h1>
        <form action="order.php" method="post">
            <div class="form-group">
                <label for="user_id">ID Utilisateur:</label>
                <input type="text" class="form-control" id="user_id" name="user_id" required>
            </div>
            <div class="form-group">
                <label for="product_id">Produit:</label>
                <select class="form-control" id="product_id" name="product_id" required>
                    <option value="">Sélectionnez un produit</option>
                    <?php
                    include '../db.php';

                    // Récupération des produits depuis la base de données
                    $sql = "SELECT id, name FROM products";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>Aucun produit trouvé</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="quantity">Quantité:</label>
                <input type="text" class="form-control" id="quantity" name="quantity" required>
            </div>
            <div class="form-group">
                <label for="total">Total:</label>
                <input type="text" class="form-control" id="total" name="total" required>
            </div>
            <button type="submit" class="btn btn-primary">Passer Commande</button>
        </form>
    </div>
</body>
</html>
