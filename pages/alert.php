<?php
require_once('maSession.php');
$message=$_GET['message']??"Erreur";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Alert</title>
</head>
<body> 
    <style>
    .panel{ margin-top:60px;}
    </style>
    <?php include("menu.php"); ?>
    <div class="container">
    <div class="panel panel-danger">
        <div class="panel-heading"><strong>Attention !!</strong></div>
       <div class="panel-body">
      <h3><?php echo $message ?></h3>
      <a href="<?php echo $_SERVER['HTTP_REFERER'] ?>">Retour >>>></a>
       </div> 
    </div>
</div>

    
</body>
</html>