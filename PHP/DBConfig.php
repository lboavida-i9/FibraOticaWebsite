<?php
$dbhost = "localhost";
$dbname = "fibraoticadb";
$dbuser = "root";
$dbpass = '';
try {
   $db = new PDO("mysql:dbhost=$dbhost;dbname=$dbname", "$dbuser", "$dbpass");
} catch(PDOException $e){
   echo $e->getMessage();
}

function Encript($text)
{
   $EncriptKey = "EncriptionKeyManuel";
   $encrypted_string=openssl_encrypt($text,"AES-128-ECB", $EncriptKey);
   return $encrypted_string;
}

function Decript($text)
{
   $EncriptKey = "EncriptionKeyManuel";
   $decrypted_string=openssl_decrypt($text,"AES-128-ECB", $EncriptKey);
   return $decrypted_string;
}

?>