<?php
$prixtotal=0;
foreach ($_SESSION['panier'] as $id => $qte){
    $p = ModelProduits::getProduitById($id);
    $cout=$p->getPrix()*$qte;
    echo '<p>'.$p->getNomProd().'</p><form method="post" action="index.php"><input type="hidden" name="controller" value="commandes">
<input type="hidden" name="action" value="action"><input type="hidden" name="use" value="add"><input type="hidden" name="val" value="-1"><input type="submit" value="-"></form><p>Quantité: '.$qte.'</p><form method="post" action="index.php"><input type="hidden" name="controller" value="commandes">
<input type="hidden" name="action" value="action"><input type="hidden" name="use" value="add"><input type="hidden" name="val" value="1"><input type="submit" value="+"></form><p>Prix: '.$cout.'</p><br>';
    $prixtotal+=$cout;
}
echo "<p>Prix total: ".$prixtotal."</p>";
if ($_SESSION['panier']!=array()){
echo '<form method="post" action="index.php"><input type="hidden" name="controller" value="commandes">
<input type="hidden" name="action" value="action"><input type="hidden" name="use" value="confirm"><input type="submit" value="Valider votre panier"></form>';}
