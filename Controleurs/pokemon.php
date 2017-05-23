<?php

function getRandomSexe()
{
    return rand(0, 1) ? 'Mâle' : 'Femelle';
}

//add
function addPokemon($idDresseur, $idEspece, $xp, $niveau)
{
    $dbh = connexionSQL();

    $query = "INSERT INTO pokemon (idDresseur, idEspece, sexe, XP, niveau, enVente) VALUES (:idDresseur, :idEspece, :sexe, :XP, :niveau, :enVente);";
    $sql = $dbh->prepare($query);
    $sql->bindValue(':idDresseur', $idDresseur, PDO::PARAM_INT);
    $sql->bindValue(':idEspece', $idEspece, PDO::PARAM_INT);
    $sql->bindValue(':sexe', getRandomSexe(), PDO::PARAM_INT);
    $sql->bindValue(':XP', $xp, PDO::PARAM_INT);
    $sql->bindValue(':niveau', $niveau, PDO::PARAM_INT);
    $sql->bindValue(':enVente', false, PDO::PARAM_BOOL);
    $sql->execute();
}

////delete
//function deletePokemonById($id)
//{
//    $dbh = connexionSQL();
//
//    $p = getMyPokemonById($id);
//
//    $query = "DELETE FROM pokemon WHERE id = :id;";
//    $sql = $dbh->prepare($query);
//    $sql->bindValue(':id', $id);
//    $sql->execute();
//}

//getters & setters
function getPokemons($id)
{
    $dbh = connexionSQL();

    $sql = $dbh->prepare("SELECT * FROM pokemon WHERE idDresseur = :idDresseur;");
    $sql->bindValue(':idDresseur', $id, PDO::PARAM_INT);
    $sql->execute();
    $poks = $sql->fetchAll();

    $pokemons = array();
    foreach ($poks as $po) {
        $infos_espece = getInfosEspece($po["idEspece"]);


        if ($infos_espece["evolution"] == 'n') {
            $evolution = "Pokémon de base";
        } else {
            $evolution = "Pokémon d'évolution";
        }

        $types = array($infos_espece["type1"]);
        if($infos_espece["type2"]) {
            $types[] = $infos_espece["type2"];
        }

        $pokemons[] = serialize(new Pokemon($po["id"], $po["idEspece"], $infos_espece["nom"], $evolution, $po["sexe"],
            $po["XP"], $po["niveau"], $po["prixVente"], (boolean)$po["enVente"], $types, $infos_espece["courbe_XP"]));
    }

    return $pokemons;
}

function getMyPokemonById($id)
{
    $pokemons = $_SESSION["pokemons"];

    foreach ($pokemons as $key => $pokemon) {
        $pokemon = unserialize($pokemon);

        if($pokemon->getId() == $id) {
            return $pokemon;
        }
    }

    return null;
}

function getPokemonById($id)
{
    $dbh = connexionSQL();

    $query = "SELECT * FROM pokemon WHERE id = :id";
    $sql = $dbh->prepare($query);
    $sql->bindValue(':id', $id, PDO::PARAM_INT);
    $sql->execute();

    $p = $sql->fetch();

    $infos_espece = getInfosEspece($p["idEspece"]);

    if ($infos_espece["evolution"] == 'n') {
        $evolution = "Pokémon de base";
    } else {
        $evolution = "Pokémon d'évolution";
    }

    $types = array($infos_espece["type1"]);
    if($infos_espece["type2"]) {
        $types[] = $infos_espece["type2"];
    }

    return new Pokemon($id, $p["idEspece"], $infos_espece["nom"], $evolution, $p["sexe"], $p["XP"], $p["niveau"],
        (boolean)$p["prixVente"], $p["enVente"], $types);
}

function getNewXP($old_xp)
{
    return $old_xp + rand(10, 30);
}

function setPokemons($pokemon)
{
    $pokemons = $_SESSION["pokemons"];

    foreach ($pokemons as $key => $po) {
        $po = unserialize($po);

        if($po->getNom() == $pokemon->getNom()) {
            $_SESSION["pokemons"][$key] = serialize($pokemon);
        }
    }
}
//Statistiques
function getNbPokemons($id)
{
    $dbh = connexionSQL();

    $query = "SELECT COUNT(id) FROM pokemon WHERE idDresseur = :idDresseur;";
    $sql = $dbh->prepare($query);
    $sql->bindValue(':idDresseur', $id, PDO::PARAM_INT);
    $sql->execute();

    return $sql->fetch()[0];
}

function courbeXP_R($level) {
    return 0.8 * pow($level, 3);
}

function courbeXP_M($level) {
    return pow($level, 3);
}

function courbeXP_P($level) {
    return 1.2 * pow($level, 3) - 15 * pow($level, 2) + 100 * $level - 140;
}

function courbeXP_L($level) {
    return 1.25 * pow($level, 3);
}

function maxXPForCurrentLevel($type, $level) {
    $ceilOfCurrentLevel = 100;

    if($type == 'R') {
        $ceilOfCurrentLevel = courbeXP_R($level);      
    }

    else if($type == 'M') {
        $ceilOfCurrentLevel = courbeXP_M($level);
    }

    else if($type == 'P') {
        $ceilOfCurrentLevel = courbeXP_P($level);
    }

    else if($type == 'L') {
        $ceilOfCurrentLevel = courbeXP_L($level);
    }

    else {
        var_dump($type);
    }

    return $ceilOfCurrentLevel;
}

function entrainer($id)
{
    $dbh = connexionSQL();

    $pokemon = getMyPokemonById($id);

    if(! $pokemon->getEnVente()) {
        $xp = getNewXP($pokemon->getXp());
        $pokemon->setXp($xp);

        $ceilxp = maxXPForCurrentLevel($pokemon->getCourbeXp(), $pokemon->getNiveau());

        while($pokemon->getXp() >= $ceilxp) {
            $pokemon->setXp($pokemon->getXp() - $ceilxp);
            $pokemon->setNiveau($pokemon->getNiveau() + 1);

            $ceilxp = maxXPForCurrentLevel($pokemon->getCourbeXp(), $pokemon->getNiveau());
        }

        setPokemons($pokemon);

        $query = "UPDATE pokemon SET XP = :xp WHERE id = :id;";
        $sql = $dbh->prepare($query);
        $sql->bindValue(':xp', $xp, PDO::PARAM_INT);
        $sql->bindValue(':id', $pokemon->getId(), PDO::PARAM_INT);
        $sql->execute();
    }
}

function mettreEnVente($idPokemon, $prix)
{
    $dbh = connexionSQL();

    $pokemon = getMyPokemonById($idPokemon);
    $pokemon->setPrixVente($prix);
    $pokemon->setEnVente(true);

    setPokemons($pokemon);

    $query = "UPDATE Pokemon SET prixVente = :prix, enVente = true WHERE id = :id";
    $sql = $dbh->prepare($query);
    $sql->bindValue(':prix', $prix, PDO::PARAM_INT);
    $sql->bindValue(':id', $idPokemon, PDO::PARAM_INT);
    $sql->execute();
}

function acheterParDresseur($idPokemon, $idDresseur)
{
    $dbh = connexionSQL();

    $query = "UPDATE Pokemon SET idDresseur = :idDresseur, enVente = false WHERE id = :id";
    $sql = $dbh->prepare($query);
    $sql->bindValue(':idDresseur', $idDresseur, PDO::PARAM_INT);
    $sql->bindValue(':id', $idPokemon, PDO::PARAM_INT);
    $sql->execute();
}