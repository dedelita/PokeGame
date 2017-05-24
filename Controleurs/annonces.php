<?php

function getAnnonces()
{
    $dbh = connexionSQL();

    $query = "SELECT p.id, p.idDresseur, p.sexe, p.XP, p.niveau, p.prixVente, e.nom FROM pokemon p, espece_pokemon e 
      WHERE p.enVente = true AND p.idEspece = e.id AND p.idDresseur != :idDresseur;";
    $sql = $dbh->prepare($query);
    $sql->bindValue(':idDresseur', getIdDresseur());
    $sql->execute();

    $res = $sql->fetchAll();

    return getNewAnnonces($res);
}

function getMesAnnonces()
{
    $dbh = connexionSQL();

    $query = "SELECT p.id, p.idDresseur, p.sexe, p.XP, p.niveau, p.prixVente, e.nom FROM pokemon p, espece_pokemon e 
      WHERE p.enVente = true AND p.idEspece = e.id AND p.idDresseur = :idDresseur;";

    $sql = $dbh->prepare($query);
    $sql->bindValue(':idDresseur', getIdDresseur());
    $sql->execute();

    $res = $sql->fetchAll();

    return getNewAnnonces($res);
}

function getNewAnnonces($annonces)
{
    $res = array();
    foreach ($annonces as $annonce) {
        $res[] = new Annonce($annonce["id"], $annonce["idDresseur"], $annonce["nom"], $annonce["prixVente"], $annonce["niveau"], $annonce["XP"]);
    }

    return $res;
}

function acheterAnnonce($idVendeur, $idPokemon, $prix)
{
    if($idVendeur != getIdDresseur()) {
        acheterPokemon($idPokemon, $prix);
        recevoirPieces($idVendeur, $prix);
        acheterParDresseur($idPokemon, getIdDresseur());
    }
}