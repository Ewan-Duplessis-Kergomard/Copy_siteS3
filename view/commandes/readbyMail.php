<body>
<div class=""
<?php
if (!empty($tab_c)) {
    foreach ($tab_c as $c)
        echo '<a href=index.php?action=readbyMail='.rawurlencode($c->getIdComm()).'>Product' .htmlspecialchars($c->getIdProd()) . htmlspecialchars($c->getQuantite()) .'</a><br>';
}
?>
</body>
