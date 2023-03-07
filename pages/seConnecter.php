<?php
session_start();
require_once('connexion.php');
$login=$_POST['login']?? "";
$pwd=$_POST['pwd']??"";
$stmt=getCn()->query("SELECT idUser,login,email,role,etat from utilisateur where login='$login' and pwd= md5('$pwd')");
if($user=$stmt->fetch()){  //c-a-d if lutilisateur exist 
 if($user['etat']==1){
    $_SESSION['user']=$user; //pour la raison de sécurité nous enregistron pas le pwd dans session
    header('location:../index.php');
 }else{ //cad l'utilisateur exist ms etat desactiver
  $_SESSION['erreurlogin']=" <strong>Votre Compte est désactivé</strong>.<br>Veuillez contacter l'administrateur";
  header('location:login.php'); 
}
}else{
    $_SESSION['erreurlogin']="<strong>Erreur!!</strong> Login ou mot de passe incorrect!!";
    header('location:login.php');      
}

?>