<?php
$u=new Utilisateur();
$u->affiche(0,"where login='".$_SESSION['login']."'");
$app=new Application();
$app->affiche(0,"where id='".$_GET['id_app']."'");
if(isset($_POST['ajouter']))
{
	$i=0;
	while($i<$_POST['nbr_lien'])
	{
	$menu = new Menu(NULL,$app->id,mysql_real_escape_string($_POST['libelle'.$i.'']),$_POST['lien'.$i.''],$_POST['ordre'.$i.'']);
	$menu->ajouter();
	$i++;
	}
alert("menu ajouter avec succée","success");
}
else
alert("Ajouter menu","info");

?>    
 <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
				<form name="creation" class="form" method="post"  enctype="multipart/form-data">
                  <center><label>Nombre des liens</label>
                    <input type="number" value="<?php if(isset($_POST['nbr_lien']))echo$_POST['nbr_lien'];?>" name="nbr_lien" required  >
					</center><br>
					<?php
					if(isset($_POST['nbr_lien']))
					{
						$i=0;
						while($i<$_POST['nbr_lien'])
						{
						?>
						<table border=0>
						<tr><td><label style='display:block;width:100px;'>Libelle</label></td>
						<td><input style='display:block; width:160px;' type="text" name="libelle<?php echo $i; ?>"  ></td>
						<td><label style='display:block;width:100px;'>&nbsp;&nbsp;Lien</label></td>
						<td><input style='display:block; width:160px;' type="text" name="lien<?php echo $i; ?>" ></td>
						<td><label style='display:block;width:70px;'>&nbsp;&nbsp;Ordre</label></td>
						<td><input style='display:block; width:50px;' min="1" type="number" name="ordre<?php echo $i; ?>" ></td></tr>
						<?php
						$i++;
						}
                    echo'<tr><td colspan="6"></td></tr>
							<tr><td colspan="6" align="right"><input type="submit" class="next" name="ajouter" value="Ajouter" /></td></tr></table>';
					}
					?>
              </form>
</div></div></div></div>