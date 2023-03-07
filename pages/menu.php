<nav class="navbar navbar-default navbar-fixed-top  ">
   <div class="container-fluid">
    <div class="navbar-header">
        <!-- <a href="../index.php" class="navbar-brand">Gestion des stagiers</a> -->
        <a href="../index.php" class="navbar-brand"><img src="../images/logo.png" height="36" width="130"  alt="img"></a>
       <span class="navbar-brand">Gestion des stagiers</span>
    </div>
    <ul class="nav navbar-nav">
    <li><a href="stagiers.php">Les Stagiers</a></li>
    <li><a href="filieres.php">Les Filiers</a></li>
    <li><a href="utilisateur.php">Les utilisateurs</a></li>
    <li><a href="lesVideo.php">Les Video</a></li>
</ul> 
<ul class="nav navbar-nav navbar-right"><!--navbar-right bach tji 3la limen-->
    <li><a href="editerUser.php?idUser=<?php echo $_SESSION['user']['idUser']?>"><i class="glyphicon glyphicon-user"></i>&nbsp<?php echo $_SESSION['user']['login'] ?></a></li>
    <li><a href="seDeconnecter.php"><i class="glyphicon glyphicon-log-out"></i>&nbspSe deconnecter</a></li>
</ul> 
</div>
</nav>