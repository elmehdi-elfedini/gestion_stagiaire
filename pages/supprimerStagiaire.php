<?php
session_start();
if(isset($_SESSION['user'])){
require_once('connexion.php');
$idS=$_GET['idS']?? 0;
$requet = "DELETE FROM stagiaire  where idStagiaire=?";
$param = array($idS);
$resultat =getCn()->prepare($requet);
$resultat->execute($param);
header('location:stagiers.php');
}else{
    header('location:login.php');
}
?>