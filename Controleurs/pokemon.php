<?php

function getRandomSexe()
{
    return rand(0, 1) ? 'Mâle' : 'Femelle';
}

//add
function addPokemon($id_dresseur, $id_espece, $xp, $niveau)
{
    $dbh = connexionSQL();

    $query = "INSERT INTO pokemon (id_dresseur, id_espece, sexe, XP, niveau) VALUES (:id_dresseur, :id_espece, :sexe, :XP, :niveau);";
    $sql = $dbh->prepare($query);
    $sql->bindValue(':id_dresseur', $id_dresseur, PDO::PARAM_INT);
    $sql->bindValue(':id_espece', $id_espece, PDO::PARAM_INT);
    $sql->bindValue(':sexe', getRandomSexe(), PDO::PARAM_INT);
    $sql->bindValue(':XP', $xp, PDO::PARAM_INT);
    $sql->bindValue(':niveau', $niveau, PDO::PARAM_INT);
    $sql->execute();
}

//delete
function deletePokemonByName($nom)
{
    $dbh = connexionSQL();

    $p = getPokemonByName($nom);

    $query = "DELETE FROM pokemon WHERE nom=:nom;";
    $sql = $dbh->prepare($query);
    $sql->bindValue(':nom', $nom);
    $sql->execute();
}

//getters & setters
function getPokemons($id)
{
    $dbh = connexionSQL();

    $sql = $dbh->prepare("SELECT * FROM pokemon WHERE id_dresseur = :id_dresseur;");
    $sql->bindValue(':id_dresseur', $id, PDO::PARAM_INT);
    $sql->execute();
    $poks = $sql->fetchAll();

    $pokemons = array();
    foreach ($poks as $po) {
        $infos_espece = getInfosEspece($po["id_espece"]);


        if ($infos_espece["evolution"] == 'n') {
            $evolution = "Pokémon de base";
        } else {
            $evolution = "Pokémon d'évolution";
        }

        $types = array($infos_espece["type1"]);
        if($infos_espece["type2"]) {
            $types[] = $infos_espece["type2"];
        }

        $pokemons[] = serialize(new Pokemon($po["id"], $po["id_espece"], $infos_espece["nom"], $evolution, $po["sexe"],
            $po["XP"], $po["niveau"], $po["prix_vente"], $po["en_vente"], $types));
    }

    return $pokemons;
}

function getPokemonByName($nom)
{
    $pokemons = $_SESSION["pokemons"];

    foreach ($pokemons as $key => $pokemon) {
        $pokemon = unserialize($pokemon);

        if($pokemon->getNom() == $nom) {
            return $pokemon;
        }
    }
    
    return null;
}

function getNewXP($old_xp)
{
    return $old_xp + rand(10, 30);
}

function setPokemon($pokemon)
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

    $query = "SELECT COUNT(id) FROM pokemon WHERE id_dresseur = :id_dresseur;";
    $sql = $dbh->prepare($query);
    $sql->bindValue(':id_dresseur', $id, PDO::PARAM_INT);
    $sql->execute();

    return $sql->fetch()[0];
}

function entrainer($id_dresseur, $nom)
{
    $dbh = connexionSQL();

    $pokemon = getPokemonByName($nom);

    $xp = getNewXP($pokemon->getXp());

    $query = "UPDATE pokemon SET XP = :xp WHERE id = :id AND id_dresseur = :id_dresseur;";
    $sql = $dbh->prepare($query);
    $sql->bindValue(':xp', $xp, PDO::PARAM_INT);
    $sql->bindValue(':id', $pokemon->getId(), PDO::PARAM_INT);
    $sql->bindValue(':id_dresseur', $id_dresseur, PDO::PARAM_INT);
    $sql->execute();

    $pokemon->setXp($xp);

    setPokemon($pokemon);
}