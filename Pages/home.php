<?php
if (isset($_SESSION["dresseur"])) {
    header("Location:index.php?page=pokemon");
} else {
    echo "<br>";
    $erreur = getFieldFromForm("erreur");
    if($erreur) {
        echo "ERREUR: " . $erreur;
    }
}