<?php

function getIdEspeceOfPokemon($nom)
{
    $dbh = connexionSQL();
    $query = "SELECT id FROM espece_pokemon WHERE nom = :nom;";
    $sql = $dbh->prepare($query);
    $sql->bindValue(':nom', $nom, PDO::PARAM_STR);
    $sql->execute();

    return $sql->fetch()[0];
}

function getRandomSexe()
{
    return rand(0, 1) ? 'Mâle' : 'Femelle';
}

//add
//NE MARCHE PAS !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! :'(
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

//getters
function getPokemons($id)
{
    $dbh = connexionSQL();
    $sql = $dbh->prepare("SELECT * FROM pokemon WHERE id_dresseur = :id_dresseur;");
    $sql->bindValue(':id_dresseur', $id, PDO::PARAM_INT);
    $sql->execute();
    $pokemons = $sql->fetchAll();

    return $pokemons;
}

function getPokemonByName($nom)
{
    $dbh = connexionSQL();

    $query = "SELECT * FROM pokemon WHERE nom=:nom AND id_dresseur = :id_dresseur;";
    $sql = $dbh->prepare($query);
    $sql->bindValue(':nom', $nom, PDO::PARAM_STR);
    $sql->bindValue(':id_dresseur', $_SESSION["dresseur"]->getId(), PDO::PARAM_INT);
    $sql->execute();
    $pokemon = $sql->fetch();

    return $pokemon;
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

function getNbByEvolution($evolution)
{
    $dbh = connexionSQL();

    $query = "SELECT COUNT(p.id) FROM pokemon p JOIN espece_pokemon e ON p.id_espece = e.id WHERE e.evolution=:evol;";
    $sql = $dbh->prepare($query);
    $sql->bindValue(':evol', $evolution);
    $sql->execute();

    return $sql->fetch()[0];
}
