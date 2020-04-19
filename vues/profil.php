<?php
$u=new Utilisateur();
$u->affiche(0,"where login='".$_SESSION['login']."'");
if(isset($_POST['modifier']))
{
$user = new Utilisateur($u->id,$_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['profession'],$_POST['telephone'],$u->photo,$_POST['login'],$_POST['pass']);
//recuperer photo si modifié
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
			}
//faire la midification
$user->gerer_profil();
$_SESSION['login']=$_POST['login'];
header('Location: index.php?p=profil&success');
}
else if(isset($_GET['success'])) alert("modification effectué avec succée","success");
else
alert("Mon profil","info");

?>    
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
				<form class="form" method="post"  enctype="multipart/form-data">
                  <label>Nom</label>
                        <i class="fa fa-user text-primary"></i>
                    <input type="text" value="<?php echo $u->nom; ?>" title="champ alphabétique" name="nom" pattern="[A-Za-z]{1,20}"  required  placeholder="Nom">
                  <label>Prénom</label>
                        <i class="fa fa-user text-primary"></i>
                    <input type="text" value="<?php echo $u->prenom; ?>" title="champ alphabétique" name="prenom" pattern="[A-Za-z]{1,20}" required  placeholder="Prénom">
                  <label>Email</label>
                        <i class="fa fa-envelope text-primary"></i>
                    <input type="email" value="<?php echo $u->email; ?>" name="email" required  placeholder="Email">
                  <label>Profession</label>
                  <select  required name="profession" >
                    <option></option>
					<option <?php if($u->profession=="Medecin") echo"selected"; ?>>Medecin</option>
                    <option <?php if($u->profession=="Chef de projet") echo"selected"; ?>>Chef de projet</option>
                    <option <?php if($u->profession=="Etudiant" )echo"selected"; ?>>Etudiant</option>
                    <option <?php if($u->profession=="Enseignant") echo"selected"; ?>>Enseignant</option>
                    <option <?php if($u->profession=="Pharmacien") echo"selected"; ?>>Pharmacien</option>
                  </select>
              
                  <label>Téléphone</label>
                        <i class="fas fa-phone text-primary"></i>
                    <input type="tel" value="<?php echo $u->telephone; ?>" name="telephone" maxlength="8" title="champ numérique entre{8} chiffres" pattern="[0-9]{8}"  required   placeholder="Mot de passe">                        
                  <label>Login</label>
                        <i class="fas fa-user text-primary"></i>
                    <input type="text" value="<?php echo $u->login; ?>" name="login" required   placeholder="Login">                        
                  <label>Mot de passe</label>
                        <i class="fas fa-key text-primary"></i>
                    <input type="text" value="<?php echo $u->pass; ?>" name="pass"  required   placeholder="Mot de passe">                        

					<label>Photo</label>
                        <i class="fas fa-picture text-primary"></i>
                    <input type="file" name="photo" >                        
                  <input type="submit"  name="modifier" value="Modifier" />
              </form>
</div></div></div></div>