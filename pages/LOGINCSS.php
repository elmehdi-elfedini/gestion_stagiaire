<?php
session_start();
if(isset($_SESSION['erreurlogin'])) $erreurLogin=$_SESSION['erreurlogin'];
else $erreurLogin="";
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
    <!-- <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

    <title>Nouveau stagiaire</title>
</head>
<body> 
    <style>
        body{
            background:rgb(187, 187, 245);
        }
    .panel{ margin-top:60px;
    
    }
   .panel-body{
    box-shadow: 0 0 40px 20px rgba(0, 0, 0,0.26);
    perspective: 1000px;
}
    </style>

    <div class="container col-lg-4 col-md-6 col-sm-12 col-lg-offset-4 col-md-offset-3 col-sm-offset-2">
    <div class="panel panel-primary">
       <div class="panel-heading"> Se connecter</div>
       <div class="panel-body">
        <form method='POST' action='seConnecter.php' class='form'>
   <?php if(!empty($erreurLogin)){?><div class="alert alert-warning">
     <?php echo $erreurLogin?> </div> <?php }?>
<div class="form-group">
<label for="login">Login :</label>
            <input type="text" name="login" class="form-control" 
            id="login" placeholder="login">
</div>
<div class="form-group">
<label for="password">Password :</label>
            <input type="password" name="pwd" class="form-control" 
            id="password" placeholder="password">
</div>
     
<button type="submit" class="btn btn-success">
<span class="glyphicon glyphicon-log-in"></span>&nbsp&nbspSe connecter </button>
<a href="">Mot de passe oublié</a>
<a href="nouvelleUtilisateur.php">Crée un Compte</a>    
</form></div></div></div>
