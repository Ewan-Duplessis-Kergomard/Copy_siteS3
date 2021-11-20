<?php
    session_start();
    $_SESSION['panier']=array();
	require_once ('./lib/File.php');
	require_once ('./controller/routeur.php');
?>