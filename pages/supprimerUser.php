<?php
session_start();
if(isset($_SESSION['user'])){
require_once('connexion.php');
$idUser=$_GET['idUser']?? 0;
$requet = "DELETE FROM utilisateur  where idUser=?";
$param = array($idUser);
$resultat =getCn()->prepare($requet);
$resultat->execute($param);
header('location:utilisateur.php');}
else{
    header('location:login.php');
}
?>