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

function getInfosDresseur($id)
{
    $dbh = connexionSQL();
    $query = "SELECT * FROM dresseur WHERE id = :id;";
    $sql = $dbh->prepare($query);
    $sql->bindValue(':id', $id, PDO::PARAM_INT);
    $sql->execute();
    return $sql->fetch();
}

function connexionDresseur()
{
    $rep = connexion();

    if ($rep["succes"]) {
        $user = $rep["user"];

        $infos = getInfosDresseur($user["id"]);
        $nbPieces = $infos["nbPieces"];

        $_SESSION["dresseur"] = serialize(new Dresseur($user["id"], $user["login"], $nbPieces));
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

function setDresseur($dresseur)
{
    $_SESSION["dresseur"] = serialize($dresseur);
}

function getNbPiecesDresseur()
{
    return getDresseur()->getNbPieces();
}


function getIdDresseur()
{
    return getDresseur()->getId();
}

function entrainerPokemon()
{
    entrainer(getFieldFromForm("pokemon"));
}

function mettreEnVentePokemon($id, $prix)
{
    if (!$prix)
        echo "
            <form action='' method='post'>
                <label>A quel prix voulez-vous le vendre ?</label>
                <input type='number' name='prix'>
                <input type='submit' value='Mettre en vente'>
            </form>
        ";
    else {
        mettreEnVente($id, $prix);
    }
}

function acheterPokemon($idPokemon, $prix)
{
    if (getNbPiecesDresseur() >= $prix) {
        $dbh = connexionSQL();

        $query = "UPDATE dresseur SET nbPieces = nbPieces - :prix WHERE id = :id";
        $sql = $dbh->prepare($query);
        $sql->bindValue(':prix', $prix);
        $sql->bindValue(':id', getIdDresseur());
        $sql->execute();

        $d = getDresseur();

        $d->setNbPieces($d->getNbPieces() - $prix);

        setDresseur($d);

        acheterParDresseur($idPokemon, getIdDresseur());
    }

}

function getDresseurById($id)
{
    $dbh = connexionSQL();

    $query = "SELECT * FROM dresseur WHERE id = :id";
    $sql = $dbh->prepare($query);
    $sql->bindValue(':id', $id);
    $sql->execute();

    return $sql->fetch();
}

function recevoirPieces($idDresseur, $pieces)
{
    $dbh = connexionSQL();

    $query = "UPDATE dresseur SET nbPieces = nbPieces + :pieces WHERE id = :id";
    $sql = $dbh->prepare($query);
    $sql->bindValue(':pieces', $pieces);
    $sql->bindValue(':id', $idDresseur);
    $sql->execute();
}