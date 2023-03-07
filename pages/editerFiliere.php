<?php
session_start();
if(isset($_SESSION['user'])){
require_once('connexion.php');
$idF=$_GET['idF']?? 0;
$requet = getCn()->query("SELECT * FROM Filiere where  idFiliere=$idF")->fetch();
$nomF =$requet['nomFiliere'];
$niveau = $requet['niveau'];}
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
    <title>Edition de Filiere</title>
</head>
<body> 
    <style>
    .panel{ margin-top:60px;}
    </style>
    <?php include("menu.php"); ?>
    <div class="container">
    <div class="panel panel-primary">
       <div class="panel-heading">Edition de Filiere</div>
       <div class="panel-body">
       <form method='POST' action="updateFiliere.php" class="form">
        <div class="form-group">
        <label for="idF">id de la Filiere : <?php echo $idF ??""; ?></label>
        <input type="hidden" name="idF" placeholder="Tapez le id de la filiere" class="form-control" value="<?php echo $idF ??""; ?>" id="idF">
        </div>
        <div class="form-group">
        <label for="nomF">nom de la Filiere</label>
        <input type="text" name="nomF" placeholder="Tapez le nom de la filiere" class="form-control" value="<?php echo $nomF ??""; ?>" id="nomF">
        </div>
        <div class="form-group">  
        <label for="niveau">Niveau:</label>
            <select class="form-control" id="niveau" name="niveau">
                <option value="TS" <?php  if($niveau=="TS") echo "selected"?>>Technicien spesialisé</option>
                <option value="Q" <?php  if($niveau=="Q") echo "selected"?>>Qualification</option>
                <option value="T" <?php  if($niveau=="T") echo "selected"?>>Technicien</option>
                <option value="L" <?php  if($niveau=="L") echo "selected"?>>Licence</option>
                <option value="M"<?php  if($niveau=="M") echo "selected"?>>Master</option>
            </select>
            </div>  
            <button type="submit" name="search" class="btn btn-success">
                <span class="glyphicon glyphicon-save"></span>&nbsp&nbspEnregistrer</button>&nbsp&nbsp
        </div>    
       
        </form>
       </div> 
    </div>
    </div>

    
</body>
</html>