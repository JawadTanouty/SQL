<?php
session_start();

$products = [
    ['id' => 1, 'name' => 'Pc Lenovo', 'price' => 250],
    ['id' => 2, 'name' => 'Pc Dell', 'price' => 389],
    ['id' => 3, 'name' => 'Pc HP', 'price' => 1000],
    ['id' => 4, 'name' => 'Pc Asus', 'price' => 1337],
];

// Récupérer les produits dans le panier
$cart = $_SESSION['CART_PRODUCTS'] ?? [];

echo "<h1>Votre panier</h1>";

if (empty($cart)) {
    echo "<p>Le panier est vide.</p>";
} else {
    echo "<ul>";
    foreach ($products as $product) {
        if (in_array($product['id'], $cart)) {
            echo "<li>" . $product['name'] . " - " . $product['price'] . " €</li>";
        }
    }
    echo "</ul>";
        echo '<p><a href="clear_cart.php"> Vider le panier</a></p>';
}

echo '<a href="index.php">← Retour à la boutique</a>';
