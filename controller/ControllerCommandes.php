<?php
require_once File::build_path(array("model","ModelCommandes.php")); // chargement du modèle
class ControllerCommandes {

    /*public static function readAll(){
        $tab_c = ModelCommandes::getAllCommandes();
        $controller = 'commandes';
        $view = 'readAll';
        $pagetitle = 'Vos commandes';
        require File::build_path(array("view","view.php"));
    }*/

    public static function read(){
        $c = ModelCommandes::getCommandesByid($_POST['id_comm']) ;
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
    public static function readbyMail(){
        $c = ModelCommandes::getAllCommandesByMail($_POST['mail']) ;
        $controller = 'commandes';
        if($c==false){
            $view='error';
            $pagetitle='Erreur';
            require File::build_path(array("view","view.php"));}
        else
            $view='read';
        $pagetitle='Les commandes du client :';
        require File::build_path(array("view","view.php"));
    }

    /*public static function create(){
        $controller = 'commandes';
        $view='create';
        $pagetitle='Achat';
        require File::build_path(array("view","view.php"));
    }

    public static function created(){
        $commandes = new ModelCommandes($_POST['id_comm'],$_POST['id_prod'],$_POST['quantité']);
        //var_dump($commandes);
        $commandes->save();
        //afficher confirmation de commandes
    }

    public static function deleteAllByID(){
        $controller = 'commandes';
        $view = 'deleteAll';
        $pagetitle = 'Suppression de toutes les commandes';
        $c = ModelCommandes::deleteAllByID($_POST['id_comm']);
        require File::build_path(array("view","view.php"));
    }

    public static function delete(){
        $controller = 'commandes';
        $view = 'delete';
        $pagetitle = 'Suppression de commandes';
        require File::build_path(array("view","view.php"));
    }

    public static function deleted(){
        ModelCommandes::deleteByID($_POST['id_comm'],$_POST['id_prod']);
        echo 'Commandes numéro'.$_POST['id_comm'].$_POST['id_prod'].' supprimé.<br>';
    }

    public static function updateCommandes(){
        $controller = 'commandes';
        $view = 'updateCommandes';
        $pagetitle = 'Changement du nombre de commandes';
        $c = ModelCommandes::getCommProd($_POST['id_comm'],$_POST['id_prod']);
        require File::build_path(array("view","view.php"));
    }

    public static function updated(){
        $c = new ModelCommandes($_POST['id_comm'],$_POST['id_prod'],$_POST['quantité']);
        $c->update();
        echo 'Votre commande a été mise à jour:<br>';
        ControllerCommandes::read();
    }*/

    public static function action(){
        if ($_POST['use']=="add"){
            if ($_SESSION['panier'][$_POST['id_prod']]+intval($_POST['val'])<=ModelProduits::getProduitById($_POST['id_prod'])->getStock()){
                $_SESSION['panier'][$_POST['id_prod']]+=intval($_POST['val']);
                if ($_SESSION['panier'][$_POST['id_prod']]==0){unset($_SESSION['panier'][$_POST['id_prod']]);}
            }
            else{
                echo '<p class="warning">Stock insuffisant, le produit n\'a pas été ajouté au panier</p>';
            }ControllerClients::panier();
        }
        if ($_POST['use']=="confirm"){
            $id=ModelCommandes::newComm($_SESSION['login'])[0];
            foreach ($_SESSION['panier'] as $key => $value){
                $commandes = new ModelCommandes($id,$key,$value);
                $commandes->save();
            }
            $_SESSION['panier']=array();
            ControllerCommandes::confirmed($id);
        }
    }

    public static function confirmed($id){
        $id=$id;
        $controller = 'commandes';
        $view = 'confirm';
        $pagetitle = 'Confirmation de commande';
        require File::build_path(array("view","view.php"));
    }


}
?>
