<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Modifier password</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Changement de mot de pass</h1>
        <h2 class="text-center">Compte:<?php echo $_SESSION['user']['login']; ?></h2>
        <form class="form-horizontal" method='POST' action='updatePwd.php'>
            <div class="form-group"> <!-- ghi haydha w gadha b css-->
            <input type="password" minlength=3 class="form-control" name="oldpwd" autocomplete="false" placeholder="Taper votre Ancien Mot de Pass" required>
            </div>
            <div class="form-group">
            <input type="password" minlength=3 class="form-control" name="newpwd" autocomplete="false" placeholder="Taper votre Nouveau Mot de Pass" required>
            </div>
            <button type="submit" class="btn btn-success">
<span class="glyphicon glyphicon-save"></span>Enregistrer </button>&nbsp;&nbsp;
        </div>