<?php
require_once('connexion.php');
require_once('function.php');
if($_SERVER['REQUEST_METHOD']=='POST'){
    $login=$_POST['login'];
    $pwd1=$_POST['pwd1'];
    $pwd2=$_POST['pwd2'];
    $email=$_POST['email'];
    $validationErreur=array();
    if(isset($login)){
    $filterLogin=filter_var($login,FILTER_SANITIZE_STRING);
    if(strlen($filterLogin)<4){
        $validationErreur[]="<strong>Erreur!!</strong> le login doit contenir au moins 4 caractères";
    }
}    if(isset($pwd1) and isset($pwd2)){
    if(empty($pwd1)){
        $validationErreur[]="<strong>Erreur!!</strong> le mot de pass ne doit pas étre vide";
    }if(md5($pwd1)!==md5($pwd2)){
        $validationErreur[]="<strong>Erreur!!</strong> Les deux mot de pass ne sont pas identique";
    }if(recherch_par_email($email)>0){
        $validationErreur[]="<strong> Désolé cet émail exist déja !!</strong>";

    }
}if(isset($email)){
    $filterEmail=filter_var($email,FILTER_SANITIZE_EMAIL);
    if($filterEmail!=true){
        $validationErreur[]="<strong>Erreur!!</strong> Email non pas valide";
    }}
    if(empty($validationErreur)){
     if(recherch_par_login($login)==0 and recherch_par_login($email)==0){
        $requet=getCn()->prepare('INSERT INTO utilisateur(login,email,pwd,role,etat) VALUES(?,?,?,?,?)');
        $params=array($login,$email,md5("$pwd1"),'VISITEUR',0);
        $requet->execute($params); 
        $succes_msg="<div class='alert alert-success'>
        <strong>Félicitation</strong> Votre Compte est Crée . mais temporairement <br>inactif jusqu'a activation par l'admin</div>";
      header('REFRESH:5;url=login.php');
        }else{
        if(recherch_par_login($login)>0){
            $validationErreur[]="<strong> Désolé le login exist deja</strong>";
    
        }if(recherch_par_email($email)>0){
            $validationErreur[]="<strong> Désolé cet email exist deja</strong>";
    
        }
    }
   
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Nouvelle Utilisateur</title>
</head>
<body class="bg-gradient-primary">
    <div class="container">
        <div class="card shadow-lg o-hidden border-0 my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-flex">
                        <div class="flex-grow-1 bg-register-image" style="background: url(&quot;../assets/img/gdg.png&quot;) no-repeat;background-size: cover;"></div>
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h4 class="text-dark mb-4">Create an Account!</h4>
                            </div>
                            <div class="user">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
<form class="form" method="POST" action="">
    <!-- <div class="mb-3 form-floating"> -->
    <input type="text"
               required
               minlength="4"
               name='login'
               placeholder="Votre prénom"
               autocomplete="off"
               class="form-control form-control-user" 
               id="fname">
    <!-- <label for="fname">Votre prénom</label> -->
  </div>
  <div class="col-sm-6">
  <!-- <div class="mb-3 form-floating"> -->
    <input type="password"
               required
               minlength="3"
               name='pwd1'
               placeholder="Password"
               autocomplete="new-password"
               class="form-control form-control-user">
     <!-- <label for="password">Password</label> -->
</div></div>
<div class="form-group">
<!-- <div class="mb-3 form-floating"> -->
    <input type="password"
               required
               minlength="3"
               name='pwd2'
               placeholder="Confirmé password"
               autocomplete="new-password"
               class="form-control form-control-user"
               id="confirme">
     <!-- <label for="confirme">Confirmé password</label> -->
</div>
<div class="form-group">
<!-- <div class="mb-3 form-floating"> -->
   <input type="email"
               required
               name='email'
               placeholder="Taper votre email"
               autocomplete="off"
               class="form-control form-control-user">
<!-- <label for="email">Email</label> -->
</div>

<input type="submit" class="btn btn-primary btn-block text-white btn-user" value="Enregistrer">
</form>
<hr>
<?php
if(isset($validationErreur) and !empty($validationErreur)){
foreach($validationErreur as $error){
   echo "<br><div class='alert alert-danger'>" .$error."</div>";
}}
else{?>
  
    <br><br>
    <?php if(isset($succes_msg)){echo $succes_msg; }else{echo"";} ?>

<?php } ?>

</div>
<div class="text-center"><a class="small" href="forgot-password.php">Mot de passe oublié?</a></div>
                            <div class="text-center"><a class="small" href="login.php">Already have an account? Login!</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="row text-center justify-content-center">
            <div class="col-md-4"><img src="../assets/img/touchicon-180.png" width="80"></div>
        </div>
    </footer>
 
  
</body>

</html>