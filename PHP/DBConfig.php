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
?>