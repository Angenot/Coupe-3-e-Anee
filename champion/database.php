<?php

try{
   session_start(); 
$bdn = new PDO('mysql:host=localhost;dbname=league1','root','');
    }
    catch(PDOException $e){
    die('Une erreur a ete trouvee '.$e->getMessage());
}
?>