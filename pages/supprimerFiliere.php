<?php
session_start();
if(isset($_SESSION['user'])){
require_once('connexion.php');
$idF=$_GET['idF']?? 0;
$requetStage=getCn()->query("SELECT COUNT(*) countstage from stagiaire where idFiliere=$idF")->fetch();
$nbrStage=$requetStage['countstage'];
if($nbrStage==0){
$requet = "DELETE FROM Filiere  where idFiliere=?";
$param = array($idF);
$resultat =getCn()->prepare($requet);
$resultat->execute($param);
header('location:filieres.php');}
else{
$msg='Suppresion imposible vous dever supprimer tous les stagiaire inscrit dans cette filière';
header("location:alert.php?message=$msg");
} 
}else{
    header('location:login.php');
}

?>