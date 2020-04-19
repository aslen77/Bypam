  <header style="height:260px;">
    <h1><span>Bypam</span> Vous permet de créer votre application</h1>
    <h2>En un seul clic</h2>

    <a style="color:white; text-decoration:none;" href="index.php?p=creer_application" class="btnapp" id="btnapp">Créer Application</a>
  </header>
<br><br>

<?php
alert('Mes application','info');
?>
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">

<table id="mytable">
<thead><tr><td>Logo</td><td>Nom application</td><td>Catégorie</td><td>Date création</td><td>Date modification</td>
<td colspan="2" style="text-align:center">Action</td></tr></thead>
<tbody>
<?php
$condition="where creer_par='".$_SESSION['login']."'";
if(isset($_POST['search']))
$condition="$condition AND nom LIKE'".$_POST['search']."%'";
$i=0;
$app=new Application();
//supprimer
if(isset($_GET['action']) && $_GET['action']=="supp")
{
$app->id=$_GET['id'];
$app->supprimer();
}
$c=new Categorie();
while($i<compteurTable("application",$condition))
{
$app->affiche($i,$condition);
 $c->affiche(0,"where id='".$app->categorie."'");
echo'<tr><td><img src="images/logos/'.$app->logo.'" width="30" height="30"/></td>';
echo'<td>'.$app->nom.'</td>';
echo'<td>'.$c->libelle.'</td>';
echo'<td>'.$app->date_creation.'</td>';
echo'<td>'.$app->date_modification.'</td>';
echo'<td><a href="index.php?p=modifier_application&id='.$app->id.'" class="btn  btn-sm btn-outline-dark btn-icon-text">
         <i class="fas fa-cog btn-icon-prepend"></i>Modifier</a>
		 <a href="" class="btn  btn-sm btn-outline-primary btn-icon-text">
         <i class="fas fa-download btn-icon-prepend"></i>Télécharger</a>
		 <a onclick="javascript:return confirm(\'voulez-vous vraiment supprimer!\');" href="index.php?p=mes_application&id='.$app->id.'&action=supp" class="btn  btn-sm btn-outline-danger btn-icon-text">
         <i class="fas fa-trash btn-icon-prepend"></i>Supprimer</a>
		 </td>';
echo'</tr>';
$i++;	
}
?>
</tbody>
</table>
</div></div></div></div>