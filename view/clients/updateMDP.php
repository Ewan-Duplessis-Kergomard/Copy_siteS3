<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title></title>
</head>
<body>
<form method="post" action="index.php">
    <fieldset>
        <legend>Mon formulaire :</legend>
        <p>
            <input type='hidden' name='action' value='updatedMDP'>
            <label for="mail">Email: </label> :
<?php
if (isset($c)) {echo '
<label for="mdp">Mot de passe</label> :
<input type="password" placeholder="X95eb5/48R" name="mdp" id="mdp" required/>
<label for="mdp2">Confirmation mot de passe</label> :
<input type="password" placeholder="X95eb5/48R" name="mdp2" id="mdp2" required/></div>';}
?>
        </p>
        <p>
            <input type="submit" value="Envoyer" />
        </p>
    </fieldset>
</form>
</body>
</html>

