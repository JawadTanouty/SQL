<?php


//Vérifie si le paramètre "nom" existe dans l'URL
if(isset($_GET["nom"]) && !empty ($_GET["nom"])) {
    //On récup le nom et on le sécurise contre les attaques
    $nom= htmlspecialchars($_GET["nom"]);
    echo "Bonjour " . $nom;
} 


$couleur = "white";

if(isset($_GET["couleur"])){
    $choix = $_GET["couleur"];
    $couleurs_valides= ["rouge" => "red", "vert" => "green", "bleu" => "blue"];

    if (array_key_exists($choix,$couleurs_valides)) {
        $couleur = $couleurs_valides[$choix];
}
}

$message = "";

if (isset($_GET["age"])){
    $age = (int) $_GET["age"]; //Convertir en entier

    if($age >= 18) {
        $message = "Vous êtes majeur";
    }else{
        $message = "Vous êtes mineur";
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
<body style="background-color: <?=$couleur ?>; text-align : center; padding-top: 50px;">
    <a href="bonjour.php?nom=Jawad">Voir profil</a>
<br>
    <a href="bonjour.php?couleur=rouge">Rouge</a>
    <a href="bonjour.php?couleur=vert">Vert</a>
    <a href="bonjour.php?couleur=bleu">Bleu</a>
    
    <p>Couleur actuelle : <strong><?= htmlspecialchars($choix ?? 'aucune') ?> </strong> </p>


    <form action="" method="get">
        <input type="number" name="age" placeholder="Entrez votre âge">
        <button type="submit">Envoyer</button>
</form>

</body>
</html>



<?php
echo $message;
?>