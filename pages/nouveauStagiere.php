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
$requetF=getCn()->query("SELECT * from filiere")->fetchAll();}
else{
    header('location:login.php');
    exit(); //pour la securité
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
    <title>Nouveau stagiaire</title>
</head>
<body> 
    <style>
    .panel{ margin-top:60px;}
    </style>
    <?php include("menu.php"); ?>
    <div class="container">
    <div class="panel panel-primary">
       <div class="panel-heading">  Les infos du nouveau stagiaire</div>
       <div class="panel-body">
        <form method='POST' action='insertStagiaire.php' class='form' enctype="multipart/form-data">
   
<div class="form-group">
<label for="nom">Nom :</label>
            <input type="text" name="nom" class="form-control" 
            id="nom" placeholder="nom">
</div>
<div class="form-group">
<label for="prenom">Prénom :</label>
            <input type="text" name="prenom" class="form-control" 
            id="prenom" placeholder="prenom">
</div>
<div class="form-group">
<label for="civilite">civilite :</label>
<div class="radio">
<label><input type="radio" name="civilite" class="" value="F" checked />F</label>
<label><input type="radio" name="civilite" class="" value="M" />M</label>
</div>          
</div>
<div class="form-group">
    <label for="filiere">Filière :</label>
    <select name="filiere" class="form-control" id="filiere">
    <?php foreach($requetF as $rf){?>
     <option value="<?php echo $requetF['idFiliere']?>"><?=$rf['nomFiliere']?></option>
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