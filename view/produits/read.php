<body>
<?php
echo '<br> Id de produit: ' . htmlspecialchars($c->getIdProd()) .
     '<br> Nom du produit: ' . htmlspecialchars($c->getNomProd()) .
     '<br>Stock disponible: ' . htmlspecialchars($c->getStock()) .
      '<br>Prix du produit: ' . htmlspecialchars($c->getPrix()) .'€' .
        '<br>Description:<br>' . htmlspecialchars($c->getDescription());
?>
</body>