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
              <h4>S'inscrire</h4>
				<?php
				if(isset($_POST['inscrire']))
				{
				//Vérification des valeurs saisis
				$erreurs = array();
				//Création du compte
				$pass = passgen($_POST['nom']."123456789");
					if(compteurTable("utilisateur","where email='".$_POST['email']."' AND login='".$_POST['login']."'")==1)
					{
					$erreurs="Compte existe déja!";	
					}	
					else if(compteurTable("utilisateur","where email='".$_POST['email']."'")==1)
					{
					$erreurs="Email existe déja!";	
					}
					elseif(compteurTable("utilisateur","where login='".$_POST['login']."'")==1)
					{
					$erreurs="Login existe déja!";	
					} 				
					else
					{
					$user = new Utilisateur(NULL,$_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['profession'],$_POST['telephone'],$_POST['prenom'],$_POST['login'],$pass);
					//envoyer photo
					if(!empty($_FILES["photo"]["name"]) && !in_array(substr($_FILES["photo"]["name"],-3),array("jpg","png","gif")))
						$erreurs[]="L'extension du photo n'est pas accepté. Seuls les extensions JPG, PNG et GIF sont acceptés!";
					if(empty($erreurs))
					{
					if(!empty($_FILES["photo"]["name"]))
					{
					$f = $_FILES["photo"];
					$fname = $f["name"];
					$tmp = $f['tmp_name'];
					$type= $f['type'];
					$name= $f['name'];
					$ext = substr($name,-3);
					$upload_dir = "images/users/";
					if(is_uploaded_file($tmp))
					{
					$user->photo = md5($fname).".$ext";
					move_uploaded_file($tmp,$upload_dir.md5($fname).".$ext");
					}
					}
					//executer function inscrire
					$user->inscrire();
					$_SESSION['login']=$_POST['login'];
					//envoyer email
						$message="<html lang='en'>

<head>
<style>
html {
  height: 100%;
  overflow: hidden;
}

body {
  align-items: center;
  display: flex;
  height: 100%;
  justify-content: center;
  background-color: #cccccc;
  font-family: Arial;
}

fieldset {
  background-color: white;
  border: solid thin #aaaaaa;
  box-sizing: border-box;
  border-radius: 5px;
  box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
  position: relative;
  padding: 2rem 1rem 1rem 1rem;
  max-width: 700px;
  -webkit-animation: popIn 600ms ease-in both;
          animation: popIn 600ms ease-in both;
}
fieldset table {
  border-collapse: collapse;
  border: 1px thin black;
}
fieldset table tr td {
  padding: 10px;
}
fieldset legend {
  box-sizing: border-box;
  border: none;
  position: absolute;
  background-color: #333;
  border-radius: 4px 4px 0 0;
  color: white;
  margin: 0;
  padding: .5rem;
  left: 0;
  right: 0;
  top: 0;
  height: 2rem;
  width: 100%;
}

@-webkit-keyframes popIn {
  from {
    opacity: 0;
    -webkit-transform: scale(0.4);
            transform: scale(0.4);
  }
  60% {
    opacity: 1;
    -webkit-transform: scale(1.05);
            transform: scale(1.05);
  }
  to {
    opacity: 1;
    -webkit-transform: scale(1);
            transform: scale(1);
  }
}

@keyframes popIn {
  from {
    opacity: 0;
    -webkit-transform: scale(0.4);
            transform: scale(0.4);
  }
  60% {
    opacity: 1;
    -webkit-transform: scale(1.05);
            transform: scale(1.05);
  }
  to {
    opacity: 1;
    -webkit-transform: scale(1);
            transform: scale(1);
  }
}

</style>
</head>
<body>

  <fieldset>
   <legend>Inscription Bypam </legend>
   <p>
   <h5> Bonjour Team , </h5> 
Merci d’avoir créé un Compte Bypam, Vous recevez cet email car vous vous êtes inscrit aux services Bypam et nous vous en remercions. 
Nous vous prions de trouver ci-dessous le mot de passe pour accéder a votre compte. <br> <br> 
      <table border> 
          <tr> 
		  <td>
		  M.".$_POST['prenom']."&nbsp;".$_POST['nom']."<br>
		  Email: ".$_POST['email']."<br>
		  Téléphone: ".$_POST['telephone']."<br>
		  Login: ".$_POST['login']."<br>
		  Mot de passe: ".$pass."
		  </td> <tr> </table>
<br><br><br>

 <h5> Cordialement, <br>
    L'équipe Bypam </h5>

   
</fieldset>
  
  

</body>

</html>";
						
						$from = "mezni.dhiaa@gmail.com";
						$to = $_POST['email'];
						$subject = "Inscription dans le site Bypam";
						$headers = "MIME-Version: 1.0\n";
						$headers .= "Content-type: text/html; charset=iso-8859-1\n";
						mail($to,$subject,$message,$headers);
					
					}
					}
				}
					// afficher les messages d'erreurs ou de succès
					if(isset($erreurs) && !empty($erreurs)){
					alert($erreurs,'danger');
					}

					elseif(isset($erreurs) && empty($erreurs)){
					 alert("Votre compte à été crée","success");
					}
					else
					alert("création d'un nouveau compte","info");
					?>			  
              <form class="pt-3" method="post"  enctype="multipart/form-data">
                <div class="form-group">
                  <label>Nom</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="fa fa-user text-primary"></i>
                      </span>
                    </div>
                    <input type="text" title="champ alphabétique" name="nom" pattern="[A-Za-z]{1,20}"  required class="form-control form-control-lg border-left-0" placeholder="Nom">
                  </div>
                </div>
                <div class="form-group">
                  <label>Prénom</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="fa fa-user text-primary"></i>
                      </span>
                    </div>
                    <input type="text" title="champ alphabétique" name="prenom" pattern="[A-Za-z]{1,20}" required class="form-control form-control-lg border-left-0" placeholder="Prénom">
                  </div>
                </div>
                <div class="form-group">
                  <label>Login</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="fa fa-user text-primary"></i>
                      </span>
                    </div>
                    <input type="text"  name="login" required class="form-control form-control-lg border-left-0" placeholder="Login">
                  </div>
                </div>

                <div class="form-group">
                  <label>Email</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="fa fa-envelope text-primary"></i>
                      </span>
                    </div>
                    <input type="email" name="email" required class="form-control form-control-lg border-left-0" placeholder="Email">
                  </div>
                </div>
                <div class="form-group">
                  <label>Profession</label>
                  <select class="form-control form-control-lg" required name="profession" id="exampleFormControlSelect2">
                    <option></option>
					<option>Medecin</option>
                    <option>Chef de projet</option>
                    <option>Etudiant</option>
                    <option>Enseignant</option>
                    <option>Pharmacien</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Téléphone</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="fas fa-phone text-primary"></i>
                      </span>
                    </div>
                    <input type="tel" name="telephone" maxlength="8" title="champ numérique entre{8} chiffres" pattern="[0-9]{8}"  required class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Téléphone">                        
                  </div>
                </div>
                <div class="form-group">
                  <label>Photo</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="fas fa-picture text-primary"></i>
                      </span>
                    </div>
                    <input type="file" name="photo" maxlength="8" title="champ numérique entre{8} chiffres" pattern="[0-9]{8}"  required class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Photo">                        
                  </div>
                </div>
				<div class="mt-3">
                  <input type="submit"  name="inscrire" value="S'inscrire" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"/>
                  <a href="connecter.php" value="connecter" class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn">connecter</a>
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
