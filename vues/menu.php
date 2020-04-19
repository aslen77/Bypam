      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="profile">
            <div class="profile-wrapper">
              <img src="images/users/<?php echo $u->photo; ?>" alt="profile">
              <div class="profile-details">
                <p class="name"><?php echo $u->nom."&nbsp;".$u->prenom; ?></p>
                <small class="designation"><?php echo $u->profession; ?></small>
              </div>
            </div>
          </li>
 <li><a></a></li>
<form method="post" name="rechercher">
<div class="container h-100">
      <div class="d-flex justify-content-center h-100">
        <div class="searchbar">
		
          <input class="search_input" type="text" name="search" placeholder="Rechercher...">
         
		 <a style="color:white;" onclick="javascript:document.rechercher.action='index.php'; document.rechercher.submit();"  class="search_icon"><i class="fas fa-search"></i></a>
		 
        </div>
      </div>
    </div>
</form>
 <?php
$i=0;
$condition="where creer_par='".$_SESSION['login']."'";
if(isset($_POST['search']))
$condition="$condition AND nom LIKE'".$_POST['search']."%'";
$app=new Application();
while($i<compteurTable("application",$condition))
{
$app->affiche($i,$condition);
echo'<li class="nav-item">
            <a class="nav-link"  data-toggle="collapse" target="_new" href="#dasboards'.$i.'" aria-expanded="false" aria-controls="dasboards">
              <img src="images/logos/'.$app->logo.'" width="30" height="30"/>&nbsp;&nbsp;&nbsp;
              <span class="menu-title">'.$app->nom.'</span>
            </a>
            <div class="collapse" id="dasboards'.$i.'">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" target="_new" href="template/'.$app->id_template.'/index.php?id_t='.$app->id_template.'&id_app='.$app->id.'">Aperçu d\'application</a></li>
                <li class="nav-item"><a class="nav-link" href="personnaliser.php?&id_app='.$app->id.'">Personnaliser</a></li>
              </ul>
            </div>
		</li>';
$i++;
}
?>
        </ul>
      </nav>
      <!-- partial -->
