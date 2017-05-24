<?php
$pokemons = getAnnonces();
?>

<h2>Achète de nouveaux Pokémons !</h2>

<?php if(!$pokemons) { ?>
    <p class="no-pokemon-available">Il n'y a pas de pokémons en vente pour l'instant</p>
<?php } else { ?>
    <div class="pokemon-on-sale">
        <div class="header">Espèce</div>
        <div class="header">Dresseur</div>
        <div class="header">Niveau</div>
        <div class="header">XP</div>
        <div class="header">Prix</div>
        <?php foreach ($pokemons as $pokemon) { ?>
            <div><?= $pokemon->getNomPokemon()?></div>
            <div><?= getNomDresseurById($pokemon->getIdDresseur()) ?></div>
            <div><?= $pokemon->getNiveau()?></div>
            <div><?=$pokemon->getXP()?></div>
            <div>
                <?php if(getNbPiecesDresseur() >= $pokemon->getPrix()) { ?>
                    <a href='index.php?page=annonces&amp;action=acheter&amp;pokemon=<?=$pokemon->getIdPokemon()?>&amp;dresseur=<?=$pokemon->getIdDresseur()?>&amp;prix=<?=$pokemon->getPrix()?>'><?= $pokemon->getPrix()?> <i class="fa fa-fw fa-usd"></i></a>
                <?php } else { ?>
                    <span><?= $pokemon->getPrix()?> <i class="fa fa-fw fa-usd"></i></span>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
<?php } ?>