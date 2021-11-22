<body>
<?php
echo '<p> Numéro de Commande: '. htmlspecialchars($c->getIdComm()) .
     '<p> Numéro de Produit: '. htmlspecialchars($c->getIdProd()) .
     '<br>Quantité: ' . htmlspecialchars($c->getQuantite()) . '<a href=index.php?action=updateCommandes='.rawurlencode($c->getQuantite()).'>MàJ</a> 
      <a href=index.php?action=deleteAllByID='.rawurlencode($c->getIdComm()).'> Supprimer</a> .</p>' ;
?>
</body>
