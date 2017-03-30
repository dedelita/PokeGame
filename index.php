<?php
include_once "Entitees/Dresseur.php";
include_once "Controleurs/connexionSQL.php";
include_once "Controleurs/user.php";
include_once "Controleurs/dresseur.php";
include_once "Controleurs/pokemon.php";

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
        $res = inscriptionDresseur();

        if (!$res["error"])
            header("Location:index.php?page=pokemon");
        else {
            echo $res["error"];
        }
        break;

    case "statistiques" :
        $nbPokemons = getNbPokemons($_SESSION["dresseur"]->getId());
        $nbBases = getNbByEvolution("n");
        $nbEvols = getNbByEvolution("o");

        break;

    case "deconnexion" :
        deconnexion();
        break;
}

?>

</body>
</html>
