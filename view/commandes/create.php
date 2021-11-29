<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title> Création de commandes </title>
</head>
<body>
<form method="get" action="index.php">
    <fieldset>
        <legend>Ma commande :</legend>
        <p>
            <input type='hidden' name='controller' value='<?php if (!empty($controller)) {
                echo $controller;
            } ?>'>
            <input type='hidden' name='action' value='created'>
            <label for="id_comm">Identifiant de commande</label> :
            <input type="number" placeholder="1414765" name="id_comm" id="id_comm" required/>
            <label for="id_prod">Identifiant de Produit</label> :
            <input type="number" placeholder="445466" name="id_prod" id="id_prod" required/>
            <!--A faire automatiquement-->
            <label for="quantité">Quantité</label> :
            <input type="number" placeholder="1" name="quantité" id="nom" required/>

        </p>
        <p>
            <input type="submit" value="Envoyer" />
        </p>
    </fieldset>
</form>
</body>
</html>
