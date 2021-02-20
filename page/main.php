<?php main_header(); ?>

<div class="jumbotron">
	<div class="container mt-3 mb-3">

		<div class="row">
		  <div class="col-sm-3">
		  
				<div class="card mb-3">
				  <div class="card-body">
					<h5 class="card-title">Görevler</h5>
					<small class="card-text">Toplam Görev Sayısı</small>
					<hr>
					<h3 class="text-center font-weight-bold"><?php echo gorev_toplam_al();?></h3>
				  </div>
				</div>  
		  
		  </div>
		  <div class="col-sm-3">

				<div class="card mb-3">
				  <div class="card-body">
					<h5 class="card-title">Yazılımcılar</h5>
					<small class="card-text">Görev alabilecek Aktif Yazılımcılar</small>
					<hr>
					<h3 class="text-center font-weight-bold"><?php echo yazilimci_sayi_al();?></h3>
				  </div>
				</div>
		  
		  </div>
		  <div class="col-sm-6">
	  <table class="table table-sm table-striped table-bordered table-hover" style="font-size:0.8em; background-color:#fff;">
		<thead class="text-center">
		  <tr>
			<th>Zorluk</th>
			<th>Görev Adedi</th>
			<th>Süre (Saat)</th>
			<th>Gün</th>
			<th>Hafta</th>
		  </tr>
		</thead>
		<tbody>
