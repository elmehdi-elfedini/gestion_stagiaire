<?php
require_once('maSession.php'); //pour la sécurisation  avec Session
require_once('connexion.php');
$nomF=$_GET['nomF']??"";     //isset($_GET['nomF'])?$_GET['nomF']:"";
$niveau=$_GET['niveau']??"All";
$size=$_GET['size']?? 6;  
$page=$_GET['page']?? 1;  
$offset=($page-1)*$size;
if($niveau=='All'){
$requet=getCn()->query("SELECT * FROM Filiere where nomFiliere Like '%$nomF%' limit $size offset $offset")->fetchAll();
$count=getCn()->query("SELECT COUNT(*) from Filiere where nomFiliere Like'%$nomF%'")->fetchColumn();
}else{
    $requet = getCn()->query("SELECT * FROM Filiere where nomFiliere Like'%$nomF%' and niveau ='$niveau' limit $size offset $offset");
    $count=getCn()->query("SELECT COUNT(*) from Filiere where nomFiliere Like'%$nomF%' and niveau ='$niveau'")->fetchColumn();
}
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
    <title>Gestion des filières</title>
</head>
<body class="bg-gradient-primary">
    <style>
    .panel{ margin-top:60px;}
    </style>
    <?php include("menu.php");?>
    <div class="container">
    <div class="panel panel-warning">
        <div class="panel-heading">Rechercher des filières...</div>
       <div class="panel-body">
        <form method='GET' action="filieres.php" class="form-inline">
        <div class="form-group">
        <input type="text" name="nomF" placeholder="Tapez le nom de la filiere" class="form-control" value="<?php echo $nomF; ?>" onchange="this.form.submit()">
            <label for="niveau">Niveau:</label>
            <select class="form-control" id="niveau" name="niveau" onchange="this.form.submit()">
                <option value="All" <?php  if($niveau=='All'){ echo "selected";} ?> >Tous les niveau</option>
                <option value="TS"  <?php  if($niveau=='TS'){ echo "selected"; } ?> >Technicien spesialisé</option>
                <option value="Q"   <?php  if($niveau=='Q'){ echo "selected"; } ?> >Qualification</option>
                <option value="T"   <?php  if($niveau=='T'){ echo "selected"; } ?> >Technicien</option>
                <option value="L"   <?php  if($niveau=='L'){ echo "selected"; } ?> >Licence</option>
                <option value="M"   <?php  if($niveau=='M'){ echo "selected"; } ?> >Master</option>
            </select>&nbsp&nbsp
            <button type="submit" name="search" class="btn btn-success">
                <span class="glyphicon glyphicon-search"></span>&nbsp&nbspChercher...</button>&nbsp&nbsp
                <?php if($_SESSION['user']['role']=='ADMIN'){?><a href="nouvelleFiliere.php">
                    <div class="btn btn-warning"><span class="glyphicon glyphicon-plus"></div>
                </span> Nouvelle filière</a>
                <?php }?>
        </div>    
       
        </form>
       </div> 
    </div>
    <div class="panel panel-warning">
        <div class="panel-heading">List des filières (<?php echo $count?>)</div>
       <div class="panel-body">
       <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>id filiere</th>
                <th>Nom filiere</th>
                <th>Niveau</th>
                <?php if($_SESSION['user']['role']=='ADMIN'){?><th>Action</th><?php }?>
            </tr>
        </thead>
        <tbody>
           <?php foreach($requet as $r){ ?>
                <tr>
                <td><?= $r['idFiliere']?></td>
                <td><?= $r['nomFiliere']?></td>
                <td><?= $r['niveau']?></td>  
                <?php if($_SESSION['user']['role']=='ADMIN'){?> <td>
               <a href="editerFiliere.php?idF=<?php echo $r['idFiliere']?>"><div class="btn btn-success"><span class="glyphicon glyphicon-edit"></div>&nbsp;modifier</span></a>&nbsp&nbsp&nbsp
               <a onclick="return confirm('Etes vous sur de vouloir supprimer la filière')" href="supprimerFiliere.php?idF=<?php echo $r['idFiliere']?>"><div class="btn btn-danger"><span class="glyphicon glyphicon-trash"></div>&nbsp;supprimer</span></a> 
                </td> <?php }?>
                </tr>
                <?php }?>
        </tbody>
      </table>
      <div>
    <ul class="pagination pagination-sm">
      <?php for($i=1;$i<=$nbrPage;$i++){?>
       <li class="<?php if($i==$page) echo 'active' ?>">
       <a href="filieres.php?page=<?php echo $i; ?>&nomF=<?php echo $nomF?>&niveau=<?php echo $niveau?>"><?php echo $i; ?></a></li>
      <?php } ?>
      </ul>
     </div>   
    </div> 
    </div>
    </div>
    
</body>
</html>