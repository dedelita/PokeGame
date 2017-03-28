<h1>Devenez Dresseur dès maintenant !</h1>

<form action="index.php?action=inscription" method="POST">
    Nom / Login : <input type="text" name="nom" required>
    <br>
    Mail : <input type="email" name="email" required>
    <br>
    Mot de passe : <input type="password" name="password" required>
    <br>
    Confirmation de mot de passe : <input type="password" name="conf_password" required>
    <br>
    Selectionnez votre 1e pokémon :
    <select name="pokemon">
        <option value="Bulbizarre">Bulbizarre</option>
        <option value="Carapuce">Carapuce</option>
        <option value="Salamèche">Salamèche</option>
    </select>
    <br>
    <br>
    <input type="submit" value="Go">
</form>
