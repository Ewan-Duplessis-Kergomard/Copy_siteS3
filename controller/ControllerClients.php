<?php
require_once File::build_path(array("model","ModelClients.php")); // chargement du modèle
class ControllerClients {

    public static function readAll(){
        if(!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin']==0){echo '<p class="warning">VOUS N\'AVEZ PAS L\'AUTORISATION D\'ACCEDER A CETTE PAGE !</p>';}
        else{
            $tab_c = ModelClients::getAllClients();
            $controller = 'clients';
            $view = 'readAll';
            $pagetitle = 'Liste Clients';
            require File::build_path(array("view","view.php"));
        }
    }

    public static function read(){
        $c = ModelClients::getClientByMail($_POST['mail']);
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
        if (isset($_POST['mail']) && isset($_POST['mdp']) && isset($_POST['mdp2']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['ville']) && isset($_POST['code']) && isset($_POST['rue'])){
            if (filter_var(htmlspecialchars($_POST['mail']), FILTER_VALIDATE_EMAIL) && $_POST['mdp']===$_POST['mdp2'] && filter_var($_POST['code'],FILTER_VALIDATE_INT)){
                require_once File::build_path(array("lib","Security.php"));
                $client = new ModelClients($_POST['mail'], Security::hacher($_POST['mdp']), $_POST['nom'], $_POST['prenom'], $_POST['ville'], $_POST['code'], $_POST['rue'],Security::generateRandomHex());
                mail(htmlspecialchars($client->getMail()),"Confirmation de votre inscription","Veuillez cliquez sur le lien suivant pour confirmer votre inscription: https://webinfo.iutmontp.univ-montp2.fr/~duplessise/projet_php/php-projet-s3/?controller=clients&action=validate&mail=".htmlspecialchars($client->getMail())."&nonce=".$client->getNonce());
                $client->save();
                echo '<p>Inscription réussie. Un mail de confirmation vous a été envoyé</p>';
                ControllerClients::connect();
            }else{
                ControllerClients::create();
                echo '<p class="warning">Informations invalides ou erronées</p>';
            }
        }else{
            ControllerClients::create();
            echo '<p class="warning">Informations incomplètes';
        }
        //afficher msg confirmation
    }

    public static function delete(){
        if(!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin']==0){echo '<p class="warning">VOUS N\'AVEZ PAS L\'AUTORISATION D\'ACCEDER A CETTE PAGE !</p>';}
        else {
            $controller = 'clients';
            $view = 'delete';
            $pagetitle = 'Suppression';
            require File::build_path(array("view", "view.php"));
        }
    }

    public static function deleted(){
        if(!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin']==0){echo '<p class="warning">VOUS N\'AVEZ PAS L\'AUTORISATION D\'ACCEDER A CETTE PAGE !</p>';}
        else {
            ModelClients::deleteByMail($_POST['mail']);
            echo 'Client ' . $_POST['mail'] . ' supprimé.<br>';
        }
    }

    public static function updateInfo(){
        $controller = 'clients';
        $view = 'updateInfo';
        $pagetitle = 'Modifications';
        $c = ModelClients::getClientByMail($_SESSION['login']);
        require File::build_path(array("view","view.php"));
    }

    public static function updateMDP(){
        $controller = 'clients';
        $view = 'updateMDP';
        $pagetitle = 'Changement mot de passe';
        $c = ModelClients::getClientByMail($_SESSION['login']);
        require File::build_path(array("view","view.php"));
    }

    public static function updated(){
        if (isset($_POST['mail']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['ville']) && isset($_POST['code']) && isset($_POST['rue'])){
            if (filter_var(htmlspecialchars($_POST['mail']), FILTER_VALIDATE_EMAIL) && filter_var($_POST['code'],FILTER_VALIDATE_INT)){
                $c = new ModelClients($_SESSION['login'],NULL,$_POST['nom'],$_POST['prenom'],$_POST['ville'],$_POST['code'],$_POST['rue']);
                $c->updateInfoClient();
                echo 'Vos informations ont été mises à jour:<br>';//Email: '.$_POST['mail'].'<br>Nom: '.$_POST['nom'].' '.$_POST['prenom'].'<br>Adresse: '.$_POST['rue'].' '.$_POST['code'].' '.$_POST['ville'].'<br>';
                ControllerClients::read();
            }
        }
    }

    public static function updatedMDP(){
        $c =ModelClients::getClientByMail($_SESSION['login']);
        if (isset($_POST['mdp']) && isset($_POST['mdp2']) && $_POST['mdp']===$_POST['mdp2']){
            require_once File::build_path(array("lib","Security.php"));
            $c->setMDP(Security::hacher($_POST['mdp']));
            $c->updateMDPClient();
            ControllerClients::read();
        }

    }

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
        if(isset($_POST['mail']) && isset($_POST['mdp']) ){
            require_once File::build_path(array("lib","Security.php"));
            if(ModelClients::checkPswd($_POST['mail'],Security::hacher($_POST['mdp']))&& filter_var(htmlspecialchars($_POST['mail']), FILTER_VALIDATE_EMAIL) && ModelClients::getClientByMail($_POST['mail'])->getNonce()=="") {
                $_SESSION['login'] = $_POST['mail'];
                $_SESSION['favoris'] = ModelClients::getFavoris($_POST['mail']);
                $_SESSION['isAdmin'] = ModelClients::getClientByMail($_POST['mail'])->getIsAdmin();
                ControllerProduits::readAll();
            }else if (ModelClients::getClientByMail($_POST['mail'])->getNonce()!=""){
                ControllerClients::connect();
                //var_dump(ModelClients::getClientByMail($_POST['mail'])->getNonce());
                echo '<p class="warning">Veuillez valider votre adresse email</p>';
            }
            else{
                ControllerClients::connect();
                echo '<p class="warning">Informations invalides ou erronées</p>';
            }
        }else{
            ControllerClients::connect();
            echo '<p class="warning">Veuillez remplir tous les champs</p>';
        }
    }

    public static function disconnect(){
        session_unset();
        ControllerProduits::readAll();
    }

    public static function validate(){
        if ($_GET['nonce']==ModelClients::getClientByMail(htmlspecialchars($_GET['mail']))->getNonce()){
            ModelClients::validate(htmlspecialchars($_POST['mail']));
            ControllerClients::connect();
        }else echo '<p>Lien de confirmation invalide</p>';
    }

    public static function permission(){
        $c = ModelClients::getClientByMail(htmlspecialchars($_POST['mail']));
        //var_dump(ModelClients::getClientByMail(htmlspecialchars($_POST['mail']))->getIsAdmin());
        if ($c->getIsAdmin()=='0'){
            $c->setIsAdmin('1');
            $c->updateAdmin();
        }else $c->setIsAdmin('0');
        //ModelClients::getClientByMail(htmlspecialchars($_POST['mail']))->getIsAdmin()==0?ModelClients::getClientByMail(htmlspecialchars($_POST['mail']))->setIsAdmin(1):ModelClients::getClientByMail(htmlspecialchars($_POST['mail']))->setIsAdmin(0);
        //var_dump(ModelClients::getClientByMail(htmlspecialchars($_POST['mail']))->getIsAdmin());
        $c->updateAdmin();
        ControllerClients::readAll();
    }

    public static function getComms(){
        return ModelCommandes::getCommandesByMail($_SESSION['login']);
    }

    public static function contact(){
        $controller='clients';
        $view='contact';
        $pagetitle='Contact';
        require File::build_path(array("view","view.php"));
    }
}
?>
