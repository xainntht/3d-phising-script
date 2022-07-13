<?php

include("connect.php");
$now = $db->query("SELECT * FROM sazan WHERE ip = '{$ip}'");
$time=time();
if($now->rowCount()>0){
$db->query("UPDATE sazan SET now = 'Hata sayfasında', lastOnline='{$time}' WHERE ip = '{$ip}'");

}else{
$db->query("INSERT INTO sazan SET now = 'Hata sayfasında',lastOnline='{$time}',ip='{$ip}'");

}
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Hata | <?php echo $site['adi']; ?></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<style type="text/css">
			body{      background-color: white;    font-family: roboto;      }
	</style>
</head>
<body>
	<center> 
		<img src="/files/error.png" alt=""/> 
		<h1><?php echo $site['hata']; ?></h1> 
	</center>
<?php include 'footer.php'; ?>
</body>
</html>