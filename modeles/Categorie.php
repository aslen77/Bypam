<?php
class Categorie{
public $id;
public $libelle;

function __construct($id="",$libelle="")
{
$this->id=$id;
$this->libelle=$libelle;
}


function affiche($i="",$condition="")
{

$sql = "select * from categorie $condition LIMIT $i,1";

$infos = mysql_query($sql);
$infos2=mysql_fetch_array($infos);
$this->id = $infos2["id"];
$this->libelle = $infos2["libelle"];
}

}
?>