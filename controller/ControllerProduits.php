<?php
require_once File::build_path(array("model","ModelProduits.php")); // chargement du modèle
class ControllerProduits {

    public static function readAll(){
        $tab_c = ModelProduits::getAllProduits();
        $controller = 'produits';
        $view = 'readAll';
        $pagetitle = 'Liste des produits';
        require File::build_path(array("view","view.php"));
    }

    public static function read(){
        $c = ModelProduits::getProduitById($_POST['id_prod']);
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
        $prod = new ModelProduits(NULL,$_POST['nom_prod'],$_POST['stock'],$_POST['prix'],$_POST['description']);
        $prod->save();

    }

    public static function delete(){
        $controller = 'produits';
        $view = 'delete';
        $pagetitle = 'Suppression de produit';
        require File::build_path(array("view","view.php"));
    }

    public static function deleted(){
        ModelProduits::deleteById($_POST['id_prod']);
        echo 'Produit n° '.$_POST['id_prod'].' supprimé.<br>';
    }

    public static function updateInfo(){
        $controller = 'produits';
        $view = 'updateProduits';
        $pagetitle = 'Modifications';
        $c = ModelProduits::getProduitById($_POST['id_prod']);
        require File::build_path(array("view","view.php"));
    }


    public static function updated(){
        $c = new ModelProduits($_POST['id_prod'],$_POST['nom_prod'],$_POST['stock'],$_POST['prix'],$_POST['description']);
        $c->updateInfoProduit();
        echo 'Les informations du produit ont été mises à jour:<br>';
        ControllerProduits::read();
    }
    public static function add(){
        $stock = ModelProduits::getProduitById($_POST['id_prod'])->getStock();
        if($stock===0 || (array_key_exists($_POST['id_prod'],$_SESSION['panier']) && $_SESSION['panier'][$_POST['id_prod']]==$stock)){
            echo '<p class="warning">Stock insuffisant, le produit n\'a pas été ajouté au panier</p>';
            ControllerProduits::read();
        }else {
            if (array_key_exists($_POST['id_prod'], $_SESSION['panier'])) {
                $_SESSION['panier'][$_POST['id_prod']] = $_SESSION['panier'][$_POST['id_prod']] + 1;
            } else {
                $_SESSION['panier'][$_POST['id_prod']] = 1;
            }
            ControllerProduits::readAll();
        }
    }

    public static function favori(){
        var_dump(array_search($_POST['id_prod'],$_SESSION['favoris']));
        if(array_search($_POST['id_prod'],$_SESSION['favoris'])===false){ModelClients::addFavori($_SESSION['login'],$_POST['id_prod']);}
        //if(array_search($_POST['id_prod'],$_SESSION['favoris'])!=false)
        else{ModelClients::deleteFavori($_SESSION['login'],$_POST['id_prod']);}
        ControllerProduits::read();
    }

    public static function checkStock(){
        $panier2 = $_SESSION['panier'];
        foreach ($_SESSION['panier'] as $key => $value){
            $p=ModelProduits::getProduitById($key);
            if ($p->getStock()<$value){
                echo $p->getStock()." exemplaires du produit" .$p->getNomProd()." sont disponibles";
                $panier2[$key]=$p->getStock();
            }
        }
    return $panier2;

    }
}
?>