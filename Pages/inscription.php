<h2>Devenez Dresseur dès maintenant !</h2>

<form action="index.php?action=inscription" method="POST">
    <div class="signup-form">
        <label>Nom</label> <input type="text" name="login" required>
        <label>Mail</label> <input type="email" name="email" required>
        <label>Mot de passe</label> <input type="password" name="password" required>
        <label>Confirmer</label> <input type="password" name="conf_password" required>

        <label>Votre 1<sup>er</sup> pokémon</label>
        <select name="pokemon">
            <option value="Bulbizarre">Bulbizarre</option>
            <option value="Carapuce">Carapuce</option>
            <option value="Salamèche">Salamèche</option>
        </select>
    </div>
    
    <input type="submit" value="Go">
</form>
