<?php
    if(!isset($_COOKIE['PHPSESSID'])){session_start();}
    if(!isset($_SESSION['panier'])){$_SESSION['panier']=array();}
	require_once ('./lib/File.php');
	require_once ('./controller/routeur.php');
?>