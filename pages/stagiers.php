<?php
require_once('maSession.php');
require_once('connexion.php');
$nomPrenom=$_GET['nomPrenom']??"";     //isset($_GET['nomF'])?$_GET['nomF']:"";
$filiere=$_GET['filiere']?? 0;
$size=$_GET['size']?? 6;  
$page=$_GET['page']?? 1;  
$offset=($page-1)*$size;
$requetFiliere=getCn()->query("SELECT * FROM Filiere")->fetchAll();
if($filiere==0){
$requet=getCn()->query("SELECT idStagiaire,nom,prenom,nomFiliere,photo,civilite FROM Filiere as f ,stagiaire as s where f.idFiliere=s.idFiliere 
and (nom like'%$nomPrenom%' or prenom like'%$nomPrenom%') ORDER BY idStagiaire limit $size offset $offset")->fetchAll();
$count=getCn()->query("SELECT COUNT(*) from stagiaire where nom like'%$nomPrenom%' or prenom like'%$nomPrenom%'")->fetchColumn();
}else{
    $requet=getCn()->query("SELECT idStagiaire,nom,prenom,nomFiliere,photo,civilite FROM Filiere as f ,stagiaire as s where f.idFiliere=s.idFiliere and (nom like'%$nomPrenom%' or prenom like'%$nomPrenom%') and f.idFiliere=$filiere ORDER BY idStagiaire limit $size offset $offset")->fetchAll();
    $count=getCn()->query("SELECT COUNT(*) from stagiaire where (nom like'%$nomPrenom%' or prenom like'%$nomPrenom%') and idFiliere=$filiere")->fetchColumn();}
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
    <title>Gestion des stagiaire</title>
</head>
<body>
    <style>
    .panel{ margin-top:60px;}
    </style>
    <?php include("menu.php");?>
    <div class="container">
    <div class="panel panel-warning">
        <div class="panel-heading">Rechercher des stagiaires...</div>
       <div class="panel-body">
        <form method='GET' action="stagiers.php" class="form-inline"> <!-- KHASEK DIR POST MACHI GET -->
        <div class="form-group">
        <input type="text" name="nomPrenom" placeholder="Tapez le nom et le prénom" class="form-control" value="<?php echo $nomPrenom; ?>" onchange="this.form.submit()">
            <label for="filiere">Filiere:</label>
            <select class="form-control" id="filiere" name="filiere" onchange="this.form.submit()">
           <option value=0>Tous les filière</option>
            <?php foreach($requetFiliere as $rq){?>
                <option value="<?php echo $rq['idFiliere'] ?>"
                <?php if($rq['idFiliere']== $filiere) echo "selected"; ?>
                ><?= $rq['nomFiliere']?></option>
                <?php }?>
               
            </select>&nbsp&nbsp
            <button type="submit" name="search" class="btn btn-success">
                <span class="glyphicon glyphicon-search"></span>&nbsp&nbspChercher...</button>&nbsp&nbsp
                <?php if($_SESSION['user']['role']=='ADMIN'){?><a href="nouveauStagiere.php">
                <span class="glyphicon glyphicon-plus"></span> Nouveau Stagiaire</a><?php }?>
        </div>    
       
        </form>
       </div> 
    </div>
    <div class="panel panel-warning">
        <div class="panel-heading">List des Stagiaire (<?php echo $count?>)</div>
       <div class="panel-body">
       <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>id Stagiaire</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Filière</th>
                <th>Photo</th>
                <?php if($_SESSION['user']['role']=='ADMIN'){?> <th>Action</th><?php }?>
            </tr>
        </thead>
        <tbody>
           <?php foreach($requet as $r){ ?>
                <tr>
                <td><?= $r['idStagiaire']?></td>
                <td><?= $r['nom']?></td>
                <td><?= $r['prenom']?></td>
                <td><?= $r['nomFiliere']?></td>
                <td><img src="../images/<?php echo $r['photo']?>" width="70px" height="70px" class="img-circle"></td>  
                <?php if($_SESSION['user']['role']=='ADMIN'){?>   
                <td>
               <a href="editerStagiaire.php?idS=<?php echo $r['idStagiaire']?>"><div class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></div></a>&nbsp&nbsp&nbsp
               <a onclick="return confirm('Etes vous sur de vouloir supprimer le Stagiaire')" href="supprimerStagiaire.php?idS=<?php echo $r['idStagiaire']?>"><div class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></div></a> 
      
               &nbsp&nbsp&nbsp<a class="btn btn-info btn-edit-delete"
					href="../fpdf/page_document.php
					?idS=<?php echo $r['idStagiaire']?>">
					<span class="glyphicon glyphicon-print"></span>
				</a>
    
            </td><?php }?>
                </tr>
                <?php }?>
        </tbody>
      </table>
      <div>
    <ul class="pagination pagination-sm">
      <?php for($i=1;$i<=$nbrPage;$i++){?>
       <li class="<?php if($i==$page) echo 'active' ?>">
       <a href="stagiers.php?page=<?php echo $i; ?>&nomPrenom=<?php echo $nomPrenom?>&filiere=<?php echo $filiere?>"><?php echo $i; ?></a></li>
      <?php } ?>
      </ul>
     </div>   
    </div> 
    </div>
    </div>
    
</body>
</html>