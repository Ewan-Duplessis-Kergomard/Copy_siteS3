<?php
$prixtotal=0;
echo '<div class="panier">';
foreach ($_SESSION['panier'] as $id => $qte){
    echo '<div class="item">';
    $p = ModelProduits::getProduitById($id);
    $cout=$p->getPrix()*$qte;
    echo '<p>'.$p->getNomProd().'</p><form method="post" action="index.php"><input type="hidden" name="controller" value="commandes">
<input type="hidden" name="action" value="action"><input type="hidden" name="use" value="add"><input type="hidden" name="id_prod" value="'.$id.'"><input type="hidden" name="val" value="-1"><input type="submit" value="-"></form><p>Quantité: '.$qte.'</p><form method="post" action="index.php"><input type="hidden" name="controller" value="commandes">
<input type="hidden" name="action" value="action"><input type="hidden" name="use" value="add"><input type="hidden" name="id_prod" value="'.$id.'"><input type="hidden" name="val" value="1"><input type="submit" value="+"></form><p>Prix: '.$cout.'</p><br>';
    $prixtotal+=$cout;
    echo '</div>';
}
echo "<p>Prix total: ".$prixtotal."</p>";
if ($_SESSION['panier']!=array()){
    if(!isset($_SESSION['login'])){echo '<form method="post"><input type="hidden" name="controller" value="clients"><input type="hidden" name="action" value="connect"><input type="submit" value="Valider votre panier" /></form>';}
    else echo '<form method="post" action="index.php"><input type="hidden" name="controller" value="commandes"><input type="hidden" name="action" value="action"><input type="hidden" name="use" value="confirm"><input type="submit" value="Valider votre panier"></form>';}
echo '</div>';