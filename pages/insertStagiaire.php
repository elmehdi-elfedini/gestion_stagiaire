<?php
require_once('maSession.php');
require_once('connexion.php');
$nom=$_POST['nom']??"";
$prenom=$_POST['prenom']??"";
$civilite=$_POST['civilite']??"";
$idFiliere=$_POST['idFiliere']??1;
$photo=$_FILES['photo']['name']??"";
$imageTemp=$_FILES['photo']['tmp_name'];
move_uploaded_file($imageTemp,"../images/".$photo);

$requet="INSERT INTO stagiaire (nom,prenom,civilite,idFiliere,photo) VALUES
(?,?,?,?,?)";
$param = array($nom,$prenom,$civilite,$idFiliere,$photo);
$res=getCn()->prepare($requet);
$res->execute($param);
header('location:stagiers.php');
?>