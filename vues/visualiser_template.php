<?php
$app=new Application();
$app->affiche(0,"where id='".$_GET['id_app']."'");
$app->id=$_GET['id_app'];
//fin choix
$t=new Template();
$t->affiche(0,"where id='".$app->id_template."'");
$_SESSION['id_app']=$_GET['id_app'];
$_SESSION['id_t']=$app->id_template;
?>
<iframe frameborder="0" src="template/<?php echo $t->id; ?>/" style="width:100%;" height="1000"></iframe>