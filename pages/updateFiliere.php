<?php
require_once('maSession.php');
require_once('connexion.php');
$idF=$_POST['idF']?? 0;
$nomF=$_POST['nomF']??"";
$niveau = $_POST['niveau']??"";
$requet = "UPDATE Filiere SET nomFiliere =?,niveau =? where idFiliere=?";
$param = array($nomF,$niveau,$idF);
$resultat =getCn()->prepare($requet);
$resultat->execute($param); 
header('location:filieres.php');

?>