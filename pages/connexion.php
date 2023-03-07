<?php
function getCn(){
    $user='root';
    $server='localhost';
    $pw="";
    $db='gestion_stage';
    $cn = new PDO("mysql:host=$server;dbname=$db",$user,$pw);
    return $cn;
}
?>