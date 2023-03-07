<?php
session_start();
if(isset($_SESSION['user'])){
require_once('connexion.php');
$idUser =$_GET['idUser']?? 0;
$etat=$_GET['etat']??0;
if($etat==1)
    $newetat=0;
else 
    $newetat=1;
$requet="UPDATE utilisateur set etat=? where idUser=?";
$param = array($newetat,$idUser);

$res=getCn()->prepare($requet);
$res->execute($param);
header('location:utilisateur.php');}
else{
    hedaer('location:login.php');
}
?>