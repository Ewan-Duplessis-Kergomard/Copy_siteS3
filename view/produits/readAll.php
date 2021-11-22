<?php
foreach ($tab_c as $c) {
    echo '<div class="support">
            <a class="frame" href=index.php?action=read&id_prod=' . rawurlencode($c->getIdProd()) . '>
                <img src="images/'.htmlspecialchars($c->getIdProd()).'.png" alt="'.htmlspecialchars($c->getNomProd()).'">
                <p>' . htmlspecialchars($c->getNomProd()) . '</p>
                <p>' . htmlspecialchars($c->getPrix()) . '€</p>
            </a>
        </div>';
}
echo"</main>";
?>