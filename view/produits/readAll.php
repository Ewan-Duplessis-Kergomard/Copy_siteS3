<body>
<?php
foreach ($tab_c as $c){
    echo '<a href=index.php?action=read&id_prod='.rawurlencode($c->getIdProd()).'> Produit n°' . htmlspecialchars($c->getIdProd()) .': ' . htmlspecialchars($c->getNomProd()) . '</a><br>';}
?>
</body>