<?php

	$vt_kullanici_adi="root";
    $vt_sifre="";
    $vt_sunucu="localhost";
    $vt_adi="media_todo";	
	
    try
    {	
        $vt_baglanti = new PDO("mysql:host=".$vt_sunucu.";dbname=".$vt_adi, $vt_kullanici_adi, $vt_sifre, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",PDO::MYSQL_ATTR_COMPRESS => TRUE) );
        $vt_baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
		
    }

?>