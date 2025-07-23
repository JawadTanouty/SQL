<?php
session_start();

// Tableau de produits
$products = [
    ['name' => 'Pc Lenovo', 'price' => 250],
    ['name' => 'Pc Dell', 'price' => 389],
    ['name' => 'Pc HP', 'price' => 1000],
    ['name' => 'Pc Asus', 'price' => 1337],
];

// Si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // On vérifie que les champs existent et on les stocke dans la session
    if (isset($_POST['price_min']) && isset($_POST['price_max'])) {
        $_SESSION['price_min'] = (int) $_POST['price_min'];
        $_SESSION['price_max'] = (int) $_POST['price_max'];
    }
}

// Valeurs par défaut si la session n’a pas encore été définie
$min = $_SESSION['price_min'] ?? 0;
$max = $_SESSION['price_max'] ?? PHP_INT_MAX;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Boutique</title>
</head>
<body>
    <h1>Filtrer les produits par prix</h1>

    <form method="post" action="">
        <label for="price_min">Prix minimum :</label>
        <input type="number" name="price_min" id="price_min" value="<?= htmlspecialchars($min) ?>" required>

        <label for="price_max">Prix maximum :</label>
        <input type="number" name="price_max" id="price_max" value="<?= htmlspecialchars($max) ?>" required>

        <button type="submit">Filtrer</button>
    </form>

    <h2>Produits disponibles :</h2>
    <ul>
        <?php foreach ($products as $product): ?>
            <?php if ($product['price'] >= $min && $product['price'] <= $max): ?>
                <li><?= htmlspecialchars($product['name']) ?> - <?= $product['price'] ?>€</li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</body>
</html>
