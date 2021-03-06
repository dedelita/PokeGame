<?php
$id = getFieldFromForm("pokemon");

$pokemon = getMyPokemonById($id);
$nom = $pokemon->getNom();
$ceilxp = maxXPForCurrentLevel($pokemon->getCourbeXp(), $pokemon->getNiveau());
?>

<div class="pokemon-detail">
    <img src="http://assets.pokemon.com/assets/cms2/img/pokedex/full/<?= str_pad($pokemon->getNumero(), 3, '0', STR_PAD_LEFT) ?>.png">

    <div>
        <h2><?= $nom ?><span>#<?= $pokemon->getId() ?></h2>
            
        <p>
            <span class="number">Pokémon N°<?= $pokemon->getNumero() ?></span> &middot;
            <span class="evolution"><?= $pokemon->getEvolution() ?></span>
        </p>

        <ul class="types">
            <?php foreach ($pokemon->getTypes() as $type) {
                echo "<li>$type</li>";
            } ?>
        </ul>
    </div>
</div>

<ul class="stats">
    <li class="stat-gender <?= $pokemon->getSexe() == "Male" ? "male" : "female" ?>"><i class="fa fa-fw fa-<?= $pokemon->getSexe() == "Male" ? "mars" : "venus" ?>"></i></li>
    <li class="stat-level"><span>Niveau</span><span><?= $pokemon->getNiveau() ?></span></li>
    <li class="stat-xp">
        <div id="xp-graph"></div>
        <div class="inner">
            <div><span><?= $pokemon->getXp() ?></span><span><?= $ceilxp ?></span></div>
            <div>XP</div>
        </div>
    </li>
</ul>

<script src="https://rawgit.com/kimmobrunfeldt/progressbar.js/1.0.0/dist/progressbar.js"></script>

<script>
    var XP = <?= $pokemon->getXp() ?>,
        XPMax = <?= $ceilxp ?>;

    window.addEventListener("load", function() {
        var bar = new ProgressBar.Circle('#xp-graph', {
            strokeWidth: 5,
            easing: 'easeInOut',
            duration: 1400,
            color: '#DD2828',
            trailColor: '#CCC',
            trailWidth: 1,
            svgStyle: null
        });

        bar.animate(XP / XPMax);
    })
</script>

<div class="actions">
    <?php if(!$pokemon->getEnVente()) { ?>
        <?php if(entrainementValide($pokemon->getDernierEntrainement(), $pokemon->getNiveau())) { ?>
            <a href='index.php?page=detail&amp;action=entrainer&amp;pokemon=<?= $id ?>'>Entraîner</a>
        <?php } else { 
            $timeToTrain = strtotime($pokemon->getDernierEntrainement()) + 60 * 60;
        ?>
            <span class="training-wait">
                <i class="fa fa-fw fa-clock-o"></i>
                <?= round(abs($timeToTrain - time()) / 60) ?> minutes
            </span>
        <?php } ?>
        <a href='index.php?page=detail&amp;action=mettre_en_vente&amp;pokemon=<?= $id ?>'>Mettre en vente</a>
    </div>
    <?php } else { ?>
        <span>Mis en vente</span>
        <a href='index.php?page=detail&amp;action=annuler_vente&amp;pokemon=<?= $id ?>'>Annuler vente</a>
    <?php } ?>