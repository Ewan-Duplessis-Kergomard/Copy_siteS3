<body>
<?php
foreach ($tab_c as $c)
    //var_dump($tab_c);
    $test=htmlspecialchars($c->getIdComm());
    var_dump($test);
    echo '<a href=index.php?action=readAll='.rawurlencode($c->getIdComm()).'>Product' . htmlspecialchars($c->getIdProd()) . htmlspecialchars($c->getQuantite()) .'</a><br>';
?>
</body>
