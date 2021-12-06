<?php
require_once File::build_path(array("model","ModelClients.php")); // chargement du modèle
class ControllerClients {

    public static function readAll(){
        $tab_c = ModelClients::getAllClients();
        $controller = 'clients';
        $view = 'readAll';
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
            $view='read';
            $pagetitle='Profil Client';
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
        if (isset($_GET['mail']) && isset($_GET['mdp']) && isset($_GET['mdp2']) && isset($_GET['nom']) && isset($_GET['prenom']) && isset($_GET['ville']) && isset($_GET['code']) && isset($_GET['rue'])){
            if (filter_var(htmlspecialchars($_GET['mail']), FILTER_VALIDATE_EMAIL) && $_GET['mdp']===$_GET['mdp2'] && filter_var($_GET['code'],FILTER_VALIDATE_INT)){
                require_once File::build_path(array("lib","Security.php"));
                $client = new ModelClients($_GET['mail'], Security::hacher($_GET['mdp']), $_GET['nom'], $_GET['prenom'], $_GET['ville'], $_GET['code'], $_GET['rue']);
                $client->save();
                echo '<p>Inscription réussie. Un mail de confirmation vous a été envoyé</p>';
                ControllerClients::connect();
            }else{
                ControllerClients::create();
                echo '<p>Informations invalides ou erronnées</p>';
            }
        }else{
            ControllerClients::create();
            echo '<p>Informations incomplètes';
        }
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
        echo 'Client '.$_GET['mail'].' supprimé.<br>';
    }

    public static function updateInfo(){
        $controller = 'clients';
        $view = 'updateInfo';
        $pagetitle = 'Modifications';
        $c = ModelClients::getClientByMail($_GET['mail']);
        require File::build_path(array("view","view.php"));
    }

    public static function updateMDP(){
        $controller = 'clients';
        $view = 'updateMDP';
        $pagetitle = 'Changement mot de passe';
        $c = ModelClients::getClientByMail($_GET['mail']);
        require File::build_path(array("view","view.php"));
    }

    public static function updated(){
        $c = new ModelClients($_GET['mail'],NULL,$_GET['nom'],$_GET['prenom'],$_GET['ville'],$_GET['code'],$_GET['rue']);
        $c->updateInfoClient();
        echo 'Vos informations ont été mises à jour:<br>';//Email: '.$_GET['mail'].'<br>Nom: '.$_GET['nom'].' '.$_GET['prenom'].'<br>Adresse: '.$_GET['rue'].' '.$_GET['code'].' '.$_GET['ville'].'<br>';
        ControllerClients::read();
    }
    //TODO
    //public static function updatedMDP

    public static function panier(){
        $controller='clients';
        $view= 'panier';
        $pagetitle='Votre Panier';
        require File::build_path(array("view","view.php"));
    }

    public static function connect(){
        $controller='clients';
        $view='connect';
        $pagetitle='Connexion';
        require File::build_path(array("view","view.php"));
    }

    public static function connected(){
        if(isset($_GET['mail']) && isset($_GET['mdp']) ){
            if(ModelClients::checkPswd($_GET['mail'],Security::hacher($_GET['mdp']))&& filter_var(htmlspecialchars($_GET['mail']), FILTER_VALIDATE_EMAIL)) {
                $_SESSION['login'] = $_GET['mail'];
                $_SESSION['favoris'] = ModelClients::getFavoris($_GET['mail']);
                $_SESSION['isAdmin'] = ModelClients::getClientByMail($_GET['mail'])->getIsAdmin();
                ControllerProduits::readAll();
            }else{
                ControllerClients::connect();
                echo '<p>Informations invalides ou erronnées</p>';
            }
        }else{
            ControllerClients::connect();
            echo '<p>Veuillez remplir tous les champs</p>';
        }
    }

    public static function disconnect(){
        session_unset();
        ControllerProduits::readAll();
    }
}
?>
