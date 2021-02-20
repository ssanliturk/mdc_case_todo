<?php
ob_start(); 
session_start ();

ini_set('display_errors', 1);
error_reporting(E_ALL);   

		date_default_timezone_set('Europe/Istanbul');
		include ("system/db_con.php");
		include ("system/function.php");
		include ("system/system.php");
	
?>
<!doctype html>
<html lang="tr-TR">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">	
<title>Case To Do | Mediaclick</title>

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" rel="stylesheet">


<link rel="stylesheet" href="<?php echo siteURL('plugins/bootstrap/css/bootstrap.min.css')?>">
<link href="<?php echo siteURL('assets/css/style.css') ?>" rel="stylesheet">



<script type="text/javascript" src="<?php echo siteURL('plugins/jquery/jquery-3.5.1.min.js')?>"></script>
<script type="text/javascript" src="<?php echo siteURL('plugins/bootstrap/js/bootstrap.min.js')?>"></script>
<script type="text/javascript" src="<?php echo siteURL('assets/js/main.js')?>"></script>


</head>
<body>
<?php 

	if(!isset($_SESSION["site_uye_id"])){
		$bezersiz_deger = md5(time().rand());
		$_SESSION["site_uye_id"] = $bezersiz_deger;	
		$_SESSION["site_oturum"] = 0;

	}
	
show_page(); 


?>
</body>
</html>
<?php 
$vt_baglanti = null;
ob_end_flush();
exit();
?>