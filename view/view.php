<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $pagetitle; ?></title>
    </head>
    <body>
<?php
echo " <header>
        <nav>
            <div class=\"navbar\">
                <a href=\"index.php\">Accueil</a>";
                if(isset($_SESSION['login'])){
                    echo "<a href=\"index.php?controller=clients&action=read&mail=".$_SESSION['login']."\">Profil</a>
                    <a href=\"nowhere\">Panier</a>
                    <a href=\"nowhere\">Déconnexion</a>";//TODO gérer deconnexion
                    if ($_SESSION['isAdmin']==1){echo "<a href=\"nowhere\">Panneau de contrôle</a>";}
                }
                else{
                    echo "<a href=\"nowhere\">Connexion</a>
                    <a href=\"nowhere\">Inscription</a>";//TODO connexion (?controller=clients&action=create) après td sécurité
                }
                echo "</div></nav></header>";

// Si $controleur='voiture' et $view='list',
// alors $filepath="/chemin_du_site/view/voiture/list.php"
$filepath = File::build_path(array("view", $controller, "$view.php"));
require $filepath;
?>
    </body>
    <footer>
        <p style="border: 1px solid black;text-align:center;padding-right:1em;">Site de vente groupe 6</p>
    </footer>
</html>

