<?php
session_start();

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST["color"])) {
        $_SESSION["color"] = htmlspecialchars($_POST["color"]);
        // Redirige vers l'accueil
        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Choisissez une couleur</title>
</head>
<body>
    <h1>Quelle est votre couleur préférée ?</h1>
    <form method="POST" action="color.php">
        <label for="color">Entrez une couleur (ex: red, blue, green) :</label>
        <input type="text" name="color" id="color" required>
        <button type="submit">Envoyer</button>
    </form>
</body>
</html>
