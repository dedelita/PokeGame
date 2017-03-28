<?php
if ($page == "home") {
    ?>
    <a href='index.php?page=home&action=aff_connexion'>Connexion</a>
    <a href='index.php?page=home&action=aff_inscription'>Inscription</a>
    <?php
} else {
    ?>
    <ul>
        <li><a href="index.php?page=pokemon">Mes Pokémons</a></li>
        <li><a href="index.php?page=annonces">Acheter de nouveaux Pokémons</a></li>
        <li><a href="index.php?action=deconnexion">Déconnexion</a></li>
    </ul>
    <?php
}