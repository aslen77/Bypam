<?php
$u=new Utilisateur();
$u->affiche(0,"where login='".$_SESSION['login']."'");
if(isset($_POST['creer']))
{
$app = new Application(NULL,0,$_SESSION['login'],mysql_real_escape_string($_POST['nom']),$_POST['categorie'],"",date('Y-m-d'),date('Y-m-d'));
//recuperer logo si modifié
if(!empty($_FILES["logo"]["name"]) && !in_array(substr($_FILES["logo"]["name"],-3),array("jpg","png","gif")))
						$erreurs[]="L'extension du logo n'est pas accepté. Seuls les extensions JPG, PNG et GIF sont acceptés!";
			if(empty($erreurs))
			{
					if(!empty($_FILES["logo"]["name"]))
					{
						$f = $_FILES["logo"];
						$fname = $f["name"];
						$tmp = $f['tmp_name'];
						$type= $f['type'];
						$name= $f['name'];
						$ext = substr($name,-3);
						$upload_dir = "images/logos/";
						if(is_uploaded_file($tmp))
						{
						$app->logo = md5($fname).".$ext";
						move_uploaded_file($tmp,$upload_dir.md5($fname).".$ext");
						}
					}
			}
//faire la midification
$app->creer();
alert("applicatioin créer avec succée","success");
}
else
alert("Créer application","info");

?>    
 <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
	<form name="creation" class="form" method="post"  enctype="multipart/form-data">
                  <label>Nom d'application</label>
                    <input type="text" name="nom" required  >
                  <label>Categorie</label>
                  <select  required name="categorie" >
				  <option></option>
				  <?php
				  $i=0;
				  $c=new Categorie();
				  while($i<compteurTable("categorie",""))
				  {
					  $c->affiche($i,"");
					  echo"<option value='".$c->id."'>".$c->libelle."</option>";
					  $i++;
				  }
				  ?>
                  </select>
              
					<label>Logo</label>
                        <i class="fas fa-picture text-primary"></i>
                    <input type="file" name="logo" >                        
                  <input type="submit" class="next" name="creer" value="Créer" />

              </form>
</div></div></div></div>