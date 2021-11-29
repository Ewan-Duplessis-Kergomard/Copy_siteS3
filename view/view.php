<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href=css/view.css>
        <link rel="stylesheet" type="text/css" href=css/detailProduit.css>
        <link rel="stylesheet" type="text/css" href=css/listeProduit.css>
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
                    echo "<a href=\"?controller=clients&action=read&mail=".$_SESSION['login']."\">Profil</a>
                    <a href=\"?controller=clients&action=disconnect\">Déconnexion</a>";//TODO gérer deconnexion
                    /*if ($_SESSION['isAdmin']==1){echo "<a href=\"nowhere\">Panneau de contrôle</a>";}*/
                }
                else{
                    echo "<a href=\"?controller=clients&action=connect\">Connexion</a>
                    <a href=\"?controller=clients&action=create\">Inscription</a>";
                }
                echo "<a href=\"?controller=clients&action=panier\"><img src=\"images/Icone/panier.png\" alt=\"panier.png\" class=\"ico_panier\"></a>
                      <a href=\"view/contact/create.php\">Contact</a>
                    </div></nav></header>";


// Si $controleur='voiture' et $view='list',
// alors $filepath="/chemin_du_site/view/voiture/list.php"
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

