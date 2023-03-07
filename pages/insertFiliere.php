<?php
require_once('maSession.php');
require_once('connexion.php');
$nomf=$_POST['nomF']??"";
$niveau=$_POST['niveau']??"";
$requet = "INSERT INTO Filiere(nomFiliere,niveau) VALUES (?,?)";
$param = array($nomf,$niveau);
$resultat =getCn()->prepare($requet);
$resultat->execute($param); 
header('location:filieres.php');

?>