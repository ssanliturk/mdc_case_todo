<?php main_header(); ?>


	<div class="container mt-3 mb-3">
	<h4 class="font-weight-light">Yazılımcılar</h4>
	<small class="font-weight-light">Tanımlı Yazılımcılar Listesi</small>       

<?php

		$vt_sorgu = "select * from yazilimcilar";	

		global $vt_baglanti;
		$gorev_bak = $vt_baglanti->prepare("$vt_sorgu");
		$gorev_bak->execute();
		$toplam_icerik=$gorev_bak->rowCount();

	$sayfada = 40; 
	if($toplam_icerik > 0){		
		
@$toplam_sayfa = ceil($toplam_icerik / $sayfada);  
  
$sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;
if($sayfa < 1) $sayfa = 1; 
if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa;
$limit = ($sayfa - 1) * $sayfada;  
global $vt_baglanti;
$gorev_bak = $vt_baglanti->prepare("
$vt_sorgu  limit ".$limit . ", " . $sayfada);
$gorev_bak->execute();

echo'
	<div class="table-responsive mt-2">
	  <table class="table table-sm table-striped table-bordered table-hover">
		<thead class="thead-light text-center">
		  <tr>
			<th>Yazılımcı Adı</th>
			<th>Süre</th>
			<th>Zorluk</th>
			<th>Çalışan</th>
		  </tr>
		</thead>
		<tbody>
';	
	
		foreach( $gorev_bak as $gorev_bak_goster ){ 
 
			$yazilimci_adi = $gorev_bak_goster['yazilimci_adi'];
			$sure = $gorev_bak_goster['sure'];
			$zorluk = $gorev_bak_goster['zorluk'];
			$calisan = $gorev_bak_goster['calisan'];
			
			echo'
			  <tr>
				<td>'.$yazilimci_adi.'</td>
				<td class="text-center font-weight-bold">'.$sure.'</td>
				<td class="text-center font-weight-bold">'.$zorluk.'</td>
				<td class="text-center font-weight-bold">'.$calisan.'</td>
			  </tr>			
			';
			
		}	
		
echo'		</tbody>
	  </table>	
	</div>	';
 

echo'
	<ul class="pagination justify-content-center m-3">
';
		for($s = 1; $s <= $toplam_sayfa; $s++) {
			if($sayfa == $s) {
			$ss = $s + 1;
				if($s > 1){
				   
				   $sss = $s - 1;
					if($sss == 1){
						echo'<li class="page-item"><a href="'.siteURL('').'all-missions/" class="page-link" ><i class="fa fa-chevron-left "></i> Geri</a></li>'; 			
					}else{
						echo'<li class="page-item"><a href="'.siteURL('').'all-missions/' . $sss . '/" class="page-link" ><i class="fa fa-chevron-left "></i> Geri</a></li>'; 
					}		   
				}
			echo '
			<li class="page-item"><a class="page-link">'.$s.' / '.$toplam_sayfa.' Sayfa</a></li>
			';
				if($s == $toplam_sayfa){
				}else{
				   echo'<li class="page-item"><a href="'.siteURL('').'all-missions/' . $ss . '/" class="page-link" ><i class="fa fa-chevron-right"></i> İleri</a></li>';
				   
				}
			}
		}
echo'	
	</ul>	
';	 
 
}else{
	
	echo'
    <div class="card bg-light mb-3">
      <div class="card-body text-center">
        <h2 class="card-text" style="padding:35px;">Kayıt Bulunamadı</h2>
      </div>
    </div>
	';
	
}

?>


	</div>



<?php main_footer(); ?>




