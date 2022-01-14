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
										<li><i class="ti-power-off"></i> <a href="<?= base_url('auth'); ?>">Masuk / Buat Akun</a></li>
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
													<li class="active"><a href="<?= base_url(); ?>">Beranda</a></li>
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