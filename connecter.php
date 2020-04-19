<?php
session_start();
ob_start();
include("control/fonctions.php");
connexion();
include ("modeles/Utilisateur.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Bypam</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="template/vendors/iconfonts/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="template/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="template/vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="template/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/logo.ico" />
</head>

<body class="sidebar-dark">
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
             
                <img src="images/logo.png" alt="logo">
				<h4>Se connecter</h4>
				<?php
				if(isset($_POST['connecter']))
				{
				//Vérification des valeurs saisis
					if(compteurTable("utilisateur","where login='".$_POST['login']."' AND pass='".$_POST['pass']."'")==1)
					{
					$_SESSION['login']=$_POST['login'];
					header('Location: index.php');					
					}
					else
						alert('Login ou mot de passe incorrect','danger');
				}
					?>			  
              <form class="pt-3" method="post"  enctype="multipart/form-data">
                <div class="form-group">
                  <label>Login</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="fa fa-user text-primary"></i>
                      </span>
                    </div>
                    <input type="text" name="login"  required class="form-control form-control-lg border-left-0" placeholder="Login">
                  </div>
                </div>
                <div class="form-group">
                  <label>Mot de passe</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="fa fa-user text-primary"></i>
                      </span>
                    </div>
                    <input type="password"name="pass" required class="form-control form-control-lg border-left-0" placeholder="Mot de passe">
                  </div>
                </div>

				<div class="mt-3">
                  <input type="submit"  name="connecter" value="Se connecter" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"/>
                  <a href="inscrire.php" class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn">S'inscrire</a>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-6 register-half-bg d-flex flex-row">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2019  All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="template/vendors/js/vendor.bundle.base.js"></script>
  <script src="template/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="template/js/off-canvas.js"></script>
  <script src="template/js/hoverable-collapse.js"></script>
  <script src="template/js/template.js"></script>
  <script src="template/js/settings.js"></script>
  <script src="template/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
