        <?php
      /*  require_once '/home/ann2/duplessise/public_html/projet_php/php-projet-s3/lib/File.php';*/
        require_once File::build_path(array("controller","ControllerProduits.php"));
        require_once File::build_path(array("controller","ControllerClients.php"));
        require_once File::build_path(array("controller","ControllerCommandes.php"));
        // On recupère l'action passée dans l'URL
         if (!isset($_POST['controller'])) {
             $controller = 'produits';
             } else $controller = $_POST['controller'];
         if (!isset($_POST['action'])) {
            $action = 'readAll';
             } else $action = $_POST['action'];
             $controller_class = 'Controller' . ucfirst($controller);
         if (!in_array($action, get_class_methods($controller_class))) {
            $view = 'error';
            $pagetitle = 'Erreur';
            require File::build_path(array("view", "view.php"));
            } else $controller_class::$action();
        ?>
