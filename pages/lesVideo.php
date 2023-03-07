
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Les Video</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
</head>
<body> <?php
session_start();
require_once("connexion.php");
$requet = getCn()->query('SELECT photo from stagiaire')->fetchAll();
?>
<?php include('menu.php') ?>
<main class="container-fluid my-3">
  <section class="row">
            <?php foreach($requet as $r) {?>
                <div class="col-12 col-md-6 col-lg-3">
                <div class="card">
                <img src="../images/<?php echo $r['photo']?>" alt="img" width="150" height="300" class="card-img-top">
                    <div class="card-body">
                        <h1 class="h3 card-title">Lore ,isum color</h1>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, magni.</p>
                      <a href="#" class="btn btn-primary">Lire la suite</a>
                    </div>
                </div>
            </div>
     <?php } ?>
     </section>
</main>