<div class=\"list_prod\">
<?php
if (!empty($tab_c)) {
    foreach ($tab_c as $c) {
        echo '<form method="post" action="index.php"><input type="hidden" name="controller" value="produits"><input type="hidden" name="action" value="read"><input type="hidden" name="id_prod" value="'. rawurlencode($c->getIdProd()) .'"><input type="submit" value="'. rawurlencode($c->getIdProd()) .'"></form>';
        /*echo '<div class="support">
                <a class="frame" href=index.php?action=read&id_prod=' . rawurlencode($c->getIdProd()) . '>
                    <img src="images/'.htmlspecialchars($c->getIdProd()).'.png" alt="'.htmlspecialchars($c->getNomProd()).'" class="prod_img">
                    <p class="prod_name">' . htmlspecialchars($c->getNomProd()) . '</p>
                    <p class="prod_price">' . htmlspecialchars($c->getPrix()) . '€</p>
                </a>
            </div>';*/
    }
}
echo"</main>";
?>
</div>
