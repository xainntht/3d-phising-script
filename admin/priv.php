<?php
session_start();
error_reporting(0);
include('../connect.php');
$sorgula = $db->query("SELECT * FROM site WHERE id = '1'")->fetch();
if(!isset($_SESSION["login"])){
    header('Location:login.php');
}else{
?>
<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Hind+Madurai&display=swap" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
	<title>Jig Panel</title>
    <link rel="icon" type="image/png" href="../files/ico.png">
    <link type="text/css" rel="stylesheet" href="./css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body><center><?php if(isset($_GET['sifre'])){ ?>
        <h2><img src="../files/diablo.gif" width="27px"> Site Düzen</h2>
 <form action="sazan.php?sifre=1" method="POST">
    <p>Site Adi</p>
        <input type="text" name="adi" class="area" value="<?php echo $sorgula['adi']?>">
    <p>Şifre</p>
        <input type="password" name="pass" class="area" value="<?php echo $sorgula['pass']?>">
    <p>Özel Sayfa</p>
        <textarea rows="7" cols="100" type="textarea" name="privpage" class="area"><?php echo $sorgula['privpage']?></textarea>
    <p>Tebrik Mesajı</p>
        <textarea rows="7" cols="100" type="textarea" name="tebrik" class="area"><?php echo $sorgula['tebrik']?></textarea>
    <p>Hata Mesajı</p>
        <textarea rows="7" cols="100" type="textarea" name="hata" class="area"><?php echo $sorgula['hata']?></textarea>
    <p></p>
     <input type="submit" value="Güncelle"/>
     <br>
 </form>
     <small>Türkçe karakter kullanmayın sıkıntı çıkarabilir</small>
    <?php }else {
    header("Location:index.php");
} ?></center>
    </body>
</html>
<?php }?>