<?php
if (!empty($controller)) {
    echo'<form method="get" action="index.php">
        <fieldset>
            <legend>Connexion:</legend>
            <p>
                <input type="hidden" name="controller" value='.$controller.'>
                <input type="hidden" name="action" value="connected">
                <label for="mail">Adresse email</label> :
                <input type="email" placeholder="mail@example.xyz" name="mail" id="mail" required/>
                <label for="mdp">Mot de passe</label> :
                <input type="password" placeholder="X95eb5/48R" name="mdp" id="mdp" required/>
            </p>
            <p>
                <input type="submit" value="Envoyer" />
            </p>
        </fieldset>
    </form>';
}
