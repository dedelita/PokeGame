<?php
$pokemons = getAnnonces();
$nbPieces = getNbPiecesDresseur();
?>

<h1>Annonces</h1>

<h2>Achète des nouveaux Pokémons !</h2>

<h3>Vous disposez de <?= $nbPieces ?> pièces</h3>

<?php
if(!$pokemons) {
    ?>
    <span>Il n'y a pas de pokémons en vente pour l'instant</span>
    <?php
}
?>
<ul>
<?php foreach ($pokemons as $pokemon) { ?>
    <li>
        <a href='index.php?page=annonces&amp;action=acheter&amp;pokemon=<?=$pokemon->getIdPokemon()?>&amp;dresseur=<?=$pokemon->getIdDresseur()?>&amp;prix=<?=$pokemon->getPrix()?>'>
            <?= $pokemon->getNomPokemon()?> : <?= $pokemon->getPrix()?> pièces
        </a>
        <br>
        <span>Niveau : <?= $pokemon->getNiveau()?>, XP : <?=$pokemon->getXP()?></span>
    </li>
<?php } ?>
</ul>