<?php
require_once File::build_path(array("model","ModelProduits.php")); // chargement du modèle
class ControllerProduits {

    public static function readAll(){
        $tab_c = ModelProduits::getAllClients();
        $controller = 'produits';
        $view = 'readAll';
        $pagetitle = 'Liste des produits';
        require File::build_path(array("view","view.php"));
    }

    public static function read(){
        $c = ModelProduits::getClientByMail($_GET['id_prod']);
        $controller = 'produits';
        if($c==false){
            $view='error';
            $pagetitle='Erreur';
            require File::build_path(array("view","view.php"));}
        else
            $view='read';
            $pagetitle='Page du produits';
            require File::build_path(array("view","view.php"));
    }
    //Inscription
    public static function create(){
        $controller = 'produits';
        $view='create';
        $pagetitle="Ajout d'un produit";
        require File::build_path(array("view","view.php"));
    }

    public static function created(){
        $prod = new ModelProduits($_GET['id_prod'],$_GET['nom_prod'],$_GET['stock'],$_GET['prix'],$_GET['description']);
        $prod->save();

    }

    public static function delete(){
        $controller = 'produits';
        $view = 'delete';
        $pagetitle = 'Suppression de produit';
        require File::build_path(array("view","view.php"));
    }

    public static function deleted(){
        ModelProduits::deleteByMail($_GET['id_prod']);
        echo 'Produit n° '.$_GET['id_prod'].' supprimé.<br>';
    }

    public static function updateInfo(){
        $controller = 'produits';
        $view = 'updateProduits';
        $pagetitle = 'Modifications';
        $c = ModelProduits::getProduitById($_GET['id_prod']);
        require File::build_path(array("view","view.php"));
    }


    public static function updated(){
        $c = new ModelClients($_GET['id_prod'],$_GET['nom_prod'],$_GET['stock'],$_GET['prix'],$_GET['description']);
        $c->updateInfoProduit();
        echo 'Les informations du produit ont été mises à jour:<br>';
        ControllerProduits::read();
    }
    //TODO
    //public static function updatedMDP
}
?>