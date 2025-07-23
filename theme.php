<?php
session_start();

// Si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["theme"])) {
    // On stocke le thème choisi dans la session
    $_SESSION["theme"] = $_POST["theme"];

    // Redirection vers l'index pour voir le thème appliqué
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Choix du thème</title>
</head>
<body>
    <h1>Choisissez un thème :</h1>
    <form method="POST" action="theme.php">
        <label><input type="radio" name="theme" value="white"> Clair</label><br>
        <label><input type="radio" name="theme" value="black"> Sombre</label><br>
        <label><input type="radio" name="theme" value="lightblue"> Bleu</label><br>
        <label><input type="radio" name="theme" value="lightgreen"> Vert</label><br><br>
        <button type="submit">Appliquer le thème</button>
    </form>
</body>
</html>
