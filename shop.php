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

<?php
session_start();

// Tableau des produits en euros
$products = [
    ['name' => 'Pc Lenovo', 'price' => 250],
    ['name' => 'Pc Dell', 'price' => 389],
    ['name' => 'Pc HP', 'price' => 1000],
    ['name' => 'Pc Asus', 'price' => 1337],
];

// Taux de conversion (approximatifs)
$conversionRates = [
    'EUR' => 1,
    'USD' => 1.1,   // 1 euro = 1.10 dollars
    'GBP' => 0.87,  // 1 euro = 0.85 livres
];

// Si l'utilisateur choisit une devise
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["currency"])) {
    $_SESSION["currency"] = $_POST["currency"];
}

// Devise choisie ou par défaut "EUR"
$currency = $_SESSION["currency"] ?? "EUR";

// Symbole de la devise
$symbols = [
    'EUR' => '€',
    'USD' => '$',
    'GBP' => '£'
];

// Fonction pour convertir le prix
function convertPrice($priceInEuros, $currency, $rates) {
    return $priceInEuros * $rates[$currency];
}
?>

<!-- Formulaire de choix de la devise -->
<form method="post">
    <label>Choisissez une devise :</label><br>
    <input type="radio" name="currency" value="EUR" <?= $currency === 'EUR' ? 'checked' : '' ?>> Euro (€)<br>
    <input type="radio" name="currency" value="USD" <?= $currency === 'USD' ? 'checked' : '' ?>> Dollar ($)<br>
    <input type="radio" name="currency" value="GBP" <?= $currency === 'GBP' ? 'checked' : '' ?>> Livre (£)<br>
    <button type="submit">Changer la devise</button>
</form>

<h2>Liste des produits :</h2>
<ul>
<?php foreach ($products as $product): 
    $convertedPrice = convertPrice($product['price'], $currency, $conversionRates);
    $formattedPrice = number_format($convertedPrice, 2); // arrondi à 2 chiffres
    $symbol = $symbols[$currency];
?>
    <li><?= $product['name'] ?> : <?= $formattedPrice . ' ' . $symbol ?></li>
<?php endforeach; ?>
</ul>
