<?php
session_start();
if(isset($_SESSION['user'])){
require_once('connexion.php');
$idS=$_GET['idS']?? 0;
$requet=getCn()->query("SELECT * from stagiaire where idStagiaire=$idS")->fetch();
$nom = $requet['nom'];
$prenom = $requet['prenom'];
$civilite = $requet['civilite'];
$idFiliere = $requet['idFiliere'];
$photo= $requet['photo'];
$requetF=getCn()->query("SELECT * from Filiere")->fetchAll();}
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
    <title>Edition de stagiaire</title>
</head>
<body> 
    <style>
    .panel{ margin-top:60px;}
    </style>
    <?php include("menu.php"); ?>
    <div class="container">
    <div class="panel panel-primary">
       <div class="panel-heading">Edition de stagiaire</div>
       <div class="panel-body">
        <form method='POST' action='updateStagiaire.php' class='form' enctype="multipart/form-data">
            <div class="form-group">
            <label for="niveau">id du stagiaire : <?php echo $idS ?></label>
            <input type="hidden" name="idS" class="form-control" 
            value="<?php echo $idS ?>" id="idUser">
</div>
<div class="form-group">
<label for="nom">Nom :</label>
            <input type="text" name="nom" class="form-control" 
            value="<?php echo $nom ?>" id="nom" placeholder="nom">
</div>
<div class="form-group">
<label for="prenom">Prénom :</label>
            <input type="text" name="prenom" class="form-control" 
            value="<?php echo $prenom ?>" id="prenom" placeholder="prenom">
</div>
<div class="form-group">
<label for="civilite">civilite :</label>
<div class="radio">
<label><input type="radio" name="civilite" class="" value="F" <?php if($civilite=='F') echo "checked"; ?>/>F</label>
<label><input type="radio" name="civilite" class="" value="M" <?php if($civilite=='M') echo "checked"; ?>/>M</label>
</div>          
</div>
<div class="form-group">
    <label for="filiere">Filière :</label>
    <select name="filiere" class="form-control" id="filiere">
    <?php foreach($requetF as $rf){?>
        <option value="<?php echo $rf['idFiliere']?>" <?php if($idFiliere==$rf['idFiliere']) echo "selected" ?>><?=$rf['nomFiliere']?></option>
   <?php } ?>
  </select>
    </div>
    <div class="form-group">
<label for="photo">photo :</label>
            <input type="file" name="photo" class="form-control"   id="photo">
</div>
<button type="submit" class="btn btn-success">
<span class="glyphicon glyphicon-save"></span>Enregistrer </button>
    </form></div></div>