<?php
session_start();
ob_start();
include('../connect.php');
$pass_st = $db->query("SELECT * FROM site WHERE id = '1'")->fetch(PDO::FETCH_ASSOC);
error_reporting(0);
if(isset($_SESSION["login"])){
header('Location:index.php');
}else{
?>
<title>Login</title>
<meta charset="utf-8">
<link rel="icon" type="image/png" href="../files/ico.png">
<link href="https://fonts.googleapis.com/css?family=Hind+Madurai&display=swap" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<center>
<!-- coded by Xainn -->
<b><img src="../files/ico.png" width="100px"/><br>Jig Panel</b>
<form action="" method="POST">
<input name="password" class="pass" type="password" placeholder="Password" /> <input class="btn" type="submit" value="Login" /><br>
<?php 
if(($_POST["password"]==$pass_st['pass'])){
$_SESSION["login"] = "true";
$_SESSION["pass"] = $pass_st['pass'];
header("Location:index.php");
}
?>
</form>
    </center>
<style>
    *{
        font-family: 'Hind Madurai',sans-serif;
    }
body{
    padding: 30px;
	background:#FFF;
	color:#444;
}
.pass{
    padding:5;
	height:30px;
	color:#333;
	outline: none;
	border:1px solid #000000;
}
.pass:focus,.pass:hover{
    padding:5;
	height:30px;
	color:#333;
	border:1px solid #000000;
    box-shadow: 0px 0px 1px #000000;
}
.btn{
    background: #000000;
	height:30px;
	color:#fff;
	outline:none;
	border:none;
}
.btn:hover{
	height:30px;
	outline:none; 
    box-shadow: 0px 0px 1px #000000;
}
    
</style>
<?php } ?>