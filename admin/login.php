<?php
session_start();
ob_start();
if (isset($_GET['logout'])) {session_unset(); session_destroy();header("Location: login.php"); }
include("../control/fonctions.php");
connexion();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.html">

    <title>Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />


</head>

  <body class="login-body">

    <div class="container">

      <form class="form-signin" method="post">
        <h2 class="form-signin-heading">Authentification</h2>
		<?php
		if(isset($_POST['connecter']))
		{
			if(compteurTable("administrateur","where login='".$_POST['login']."' AND mdp='".$_POST['mdp']."'")==1)
			{
				$_SESSION['login']=$_POST['login'];
				header('Location:index.php');
			}
			else
				alert("Login ou mot de passe incorrect","danger");
		}
		?>
        <div class="login-wrap">
            <input type="text" name="login" class="form-control" placeholder="Login" autofocus>
            <input type="password" name="mdp" class="form-control" placeholder="Mot de passe">
            <button type="submit" name="connecter" class="btn btn-lg btn-info btn-block" type="submit">Connecter</button>
        </div>
      </form>
	  
    </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>


  </body>
</html>
