<h1>Liste des pokémons</h1>

<?php

$pokemons = $_SESSION["dresseur"]["pokemons"];

if (!$pokemons) {
    ?>
    <p>Vous n'avez pas de pokémons !</p>
    <?php
} else {
    ?>
    <a href="../index.php?page=delete">Supprimer des pokémons</a>
    <ul>
        <?php
        foreach ($pokemons as $pokemon) {
            $nom = $pokemon['nom'];
            echo "<li><a href='../index.php?page=detail&pokemon=$nom'>$nom</a></li>";
        }
        ?>
    </ul>
    <?php
}
?>