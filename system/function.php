<?php

function sql_injection($parametre){
        $girilen = array("*","/"," ","'","-","or","OR","`","and","<",">","refresh","location","\n");
        $dogrusu = array("","","","","","","","","","","","","","<br>");
 
        $dogrusuyla_degistir = str_replace($girilen,$dogrusu,$parametre);
        return $dogrusuyla_degistir;
}
function siteURL($adres){
	
	if (isset($_SERVER['HTTPS']) &&
		($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
		isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
		$_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
	  $protocol = 'https://';
	}
	else {
	  $protocol = 'http://';
	}	
	
    $domainName = $_SERVER['HTTP_HOST'].'/';
    return $protocol.$domainName.$adres;
}
function mobil() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
} 
function url_exists($url) { 
    $hdrs = @get_headers($url); 
    return is_array($hdrs) ? preg_match('/^HTTP\\/\\d+\\.\\d+\\s+2\\d\\d\\s+.*$/',$hdrs[0]) : false; 
}  
function ucftr($metin){
    $k_uzunluk = mb_strlen($metin, "UTF-8");
    $ilkKarakter= mb_substr($metin, 0, 1, "UTF-8");
    $kalan = mb_substr($metin, 1, $k_uzunluk - 1, "UTF-8");
    return mb_strtoupper($ilkKarakter, "UTF-8") . mb_strtolower($kalan,"UTF-8");
}  			 
function seo($baslik){{
$bul = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '-');
$yap = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', ' ');
$perma = strtolower(str_replace($bul, $yap, $baslik));
$perma = preg_replace("@[^A-Za-z0-9\-_]@i", ' ', $perma);
$perma = trim(preg_replace('/\s+/',' ', $perma));
$perma = str_replace(' ', '-', $perma);
return $perma;
}
}
function timeConvert ($zaman){
	$zaman =  strtotime($zaman);
	$zaman_farki = time() - $zaman;
	$saniye = $zaman_farki;
	$dakika = round($zaman_farki/60);
	$saat = round($zaman_farki/3600);
	$gun = round($zaman_farki/86400);
	$hafta = round($zaman_farki/604800);
	$ay = round($zaman_farki/2419200);
	$yil = round($zaman_farki/29030400);
	return $dakika;
}
function GetIP(){ 
    if(getenv("https_CLIENT_IP")) { 
        $ip = getenv("https_CLIENT_IP"); 
    } elseif(getenv("https_X_FORWARDED_FOR")) { 
        $ip = getenv("https_X_FORWARDED_FOR"); 
        if (strstr($ip, ',')) { 
            $tmp = explode (',', $ip); 
            $ip = trim($tmp[0]); 
        } 
    } else { 
        $ip = getenv("REMOTE_ADDR"); 
    } 
    return $ip; 
} 

function gorev_toplam_al(){
	
		global $vt_baglanti;
		$gorev_bak = $vt_baglanti->prepare("select COUNT(*) AS 'toplam_gorev' from gorevler ");
		$gorev_bak->execute();
		foreach( $gorev_bak as $gorev_bak_goster ){ 
 
			$toplam_gorev = $gorev_bak_goster['toplam_gorev'];
		}	
		
		return $toplam_gorev;
}

function yazilimci_sayi_al(){
	
		global $vt_baglanti;
		$gorev_bak = $vt_baglanti->prepare("select COUNT(*) AS 'toplam_yazilimci' from yazilimcilar ");
		$gorev_bak->execute();
		foreach( $gorev_bak as $gorev_bak_goster ){ 
 
			$toplam_yazilimci = $gorev_bak_goster['toplam_yazilimci'];
		}	
		
		return $toplam_yazilimci;
}






?>