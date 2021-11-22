<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title> Ajout de produit</title>
</head>
<body>
<form method="get" action="index.php">
    <fieldset>
        <legend>Ajout de produit:</legend>
        <p>
            <input type='hidden' name='controller' value='<?php echo $controller ?>'>
            <input type='hidden' name='action' value='created'>
            <!--<label for="id_prod">ID du produit</label> :
            <input type="number" placeholder="id propre au produit" name="id_prod" id="id_prod" required/>-->
            <label for="nom_prod">Nom du produit</label> :
            <input type="text" placeholder="Casque TC1" name="nom_prod" id="nom_prod" required/>
            <label for="stock">Stock</label> :
            <input type="number" placeholder="stock disponible" name="stock" id="stock" required/>
            <label for="prix">Prix</label> :
            <input type="number" placeholder="prix en €" name="prix" id="prix" required/>
            <label for="description">Description</label> :
            <input type="text" placeholder="Ce casque est parfait dans l'avion..." name="description" id="description" required/>
        </p>
        <p>
            <input type="submit" value="Sauvegarder" />
        </p>
    </fieldset>
</form>
</body>
</html>