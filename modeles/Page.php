<?php
class Page{
public $id;
public $id_application;
public $titre;
public $diriger_vers;
public $type;

function __construct($id="",$id_application="",$titre="",$diriger_vers="",$type="")
{
$this->id=$id;
$this->id_application=$id_application;
$this->titre=$titre;
$this->diriger_vers=$diriger_vers;
$this->type=$type;
}
function ajouter()
{
mysql_query("INSERT INTO `page` VALUES (NULL, '$this->id_application', '$this->titre', '$this->diriger_vers', '$this->type');");
}

function modifier()
{
$req="update page set diriger_vers='$this->diriger_vers', titre='$this->titre', type='$this->type' where id='$this->id'" ;
mysql_query($req) ;  
}
function supprimer(){
mysql_query("delete from page where id='$this->id'");
}
 
function affiche($i="",$condition="")
{
$sql = "select * from page $condition LIMIT $i,1";

$infos = mysql_query($sql);
$infos2=mysql_fetch_array($infos);
$this->id = $infos2["id"];
$this->id_application = $infos2["id_application"];
$this->titre =$infos2["titre"];
$this->diriger_vers =$infos2["diriger_vers"];
$this->type =$infos2["type"];
}

}
?>