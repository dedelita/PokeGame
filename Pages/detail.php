<h1><?php echo $_GET["pokemon"]; ?></h1>

<?php

$pokemon = getPokemonByName($_GET["pokemon"]);

$types = getTypesOfPokemon($pokemon["id"]);

if(!isset($pokemon)) {
    echo "<p>Erreur : Ce pokémon n'est pas enregistré dans la pokédex !</p>";
} else {
    if($pokemon["evolution"] == false) {
        echo "<p>Pokémon de base</p>";
    } else {
        echo "<p>Pokémon d'évolution</p>";
    }

    echo "<p>Numéro : {$pokemon["id"]}</p>" .
         "<p>Ces types : </p>
         <ul>";

     foreach($types as $type) {
        echo "<li>$type[nom]</li>";
    }

    echo "</ul>";
}