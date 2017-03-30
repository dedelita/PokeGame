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

function getInfosEspece($id_espece) {
    $dbh = connexionSQL();

    $query = "SELECT * FROM espece_pokemon WHERE id = :id";
    $sql = $dbh->prepare($query);
    $sql->bindValue(':id', $id_espece, PDO::PARAM_INT);
    $sql->execute();

    return $sql->fetch();
}