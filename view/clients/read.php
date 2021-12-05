<body>
<?php
echo '<h1>Votre Profil</h1>';
if (isset($c)) {
    echo '<p>Nom et Prénom: ' . htmlspecialchars($c->getNom()) . htmlspecialchars($c->getPrenom()) . '<br>Email: ' . htmlspecialchars($c->getMail()) . '<a href=index.php?controller=clients&action=updateInfo&mail='.rawurlencode($c->getMail()). '>MàJ</a> <a href=index.php?controller=clients&action=deleted&mail='.rawurlencode($c->getMail()).'> Supprimer</a> .</p>';
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
