<?php
class application{
public $id;
public $id_template;
public $creer_par;
public $nom;
public $categorie;
public $logo;
public $date_creation;
public $date_modification;

function __construct($id="",$id_template="",$creer_par="",$nom="",$categorie="",$logo="",$date_creation="",$date_modification="")
{
$this->id=$id;
$this->id_template=$id_template;
$this->creer_par=$creer_par;
$this->nom=$nom;
$this->categorie=$categorie;
$this->logo=$logo;
$this->date_creation=$date_creation;
$this->date_modification=$date_modification;
}

function creer()
{
mysql_query("INSERT INTO `application` VALUES (NULL, '$this->id_template', '$this->creer_par', '$this->nom', '$this->categorie', '$this->logo', '$this->date_creation', '$this->date_modification');");
}

function modifier()
{
$req="update application set  id_template='$this->id_template', nom='$this->nom', categorie='$this->categorie', logo='$this->logo', date_modification='$this->date_modification' where id='$this->id'" ;
mysql_query($req) ;  
}
function modifier_template()
{
$req="update application set id_template='$this->id_template', date_modification='$this->date_modification' where id='$this->id'" ;
mysql_query($req) ;  
}

function supprimer(){
mysql_query("delete from application where id='$this->id'");
}


function affiche($i="",$condition="")
{

$sql = "select * from application $condition LIMIT $i,1";

$infos = mysql_query($sql);
$infos2=mysql_fetch_array($infos);
$this->id = $infos2["id"];
$this->id_template = $infos2["id_template"];
$this->creer_par = $infos2["creer_par"];
$this->nom =$infos2["nom"];
$this->categorie =$infos2["categorie"];
$this->logo =$infos2["logo"];
$this->date_creation =$infos2["date_creation"];
$this->date_modification =$infos2["date_modification"];
}

}
?>