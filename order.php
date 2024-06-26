<?php
include '../db.php';

// Vérification si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $user_id = $_POST['user_id'];
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $total = $_POST['total'];

    // Insertion des données dans la base de données
    $sql = "INSERT INTO orders (user_id, product_id, quantity, total) VALUES ('$user_id', '$product_id', '$quantity', '$total')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Commande passée avec succès!";
    } else {
        echo "Erreur lors de la passation de commande: " . $conn->error;
    }
} else {
    // Redirection en cas de tentative d'accès direct à ce fichier
    header("Location: index.php");
    exit();
}
?>
