<?php

		include ("../system/db_con.php");
		include ("../system/function.php");

$json_url = "https://www.mediaclick.com.tr/api/5d47f24c330000623fa3ebfa.json"; 
$json_file = file_get_contents($json_url, true);
$m_d_p_1 = json_decode($json_file, true);
 


foreach($m_d_p_1 as $m_d_p_1_data){



	$gorev = $m_d_p_1_data["id"];
	$gorev_zorluk = $m_d_p_1_data["zorluk"];
	$gorev_sure = $m_d_p_1_data["sure"];

	echo' '.$gorev.' '.$gorev_zorluk.' '.$gorev_sure.'</br>';

		global $vt_baglanti;
		$gorev_bak = $vt_baglanti->prepare("select * from gorevler where gorev='$gorev' AND gorev_zorluk='$gorev_zorluk' AND gorev_sure='$gorev_sure' limit 1");
		$gorev_bak->execute();
		$gorev_bak_say=$gorev_bak->rowCount();

	if ($gorev_bak_say > 0){
		
		
		
	}else{
		
		global $vt_baglanti;
		$gorev_kaydet = $vt_baglanti->prepare("insert into gorevler (gorev,gorev_zorluk,gorev_sure) values ('$gorev','$gorev_zorluk','$gorev_sure')");	
		$gorev_kaydet->execute();
		
	}

}

?>