<?php 
		global $vt_baglanti;
		$gorev_bak = $vt_baglanti->prepare("select 
		gorev_zorluk,COUNT(*) AS 'gorev_adet',
		SUM(gorev_sure) AS 'gorev_sure'
		from gorevler GROUP BY gorev_zorluk order by gorev_zorluk");
		$gorev_bak->execute();	
	
		foreach( $gorev_bak as $gorev_bak_goster ){ 
 
			$gorev_zorluk = $gorev_bak_goster['gorev_zorluk'];
			$gorev_adet = $gorev_bak_goster['gorev_adet'];
			$gorev_sure = $gorev_bak_goster['gorev_sure'];
			
 			$gorev_gun = number_format( $gorev_sure/9,2,'.','.');
			$gorev_hafta = number_format( $gorev_sure/45,2,'.','.');

			$gorev_gun_yaklasık = ceil($gorev_gun);
			$gorev_hafta_yaklasık = ceil($gorev_hafta);

/* 				setlocale(LC_TIME, "turkish"); 
				$bugun = date("Y-m-d H:i");
				$yenitarih = strtotime('+'.$gorev_gun_yaklasık.' day',strtotime($bugun));
				$yenitarih_duzgun = iconv('latin5','utf-8',strftime(' %d %B %Y %A ',$yenitarih)); */

			
			echo'
			  <tr>
				<td class="text-center font-weight-bold">'.$gorev_zorluk.'</td>
				<td class="text-center font-weight-bold">'.$gorev_adet.'</td>
				<td class="text-center font-weight-bold">'.$gorev_sure.'</td>
				<td class="text-center font-weight-bold">'.$gorev_gun.'</td>
				<td class="text-center font-weight-bold">'.$gorev_hafta.'</td>
			  </tr>			
			';
			
		}	

		

?>		</tbody>
	  </table>	
		  
		  </div>

		  <div class="col-sm-12">
		 
<?php

		global $vt_baglanti;
		$gorev_hafta_bak = $vt_baglanti->prepare("select FORMAT(sum(gorev_sure)/45/5,2) As 'hafta_deger' from gorevler ");
		$gorev_hafta_bak->execute();	
	
		foreach( $gorev_hafta_bak as $gorev_hafta_bak_goster ){ 
 
			$hafta_deger = $gorev_hafta_bak_goster['hafta_deger'];

			$hafta_deger_bol = explode(".",$hafta_deger);
			
			$hafta_deger_hafta_sayisi = $hafta_deger_bol[0];
	
			$hafta_deger_hafta_sayisi_kalan_gun = $hafta_deger_bol[1];
			
			$hafta_deger_hafta_sayisi_gun_say = $hafta_deger_hafta_sayisi * 5;
			
			$ondalik_kalan_gun = "0.".$hafta_deger_hafta_sayisi_kalan_gun;
			
			$ondalik_kaln_gun_hes_1 = 225 * $ondalik_kalan_gun;
			
			$ondalik_kaln_gun_hes_1 = $ondalik_kaln_gun_hes_1 / 45;
			
			 $toplam_gun_olusan = floor($hafta_deger_hafta_sayisi_gun_say + $ondalik_kaln_gun_hes_1);
			
			$hafta_deger_hafta_sayisi_tatil_gun = $hafta_deger_hafta_sayisi * 2;
			
			$tatil_ve_calisma_gunleri_ile_gecen_gun = $toplam_gun_olusan + $hafta_deger_hafta_sayisi_tatil_gun;
			
			setlocale(LC_TIME, "turkish"); 
			$bugun = date("Y-m-d H:i");
			$yenitarih = strtotime('+'.$tatil_ve_calisma_gunleri_ile_gecen_gun.' day',strtotime($bugun));
			$yenitarih_duzgun = iconv('latin5','utf-8',strftime(' %d %B %Y %A ',$yenitarih));			
			
		}
		
		echo'<p class="font-weight-light">
		Tanımlı görevlerin tamamlanması için gerekli hafta sayısı <b class="font-weight-bold">'.$hafta_deger.'</b> dır. Tatil günleri de
		 sürece dahil edildiğinde <b class="font-weight-bold">'.$tatil_ve_calisma_gunleri_ile_gecen_gun.'</b> gün sonunda normal çalışma düzeni ile tüm görevler
		 <b class="font-weight-bold">'.$yenitarih_duzgun.'</b> günü tamamlanabilir.</p>';
		
?>		 
		  
		  </div>

		</div>

	</div>

</div>

<div class="container">

	  <table class="table table-sm mdc-tablo table-striped table-bordered table-hover" style="font-size:0.8em; background-color:#fff;">
		<thead class="text-center">
		  <tr>
		    <th>#</th>
			<th>Yazılımcı Adı</th>
			<th>Süre</th>
			<th>Zorluk</th>
			<th>Çalışan</th>
		  </tr>
		</thead>
		<tbody>

<?php

		global $vt_baglanti;
		$yaz_bak = $vt_baglanti->prepare("select * from yazilimcilar order by zorluk");
		$yaz_bak->execute();	
	
		foreach( $yaz_bak as $yaz_bak_goster ){ 

			$yaz_id = $yaz_bak_goster['id'];
			$yazilimci_adi = $yaz_bak_goster['yazilimci_adi'];
			$sure = $yaz_bak_goster['sure'];
			$zorluk = $yaz_bak_goster['zorluk'];
			$calisan = $yaz_bak_goster['calisan'];

			echo'
			  <tr>
			    <tr data-toggle="collapse" data-target="#y_'.$yaz_id.'">
				<td class="text-center"><button class="btn btn-xs"><i class="far fa-plus-square"></i></button></td>
				<td>'.$yazilimci_adi.'</td>
				<td class="text-center font-weight-bold">'.$sure.'</td>
				<td class="text-center font-weight-bold">'.$zorluk.'</td>
				<td class="text-center font-weight-bold">'.$calisan.'</td>
			  </tr>			

					<tr>
						<td colspan="12" style="padding:0px; background-color:#fff;" >
						<div class="accordian-body collapse" id="y_'.$yaz_id.'"> 
							<div style="padding:15px;">
';


global $vt_baglanti;
$gorev_bak = $vt_baglanti->prepare("select * from gorevler where gorev_zorluk='$zorluk'");
$gorev_bak->execute();

echo'
	<div class="table-responsive mt-2">
	  <table class="table table-sm table-striped table-bordered table-hover">
		<thead class="thead-light text-center">
		  <tr>
			<th>Görev</th>
			<th>Zorluk</th>
			<th>Süre</th>
		  </tr>
		</thead>
		<tbody>
';	
	
		$saat_topla = 0;
	
		foreach( $gorev_bak as $gorev_bak_goster ){ 
 
			$gorev = $gorev_bak_goster['gorev'];
			$gorev_zorluk = $gorev_bak_goster['gorev_zorluk'];
			$gorev_sure = $gorev_bak_goster['gorev_sure'];
			
			echo'
			  <tr>
				<td>'.$gorev.'</td>
				<td class="text-center font-weight-bold">'.$gorev_zorluk.'</td>
				<td class="text-center font-weight-bold">'.$gorev_sure.'</td>
			  </tr>			
			';
			
			$saat_topla = $saat_topla + $gorev_sure;
			
		}	
	
			echo'
			  <tr>
				<td></td>
				<td class="text-right font-weight-bold">Toplam (Saat)</td>
				<td class="text-center font-weight-bold">'.$saat_topla.'</td>
			  </tr>			
			';
	
echo'		</tbody>
	  </table>	
	</div>	';


echo '
							</div>
						</div>
						</td>
					</tr>
					'; 

		}

	echo'</tbody>
	  </table>	
	';
	






	
/* 			echo'

  <div class="card mb-2">
    <div class="card-header p-2" id="y_'.$yaz_id.'">
      <h5 class="mb-0">
        <button class="btn btn-sm btn-block font-weight-bold" data-toggle="collapse" data-target="#yc_'.$yaz_id.'" aria-expanded="true" aria-controls="collapseOne">
          '.$yazilimci_adi.'
        </button>
      </h5>
    </div>

    <div id="yc_'.$yaz_id.'" class="collapse" aria-labelledby="y_'.$yaz_id.'" data-parent="#accordion">
      <div class="card-body">
        <small>Zorluk : '.$zorluk.'<br>
		Süre : '.$sure.'</small>
		<hr>
      </div>
    </div>
  </div>		
			'; */
			
			

?>	  

</div>
<?php main_footer(); ?>




