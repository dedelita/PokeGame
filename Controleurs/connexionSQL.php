<?php

function connexionSQL()
{
    $host = "localhost";
    $db = "pokegame";
    $user = "root";
    $pass = "";
    $dbh = new PDO('mysql:host=' . $host . ';dbname=' . $db, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    return $dbh;
}