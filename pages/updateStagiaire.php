<?php
require_once('maSession.php');
require_once('connexion.php');
$idS =$_POST['idS']?? 0;
$nom=$_POST['nom']??"";
$prenom=$_POST['prenom']??"";
$civilite=$_POST['civilite']??"";
$idFiliere=$_POST['idFiliere']??1;
$photo=$_FILES['photo']['name']??"";
$imageTemp=$_FILES['photo']['tmp_name'];
move_uploaded_file($imageTemp,"../images/".$photo);
if(!empty($photo)){
$requet="UPDATE stagiaire set nom=?,prenom=?,civilite=?,idFiliere=?,photo=? where idStagiaire=?";
$param = array($nom,$prenom,$civilite,$idFiliere,$photo,$idS);
}else{
    $requet="UPDATE stagiaire set nom=?,prenom=?,civilite=?,idFiliere=? where idStagiaire=?";
    $param = array($nom,$prenom,$civilite,$idFiliere,$idS);
}
$res=getCn()->prepare($requet);
$res->execute($param);
header('location:stagiers.php');
?>