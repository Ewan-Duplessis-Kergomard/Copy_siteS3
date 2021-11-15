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
            <input type='hidden' name='action' value='created'>
            <label for="id_comm">Identifiant de commande</label> :
            <input type="number" placeholder="1414765" name="Identifiant Commande" id="id_comm" required/>
            <label for="id_prod">Identifiant de Produit</label> :
            <input type="number" placeholder="445466" name="Identifiant Produit" id="id_prod" required/>
            <!--A faire automatiquement-->
            <label for="quantité">Quantité</label> :
            <input type="number" placeholder="1" name="Quantité" id="nom" required/>

        </p>
        <p>
            <input type="submit" value="Envoyer" />
        </p>
    </fieldset>
</form>
</body>
</html>
