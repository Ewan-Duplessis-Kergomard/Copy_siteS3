<body>
<?php
echo '<br> Id de produit: ' . htmlspecialchars($c->getIdProd()) .
     '<br> Nom du produit: ' . htmlspecialchars($c->getNomProd()) .
     '<br>Stock disponible: ' . htmlspecialchars($c->getStock()) .
      '<br>Prix du produit: ' . htmlspecialchars($c->getPrix()) .'€' .
        '<br>Description:<br>' . htmlspecialchars($c->getDescription()).
        '<br><form method="get" action="index.php"><input type="hidden" name="controller" value="'.$controller.'">
<input type="hidden" name="action" value="add"><input type="hidden" name="id_prod" value="'.$_GET['id_prod'].'"><input type="submit" value="Ajouter au panier"></form>';
if (isset($_SESSION['login'])) {echo '<br><form method="get" action="index.php"><input type="hidden" name="controller" value="'.$controller.'"><input type="hidden" name="action" value="favori"><input type="hidden" name="id_prod" value="'.$_GET['id_prod'].'">
<input id="fav" type="submit" value="Ajouter aux favoris"></form>';}
?>
</body>