<?php
require_once('maSession.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>page blanche</title>
</head>
<body> 
    <style>
    .panel{ margin-top:60px;}
    </style>
    <?php include("menu.php"); ?>
    <div class="container">
    <div class="panel panel-primary">
       <div class="panel-heading">Veuillez saisir les donner de la Nouvelle filière</div>
       <div class="panel-body">
       <form method='POST' action="insertFiliere.php">
        <div class="form-group">
        <label for="nomF">Le Nom de la Filiere</label>
        <input type="text" name="nomF" placeholder="Tapez le nom de la filiere" class="form-control" value="<?php echo $_GET['nomF']??""; ?>" id="nomF">
        <div class="form-group">  
        <label for="niveau">Niveau:</label>
            <select class="form-control" id="niveau" name="niveau">
                <option value="TS" selected>Technicien spesialisé</option>
                <option value="Q">Qualification</option>
                <option value="T">Technicien</option>
                <option value="L">Licence</option>
                <option value="M">Master</option>
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