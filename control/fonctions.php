<?php
function connexion(){
@mysql_connect("localhost","root","");
mysql_select_db("bypam");
mysql_query("SET NAMES 'utf8'");
}
function compteurTable($nom_table,$condition){
$sql = mysql_query("select * from $nom_table $condition");
return mysql_num_rows($sql);
}
function passgen($chaine) {
    srand((double)microtime()*1000000);
    for($i=0; $i<8; $i++){
        @$pass .= $chaine[rand()%strlen($chaine)];
        }
    return $pass;
    }
function alert ($msg,$type)
{
	echo'<div class="alert alert-'.$type.'" role="alert">'.$msg.'</div>';
}
# --- CHIFFREMENT ---
function crypte($data)
{
$key = pack('H*', "bcb04b7e103a0cd8b54763051cef08bc55abe029fdebae5e1d417e2ffb2a00a3");
    
    # Montre la taille de la clé utilisée ; soit des clés sur 16, 24 ou 32 octets pour
    # AES-128, 192 et 256 respectivement.
    $key_size =  strlen($key);
    
    $plaintext = $data;

    # Crée un IV aléatoire à utiliser avec l'encodage CBC
    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    
    # Crée un texte cipher compatible avec AES (Rijndael block size = 128)
    # pour conserver le texte confidentiel.
    # Uniquement applicable pour les entrées encodées qui ne se terminent jamais
    # pas la valeur 00h (en raison de la suppression par défaut des zéros finaux)
    $ciphertext = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key,$plaintext, MCRYPT_MODE_CBC, $iv);

    # On ajoute le IV au début du texte chiffré pour le rendre disponible pour le déchiffrement
    $ciphertext = $iv . $ciphertext;
    
    # Encode le texte chiffré résultant pour qu'il puisse être représenté par une chaîne de caractères
    
return $ciphertext_base64 = base64_encode($ciphertext);
}    

    # --- DECHIFFREMENT ---
 function decrypte($data)
 {
    $ciphertext_dec = base64_decode($data);
$key = pack('H*', "bcb04b7e103a0cd8b54763051cef08bc55abe029fdebae5e1d417e2ffb2a00a3");
    
    # Montre la taille de la clé utilisée ; soit des clés sur 16, 24 ou 32 octets pour
    # AES-128, 192 et 256 respectivement.
    $key_size =  strlen($key);
    
    $plaintext = $data;

    # Crée un IV aléatoire à utiliser avec l'encodage CBC
    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    
    # Récupère le IV, iv_size doit avoir été créé en utilisant la fonction
    # mcrypt_get_iv_size()
    $iv_dec = substr($ciphertext_dec, 0, $iv_size);
    
    # Récupère le texte du cipher (tout, sauf $iv_size du début)
    $ciphertext_dec = substr($ciphertext_dec, $iv_size);

    # On doit supprimer les caractères de valeur 00h de la fin du texte plein
   return $plaintext_dec = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key,
      $ciphertext_dec, MCRYPT_MODE_CBC, $iv_dec);

 } 
?>