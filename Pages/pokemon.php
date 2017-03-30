<?php

$pokemons = $_SESSION["pokemons"];
?>

<h1>Mes Pokémons</h1>

<ul>
    <?php
    foreach ($pokemons as $pokemon) {
        $pokemon = unserialize($pokemon);
        $nom = $pokemon->getNom();
        echo "<li><a href='index.php?page=detail&pokemon=$nom'>$nom</a></li>";
    }
    ?>
</ul>