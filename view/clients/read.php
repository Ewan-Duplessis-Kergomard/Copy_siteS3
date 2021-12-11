<body>
<?php
echo '<h1>Votre Profil</h1>';
if (isset($c)) {
    echo '<p>Nom et Prénom: ' . htmlspecialchars($c->getNom()) . htmlspecialchars($c->getPrenom()) . '<br>Email: ' . htmlspecialchars($c->getMail()) . '<form method="post" action="index.php"><input type="hidden" name="controller" value="clients"><input type="hidden" name="action" value="updateInfo"><input type="submit" value="Modifier Profil"></form><form method="post" action="index.php"><input type="hidden" name="controller" value="clients"><input type="hidden" name="action" value="updateMDP"><input type="submit" value="Modifier MDP"></form></p>';
}
echo '<p>Adresse: ' . $c->getRue() . ' ' . $c->getCodePoste() . ' ' . $c->getVille();
echo '<div><h2>Vos Favoris</h2>';
if($_SESSION['favoris']!=array()) {
    foreach ($_SESSION['favoris'] as $value) {
        $prod = ModelProduits::getProduitById($value);
        echo '<div class="favori"><p>' . $prod->getNomProd() . '</p><p>' . $prod->getPrix() . '</p>';
        if ($prod->getStock() > 0) {
            echo '<p>En stock</p>';
        } else echo '<p>Indisponible</p>';
        echo '</div>';
    }
}
else echo '<p>Vous n\'avez aucun produit en favori</p>';
echo '</div>';
$commandes = ControllerClients::getComms();
echo '<div><h2>Vos Commandes</h2>';
if ($commandes!=array()){
    foreach ($commandes as $idc => $prods){
        echo '<div><p>Commande '.$idc.'</p><br>';
        foreach ($prods as $idp => $qte){
            echo ModelProduits::getProduitById($idp)->getNomProd().' '.$qte.'<br>';
        }
        echo '</div>';
    }
}
else echo '<p>Vous n\'avez passé aucune commande<p>';
echo '</div>';
?>
</body>
