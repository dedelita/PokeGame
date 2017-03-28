<?php
include_once "Entitees/Dresseur.php";
include_once "Controleurs/connexionSQL.php";
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
include "menu.php";

if (!$page)
    $page = "home";
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
        $res = connexion();
        if ($res["succes"] && !$res["pokemom"]) {
            $url = "index.php?page=pokemon";
        } else {
            $url = "index.php?page=home";
        }
        header("Location:" . $url);
        break;

    case "inscription" :
        $res = inscriptionDresseur();

        header("Location:" . $res["url"]);

        break;

    case "statistiques" :
        $nbPokemons = getNbPokemons($_SESSION["dresseur"]->getId());
        $nbBases = getNbByEvolution("n");
        $nbEvols = getNbByEvolution("o");

        break;

    case "deconnexion" :
        deconnexion();
        header("Location:index.php?page=home");
        break;
}

?>

</body>
</html>
