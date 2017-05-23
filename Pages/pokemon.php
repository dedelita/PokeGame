<?php

$pokemons = $_SESSION["pokemons"];

?>

<h1>Mes Pokémons</h1>

<ul>
    <?php
    foreach ($pokemons as $pokemon) {
        $pokemon = unserialize($pokemon);
        $id = $pokemon->getId();
        $nom = $pokemon->getNom();
        echo "<li><a href='index.php?page=detail&pokemon=$id'>$nom</a></li>";
    }
    ?>
</ul>