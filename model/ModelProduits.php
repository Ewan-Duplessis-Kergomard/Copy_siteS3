<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Produits</title>
</head>
<body>
<?php
require_once File::build_path(array("model","Model.php"));
class ModelProduits {

    private $id_prod;
    private $nom_prod;
    private $stock;
    private $prix;
    private $description;


    public function __construct($id_prod, $nom_prod, $stock, $prix, $description)
    {
        $this->id_prod = $id_prod;
        $this->nom_prod = $nom_prod;
        $this->stock = $stock;
        $this->prix = $prix;
        $this->description = $description;
    }
    public static function getAllProduits(){
        $pdo = Model::$pdo;
        $rep = $pdo->query('SELECT * FROM p_produits');
        $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduits');
        $tab_produits = $rep->fetchAll();
        return $tab_produits;
    }

    public function getIdProd()
    {
        return $this->id_prod;
    }


    public function setIdProd($id_prod)
    {
        $this->id_prod = $id_prod;
    }


    public function getNomProd()
    {
        return $this->nom_prod;
    }

    public function setNomProd($nom_prod)
    {
        $this->nom_prod = $nom_prod;
    }


    public function getStock()
    {
        return $this->stock;
    }

    public function setStock($stock)
    {
        $this->stock = $stock;
    }


    public function getPrix()
    {
        return $this->prix;
    }

    public function setPrix($prix)
    {
        $this->prix = $prix;
    }


    public function getDescription()
    {
        return $this->description;
    }


    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function save(){
        $sql = "INSERT INTO p_produits (nom_prod,stock,prix,description) VALUES (:nom_prod,:stock,:prix,:description)";
        $req_prep = Model::getPDO()->prepare($sql);
        $values = array("nom_prod"=>$this->nom_prod,"stock"=>$this->stock,"prix"=>$this->prix,"description"=>$this->description);
        $req_prep->execute($values);
    }

    public function getProduitById($id_prod){
        $sql = "SELECT * FROM p_produits WHERE id_prod=:id_prod";
        $req_prep = Model::getPDO()->prepare($sql);
        $values = array("id_prod"=>$id_prod);
        $req_prep->execute($values);
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduits');
        $tab_produits = $req_prep->fetchAll();
        if(empty($tab_produits))return false;
        return $tab_produits[0];
    }

    public function updateInfoProduit(){
        $sql = "UPDATE p_produits SET nom_prod=:nom_prod,stock=:stock,prix=:prix,description=:description WHERE id_prod=:id_prod";
        $req_prep = Model::getPDO()->prepare($sql);
        $values = array("id_prod"=>$this->id_prod,"nom_prod"=>$this->nom_prod,"stock"=>$this->stock,"prix"=>$this->prix,"description"=>$this->description);
        $req_prep->execute($values);
    }

    public static function deleteById($id_prod){
        $sql = "DELETE FROM p_produits WHERE id_prod=:id_prod";
        $req_prep = Model::getPDO()->prepare($sql);
        $values = array("id_prod"=>$id_prod);
        $req_prep->execute($values);
    }


}
