<?php
$u=new Utilisateur();
$u->affiche(0,"where login='".$_SESSION['login']."'");
$app=new Application();
$app->affiche(0,"where id='".$_GET['id_app']."'");
if(isset($_POST['creer']))
{

	$page= new Page(NULL,$app->id,mysql_real_escape_string($_POST['titre']),$_POST['diriger_vers'],$_POST['type']);
	$page->ajouter();
alert("Page ajouter avec succée","success");
}
else
alert("Ajouter page","info");

?>    
 <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
				<form name="creation" class="form" method="post" >
                 <label>Titre de la page</label>
                    <input type="text" name="titre" required  >
                 <label>Diriger Vers</label>
                    <select name="diriger_vers" required  >
						<option></option>
                                        <?php
                                            $i=0;
                                            $m=new Menu();
                                            $condition="where  id_application='".$app->id."' ORDER BY ordre ASC";
                                                while($i<compteurTable("menu",$condition))
                                                {
                                                $m->affiche($i,$condition);
												echo'<option value="'.$m->id.'">'.$m->libelle.'</option>';
												$i++;
												}
										?>
					</select>
                 <label>Type de la page</label>
                    <select name="type" required >
						<option></option>
						<option>Formulaire</option>
						<option>Table de données</option>
					</select>
				<input type="submit" class="next" name="creer" value="Créer" />

              </form>
</div></div></div></div>