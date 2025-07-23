<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['product_id'])) {
    $productId = (int) $_POST['product_id'];

    // Initialisation du panier si non encore fait
    if (!isset($_SESSION['CART_PRODUCTS'])) {
        $_SESSION['CART_PRODUCTS'] = [];
    }

    // Évite les doublons
    if (!in_array($productId, $_SESSION['CART_PRODUCTS'])) {
        $_SESSION['CART_PRODUCTS'][] = $productId;
    }
}

// Retour à la liste des produits
header("Location: index.php");
exit;
