<?php
session_start();
require_once('connexion.php');

$email=$_POST['email']??"";
$requet=getCn()->query("SELECT * from utilisateur where email='$email'")->fetch();
$pwd=$requet['pwd'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - ToDo App</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome5-overrides.min.css">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image" style="background: url(&quot;../assets/img/gdg.png&quot;) no-repeat;background-size: cover;"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                <div class="text-center">
                                        <h4 class="text-dark mb-2">Forgot Your Password?</h4>
                                        <p class="mb-4">We get it, stuff happens. Just enter your email address below and we'll send you a link to reset your password!</p>
                                    </div>
                                    <div class="user">
                                        <div class="form-group">
                                        <?php if(isset($pwd)){?> <div class="alert alert-warning"><?php echo'Votre mot de pass est :<br>'.'<strong>'.$pwd;?></div> <?php }?>
                                        <form method='POST' action='' class='form'>
<input type="email" name="email" class="form-control form-control-user" 
            id="login" placeholder="Enter votre email..."></div>

<button type="submit" class="btn btn-primary btn-block text-white btn-user" name="submit">
<span class="glyphicon glyphicon-log-in"></span>&nbsp&nbspReset Password </button>
</form>
<div class="text-center"><a class="small" href="login.php">Already have an account? Login!</a></div> 
</div>
 </div>
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
