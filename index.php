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
        $login = getFieldFromForm("login");
        $password = getFieldFromForm("password");

        $res = connexion($login, $password);
        if ($res["succes"] && !$res["pokemom"]) {
            header("Location:index.php?page=pokemon");
        } elseif($res["succes"] && $res["pokemom"]) {
            $dresseur = unserialize($_SESSION["dresseur"]);
            addPokemon($dresseur->getId(), getIdEspeceOfPokemon($res["pokemom"]), getRandomSexe(), 0, 0);
        }
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
