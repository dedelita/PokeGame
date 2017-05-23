<?php

$pokemons = $_SESSION["pokemons"];
?>

<h2>Mes Pokémons</h2>

<ul class="pokemon-list">
    <?php
    foreach ($pokemons as $pokemon) {
        $pokemon = unserialize($pokemon);
        $id = $pokemon->getId();
        $nom = $pokemon->getNom();

        $num = str_pad($pokemon->getNumero(), 3, '0', STR_PAD_LEFT);
        ?>
            <li>
                <a href='index.php?page=detail&amp;pokemon=<?= $id ?>'>
                    <img src="http://assets.pokemon.com/assets/cms2/img/pokedex/full/<?= $num ?>.png">
                    <p><?= $nom ?> <span>#<?= $id ?></span></p>
                </a>
            </li>
        <?php
    }
    ?>
</ul>