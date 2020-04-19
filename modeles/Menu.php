<?php
class Menu{
public $id;
public $id_application;
public $libelle;
public $lien;
public $ordre;

function __construct($id="",$id_application="",$libelle="",$lien="",$ordre="")
{
$this->id=$id;
$this->id_application=$id_application;
$this->libelle=$libelle;
$this->lien=$lien;
$this->ordre=$ordre;
}
function ajouter()
{
mysql_query("INSERT INTO `menu` VALUES (NULL, '$this->id_application', '$this->libelle', '$this->lien', '$this->ordre');");
}

function modifier()
{
$req="update menu set lien='$this->lien', libelle='$this->libelle', ordre='$this->ordre' where id='$this->id'" ;
mysql_query($req) ;  
}
function supprimer(){
mysql_query("delete from menu where id='$this->id'");
}
 
function affiche($i="",$condition="")
{
$sql = "select * from menu $condition LIMIT $i,1";

$infos = mysql_query($sql);
$infos2=mysql_fetch_array($infos);
$this->id = $infos2["id"];
$this->id_application = $infos2["id_application"];
$this->libelle =$infos2["libelle"];
$this->lien =$infos2["lien"];
$this->ordre =$infos2["ordre"];
}

}
?>