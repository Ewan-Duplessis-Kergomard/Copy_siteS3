<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href=css/view.css>
        <link rel="stylesheet" type="text/css" href=css/detailProduit.css>
        <link rel="stylesheet" type="text/css" href=css/listeProduit.css>
        <link rel="stylesheet" type="text/css" href=css/client.css>
        <title><?php if (!empty($pagetitle)) {
                echo $pagetitle;
            } ?></title>
    </head>
    <body>
<?php
echo " <header>
        <nav>
            <div class=\"navbar\">
                <a href=\"index.php\">Accueil</a>";
                if(isset($_SESSION['login'])){
                    echo '<form method="post"><input type="hidden" name="controller" value="clients"><input type="hidden" name="action" value="read"><input type="hidden" name="mail" value='.$_SESSION['login'].'><input type="submit" value="Profil" /></form>
                            <form method="post"><input type="hidden" name="controller" value="clients"><input type="hidden" name="action" value="disconnect"><input type="submit" value="Déconnexion" /></form>';
                    if ($_SESSION['isAdmin']==1){echo '<form method="post"><input type="hidden" name="controller" value="clients"><input type="hidden" name="action" value="readAll"><input type="submit" value="Panneau de contrôle" /></form>';}
                }
                else{
                    echo '<form method="post"><input type="hidden" name="controller" value="clients"><input type="hidden" name="action" value="connect"><input type="submit" value="Connexion" /></form>
                        <form method="post"><input type="hidden" name="controller" value="clients"><input type="hidden" name="action" value="create"><input type="submit" value="Inscription" /></form>';
                }

// faire un count dans session panier pour chaque produit
//echo $_SESSION['panier']['1']
echo '<a href="view/contact/create.php">Contact</a>
<form method="post"><input type="hidden" name="controller" value="clients"><input type="hidden" name="action" value="panier"><input type="submit" value="Panier" /></form>
        <a href="?controller=clients&action=panier\"><img src=\"images/Icone/panier.png\" alt=\"panier.png\" class=\"ico_panier\"></a>
                    </div></nav></header>';


if (!empty($controller)) {
    if (!empty($view)) {
        $filepath = File::build_path(array("view", $controller, "$view.php"));
    }
}
require $filepath;
?>
    </body>
    <footer>
        <p style="border: 1px solid black;text-align:center;padding-right:1em;">Site de vente groupe 6</p>
    </footer>
</html>

