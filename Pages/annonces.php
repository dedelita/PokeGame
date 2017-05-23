<?php
$pokemons = getAnnonces();
$nbPieces = getNbPiecesDresseur();
?>

<h1>Annonces</h1>

<h2>Achète des nouveaux Pokémons !</h2>

<h3>Vous disposez de <?php echo $nbPieces ?> pièces</h3>

<ul>
    <?php
    foreach ($pokemons as $pokemon) {
        echo  "<li><a href='index.php?page=annonces&action=acheter&pokemon={$pokemon->getIdPokemon()}&dresseur={$pokemon->getIdDresseur()}&prix={$pokemon->getPrix()}'>" .
                $pokemon->getNomPokemon() . " : " . $pokemon->getPrix() . " pièces</a><br> Niveau : " . $pokemon->getNiveau() . ", XP : " . $pokemon->getXP() .
            "</li>";
    }
    ?>
</ul>