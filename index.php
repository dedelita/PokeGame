<?php
include_once "Entitees/Dresseur.php";
include_once "Entitees/Pokemon.php";
include_once "Controleurs/connexionSQL.php";
include_once "Controleurs/user.php";
include_once "Controleurs/dresseur.php";
include_once "Controleurs/pokemon.php";
include_once "Controleurs/espece_pokemon.php";

session_start();

//getField
function getFieldFromForm($nom)
{
    return isset($_POST[$nom]) ? $_POST[$nom] : (isset($_GET[$nom]) ? $_GET[$nom] : null);
}

function getArrayFieldFromForm($nom)
{
    return isset($_POST[$nom]) ? $_POST[$nom] : (isset($_GET[$nom . "[]"]) ? $_GET[$nom . "[]"] : null);
}

$error = getFieldFromForm("error");

$page = getFieldFromForm("page");

if (!$page)
    $page = "home";

?>

<!DOCTYPE html>
<html>
<head>
    <title>PokéGame</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato|Raleway:300,900,900italic">
    <link rel="stylesheet" href="static/reset.css">
    <?php if($page != "home") { ?>
    <link rel="stylesheet" href="static/style.css">
    <?php } else { ?>
    <link rel="stylesheet" href="static/home.css">
    <?php } ?>
</head>

<body class="<?= $page ?>">
<?php

include "menu.php";

echo "<main>";

include "Pages/" . $page . ".php";

$action = getFieldFromForm("action");

switch ($action) {
    case "aff_connexion" :
        include "Pages/login.php";
        break;

    case "aff_inscription" :
        include "Pages/inscription.php";
        break;

    case "connexion" :
        connexionDresseur();
        break;

    case "inscription" :
        inscriptionDresseur();
        break;

    case "entrainer" :
        entrainerPokemon();
        break;

    case "mettre_en_vente" :
        mettreEnVentePokemon();
        break;

    case "deconnexion" :
        deconnexionDresseur();
        break;
}
?>
</main>

<footer>
    <p>Projet Atelier Web 2017 - L3 MIAGE Apprentissage - Université Paris I Panthéon-Sorbonne<p>

    <p>Delphine Martinez Parra - Sami Romdhana</p>
</footer>

</body>
</html>
