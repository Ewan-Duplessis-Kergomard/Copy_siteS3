<body>
<?php
if(!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin']==0){echo '<p class="warning">VOUS N\'AVEZ PAS L\'AUTORISATION D\'ACCEDER A CETTE PAGE !</p>';}
else {
    echo '<form method="post"><input type="hidden" name="controller" value="clients"><input type="hidden" name="action" value="delete"><input type="submit" value="Formulaire suppression"></form>';
    if (!empty($tab_c)) {
        echo '<div class="clients">';
        foreach ($tab_c as $c) {
            echo '<div class="client"><p>'.rawurlencode($c->getMail()).'</p><p>' . htmlspecialchars($c->getNom()) .' '. htmlspecialchars($c->getPrenom()) .'</p><form method="post"><input type="hidden" name="controller" value="clients"><input type="hidden" name="action" value="permission"><input type="hidden" name="mail" value="'.htmlspecialchars($c->getMail()).'"><input type="submit" value="'.$c->getIsAdmin().'"></form><form method="post"><input type="hidden" name="controller" value="clients"><input type="hidden" name="action" value="deleted"><input type="hidden" name="mail" value="'.htmlspecialchars($c->getMail()).'"><input type="submit" value="Supprimer"></form></div>';
        }
        echo '</div>';
    }
}
?>
</body>
