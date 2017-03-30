<?php
function inscription()
{
    $login = getFieldFromForm("login");
    $email = getFieldFromForm("email");
    $password = getFieldFromForm("password");
    $conf_password = getFieldFromForm("conf_password");

    $dbh = connexionSQL();

    $rep = array("succes" => false, "erreur" => null);

    if (getUserByLogin($login)) {
        $rep["erreur"] = "Quelqu'un est déjà inscrit avec le login " . $login . " !";
    } elseif (getUserByEmail($email)) {
        $rep["erreur"] = "Quelqu'un est déjà inscrit avec cet email !";
    } elseif ($password == $conf_password) {
        $query = "INSERT INTO user (login, email, password) VALUES (:login, :email, :password);";

        $sql = $dbh->prepare($query);
        $sql->bindValue(':login', $login, PDO::PARAM_STR);
        $sql->bindValue(':email', $email, PDO::PARAM_STR);
        $sql->bindValue(':password', sha1($password), PDO::PARAM_STR);
        $res = $sql->execute();

        $rep["succes"] = $res;
        $rep["dbh"] = $dbh;
    } else {
        $rep["erreur"] = "Le mot de passe et sa confirmation ne correspondent pas !";
    }

    return $rep;
}

function connexion()
{
    $login = getFieldFromForm("login");
    $password = getFieldFromForm("password");

    $rep = array("erreur" => null);

    if (!isset($_SESSION["dresseur"]) && $login && $password) {
        $user = getUserByLogin($login);

        if ($user && $user["password"] == sha1($password)) {
            $rep["user"] = $user;
            $rep["succes"] = true;
        } else {
            $rep["succes"] = false;
            $rep["erreur"] = "Login ou Mot de passe incorrect !";
        }
    }

    return $rep;
}

//deconnexion
function deconnexion()
{
    session_destroy();
    header("Location:index.php");
}

function getUserByLogin($login)
{

    $dbh = connexionSQL();

    $query = "SELECT * FROM user WHERE login = :login;";
    $sql = $dbh->prepare($query);
    $sql->bindValue(':login', $login, PDO::PARAM_STR);
    $sql->execute();

    return $sql->fetch();
}

function getUserByEmail($email)
{
    $dbh = connexionSQL();

    $query = "SELECT * FROM user WHERE email = :email;";
    $sql = $dbh->prepare($query);
    $sql->bindValue(':email', $email, PDO::PARAM_STR);
    $sql->execute();

    return $sql->fetch();
}

function getUserId($login)
{
    $dbh = connexionSQL();

    $query = "SELECT id FROM user WHERE login = :login;";
    $sql = $dbh->prepare($query);
    $sql->bindValue(':login', $login);
    $sql->execute();

    return $sql->fetch();
}