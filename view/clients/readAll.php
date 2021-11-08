<body>
<?php
foreach ($tab_c as $c)
    //var_dump($tab_c);
    $test=htmlspecialchars($c->getNom());
    var_dump($test);
    echo '<a href=index.php?action=read&mail='.rawurlencode($c->getMail()).'>Client ' . htmlspecialchars($c->getNom()) . htmlspecialchars($c->getPrenom()) . '</a><br>';
?>
</body>
