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

?>

<!DOCTYPE html>
<html>
<head>
    <title>PokéGame</title>
    <meta charset="utf-8"/>
</head>

<body>
<h1>PokéGame</h1>

<?php
$error = getFieldFromForm("error");

$page = getFieldFromForm("page");
if (!$page)
    $page = "home";

include "menu.php";

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

</body>
</html>
