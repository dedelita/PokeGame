<header>
    <div class="wrap">
        <h1>PokéGame</h1>

        <nav class="user">
            <?php
            if ($page == "home") {
                ?>
                <a class="signup" href='index.php?page=home&amp;action=aff_inscription'>Inscription</a>
                <a class="login" href='index.php?page=home&amp;action=aff_connexion'>Connexion</a>
                <?php
            } else {
                ?>
                <span class="money"><?= getNbPiecesDresseur() ?> <i class="fa fa-fw fa-usd"></i></span>
                <a class="logout" href="index.php?action=deconnexion">Déconnexion</a>
                <?php
            }
            ?>
        </nav>

        <?php
        if ($page != "home") {
            ?>
            <nav class="pages">
                <a href="index.php?page=pokemon">Mes Pokémons</a>
                <a href="index.php?page=annonces">Acheter</a>
            </nav>
            <?php
        }
        ?>
    </div>
</header>