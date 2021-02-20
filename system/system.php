<?php

function show_page(){
	$git = @$_GET["git"];
	switch($git){
			
		case "all_missions";
			all_missions();
		break;		

		case "developers";
			developers();
		break;	


		default;
			include 'page/main.php';
		break;
	}
}

function main_header(){
	
	echo'
    <header>
      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          <div class="row p-5">

            <div class="col-sm-4 ">
              <h4 class="text-white">Görevler</h4>
              <ul class="list-unstyled">
                <li><a href="'.siteURL('').'all-missions/" class="text-white">Tüm Görevler</a> <span class="badge badge-pill badge-light">'.gorev_toplam_al().'</span></li>
                <li><a href="#" class="text-white">Devam Eden Görevler</a></li>
                <li><a href="#" class="text-white">Tamanlanan Görevler</a></li>
              </ul>
            </div>		  
		  
            <div class="col-sm-4 ">
              <h4 class="text-white">Yazılımcılar</h4>
              <ul class="list-unstyled">
                <li><a href="'.siteURL('').'developers/" class="text-white">Yazılımcı Personeller</a> <span class="badge badge-pill badge-light">'.yazilimci_sayi_al().'</span></li>
              </ul>
            </div>
            <div class="col-sm-4 ">
              <h4 class="text-white">Mediaclick To-Do</h4>
              <small class="text-muted">2 ayrı provider\'dan gelecek to-do iş bilgilerini çekerek development ekibine haftalık olarak
				paylaştıracak ve ekrana çıktısını verecek bir web uygulama geliştirme.</small>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
          <a href="'.siteURL('').'" class="navbar-brand d-flex align-items-center">
            <img src="https://www.mediaclick.com.tr/assets/images/logo-white.svg" height="25">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
    </header>	
	';
	
}
function main_footer(){
	
	echo'
    <footer class="footer">
      <div class="container">
        <small class="text-muted">www.mediaclick.com.tr | Case</small>
      </div>
    </footer>	
	';
	
}

function all_missions(){
	
	include 'page/all_missions.php';
	
}

function developers(){
	
	include 'page/developers.php';
	
}


?>