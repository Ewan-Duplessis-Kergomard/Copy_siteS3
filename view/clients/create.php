<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title> Mon premier php </title>
</head>
<body>
<form method="get" action="index.php">
    <fieldset>
        <legend>Mon formulaire :</legend>
        <p>
            <input type='hidden' name='action' value='created'>
            <label for="mail">Adresse email</label> :
            <input type="email" placeholder="mail@example.xyz" name="mail" id="mail" required/>
            <label for="mdp">Mot de passe</label> :
            <input type="text" placeholder="X95eb5/48R" name="mdp" id="mdp" required/>
            <label for="nom">Nom</label> :
            <input type="text" placeholder="Ex : Fabre" name="nom" id="nom" required/>
            <label for="prenom">Prénom</label> :
            <input type="text" placeholder="Ex : Jean" name="prenom" id="prenom" required/>
            <label for="rue">Adresse: Numéro et Voie</label> :
            <input type="text" placeholder="Ex : 55 rue du Faubourg-Saint-Honoré" name="rue" id="rue" required/>
            <label for="code">Code postal</label> :
            <input type="number" placeholder="Ex : 75000" name="code" id="code" required/>
            <label for="ville">Ville</label> :
            <input type="text" placeholder="Ex : Paris" name="ville" id="ville" required/>

        </p>
        <p>
            <input type="submit" value="Envoyer" />
        </p>
    </fieldset>
</form>
</body>
</html>
