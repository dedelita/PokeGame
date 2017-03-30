<?php

function inscriptionDresseur()
{
    $rep = inscription();

    $dbh = connexionSQL();

    $id = getUserId(getFieldFromForm("login"));

    if (!$rep["succes"] && !$rep["erreur"]) {
        $rep["erreur"] = "Une erreur est survenue lors de l'ajout à la base de données !";
    } else {
        $query = "INSERT INTO dresseur (id, nbPieces) VALUES (:id, :nbPieces);";
        $sql = $dbh->prepare($query);
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        $sql->bindValue(':nbPieces', 5000, PDO::PARAM_INT);
        $sql->execute();

        addPokemon($id, getIdEspeceOfPokemon(getFieldFromForm("pokemon")), 0, 0);
    }

    if (!$rep["erreur"])
        connexionDresseur();
    else
        echo $rep["erreur"];
}

function connexionDresseur()
{
    $rep = connexion();

    if ($rep["succes"]) {
        $user = $rep["user"];

        $_SESSION["dresseur"] = serialize(new Dresseur($user["id"], $user["login"], getInfosDresseur($user["id"])));
        $_SESSION["pokemons"] = getPokemons($user["id"]);

        $url = "index.php?page=pokemon";

    } else {
        $url = "index.php?page=home&erreur" . $rep["erreur"];
    }

    header("Location:" . $url);
}

function deconnexionDresseur()
{
    deconnexion();
    header("Location:index.php?home");
}

function getDresseur()
{
    return unserialize($_SESSION["dresseur"]);
}

function getInfosDresseur($id)
{
    $dbh = connexionSQL();

    $query = "SELECT nbPieces FROM dresseur WHERE id = :id;";
    $sql = $dbh->prepare($query);
    $sql->bindValue(':id', $id, PDO::PARAM_INT);
    $sql->execute();

    return $sql->fetch()["nbPieces"];
}

function entrainerPokemon()
{
    entrainer(getDresseur()->getId(), getFieldFromForm("pokemon"));
}

function mettreEnVentePokemon()
{
    
}