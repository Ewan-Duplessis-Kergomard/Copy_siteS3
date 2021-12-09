<body>
<form method="post" action="index.php">
    <fieldset>
        <legend>Formulaire d'inscription</legend>
        <p class="formulaire">
            <input type='hidden' name='controller' value='<?php if (!empty($controller)) {
                echo $controller;
            } ?>'>
            <input type='hidden' name='action' value='created'>
            <div class="f_input">
            <label for="mail">Adresse email</label> :
                <input type="email" placeholder="mail@example.xyz" name="mail" id="mail" required/>
            <label for="mdp">Mot de passe</label> :
                <input type="password" placeholder="X95eb5/48R" name="mdp" id="mdp" required/>
            <label for="mdp2">Confirmation mot de passe</label> :
                <input type="password" placeholder="X95eb5/48R" name="mdp2" id="mdp2" required/></div>

            <div class="f_input">
            <label for="nom">Nom</label> :
                <input type="text" placeholder="Ex : Fabre" name="nom" id="nom" required/>
            <label for="prenom">Prénom</label> :
                <input type="text" placeholder="Ex : Jean" name="prenom" id="prenom" required/></div>

            <div class="f_input">
            <label for="rue">Adresse: Numéro et Voie</label> :
                <input type="text" placeholder="Ex : 55 rue du Faubourg-Saint-Honoré" name="rue" id="rue" required/>
                <br><label for="code">Code postal</label> :
                <input type="number" placeholder="Ex : 75000" name="code" id="code" required/>
                <br><label for="ville">Ville</label> :
                <input type="text" placeholder="Ex : Paris" name="ville" id="ville" required/></div>

        </p>
        <p>
            <input type="submit" value="Envoyer" />
        </p>
    </fieldset>
</form>
</body>
