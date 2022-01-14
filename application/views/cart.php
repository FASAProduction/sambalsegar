<!DOCTYPE html>
<html lang="zxx">
<head>
	<!-- Meta Tag -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title Tag  -->
  <title>Sambal Resep Njenot - Keranjang</title>
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="<?= base_url('assets/vendor/eshop/images/favicon.png'); ?>">	
	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?= base_url('assets/vendor/eshop/css/bootstrap.css'); ?>">
	<!-- Magnific Popup -->
  <link rel="stylesheet" href="<?= base_url('assets/vendor/eshop/css/magnific-popup.min.css'); ?>">
	<!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/vendor/eshop/css/font-awesome.css'); ?>">
	<!-- Fancybox -->
	<link rel="stylesheet" href="<?= base_url('assets/vendor/eshop/css/jquery.fancybox.min.css'); ?>">
	<!-- Themify Icons -->
  <link rel="stylesheet" href="<?= base_url('assets/vendor/eshop/css/themify-icons.css'); ?>">
	<!-- Jquery Ui -->
  <link rel="stylesheet" href="<?= base_url('assets/vendor/eshop/css/jquery-ui.css'); ?>">
	<!-- Nice Select CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/vendor/eshop/css/niceselect.css'); ?>">
	<!-- Animate CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/vendor/eshop/css/animate.css'); ?>">
	<!-- Flex Slider CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/vendor/eshop/css/flex-slider.min.css'); ?>">
	<!-- Owl Carousel -->
  <link rel="stylesheet" href="<?= base_url('assets/vendor/eshop/css/owl-carousel.css'); ?>">
	<!-- Slicknav -->
  <link rel="stylesheet" href="<?= base_url('assets/vendor/eshop/css/slicknav.min.css'); ?>">
	<!-- Eshop StyleSheet -->
	<link rel="stylesheet" href="<?= base_url('assets/vendor/eshop/css/reset.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/vendor/eshop/style.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/vendor/eshop/css/responsive.css'); ?>">
