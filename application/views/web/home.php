<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo $headertitle; ?> </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>images/logo smk/smk4.png">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url(); ?>css/kiddos/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/kiddos/css/animate.css">
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/kiddos/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/kiddos/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/kiddos/css/magnific-popup.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>css/kiddos/css/aos.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>css/kiddos/css/ionicons.min.css">
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/kiddos/css/flaticon.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/kiddos/css/icomoon.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/kiddos/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/ace-master/assets/font-awesome/4.5.0/css/font-awesome.min.css" />
  </head>
  <body>
	  <div class="py-2 bg-primary">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-3 px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
			    		<div class="col-md-5 pr-4 d-flex topper align-items-center">
			    			<div class="icon bg-fifth mr-2 d-flex justify-content-center align-items-center"><span class="icon-map"></span></div>
						    <span class="text">Jalan Soekarno-Hatta No.70 Brangsong Kendal</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon bg-secondary mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">smkn4kendal@gmail.com</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon bg-tertiary mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">+62 880 876 009</span>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco_navbar ftco-navbar-light" id="ftco-navbar">
	    <div class="container d-flex align-items-center">
	    	<a class="navbar-brand" href="#">SMK N 4 KENDAL</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	        	<li class="nav-item active"><a href="<?php echo base_url(); ?>school/home" class="nav-link pl-0">Home</a></li>
	        	<li class="nav-item"><a href="<?php echo base_url(); ?>school/kontak" class="nav-link">Tentang Kami</a></li>
            <li class="nav-item"><a href="<?php echo base_url(); ?>school/nilai_siswa" class="nav-link">Nilai Siswa</a></li>
	        	<li class="nav-item"><a href="<?php echo base_url(); ?>loginuser/loginadmin" target="_blank" class="nav-link">Login (Admin)</a></li>
	        	<li class="nav-item"><a href="<?php echo base_url(); ?>loginuser/loginguru" target="_blank" class="nav-link">Login (Guru)</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    <section class="home-slider owl-carousel">
      <?php foreach ($slider as $dataslider) { 

        $picture = $dataslider->picture;
        $picture = explode('.', $picture);
        $picture1 = $picture[0].'_thumb';
        $picture2 = $picture[1];
        $picture = $picture1.'.'.$picture2;    
      ?>
      <div class="slider-item" style="background-image:url(<?php echo base_url().'images/slider_thumb/'.$picture; ?>);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-8 text-center ftco-animate">
            <h1 class="mb-4"><?php echo $dataslider->judul; ?></h1>
          </div>
        </div>
        </div>
      </div>
      <?php } ?>
    </section>

    <section class="ftco-services ftco-no-pb">
			<div class="container-wrap">
				<div class="row no-gutters">
          <div class="col-md-3 d-flex services align-self-stretch pb-4 px-4 ftco-animate bg-primary">
            <div class="media block-6 d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center">
            		<span class="flaticon-teacher"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Guru</h3>
                <p>SMK 4 Kendal memilik guru-guru berkualitas dalam hal belajar mengajar</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex services align-self-stretch pb-4 px-4 ftco-animate bg-tertiary">
            <div class="media block-6 d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center">
            		<span class="fa fa-star"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Akretedasi A</h3>
                <p>SMK N 4 Kendal adalah sekolah yang telah ter-Akretedasi A dan diakui oleh Pemerintah dan Kemendikbud.</p>
              </div>
            </div>    
          </div>
          <div class="col-md-3 d-flex services align-self-stretch pb-4 px-4 ftco-animate bg-fifth">
            <div class="media block-6 d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center">
            		<span class="fa fa-book"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Jurusan</h3>
                <p>SMK N 4 Kendal memiliki 6 Jurusan yaitu: RPL, TKJ, TKR, APAT, JSB, &amp; NKPI. dan semua sudah diakui kualitasnya.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex services align-self-stretch pb-4 px-4 ftco-animate bg-quarternary">
            <div class="media block-6 d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center">
            		<span class="fa fa-map-marker"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Lokasi</h3>
                <p>SMK N 4 Kendal terletak di lokasi yang strategis, yaitu berada di Jalan Soekarno-Hatta No.70 Brangsong, Kendal.</p>
              </div>
            </div>      
          </div>
        </div>
			</div>
		</section>
		
		<section class="ftco-section ftco-no-pt ftc-no-pb">
			<div class="container">
				<div class="row">
					<div class="col-md-10 wrap-about py-5 pr-md-4 ftco-animate">
          				<h2 class="mb-4">Tentang SMK N 4 Kendal</h2>
						<p>SMK N 4 Kendal merupakan salah satu sekolah kejuruan di daerah Kabupaten Kendal yang didirikan pada tahun 2005. Sekolah yang berlokasi di Brangsong Kendal ini memiliki 6 Kejurusan yaitu: RPL, TKJ, TKR, JSB, APAT, &amp; NKPI.</p>
						<div class="row mt-5">
							<div class="col-lg-6">
								<div class="services-2 d-flex">
									<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-education"></span></div>
									<div class="text">
										<h3>Guru</h3>
										<p>Jumlah Guru : <?php echo $guru; ?></p>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="services-2 d-flex">
									<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="fa fa-book"></span></div>
									<div class="text">
										<h3>Kelas</h3>
										<p>Jumlah Kelas : <?php echo $kelas; ?></p>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="services-2 d-flex">
									<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="fa fa-graduation-cap"></span></div>
									<div class="text">
										<h3>Siswa</h3>
										<p>Jumlah Siswa : <?php echo $siswa; ?></p>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="services-2 d-flex">
									<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="fa fa-star"></span></div>
									<div class="text">
										<h3>Jurusan</h3>
										<p>Jumlah Jurusan : <?php echo $jurusan; ?></p>
                    <?php
                      foreach ($namajurusan as $nama) { ?>
                          <li><?php echo $nama->nama; ?></li>
                       <?php } 
                    ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	

		
		
    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-5">
            	<h2 class="ftco-heading-2">Butuh Bantuan?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Jalan Soekarno-Hatta No.70 Brangsong Kendal</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+62</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">smkn4kendal@yahoo.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
          
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-5 ml-md-4">
              <h2 class="ftco-heading-2">Link</h2>
              <ul class="list-unstyled">
                <li><a href="<?php echo base_url(); ?>school/home"><span class="ion-ios-arrow-round-forward mr-2"></span>Home</a></li>
                <li><a href="<?php echo base_url(); ?>school/kontak"><span class="ion-ios-arrow-round-forward mr-2"></span>Kontak</a></li>
                <li><a href="<?php echo base_url(); ?>loginuser/loginguru"><span class="ion-ios-arrow-round-forward mr-2"></span>Login Guru</a></li>
                <li><a href="<?php echo base_url(); ?>loginuser/loginadmin"><span class="ion-ios-arrow-round-forward mr-2"></span>Login Admin</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-5">
            	<h2 class="ftco-heading-2 mb-0">Lihat Kami di</h2>
            	<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <!--<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>-->


  <script src="<?php echo base_url(); ?>css/kiddos/js/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>css/kiddos/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?php echo base_url(); ?>css/kiddos/js/popper.min.js"></script>
  <script src="<?php echo base_url(); ?>css/kiddos/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>css/kiddos/js/jquery.easing.1.3.js"></script>
  <script src="<?php echo base_url(); ?>css/kiddos/js/jquery.waypoints.min.js"></script>
  <script src="<?php echo base_url(); ?>css/kiddos/js/jquery.stellar.min.js"></script>
  <script src="<?php echo base_url(); ?>css/kiddos/js/owl.carousel.min.js"></script>
  <script src="<?php echo base_url(); ?>css/kiddos/js/jquery.magnific-popup.min.js"></script>
  <script src="<?php echo base_url(); ?>css/kiddos/js/aos.js"></script>
  <script src="<?php echo base_url(); ?>css/kiddos/js/jquery.animateNumber.min.js"></script>
  <script src="<?php echo base_url(); ?>css/kiddos/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="<?php echo base_url(); ?>css/kiddos/js/google-map.js"></script>
  <script src="<?php echo base_url(); ?>css/kiddos/js/main.js"></script>
    
  </body>
</html>