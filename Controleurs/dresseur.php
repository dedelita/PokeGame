<?php

function inscriptionDresseur()
{
    $rep = inscription();

    $id = getUserId(getFieldFromForm("login"));

    if (!$rep["succes"] && !$rep["error"]) {
        $rep["error"] = "Une erreur est survenue lors de l'ajout à la base de données";
    } else {
        $query = "INSERT INTO dresseur (id, nbPieces) VALUES (:id, :nbPieces);";
        $sql = $rep["dbh"]->prepare($query);
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        $sql->bindValue(':nbPieces', 5000, PDO::PARAM_INT);

        if ($sql->execute()) {
            addPokemon($id, getIdEspeceOfPokemon(getFieldFromForm("pokemon")), 0, 0);
        }


    }

    return $rep;
}

function connexionDresseur()
{
    $rep = connexion();

    if ($rep["succes"]) {
        $user = $rep["user"];

        $_SESSION["dresseur"] = serialize(new Dresseur($user["id"], $user["login"], getInfosDresseur($user["id"])));
        $_SESSION["dresseur"]["pokémons"] = getPokemons($user["id"]);

        $url = "index.php?page=pokemon";

    } else {
        $url = "index.php?page=home";
        echo $rep["error"];
    }

    header("Location:" . $url);
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