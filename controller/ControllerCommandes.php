<?php
require_once File::build_path(array("model","ModelCommandes.php")); // chargement du modèle
class ControllerCommandes {

    public static function readAll(){
        $tab_c = ModelCommandes::getAllCommandes();
        $controller = 'commandes';
        $view = 'readAll';
        $pagetitle = 'Vos commandes';
        require File::build_path(array("view","view.php"));
    }

    public static function read(){
        $c = ModelCommandes::getCommandesByid($_GET['id_comm']) ;
        $controller = 'commandes';
        if($c==false){
            $view='error';
            $pagetitle='Erreur';
            require File::build_path(array("view","view.php"));}
        else
            $view='read';
            $pagetitle='Votre commande';
            require File::build_path(array("view","view.php"));
    }

    public static function create(){
        $controller = 'commandes';
        $view='create';
        $pagetitle='Achat';
        require File::build_path(array("view","view.php"));
    }

    public static function created(){
        $commandes = new ModelCommandes($_GET['id_comm'],$_GET['id_prod'],$_GET['quantité']);
        $commandes->save();
        //afficher confirmation de commandes
    }

    public static function deleteAllByID(){
        $controller = 'commandes';
        $view = 'deleteAll';
        $pagetitle = 'Suppression de toutes les commandes';
        $c = ModelCommandes::deleteAllByID($_GET['id_comm']);
        require File::build_path(array("view","view.php"));
    }

    public static function delete(){
        $controller = 'commandes';
        $view = 'delete';
        $pagetitle = 'Suppression de commandes';
        require File::build_path(array("view","view.php"));
    }

    public static function deleted(){
        ModelCommandes::deleteByID($_GET['id_comm'],$_GET['id_prod']);
        echo 'Commandes numéro'.$_GET['id_comm'].$_GET['id_prod'].' supprimé.<br>';
    }

    public static function updateCommandes(){
        $controller = 'commandes';
        $view = 'updateCommandes';
        $pagetitle = 'Changement du nombre de commandes';
        $c = ModelCommandes::getCommProd($_GET['id_comm'],$_GET['id_prod']);
        require File::build_path(array("view","view.php"));
    }

    public static function updated(){
        $c = new ModelCommandes($_GET['id_comm'],$_GET['id_prod'],$_GET['quantité']);
        $c->update();
        echo 'Votre commande a été mise à jour:<br>';
        ControllerCommandes::read();
    }
}
?>
