<?php
$prixtotal=0;
foreach ($_SESSION['panier'] as $id => $qte){
    $p = ModelProduits::getProduitById($id);
    if ($p->getStock()>0) {
        $cout = $p->getPrix() * $qte;
        echo "<p>" . $p->getNomProd() . "</p><p>Quantité: " . $qte . "</p><p>Prix: " . $cout . "</p><br>";
        $prixtotal += $cout;
    }
}
echo "<p>Prix total: ".$prixtotal."</p>";
