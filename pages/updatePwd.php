<?php
require_once('maSession.php');
require_once('connexion.php');
$idUser = $_SESSION['user']['idUser'];
$oldpwd=$_POST['oldpwd']??"";
$newpwd=$_POST['newpwd']??"";
 
$requet="SELECT * FROM utilisateur where idUser=$idUser and pwd=MD5('$oldpwd')";
$res=getCn()->prepare($requet);
$res->execute();
$msg="";
if($res->fetch()){
$requet= "UPDATE utilisateur set pwd=MD5(?) where idUser=?";
$params=array($newpwd,$idUser);
$res=getCn()->prepare($requet);
$res->execute($params);
$msg="<div class='alert alert-success'>
    <strong>Félicitation!</strong> Votre mot de passe est modifier avec success !!</div>";
header('REFRESH:3;url=login.php');
}
else{ $msg = "<div class='alert alert-danger'>
    <strong>Erreur !!</strong> L'ancien mot de passe est incorect !!</div>";
header("REFRESH:3;url=".$_SERVER['HTTP_REFERER']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <br><br>
        <?php  echo $msg ?>
    </div>
    
</body>
</html>