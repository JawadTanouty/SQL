<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
</head>
<body>
    <h1>Page d'accueil</h1>

    <?php if (isset($_SESSION["first-name"]) && isset($_SESSION["age"])): ?>
        <p>Bienvenue, <?= htmlspecialchars($_SESSION["first-name"]) ?> ! Vous avez <?= (int) $_SESSION["age"] ?> ans !</p>
    <?php else: ?>
        <p>Bienvenue invité ! <a href="who-are-you.php">Cliquez ici pour vous présenter.</a></p>
    <?php endif; ?>
</body>
</html>

<?php
session_start();
$color = isset($_SESSION["color"]) ? $_SESSION["color"] : null;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Accueil</title>
</head>
<body>

    <?php if ($color): ?>
        <p>Votre couleur préférée est : 
            <span style="color: <?= htmlspecialchars($color) ?>;">
                <?= htmlspecialchars($color) ?>
            </span>
        </p>
    <?php else: ?>
        <p>Aucune couleur choisie. <a href="color.php">Cliquez ici pour en choisir une</a>.</p>
    <?php endif; ?>
</body>
</html>

<?php
session_start();

// Couleur par défaut si aucun thème n'est encore choisi
$backgroundColor = isset($_SESSION["theme"]) ? $_SESSION["theme"] : "white";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
</head>
<body style="background-color: <?= htmlspecialchars($backgroundColor) ?>;">
    <p>Votre thème actuel est : <strong><?= htmlspecialchars($backgroundColor) ?></strong></p>
    <p><a href="theme.php">Changer de thème</a></p>
</body>
</html>

<?php
session_start();

// Tableau des contenus par langue
$contenu = [
    "FR" => "Bienvenue !",
    "ENG" => "Welcome !",
    "ESP" => "¡ Bienvenido !"
];

// Si l'utilisateur choisit une langue via le formulaire
if (isset($_POST['langue']) && array_key_exists($_POST['langue'], $contenu)) {
    $_SESSION['langue'] = $_POST['langue'];
}

// Langue par défaut : FR
$langue = $_SESSION['langue'] ?? 'FR';
?>

<!-- Formulaire de sélection de langue -->
<form method="post">
    <label for="langue">Choisissez votre langue :</label>
    <select name="langue" id="langue">
        <option value="FR" <?= $langue === 'FR' ? 'selected' : '' ?>>Français</option>
        <option value="ENG" <?= $langue === 'ENG' ? 'selected' : '' ?>>English</option>
        <option value="ESP" <?= $langue === 'ESP' ? 'selected' : '' ?>>Español</option>
    </select>
    <button type="submit">Valider</button>
</form>

<!-- Affichage du contenu dans la langue choisie -->
<p><?= $contenu[$langue] ?></p>


<?php
session_start();

$products = [
    ['id' => 1, 'name' => 'Pc Lenovo', 'price' => 250],
    ['id' => 2, 'name' => 'Pc Dell', 'price' => 389],
    ['id' => 3, 'name' => 'Pc HP', 'price' => 1000],
    ['id' => 4, 'name' => 'Pc Asus', 'price' => 1337],
];
?>

<h1>Liste des produits</h1>
<ul>
    <?php foreach ($products as $product): ?>
        <li>
            <?= $product['name'] ?> - <?= $product['price'] ?> €
            <form action="add_to_cart.php" method="POST" style="display:inline;">
                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                <button type="submit">Ajouter au panier</button>
            </form>
        </li>
    <?php endforeach; ?>
</ul>

<a href="cart.php">Voir le panier</a>
