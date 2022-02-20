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
    <title><?php echo $title; ?></title>
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
    <style>
    .lengkung {
        border-radius: 20px 20px;
    }
    </style>
</head>

<body class="js">

    <!-- Preloader 
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
     End Preloader -->

    <!-- Header -->
    <?php $this->load->view('menu/m2'); ?>
    <!--/ End Header -->

    <!-- Product Style -->
    <section class="product-area shop-sidebar shop section">
        <div class="container">
		<center>
            <h3 class="mb-4">Pembayaran untuk transaksi <?php echo $code; ?></h3>
		</center>
			<br/>
			<br/>
			<div class="row">
				<div class="col-md-8">
					<h4>Detail Pemesanan</h4>
					<br/>
					<?php
					foreach($detail as $det):
					$kd = $det->kode_transaksi;
					$a = $this->db->query("SELECT * FROM produk JOIN transaksi ON transaksi.id_produk=produk.id_produk WHERE kode_transaksi='$kd'")->result();
					$c = $this->db->query("SELECT * FROM produk JOIN transaksi ON transaksi.id_produk=produk.id_produk WHERE kode_transaksi='$kd'")->num_rows();
					$to = $this->db->query("SELECT SUM(total) as totally FROM transaksi WHERE kode_transaksi='$kd'")->result();
					?>
						Tanggal Pemesanan : <?php echo $det->tanggal; ?> 
						<br/>
						Detail Produk :
						<br/>
						<br/>
						<b>
						<div class="row">
							<div class="col-md-3">
							Nama Produk
							<hr/>
							</div>
							<div class="col-md-2">
							Harga
							<hr/>
							</div>
							<div class="col-md-2">
							Qty
							<hr/>
							</div>
							<div class="col-md-2">
							Subtotal
							<hr/>
							</div>
						</div>
						</b>
						<?php
						foreach($a as $b):
						?>
						<div class="row">
							<div class="col-md-3">
							<?php
							echo $b->nama_produk;
							?>
							</div>
							<div class="col-md-2">
							<?php
							echo rupiah($b->harga);
							?>
							</div>
							<div class="col-md-2">
							x<?php
							echo $b->qty;
							?>
							</div>
							<div class="col-md-2">
							<?php
							$stotal = $b->harga * $b->qty;
							echo rupiah($stotal);
							?>
							</div>
						</div>
						<?php endforeach; 
						endforeach;
						?>
				</div>
				<div class="col-md-4">
					<h4>Payment</h4>
					<br/>
					<?php
						foreach($to as $tota):
						?>
                        <small>Total Pembayaran</small>
						<br/>
						<h3>Rp <?= number_format($tota->totally, 0, ",", "."); ?></h3>
					<?php endforeach; ?>
					<br/>
					<small>Metode Bayar</small>
					<form>
						<div class="form-group">
							<select class="form-control" name="">
								<option value="">-- Pilih Salah Satu --</option>
								<option value="COD">COD</option>
								<option value="BT">Bank Transfer</option>
							</select>
						</div>
					</form>
				</div>
			</div>
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
                                <a href="index.html"><img src="<?= base_url('assets/img/srn-logo-white.png'); ?>"
                                        alt="#"></a>
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