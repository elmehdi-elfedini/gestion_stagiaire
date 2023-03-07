<?php
require_once('maSession.php');
require_once('connexion.php');
$login=$_GET['login']??"";     //isset($_GET['nomF'])?$_GET['nomF']:"";
$size=$_GET['size']?? 6;  
$page=$_GET['page']?? 1;  
$offset=($page-1)*$size;
$requet=getCn()->query("SELECT * from utilisateur where login like'%$login%' limit $size offset $offset")->fetchAll();
$count=getCn()->query("SELECT COUNT(*) countU from utilisateur ")->fetchColumn();
$rest=$count%$size;
if(($rest)==0) $nbrPage=$count/$size;
else $nbrPage = floor($count/$size)+1; // floor:partie entier d'un nombre décimal
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Gestion des utilisateurs</title>
</head>
<body>
    <style>
    .panel{ margin-top:60px;}
    </style>
    <?php include("menu.php");?>
    <div class="container">
    <div class="panel panel-warning">
        <div class="panel-heading">Rechercher des utilisateurs...</div>
       <div class="panel-body">
        <form method='GET' action="utilisateur.php" class="form-inline">
        <div class="form-group">
        <input type="text" name="login" placeholder="Login" class="form-control" value="<?php echo $login; ?>" onchange="this.form.submit()">
        
            <button type="submit" name="search" class="btn btn-success">
                <span class="glyphicon glyphicon-search"></span>&nbsp&nbspChercher...</button>
            </form>
          </div>
    </div>
    <div class="panel panel-warning">
        <div class="panel-heading">List des utilisateurs (<?php echo $count?>)</div>
       <div class="panel-body">
       <table class="table table-bordered table-striped">
        <thead>
            <tr>
               
                <th>login</th>
                <th>email</th>
                <th>Role</th>
                <th>Etat</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
           <?php foreach($requet as $r){ ?>
                <tr class="<?php echo $r['etat']==1?"success":"danger" ?>"> <!-- bhal if($r['etat"]){echo "succes" ;}else{echo "danger";} -->
                <td><?= $r['login']?></td>
                <td><?= $r['email']?></td>
                <td><?= $r['role']?></td>
                <td> <?php
               if($r['etat']==1)
                 echo '<div class="btn btn-success"><span class="glyphicon glyphicon-ok"></div>&nbspactiver</span>';
               else
                 echo '<div class="btn btn-danger"><span class="glyphicon glyphicon-remove"></div>&nbspdésactiver</span>';
               ?></td>
                <td>
               <a href="editerUser.php?idUser=<?php echo $r['idUser']?>"><div class="btn btn-warning"><span class="glyphicon glyphicon-edit"></div>&nbspmodifier</span></a>&nbsp&nbsp&nbsp
               <a onclick="return confirm('Etes vous sur de vouloir supprimer cet utilisateur')" href="supprimerUser.php?idUser=<?php echo $r['idUser']?>"><div class="btn btn-danger"><span class="glyphicon glyphicon-trash"></div>&nbspsupprimer</span></a> 
               &nbsp;&nbsp;
               <a href="activerUser.php?idUser=<?php echo $r['idUser'] ?>&etat=<?php echo $r['etat']; ?>">
               <?php
               if($r['etat']==1)
                 echo '<div class="btn btn-success"><span class="glyphicon glyphicon-ok"></div>&nbspactiver</span>';
               else
                 echo '<div class="btn btn-danger"><span class="glyphicon glyphicon-remove"></div>&nbspdésactiver</span>';
               ?></a>   
            </td>
                </tr>
                <?php }?>
        </tbody>
      </table>
      <div>
    <ul class="pagination pagination-sm">
      <?php for($i=1;$i<=$nbrPage;$i++){?>
       <li class="<?php if($i==$page) echo 'active' ?>">
       <a href="utilisateur.php?page=<?php echo $i; ?>&login=<?php echo $login?>"><?php echo $i; ?></a></li>
      <?php } ?>
      </ul>
     </div>   
    </div> 
    </div>
    </div>
    
</body>
</html>