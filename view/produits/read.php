<body>
<?php
echo '<div class="main">'.
    '<div class="img_prod">'.
    '<img  class="img_prod" src="images/' . htmlspecialchars($c->getIdProd()) .'.png"></div>'.
    '<div class="specs">'.
     '<h2>'. htmlspecialchars($c->getNomProd()) .'</h2>'.
      '<p>Prix: ' . htmlspecialchars($c->getPrix()) .'€' .'</p>'.
        '<p>Description:<br>' . htmlspecialchars($c->getDescription()).'</p>'.
        '<br><form method="get" action="index.php"><input type="hidden" name="controller" value="'.$controller.'">
<input type="hidden" name="action" value="add"><input type="hidden" name="id_prod" value="'.$_GET['id_prod'].'"><input type="submit" value="Ajouter au panier"></form></div></div>';
if (isset($_SESSION['login'])) {echo '<br><form method="get" action="index.php"><input type="hidden" name="controller" value="'.$controller.'"><input type="hidden" name="action" value="favori"><input type="hidden" name="id_prod" value="'.$_GET['id_prod'].'">
<input id="fav" type="submit" value="Ajouter aux favoris"></form>';}
?>
</body>