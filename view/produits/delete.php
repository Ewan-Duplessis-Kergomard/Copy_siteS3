<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Supression de produit</title>
</head>
<body>
<?php
if(!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin']==0){echo '<p class="warning">VOUS N\'AVEZ PAS L\'AUTORISATION D\'ACCEDER A CETTE PAGE !</p>';}
else {
    echo '
<form method="post" action="index.php">
    <fieldset>
        <legend>Mon formulaire :</legend>
        <p>
            <input type="hidden" name="action" value="deleted">
            <label for="id_prod">Id du produit à supprimer</label> :
            <input type="number" placeholder="id du produit" name="id_prod" id="id_prod" required/>
        </p>
        <p>
            <input type="submit" value="Supprimer" />
        </p>
    </fieldset>
</form>';
}?>
</body>
</html>