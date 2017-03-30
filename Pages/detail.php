<?php
$nom = getFieldFromForm("pokemon");

$pokemon = getPokemonByName($nom);

echo "<h1>$nom</h1>
    
    <a href='index.php?page=detail&action=entrainer&pokemon=$nom'>Entraîner</a>
    <a href='index.php?page=detail&action=mettre_en_vente&pokemon=$nom'>Mettre en vente</a>
    
    <p>{$pokemon->getEvolution()}</p>

    <p>Numéro : {$pokemon->getNumero()}</p>
    
    <p>Sexe : {$pokemon->getSexe()}</p>

    <p>Ces types :</p>
    
    <ul>";

foreach ($pokemon->getTypes() as $type) {
    echo "<li>$type</li>";
}

echo "</ul>
    <p>XP : {$pokemon->getXp()}</p>
    <p>Niveau : {$pokemon->getNiveau()}</p>";

?>

