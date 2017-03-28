<?php

//inscription
function inscriptionDresseur()
{
    $nom = getFieldFromForm("nom");
    $email = getFieldFromForm("email");
    $password = getFieldFromForm("password");
    $conf_password = getFieldFromForm("conf_password");
    $pokemon = getFieldFromForm("pokemon");

    $dbh = connexionSQL();
    
    $rep = array("url" => "index.php", "pokemon" => null, "erreur" => null);

    if (getDresseurByNom($nom)) {
        $rep["erreur"] = "Un dresseur du nom de " . $nom . " existe déjà !";
        $rep["url"] .= "?page=inscription";
    } else {
        if(getDresseurByEmail($email)) {
            $rep["erreur"] = "Un dresseur est déjà inscrit avec cet email !";
            $rep["url"] .= "?page=inscription";
        } else {
            if ($password == $conf_password) {
                $query = "INSERT INTO dresseur (nom, email, password, nbPieces) VALUES (:nom, :email, :password, :nbPieces);";

                $sql = $dbh->prepare($query);
                $sql->bindValue(':nom', $nom, PDO::PARAM_STR);
                $sql->bindValue(':email', $email, PDO::PARAM_STR);
                $sql->bindValue(':password', sha1($password), PDO::PARAM_STR);
                $sql->bindValue(':nbPieces', 5000, PDO::PARAM_INT);
                $sql->fetch();

                if ($sql->execute()) { //inscription OK => connexion et ajout de son 1e pokémon
                    $rep["pokemon"] = $pokemon;
                    connexion($nom, $password);
                } else {
                    $rep["erreur"] = "Une erreur est survenue lors de l'ajout du nouveau dresseur à la base de données";
                    $rep["url"] .= "?page=inscription";
                }
            }
        }
    }

    return $rep;
}

function getDresseurByNom($nom)
{
    $dbh = connexionSQL();

    $query = "SELECT * FROM dresseur WHERE nom = :nom;";
    $sql = $dbh->prepare($query);
    $sql->bindValue(':nom', $nom, PDO::PARAM_STR);
    $sql->execute();

    return $sql->fetch();
}

function getDresseurByEmail($email)
{
    $dbh = connexionSQL();

    $query = "SELECT * FROM dresseur WHERE email = :email;";
    $sql = $dbh->prepare($query);
    $sql->bindValue(':email', $email, PDO::PARAM_STR);
    $sql->execute();

    return $sql->fetch();
}

//connexion
function connexion($login, $password)
{
    $rep = array("succes" => true, "erreur" => null);

    if (!isset($_SESSION["dresseur"]) && $login && $password) {
        $dresseur = getDresseurByNom($login);

        if ($dresseur && $dresseur["password"] == sha1($password)) {
            $_SESSION["dresseur"] = serialize(new Dresseur($dresseur["id"], $dresseur["nom"], $dresseur["nbPieces"]));
        } else {
            $rep["succes"] = false;
            $rep["erreur"] = "Login ou Mot de passe incorrect !";
        }
    }

    return $rep;
}

//deconnexion
function deconnexion() {
    session_destroy();
    header("Location:index.php");
}