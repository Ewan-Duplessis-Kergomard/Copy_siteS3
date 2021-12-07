<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Clients</title>
</head>
<body>
<?php
require_once File::build_path(array("model","Model.php"));
class ModelClients {

    private $mail;
    private $mdp;
    private $nom;
    private $prenom;
    private $ville;
    private $code_poste;
    private $rue;
    private $isAdmin;
    private $nonce;

    public function __construct($mail=NULL, $mdp=NULL, $nom=NULL, $prenom=NULL, $ville=NULL, $code_poste=NULL, $rue=NULL, $nonce=NULL)
    {
        if(!is_null($mail)&&!is_null($nom)&&!is_null($prenom)&&!is_null($ville)&&!is_null($code_poste)&&!is_null($rue)) {
            $this->mail = $mail;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->ville = $ville;
            $this->code_poste = $code_poste;
            $this->rue = $rue;
        }
        if(!is_null($mdp)){$this->mdp = $mdp;}
        if (!is_null($nonce)){$this->nonce=$nonce;}
    }

    public static function getAllClients(){
        $pdo = Model::$pdo;
        $rep = $pdo->query('SELECT * FROM p_clients');
        $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelClients');
        $tab_clients = $rep->fetchAll();
        return $tab_clients;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function getMdp()
    {
        return $this->mdp;
    }

    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function getVille()
    {
        return $this->ville;
    }

    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    public function getCodePoste()
    {
        return $this->code_poste;
    }

    public function setCodePoste($code_poste)
    {
        $this->code_poste = $code_poste;
    }

    public function getRue()
    {
        return $this->rue;
    }

    public function setRue($rue)
    {
        $this->rue = $rue;
    }

    public function getIsAdmin()
    {
        return $this->isAdmin;
    }

    public function getNonce()
    {
        return $this->nonce;
    }

    public function setNonce($nonce)
    {
        $this->nonce = $nonce;
    }

    public function afficher(){
        echo "Client $this->prenom $this->nom, mail: $this->mail, adresse: $this->rue $this->code_poste $this->ville";
    }

    public static function getClientByMail($mail){
        $sql = "SELECT * FROM p_clients WHERE mail=:mail";
        $req_prep = Model::getPDO()->prepare($sql);
        $values = array("mail"=>$mail);
        $req_prep->execute($values);
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelClients');
        $tab_clients = $req_prep->fetchAll();
        if(empty($tab_clients))return false;
        return $tab_clients[0];
    }

    public function save(){
        $sql = "INSERT INTO p_clients (mail,mdp,nom,prenom,ville,code_poste,rue,nonce) VALUES (:mail,:mdp,:nom,:prenom,:ville,:code_poste,:rue,:nonce)";
        $req_prep = Model::getPDO()->prepare($sql);
        $values = array("mail"=>$this->mail,"mdp"=>$this->mdp,"nom"=>$this->nom,"prenom"=>$this->prenom,"ville"=>$this->ville,"code_poste"=>$this->code_poste,"rue"=>$this->rue,"nonce"=>$this->nonce);
        $req_prep->execute($values);
    }

    public static function deleteByMail($mail){
        $sql = "DELETE FROM p_clients WHERE mail=:mail";
        $req_prep = Model::getPDO()->prepare($sql);
        $values = array("mail"=>$mail);
        $req_prep->execute($values);
    }
    //update sans mdp
    public function updateInfoClient(){
        $sql = "UPDATE p_clients SET nom=:nom,prenom=:prenom,ville=:ville,code_poste=:code_poste,rue=:rue WHERE mail=:mail";
        $req_prep = Model::getPDO()->prepare($sql);
        $values = array("mail"=>htmlspecialchars($this->mail),"nom"=>$this->nom,"prenom"=>$this->prenom,"ville"=>$this->ville,"code_poste"=>$this->code_poste,"rue"=>$this->rue);
        $req_prep->execute($values);
    }

    //TODO
    //complete w/ hash
    /*public function updateMDPClient(){
        $sql = "UPDATE p_clients SET mdp=:mdp WHERE mail=:mail";
        $req_prep = Model::getPDO()->prepare($sql);
        $values = array("mail"=>$this->mail,"mdp"=>$this->mdp);
    }*/

    public static function checkPswd($mail,$mdp){
        $sql = "SELECT * FROM p_clients WHERE mail=:mail AND mdp=:mdp";
        $req_prep = Model::getPDO()->prepare($sql);
        $values = array("mail"=>htmlspecialchars($mail),"mdp"=>htmlspecialchars($mdp));
        $req_prep->execute($values);
        return count($req_prep->fetchAll())==1;
    }

    public static function getFavoris($mail){
        $sql = "SELECT id_prod FROM p_favoris WHERE mail_client=:mail";
        $req_prep = Model::getPDO()->prepare($sql);
        $values = array("mail"=>htmlspecialchars($mail));
        $req_prep->execute($values);
        $req_prep->setFetchMode(PDO::FETCH_COLUMN,0);
        return $req_prep->fetchAll();
    }

    public static function addFavori($mail,$idprod){
        $sql = "INSERT INTO p_favoris(mail_client,id_prod) VALUES (:mail,:id_prod)";
        $req_prep = Model::getPDO()->prepare($sql);
        $values = array("mail"=>htmlspecialchars($mail),"id_prod"=>$idprod);
        $req_prep->execute($values);
        $_SESSION['favoris'][]=$idprod;
    }

    public static function deleteFavori($mail,$idprod){
        $sql = "DELETE FROM p_favoris WHERE mail_client=:mail AND id_prod=:id_prod";
        $req_prep = Model::getPDO()->prepare($sql);
        $values = array("mail"=>htmlspecialchars($mail),"id_prod"=>$idprod);
        $req_prep->execute($values);
        unset($_SESSION['favoris'][array_search($idprod,$_SESSION['favoris'])]);
    }

    public static function validate($mail){
        $sql = "UPDATE p_clients SET nonce=NULL WHERE mail=:mail";
        $req_prep = Model::getPDO()->prepare($sql);
        $values = array("mail"=>htmlspecialchars($mail));
        $req_prep->execute($values);
    }
}

?>

</body>
</html>
