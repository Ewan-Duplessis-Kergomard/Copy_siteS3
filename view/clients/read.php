<body>
<?php
echo '<h1>Votre Profil</h1>';
if (isset($c)) {
    echo '<p>Nom et Prénom: ' . htmlspecialchars($c->getNom()) . htmlspecialchars($c->getPrenom()) . '<br>Email: ' . htmlspecialchars($c->getMail()) . '<form method="post" action="index.php"><input type="hidden" name="controller" value="clients"><input type="hidden" name="action" value="updateInfoClient"><input type="submit" value="Modifier Profil"></form><form method="post" action="index.php"><input type="hidden" name="controller" value="clients"><input type="hidden" name="action" value="updateMDPClient"><input type="submit" value="Modifier MDP"></form></p>';
}
echo '<p>Adresse: ' . $c->getRue() . ' ' . $c->getCodePoste() . ' ' . $c->getVille();
echo '<div><h2>Vos Favoris</h2>';
var_dump($_SESSION['favoris']);
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
?>
</body>
