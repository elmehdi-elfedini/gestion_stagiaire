<?php
require_once('connexion.php');
function recherch_par_login($login){
$requet=getCn()->prepare("SELECT * FROM utilisateur where login =?");
$requet->execute(array($login));
return $requet->rowCount();
}
function recherch_par_email($email){
    $requet=getCn()->prepare("SELECT * FROM utilisateur where email =?");
    $requet->execute(array($email));
    return $requet->rowCount();
    }


?>