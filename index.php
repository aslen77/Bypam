<?php
session_start();
ob_start();
if (!isset($_SESSION['login'])) header("Location: connecter.php"); 
if (isset($_GET['logout'])) {session_unset(); session_destroy();header("Location: connecter.php"); }
include("control/fonctions.php");
connexion();
include ("modeles/Utilisateur.php");
include ("modeles/Categorie.php");
include ("modeles/Application.php");
include ("modeles/Template.php");
include ("modeles/Menu.php");
$u=new Utilisateur();
$u->affiche(0,"where login='".$_SESSION['login']."'");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Bypam</title>
  <!-- plugins:css -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:700|Open+Sans:400,300i" rel="stylesheet">
  <link rel="stylesheet" href="template/vendors/iconfonts/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="template/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="template/vendors/css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="template/vendors/css/form.css">
  <link rel="stylesheet" href="template/vendors/css/table.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="template/css/vertical-layout-light/style.css">
  <link rel="stylesheet" href="template/css/normalize.min.css">
  <link rel="stylesheet" href="template/css/style.css">
  <link rel="stylesheet" href="css/reset.min.css">
  <link rel="stylesheet" href="css/style.css">
	<!-- endinject -->
  <link rel="stylesheet" href="css/lightbox.min.css">
  <link rel="shortcut icon" href="images/logo.ico" />
  <style>
  header {
  background: #222023;
	}
	header h1{
			padding-bottom:30px;
	}
	header h2{
			padding-bottom:30px;
	}

    .searchbar{
    margin-bottom: auto;
    margin-top: auto;
    height: 60px;
    background-color: #353b48;
    border-radius: 30px;
    padding: 10px;
    }

    .search_input{
    color: white;
    border: 0;
    outline: 0;
    background: none;
    width: 0;
    caret-color:transparent;
    line-height: 40px;
    transition: width 0.4s linear;
    }

    .searchbar:hover > .search_input{
    padding: 0 10px;
    width:130px;
    caret-color:red;
    transition: width 0.4s linear;
    }

    .searchbar:hover > .search_icon{
    background: white;
    color: #e74c3c;
    }

    .search_icon{
    height: 40px;
    width: 40px;
    float: right;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    color:white;
    }
	</style>
 
</head>
<body class="sidebar-light">
  <div class="container-scroller">
<?php include("vues/top.php"); ?>
  <div class="container-fluid page-body-wrapper">
<?php include("vues/menu.php"); ?>
      <div class="main-panel">
        <div class="content-wrapper">
<?php //include("vues/board.php"); ?>       

			<?php
			//appel pages vues
			if(isset($_GET['p']))
			{
				if($_GET['p']=="profil")include("vues/profil.php");
				if($_GET['p']=="creer_application")include("vues/creer_application.php");
				if($_GET['p']=="modifier_application")include("vues/modifier_application.php");
				if($_GET['p']=="mes_application")include("vues/mes_application.php");
				if($_GET['p']=="templates")include("vues/templates.php");
				if($_GET['p']=="choisir_template")include("vues/choisir_template.php");
				if($_GET['p']=="consulter_menu")include("vues/consulter_menu.php");
			}
			else
				include("vues/home.php");
			?>
			
        </div>
        <!-- content-wrapper ends -->

      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- search -->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- plugins:js -->
  <script src="template/vendors/js/vendor.bundle.base.js"></script>
  <script src="template/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="template/js/off-canvas.js"></script>
  <script src="template/js/hoverable-collapse.js"></script>
  <script src="template/js/template.js"></script>
  <script src="template/js/settings.js"></script>
  <script src="template/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="template/js/dashboard.js"></script>
  <!-- End custom js for this page-->
    <script src="assets/js/jquery.slimscroll.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
	<script src="js/lightbox-plus-jquery.min.js"></script>
    <script src="assets/js/app.js"></script>
  </body>
</html>