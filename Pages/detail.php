<?php
    $nom = getFieldFromForm("pokemon");

    $pokemon = getPokemonByName($nom);
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
            <div><span><?= $pokemon->getXp() ?></span><span>9999</span></div>
            <div>XP</div>
        </div>
    </li>
</ul>

<script src="https://rawgit.com/kimmobrunfeldt/progressbar.js/1.0.0/dist/progressbar.js"></script>

<script>
    var XP = <?= $pokemon->getXp() ?>,
        XPMax = 9999;
</script>

<script>
    window.addEventListener("load", () => {
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
    <a href='index.php?page=detail&amp;action=entrainer&amp;pokemon=<?= $nom ?>'>Entraîner</a>
    <a href='index.php?page=detail&amp;action=mettre_en_vente&amp;pokemon=<?= $nom ?>'>Mettre en vente</a>
</div>

