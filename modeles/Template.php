<?php
class template{
public $id;
public $id_categorie;
public $libelle;
public $photo;

function __construct($id="",$id_categorie="",$libelle="",$photo="")
{
$this->id=$id;
$this->id_categorie=$id_categorie;
$this->libelle=$libelle;
$this->photo=$photo;
}
function affiche($i="",$condition="")
{

$sql = "select * from template $condition LIMIT $i,1";

$infos = mysql_query($sql);
$infos2=mysql_fetch_array($infos);
$this->id = $infos2["id"];
$this->id_categorie = $infos2["id_categorie"];
$this->libelle =$infos2["libelle"];
$this->photo =$infos2["photo"];
}

}
?>