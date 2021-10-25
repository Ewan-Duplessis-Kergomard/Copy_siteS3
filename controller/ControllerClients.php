<?php
require_once File::build_path(array("model","ModelClients.php")); // chargement du modèle
class ControllerClients {

    public static function readAll(){
        $tab_c = ModelClients::getAllClients();
        $controller = 'clients';
        $view = 'list';
        $pagetitle = 'Liste Clients';
        require File::build_path(array("view","view.php"));
    }

    public static function read(){
        $c = ModelClients::getClientByMail($_GET['mail']);
        $controller = 'clients';
        if($c==false){
            $view='error';
            $pagetitle='Erreur';
            require File::build_path(array("view","view.php"));}
        else
            $view='detail';
            $pagetitle='Details';
            require File::build_path(array("view","view.php"));
    }
    //Inscription
    public static function create(){
        $controller = 'clients';
        $view='create';
        $pagetitle='Inscription';
        require File::build_path(array("view","view.php"));
    }

    public static function created(){
        $client = new ModelClients($_GET['mail'],$_GET['mdp'],$_GET['nom'],$_GET['prenom'],$_GET['ville'],$_GET['code'],$_GET['rue']);
        $client->save();
        //afficher msg confirmation
    }

    public static function delete(){
        $controller = 'clients';
        $view = 'delete';
        $pagetitle = 'Suppression';
        require File::build_path(array("view","view.php"));
    }

    public static function deleted(){
        ModelClients::deleteByMail($_GET['mail']);
        echo 'Client '.$_GET['mail'].' supprime.<br>';
    }
    /*
    public static function update(){
        $controller = 'voiture';
        $view='update';
        $pagetitle='MiseAJour';
        $v=ModelVoiture::getVoitureByImmat($_GET['immat']);
        require File::build_path(array("view","view.php"));
    }
    public static function updated(){
        echo 'Voiture '.$_GET['immat'].' mise à jour.<br>';
        $v=new ModelVoiture($_GET['marque'],$_GET['couleur'],$_GET['immat']);;
        $v->updateVoiture();
        ControllerVoiture::read();
    }*/
}
?>
