<!DOCTYPE html>
<html lang="fr_FR">
<head>
    <meta charset="utf-8" />
    <title>Commandes</title>
</head>
<body>
<?php
require_once File::build_path(array("model","Model.php"));
class ModelCommandes {

    private $id_comm;
    private $id_prod;
    private $quantité;

    public function __construct($id_comm=NULL, $id_prod=NULL, $quantité=NULL)
    {
        if (!is_null($id_comm)&&!is_null($id_prod)&&!is_null($quantité)) {
            $this->id_comm = $id_comm;
            $this->id_prod = $id_prod;
            $this->quantité = $quantité;
        }
    }

    public static function getAllCommandes(){
        $pdo = Model::$pdo;
        $rep = $pdo->query('SELECT * FROM p_commandes');
        $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelCommandes');
        $tab_commandes = $rep->fetchAll();
        return $tab_commandes;
    }

    public function getIdComm()
    {
        return $this->id_comm;
    }

    public function setIdComm($id_comm)
    {
        $this->id_comm = $id_comm;
    }

    public function getIdProd()
    {
        return $this->id_prod;
    }

    public function setIdProd($id_prod)
    {
        $this->id_prod = $id_prod;
    }

    public function getQuantite()
    {
        return $this->quantité;
    }

    public function setQuantite($quantité)
    {
        $this->quantité = $quantité;
    }

    public static function getCommandesByid($id_comm){
        $sql = "SELECT * FROM p_commandes WHERE id_comm=:id_comm" ;
        $req_prep = Model::getPDO()->prepare($sql);
        $values = array("id_comm"=>$id_comm);
        $req_prep->execute($values);
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelCommandes');
        $tab_commandes = $req_prep->fetchAll();
        if(empty($tab_commandes))return false;
        return $tab_commandes[0];
    }
    public static function getCommProd($id_comm,$id_prod){
        $sql = "SELECT * FROM p_commandes WHERE id_comm=:id_comm AND id_prod=:id_prod";
        $req_prep = Model::getPDO()->prepare($sql);
        $values = array("id_comm"=>$id_comm);
        $req_prep->execute($values);
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelCommandes');
        $tab_commandes = $req_prep->fetchAll();
        if(empty($tab_commandes))return false;
        return $tab_commandes[0];
    }

    public function save(){
        $sql = "INSERT INTO p_commandes (id_comm,id_prod,quantité) VALUES (:id_comm,:id_prod,:quantité)";
        $req_prep = Model::getPDO()->prepare($sql);
        $values = array("id_comm"=>$this->id_comm,"id_prod"=>$this->id_prod,"quantité"=>$this->quantité);
        $req_prep->execute($values);
    }

    public static function deleteAllByID($id_comm){
        $sql = "DELETE FROM p_commandes WHERE id_comm=:id_comm";
        $req_prep = Model::getPDO()->prepare($sql);
        $values = array("id_comm"=>$id_comm);
        $req_prep->execute($values);
    }
    public static function deleteByID($id_comm,$id_prod){
        $sql = "DELETE FROM p_commandes WHERE id_comm=:id_comm AND id_prod=:id_prod";
        $req_prep = Model::getPDO()->prepare($sql);
        $values = array("id_comm"=>$id_comm,"id_prod"=>$id_prod);
        $req_prep->execute($values);
    }
    public function updateCommandes(){
        $sql = "UPDATE p_commandes SET quantité=:quantité WHERE id_comm=:id_comm AND id_prod=:id_prod";
        $req_prep = Model::getPDO()->prepare($sql);
        $values = array("id_comm"=>$this->id_comm,"id_prod"=>$this->id_prod,"quantité"=>$this->quantité);
        $req_prep->execute($values);
}
}
?>

</body>
</html>
