<?php
class utilisateur{
public $id;
public $nom;
public $prenom;
public $email;
public $profession;
public $telephone;
public $photo;
public $login;
public $pass;

function __construct($id="",$nom="",$prenom="",$email="",$profession="",$telephone="",$photo="",$login="",$pass="")
{
$this->id=$id;
$this->nom=$nom;
$this->prenom=$prenom;
$this->email=$email;
$this->profession=$profession;
$this->telephone=$telephone;
$this->photo=$photo;
$this->login=$login;
$this->pass=$pass;
}

function inscrire()
{
$req = "insert into utilisateur values (NULL,'$this->login','$this->pass','$this->nom','$this->prenom','$this->email','$this->profession','$this->telephone','$this->photo')";
mysql_query($req);
}

function gerer_profil()
{
$req="update utilisateur set nom='$this->nom', prenom='$this->prenom', email='$this->email', profession='$this->profession', telephone='$this->telephone', login='$this->login', pass='$this->pass', photo='$this->photo' where id='$this->id'" ;
mysql_query($req) ;  
}

function supprimer(){
mysql_query("delete from utilisateur where id='$this->id'");
}


function affiche($i="",$condition="")
{

$sql = "select * from utilisateur $condition LIMIT $i,1";

$infos = mysql_query($sql);
$infos2=mysql_fetch_array($infos);
$this->login = $infos2["login"];
$this->pass=$infos2["pass"]; 
$this->id = $infos2["id"];
$this->nom = $infos2["nom"];
$this->prenom =$infos2["prenom"];
$this->email =$infos2["email"];
$this->profession =$infos2["profession"];
$this->telephone =$infos2["telephone"];
$this->photo =$infos2["photo"];
}

}
?>