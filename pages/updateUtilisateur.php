<?php
require_once('maSession.php');
require_once('connexion.php');
$idUser =$_POST['idUser']?? 0;
$login=$_POST['login']??"";
$email=$_POST['email']??"";
$role=$_POST['role']??"";
$requet="UPDATE utilisateur set login=?,email=?,role=? where idUser=?";
$param = array($login,$email,$role,$idUser);

$res=getCn()->prepare($requet);
$res->execute($param);
header('location:login.php');
?>