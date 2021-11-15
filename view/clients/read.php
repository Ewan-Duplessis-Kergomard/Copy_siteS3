<body>
<?php
echo '<h1>Votre Profil</h1>';
echo '<p>Nom et Prénom: ' . htmlspecialchars($c->getNom()) . htmlspecialchars($c->getPrenom()) . '<br>Email: ' . htmlspecialchars($c->getMail()) . '<a href=index.php?action=updateInfo&mail='.rawurlencode($c->getMail()). '>MàJ</a> <a href=index.php?action=deleted&mail='.rawurlencode($c->getMail()).'> Supprimer</a> .</p>';
echo '<p>Adresse: ' . $c->getRue() . ' ' . $c->getCodePoste() . ' ' . $c->getVille();
?>
</body>
