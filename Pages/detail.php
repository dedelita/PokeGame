<?php
$id = getFieldFromForm("pokemon");

$pokemon = getPokemonById($id);

echo "<h1>{$pokemon->getNom()}</h1>";

if(!$pokemon->getEnVente()) {
    echo "<a href='index.php?page=detail&action=entrainer&pokemon=$id'>Entraîner</a>
    <a href='index.php?page=detail&action=mettre_en_vente&pokemon=$id'>Mettre en vente</a>";
}

echo "
    <p>{$pokemon->getEvolution()}</p>

    <p>Numéro : {$pokemon->getNumero()}</p>
    
    <p>Sexe : {$pokemon->getSexe()}</p>

    <p>Ses types :</p>
    
    <ul>";

foreach ($pokemon->getTypes() as $type) {
    echo "<li>$type</li>";
}

echo "</ul>

    <p>XP : {$pokemon->getXp()}</p>
    <p>Niveau : {$pokemon->getNiveau()}</p>";

?>