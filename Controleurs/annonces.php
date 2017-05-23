<?php

function getAnnonces()
{
    $dbh = connexionSQL();

    $query = "SELECT p.id, p.idDresseur, p.sexe, p.XP, p.niveau, p.prixVente, e.nom FROM pokemon p, espece_pokemon e 
      WHERE p.enVente = true AND p.idEspece = e.id;";
    $sql = $dbh->prepare($query);
    $sql->execute();

    $res = $sql->fetchAll();
    $annonces = array();

    foreach ($res as $r) {
        $annonces[] = new Annonce($r["id"], $r["idDresseur"], $r["nom"], $r["prixVente"], $r["niveau"], $r["XP"]);
    }
    
    return $annonces;
}

function acheterAnnonce($idVendeur, $idPokemon, $prix)
{
    if($idVendeur != getIdDresseur()) {
        acheterPokemon($idPokemon, $prix);
        recevoirPieces($idVendeur, $prix);
    }
    acheterParDresseur($idPokemon, getIdDresseur());
}