</head>
<body class="js">
	
	<!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- End Preloader -->
		
		<!-- Header -->
		<header class="header shop">
			<!-- Topbar -->
			<div class="topbar">
				<div class="container">
					<div class="row">
						<div class="col-lg-4 col-md-12 col-12">
							<!-- Top Left -->
							<div class="top-left">
								<ul class="list-main">
									<li><i class="ti-headphone-alt"></i> 0852 5749 5886</li>
								</ul>
							</div>
							<!--/ End Top Left -->
						</div>
						<div class="col-lg-8 col-md-12 col-12">
							<!-- Top Right -->
							<div class="right-content">
								<ul class="list-main">
									<?php if($this->session->userdata('id_pelanggan')): ?>
										<!-- login -->
										<li><i class="ti-user"></i> Hai, <?= $this->session->userdata('nama_lengkap'); ?></li>
										<li><i class="ti-power-off"></i> <a href="<?= base_url('auth/logout'); ?>">Keluar</a></li>
									<?php else: ?>
										<!-- logout -->
										<li><i class="ti-user"></i> Selamat Datang</li>
										<li><i class="ti-power-off"></i> <a href="<?= base_url('auth'); ?>">Masuk</a></li>
									<?php endif; ?>
								</ul>
							</div>
							<!-- End Top Right -->
						</div>
					</div>
				</div>
			</div>
			<!-- End Topbar -->
			<div class="middle-inner">
				<div class="container">
					<div class="row">
						<div class="col-lg-2 col-md-2 col-12">
							<!-- Logo -->
							<div class="logo">
								<a href="#"><img src="<?= base_url('assets/img/srn-logo.png'); ?>" alt="logo"></a>
							</div>
							<!--/ End Logo -->
							<!-- Search Form -->
							<div class="search-top">
								<div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
								<!-- Search Form -->
								<div class="search-top">
									<form class="search-form">
										<input type="text" placeholder="Cari produk disini..." name="search">
										<button value="search" type="submit"><i class="ti-search"></i></button>
									</form>
								</div>
								<!--/ End Search Form -->
							</div>
							<!--/ End Search Form -->
							<div class="mobile-nav"></div>
						</div>
						<div class="col-lg-8 col-md-7 col-12">
							<div class="search-bar-top">
								<div class="search-bar">
									<form>
										<input name="search" placeholder="Cari produk disini..." type="search">
										<button class="btnn"><i class="ti-search"></i></button>
									</form>
								</div>
							</div>
						</div>
						<div class="col-lg-2 col-md-3 col-12">
							<div class="right-bar">
								<!-- Search Form -->
								<div class="sinlge-bar shopping">
									<a href="<?= base_url('cart'); ?>" class="single-icon"><i class="ti-bag"></i> <span class="total-count"><?= $total_cart; ?></span></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Header Inner -->
			<div class="header-inner">
				<div class="container">
					<div class="cat-nav-head">
						<div class="row">
							<div class="col-12">
								<div class="menu-area">
									<!-- Main Menu -->
									<nav class="navbar navbar-expand-lg">
										<div class="navbar-collapse">	
											<div class="nav-inner">	
												<ul class="nav main-menu menu navbar-nav">
													<li><a href="<?= base_url(); ?>">Beranda</a></li>
													<?php if($this->session->userdata('id_pelanggan')): ?>
														<li><a href="<?= base_url('order'); ?>">Pesanan</a></li>
														<li><a href="<?= base_url('profile'); ?>">Profil Saya</a></li>
													<?php endif; ?>
													<li><a href="<?= base_url('about'); ?>">Tentang Kami</a></li>
												</ul>
											</div>
										</div>
									</nav>
									<!--/ End Main Menu -->	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Header Inner -->
		</header>
		<!--/ End Header -->
		
		<!-- Product Style -->
		<section class="product-area shop-sidebar shop section">
			<div class="container">
                <h3 class="mb-4">Keranjang</h3>
                <table class="table table-bordered table-stripped">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Produk</th>
							<th>Harga</th>
							<th>Qty</th>
							<th>Subtotal</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($record as $row): ?>
						<tr>
							<td><?= $no++; ?></td>
							<td><?= $row['nama_produk']; ?></td>
							<td>Rp.<?= number_format($row['harga'], 2, ",", "."); ?></td>
							<td><?= $row['qty']; ?></td>
							<td>Rp.<?= number_format(($row['qty'] * $row['harga']), 2, ",", "."); ?></td>
							<td style="width:10%">
								<a href="<?= base_url('cart/delete/' . $row['id_produk']); ?>" onclick="return confirm('Hapus produk ini?')" class="text-danger">
									<i class="fa fa-trash"></i> Hapus
								</a>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
				<a href="<?= base_url('cart/checkout'); ?>" class="btn btn-primary">Checkout</a>
			</div>
		</section>
		<!--/ End Product Style 1  -->
		
		<!-- Start Footer Area -->
		<footer class="footer">
			<!-- Footer Top -->
			<div class="footer-top section">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-12">
							<!-- Single Widget -->
							<div class="single-footer about">
								<div class="logo">
									<a href="index.html"><img src="<?= base_url('assets/img/srn-logo-white.png'); ?>" alt="#"></a>
								</div>
								<p class="text">Sambal Resep Njenot merupakan sebuah sambal dengan beraneka ragam rasa.</p>
								<p class="call">Punya pertanyaan? Hubungi kami.<span><a>0852 5749 5886</a></span></p>
							</div>
							<!-- End Single Widget -->
						</div>
						<div class="col-lg-6 col-md-6 col-12">
							<!-- Single Widget -->
							<div class="single-footer social">
								<h4>Temukan Kami Di</h4>
								<!-- Single Widget -->
								<div class="contact">
									<ul>
										<li>Jln. Laksa Adisucipto Km. 7,5</li>
										<li>Desa Santan Gang No. 09 No Rumah 69C, Maguoharjo, Depok, Sleman</li>
										<li>info@resepnjenot.com</li>
										<li>0852 5749 5886</li>
									</ul>
								</div>
								<!-- End Single Widget -->
							</div>
							<!-- End Single Widget -->
						</div>
					</div>
				</div>
			</div>
			<!-- End Footer Top -->
			<div class="copyright">
				<div class="container">
					<div class="inner">
						<div class="row">
							<div class="col-lg-6 col-12">
								<div class="left">
									<p>Copyright © 2021 Sambal Resep Njenot.</p>
								</div>
							</div>
							<div class="col-lg-6 col-12">
								<div class="right">
									<img src="<?= base_url('assets/vendor/eshop/images/payments.png'); ?>" alt="#">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- /End Footer Area -->
	
	
    <!-- Jquery -->
    <script src="<?= base_url('assets/vendor/eshop/js/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/eshop/js/jquery-migrate-3.0.0.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/eshop/js/jquery-ui.min.js'); ?>"></script>
    <!-- Popper JS -->
    <script src="<?= base_url('assets/vendor/eshop/js/popper.min.js'); ?>"></script>
    <!-- Bootstrap JS -->
    <script src="<?= base_url('assets/vendor/eshop/js/bootstrap.min.js'); ?>"></script>
    <!-- Slicknav JS -->
    <script src="<?= base_url('assets/vendor/eshop/js/slicknav.min.js'); ?>"></script>
    <!-- Owl Carousel JS -->
    <script src="<?= base_url('assets/vendor/eshop/js/owl-carousel.js'); ?>"></script>
    <!-- Magnific Popup JS -->
    <script src="<?= base_url('assets/vendor/eshop/js/magnific-popup.js'); ?>"></script>
    <!-- Fancybox JS -->
    <script src="<?= base_url('assets/vendor/eshop/js/facnybox.min.js'); ?>"></script>
    <!-- Waypoints JS -->
    <script src="<?= base_url('assets/vendor/eshop/js/waypoints.min.js'); ?>"></script>
    <!-- Countdown JS -->
    <script src="<?= base_url('assets/vendor/eshop/js/finalcountdown.min.js'); ?>"></script>
    <!-- Nice Select JS -->
    <script src="<?= base_url('assets/vendor/eshop/js/nicesellect.js'); ?>"></script>
    <!-- Ytplayer JS -->
    <script src="<?= base_url('assets/vendor/eshop/js/ytplayer.min.js'); ?>"></script>
    <!-- Flex Slider JS -->
    <script src="<?= base_url('assets/vendor/eshop/js/flex-slider.js'); ?>"></script>
    <!-- ScrollUp JS -->
    <script src="<?= base_url('assets/vendor/eshop/js/scrollup.js'); ?>"></script>
    <!-- Onepage Nav JS -->
    <script src="<?= base_url('assets/vendor/eshop/js/onepage-nav.min.js'); ?>"></script>
    <!-- Easing JS -->
    <script src="<?= base_url('assets/vendor/eshop/js/easing.js'); ?>"></script>
    <!-- Active JS -->
    <script src="<?= base_url('assets/vendor/eshop/js/active.js'); ?>"></script>
  </body>
</html>