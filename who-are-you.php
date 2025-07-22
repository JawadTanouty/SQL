<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] === "POST"){
    //Vérification du remplissage des champs
    if (isset($_POST["first-name"]) && isset($_POST["age"])){
        //Stockage des infos dans la session
        $_SESSION["first-name"]=htmlspecialchars($_POST["first-name"]);
        $_SESSION["age"]= (int) $_POST["age"];

        //Header de redirection pour aller à l'accueil
        header("Location: index.php");
        exit();

    }
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
      <h1>Entrez vos informations</h1>
    <form action="who-are-you.php" method="POST">
        <label for="first-name">Prénom :</label>
        <input type="text" name="first-name" id="first-name" required>
        <br><br>
        <label for="age">Âge :</label>
        <input type="number" name="age" id="age" required>
        <br><br>
        <button type="submit">Envoyer</button>
    </form>
</body>
</html>