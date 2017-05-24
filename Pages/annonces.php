<?php
$pokemons = getAnnonces();
?>

<h2>Achète de nouveaux Pokémons !</h2>

<?php if(!$pokemons) { ?>
    <p class="no-pokemon-available">Il n'y a pas de pokémons en vente pour l'instant</p>
<?php } else { ?>
    <h3>Pokemon disponibles:</h3>

    <div class="pokemon-on-sale">
        <div class="header">Espèce</div>
        <div class="header">Dresseur</div>
        <div class="header">Niveau</div>
        <div class="header">XP</div>
        <div class="header">Prix</div>
        <?php foreach ($pokemons as $pokemon) { ?>
            <div><?= $pokemon->getNomPokemon()?></div>
            <div><?= $pokemon->getIdDresseur()?></div>
            <div><?= $pokemon->getNiveau()?></div>
            <div><?=$pokemon->getXP()?></div>
            <div>
                <a href='index.php?page=annonces&amp;action=acheter&amp;pokemon=<?=$pokemon->getIdPokemon()?>&amp;dresseur=<?=$pokemon->getIdDresseur()?>&amp;prix=<?=$pokemon->getPrix()?>'><?= $pokemon->getPrix()?> <i class="fa fa-fw fa-usd"></i></a>
            </div>
        <?php } ?>
    </ul>
<?php } ?>