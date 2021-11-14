<body>
<?php
foreach ($tab_c as $c){
    echo '<a href=index.php?action=read&mail='.rawurlencode($c->getMail()).'>Client ' . htmlspecialchars($c->getNom()) . htmlspecialchars($c->getPrenom()) . '</a><p> Mail: '.$c->getMail().'</p><br>';}
?>
</body>
