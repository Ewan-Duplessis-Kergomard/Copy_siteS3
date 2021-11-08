<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $pagetitle; ?></title>
    </head>
    <body>
<?php
// Si $controleur='voiture' et $view='list',
// alors $filepath="/chemin_du_site/view/voiture/list.php"
$filepath = File::build_path(array("view", $controller, "$view.php"));
require $filepath;
?>
    </body>
    <footer>
        <p style="border: 1px solid black;text-align:center;padding-right:1em;">Site de vente groupe 6</p>
<!--        <a href="index.php?action=readAll">Accueil voitures</a>-->
<!--        <a href="index.php?action=readAll&controller=utilisateur">Accueil utilisateurs</a>-->
<!--        <a href="index.php?action=readAll&controller=trajet">Accueil trajets</a>-->
    </footer>
</html>

