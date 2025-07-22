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

