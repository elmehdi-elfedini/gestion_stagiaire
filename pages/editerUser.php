<?php
session_start();
if(isset($_SESSION['user'])){
require_once('connexion.php');
$idUser=$_GET['idUser']?? 0;
$requet=getCn()->query("SELECT * from utilisateur where idUser=$idUser")->fetch();
$login = $requet['login'];
$email = $requet['email'];
$role = strtoupper($requet['role']);}
else{
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Edition d'un utilisateur</title>
</head>
<body> 
    <style>
    .panel{ margin-top:60px;}
    </style>
    <?php include("menu.php"); ?>
    <div class="container">
    <div class="panel panel-primary">
       <div class="panel-heading">Edition de l'utilisateur</div>
       <div class="panel-body">
        <form method='POST' action='updateUtilisateur.php' class='form'>
            <div class="form-group">
            <!-- <label for="idUser">id: <?php echo $idUser?></label> -->
            <input type="hidden" name="idUser" class="form-control" 
            value="<?php echo $idUser ?>" id="idUser">
</div>
<div class="form-group">
<label for="login">Login :</label>
            <input type="text" name="login" class="form-control" 
            value="<?php echo $login ?>" id="login" placeholder="login">
</div>
<div class="form-group">
<label for="email">Email :</label>
            <input type="text" name="email" class="form-control" 
            value="<?php echo $email ?>" id="email" placeholder="email">
</div>
<div class="form-group">
    <select name="role" class="form-control">
        <option value="ADMIN"<?php if($role=="ADMIN") echo "selected";  ?>>Administrateur</option>
        <option value="VISITEUR"<?php if($role=="VISITEUR") echo "selected"; ?>>Visiteur</option>
    </select>
</div>
<button type="submit" class="btn btn-success">
<span class="glyphicon glyphicon-save"></span>Enregistrer </button>&nbsp;&nbsp;
<a href="modifierPwd.php">Changer le mot de pass</a>
    </form></div></div>