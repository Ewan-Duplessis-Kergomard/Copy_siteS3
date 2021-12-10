<body>
<?php
if(!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin']==0){echo '<p class="warning">VOUS N\'AVEZ PAS L\'AUTORISATION D\'ACCEDER A CETTE PAGE !</p>';}
else {
    if (!empty($tab_c)) {
        foreach ($tab_c as $c) {
            echo '<a href=index.php?controller=clients&action=read&mail=' . rawurlencode($c->getMail()) . '>Client ' . htmlspecialchars($c->getNom()) . htmlspecialchars($c->getPrenom()) . '</a><p> Mail: ' . $c->getMail() . '</p><br>';
        }
    }
}
?>
</body>
