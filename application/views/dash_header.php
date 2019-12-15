<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Language" content="en">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?= $menu; ?></title>
	<meta name="viewport"
		content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
	<meta name="description" content="This is an example dashboard created using build-in elements and components.">
	<meta name="msapplication-tap-highlight" content="no">

	<link href="<?= base_url('assets/') ?>main.css" rel="stylesheet">
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<script src="<?= base_url("vendor/ckeditor")?>/ckeditor.js"></script>
	<script src="<?= base_url("vendor/ckeditor/samples/")?>js/sample.js"></script>
	<!-- <link rel="stylesheet" href="<?= base_url("vendor/ckeditor/samples/")?>css/samples.css"> -->
</head>
<body>
	<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
		<div class="app-header header-shadow">
			<div class="app-header__logo">
				<div class="logo-src"></div>
				<div class="header__pane ml-auto">
					<div>
						<button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
							data-class="closed-sidebar">
							<span class="hamburger-box">
								<span class="hamburger-inner"></span>
							</span>
						</button>
					</div>
				</div>
			</div>
			<div class="app-header__mobile-menu">
				<div>
					<button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</div>
			</div>
			<div class="app-header__menu">
				<span>
					<button type="button"
						class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
						<span class="btn-icon-wrapper">
							<i class="fa fa-ellipsis-v fa-w-6"></i>
						</span>
					</button>
				</span>
			</div>
			<div class="app-header__content">
				<div class="app-header-left">
				</div>
				<div class="app-header-right">
					<div class="header-btn-lg pr-0">
						<div class="widget-content p-0">
							<div class="widget-content-wrapper">
								<div class="widget-content-left">
									<div class="btn-group">
										<a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
											class="p-0 btn">
											<?php if($level != "null"){ ?>
												<img width="42" height="40" class="rounded-circle"
												src="<?= base_url('uploaded/') ?>photoProfile/<?= $user['photo']?>"
												alt="">
												<?php }else{ ?>
												<i class="text text-warning text-lg widget-heading" style="font-size : 16px">Login</i>
												<?php } ?>
											<i class="fa fa-angle-down ml-2 opacity-8"></i>
										</a>
										<div tabindex="-1" role="menu" aria-hidden="true"
											class="rm-pointers dropdown-menu-lg dropdown-menu dropdown-menu-right">
											<div class="dropdown-menu-header">
												<div class="dropdown-menu-header-inner bg-info">
													<div class="menu-header-content text-left">
														<div class="widget-content p-2 bg-light">
															<div class="widget-content-wrapper p-2 bg-light">
																<div class="widget-content-left">
																	<?php if($level != "null") {?>
																	<div class="widget-heading">
																		<?= $user['username']?>
																	</div>
																	<div class="widget-subheading opacity-8">
																		<?= $user['ket_level']?>
																	</div>
																	<?php }else{ ?>
																	<div class="widget-heading">
																		Login 
																	</div>
																	<?php } ?>
																</div>
																<div class="widget-content-right mr-2">
																	<?php if($level != "null") { ?>
																	<button type="button"
																		class="btn-pill btn-shadow btn-shine btn btn-focus"
																		data-toggle="modal"
																		data-target="#logoutModal">Logout
																	</button>
																	<?php }else{ ?>
																		<a
																		class="btn btn-success"
																		href="<?= base_url("Asrama/login")?>"
																		>Login
																		</a>
																	<?php } ?>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="widget-content-left  ml-3 header-user-info">
									<div class="widget-heading">

									</div>
									<div class="widget-subheading">
										<?php if($level != "null") { ?>
										<?= $user['ket_level']?>
										<?php }else{ ?>
										
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="ui-theme-settings">
			<button type="button" id="TooltipDemo" class="btn-open-options btn btn-warning">
				<i class="fa fa-cog fa-w-16 fa-spin fa-2x"></i>
			</button>
			<div class="theme-settings__inner">
				<div class="scrollbar-container">
					<div class="theme-settings__options-wrapper">
						<h3 class="themeoptions-heading">
							<div>
								Header Options
							</div>
							<button type="button"
								class="btn-pill btn-shadow btn-wide ml-auto btn btn-focus btn-sm switch-header-cs-class"
								data-class="">
								Restore Default
							</button>
						</h3>
						<div class="p-3">
							<ul class="list-group">
								<li class="list-group-item">
									<h5 class="pb-2">Choose Color Scheme
									</h5>
									<div class="theme-settings-swatches">
										<div class="swatch-holder bg-primary switch-header-cs-class"
											data-class="bg-primary header-text-light">
										</div>
										<div class="swatch-holder bg-secondary switch-header-cs-class"
											data-class="bg-secondary header-text-light">
										</div>
										<div class="swatch-holder bg-success switch-header-cs-class"
											data-class="bg-success header-text-light">
										</div>
										<div class="swatch-holder bg-info switch-header-cs-class"
											data-class="bg-info header-text-light">
										</div>
										<div class="swatch-holder bg-warning switch-header-cs-class"
											data-class="bg-warning header-text-dark">
										</div>
										<div class="swatch-holder bg-danger switch-header-cs-class"
											data-class="bg-danger header-text-light">
										</div>
										<div class="swatch-holder bg-light switch-header-cs-class"
											data-class="bg-light header-text-dark">
										</div>
										<div class="swatch-holder bg-dark switch-header-cs-class"
											data-class="bg-dark header-text-light">
										</div>
										<div class="swatch-holder bg-focus switch-header-cs-class"
											data-class="bg-focus header-text-light">
										</div>
										<div class="swatch-holder bg-alternate switch-header-cs-class"
											data-class="bg-alternate header-text-light">
										</div>
										<div class="divider">
										</div>
										<div class="swatch-holder bg-vicious-stance switch-header-cs-class"
											data-class="bg-vicious-stance header-text-light">
										</div>
										<div class="swatch-holder bg-midnight-bloom switch-header-cs-class"
											data-class="bg-midnight-bloom header-text-light">
										</div>
										<div class="swatch-holder bg-night-sky switch-header-cs-class"
											data-class="bg-night-sky header-text-light">
										</div>
										<div class="swatch-holder bg-slick-carbon switch-header-cs-class"
											data-class="bg-slick-carbon header-text-light">
										</div>
										<div class="swatch-holder bg-asteroid switch-header-cs-class"
											data-class="bg-asteroid header-text-light">
										</div>
										<div class="swatch-holder bg-royal switch-header-cs-class"
											data-class="bg-royal header-text-light">
										</div>
										<div class="swatch-holder bg-warm-flame switch-header-cs-class"
											data-class="bg-warm-flame header-text-dark">
										</div>
										<div class="swatch-holder bg-night-fade switch-header-cs-class"
											data-class="bg-night-fade header-text-dark">
										</div>
										<div class="swatch-holder bg-sunny-morning switch-header-cs-class"
											data-class="bg-sunny-morning header-text-dark">
										</div>
										<div class="swatch-holder bg-tempting-azure switch-header-cs-class"
											data-class="bg-tempting-azure header-text-dark">
										</div>
										<div class="swatch-holder bg-amy-crisp switch-header-cs-class"
											data-class="bg-amy-crisp header-text-dark">
										</div>
										<div class="swatch-holder bg-heavy-rain switch-header-cs-class"
											data-class="bg-heavy-rain header-text-dark">
										</div>
										<div class="swatch-holder bg-mean-fruit switch-header-cs-class"
											data-class="bg-mean-fruit header-text-dark">
										</div>
										<div class="swatch-holder bg-malibu-beach switch-header-cs-class"
											data-class="bg-malibu-beach header-text-light">
										</div>
										<div class="swatch-holder bg-deep-blue switch-header-cs-class"
											data-class="bg-deep-blue header-text-dark">
										</div>
										<div class="swatch-holder bg-ripe-malin switch-header-cs-class"
											data-class="bg-ripe-malin header-text-light">
										</div>
										<div class="swatch-holder bg-arielle-smile switch-header-cs-class"
											data-class="bg-arielle-smile header-text-light">
										</div>
										<div class="swatch-holder bg-plum-plate switch-header-cs-class"
											data-class="bg-plum-plate header-text-light">
										</div>
										<div class="swatch-holder bg-happy-fisher switch-header-cs-class"
											data-class="bg-happy-fisher header-text-dark">
										</div>
										<div class="swatch-holder bg-happy-itmeo switch-header-cs-class"
											data-class="bg-happy-itmeo header-text-light">
										</div>
										<div class="swatch-holder bg-mixed-hopes switch-header-cs-class"
											data-class="bg-mixed-hopes header-text-light">
										</div>
										<div class="swatch-holder bg-strong-bliss switch-header-cs-class"
											data-class="bg-strong-bliss header-text-light">
										</div>
										<div class="swatch-holder bg-grow-early switch-header-cs-class"
											data-class="bg-grow-early header-text-light">
										</div>
										<div class="swatch-holder bg-love-kiss switch-header-cs-class"
											data-class="bg-love-kiss header-text-light">
										</div>
										<div class="swatch-holder bg-premium-dark switch-header-cs-class"
											data-class="bg-premium-dark header-text-light">
										</div>
										<div class="swatch-holder bg-happy-green switch-header-cs-class"
											data-class="bg-happy-green header-text-light">
										</div>
									</div>
								</li>
							</ul>
						</div>
						<h3 class="themeoptions-heading">
							<div>Sidebar Options</div>
							<button type="button"
								class="btn-pill btn-shadow btn-wide ml-auto btn btn-focus btn-sm switch-sidebar-cs-class"
								data-class="">
								Restore Default
							</button>
						</h3>
						<div class="p-3">
							<ul class="list-group">
								<li class="list-group-item">
									<h5 class="pb-2">Choose Color Scheme
									</h5>
									<div class="theme-settings-swatches">
										<div class="swatch-holder bg-primary switch-sidebar-cs-class"
											data-class="bg-primary sidebar-text-light">
										</div>
										<div class="swatch-holder bg-secondary switch-sidebar-cs-class"
											data-class="bg-secondary sidebar-text-light">
										</div>
										<div class="swatch-holder bg-success switch-sidebar-cs-class"
											data-class="bg-success sidebar-text-dark">
										</div>
										<div class="swatch-holder bg-info switch-sidebar-cs-class"
											data-class="bg-info sidebar-text-dark">
										</div>
										<div class="swatch-holder bg-warning switch-sidebar-cs-class"
											data-class="bg-warning sidebar-text-dark">
										</div>
										<div class="swatch-holder bg-danger switch-sidebar-cs-class"
											data-class="bg-danger sidebar-text-light">
										</div>
										<div class="swatch-holder bg-light switch-sidebar-cs-class"
											data-class="bg-light sidebar-text-dark">
										</div>
										<div class="swatch-holder bg-dark switch-sidebar-cs-class"
											data-class="bg-dark sidebar-text-light">
										</div>
										<div class="swatch-holder bg-focus switch-sidebar-cs-class"
											data-class="bg-focus sidebar-text-light">
										</div>
										<div class="swatch-holder bg-alternate switch-sidebar-cs-class"
											data-class="bg-alternate sidebar-text-light">
										</div>
										<div class="divider">
										</div>
										<div class="swatch-holder bg-vicious-stance switch-sidebar-cs-class"
											data-class="bg-vicious-stance sidebar-text-light">
										</div>
										<div class="swatch-holder bg-midnight-bloom switch-sidebar-cs-class"
											data-class="bg-midnight-bloom sidebar-text-light">
										</div>
										<div class="swatch-holder bg-night-sky switch-sidebar-cs-class"
											data-class="bg-night-sky sidebar-text-light">
										</div>
										<div class="swatch-holder bg-slick-carbon switch-sidebar-cs-class"
											data-class="bg-slick-carbon sidebar-text-light">
										</div>
										<div class="swatch-holder bg-asteroid switch-sidebar-cs-class"
											data-class="bg-asteroid sidebar-text-light">
										</div>
										<div class="swatch-holder bg-royal switch-sidebar-cs-class"
											data-class="bg-royal sidebar-text-light">
										</div>
										<div class="swatch-holder bg-warm-flame switch-sidebar-cs-class"
											data-class="bg-warm-flame sidebar-text-dark">
										</div>
										<div class="swatch-holder bg-night-fade switch-sidebar-cs-class"
											data-class="bg-night-fade sidebar-text-dark">
										</div>
										<div class="swatch-holder bg-sunny-morning switch-sidebar-cs-class"
											data-class="bg-sunny-morning sidebar-text-dark">
										</div>
										<div class="swatch-holder bg-tempting-azure switch-sidebar-cs-class"
											data-class="bg-tempting-azure sidebar-text-dark">
										</div>
										<div class="swatch-holder bg-amy-crisp switch-sidebar-cs-class"
											data-class="bg-amy-crisp sidebar-text-dark">
										</div>
										<div class="swatch-holder bg-heavy-rain switch-sidebar-cs-class"
											data-class="bg-heavy-rain sidebar-text-dark">
										</div>
										<div class="swatch-holder bg-mean-fruit switch-sidebar-cs-class"
											data-class="bg-mean-fruit sidebar-text-dark">
										</div>
										<div class="swatch-holder bg-malibu-beach switch-sidebar-cs-class"
											data-class="bg-malibu-beach sidebar-text-light">
										</div>
										<div class="swatch-holder bg-deep-blue switch-sidebar-cs-class"
											data-class="bg-deep-blue sidebar-text-dark">
										</div>
										<div class="swatch-holder bg-ripe-malin switch-sidebar-cs-class"
											data-class="bg-ripe-malin sidebar-text-light">
										</div>
										<div class="swatch-holder bg-arielle-smile switch-sidebar-cs-class"
											data-class="bg-arielle-smile sidebar-text-light">
										</div>
										<div class="swatch-holder bg-plum-plate switch-sidebar-cs-class"
											data-class="bg-plum-plate sidebar-text-light">
										</div>
										<div class="swatch-holder bg-happy-fisher switch-sidebar-cs-class"
											data-class="bg-happy-fisher sidebar-text-dark">
										</div>
										<div class="swatch-holder bg-happy-itmeo switch-sidebar-cs-class"
											data-class="bg-happy-itmeo sidebar-text-light">
										</div>
										<div class="swatch-holder bg-mixed-hopes switch-sidebar-cs-class"
											data-class="bg-mixed-hopes sidebar-text-light">
										</div>
										<div class="swatch-holder bg-strong-bliss switch-sidebar-cs-class"
											data-class="bg-strong-bliss sidebar-text-light">
										</div>
										<div class="swatch-holder bg-grow-early switch-sidebar-cs-class"
											data-class="bg-grow-early sidebar-text-light">
										</div>
										<div class="swatch-holder bg-love-kiss switch-sidebar-cs-class"
											data-class="bg-love-kiss sidebar-text-light">
										</div>
										<div class="swatch-holder bg-premium-dark switch-sidebar-cs-class"
											data-class="bg-premium-dark sidebar-text-light">
										</div>
										<div class="swatch-holder bg-happy-green switch-sidebar-cs-class"
											data-class="bg-happy-green sidebar-text-light">
										</div>
									</div>
								</li>
								<li class="list-group-item">
									<h5 class="pb-2">Page Section Tabs
									</h5>
									<div class="theme-settings-swatches">
										<div role="group" class="mt-2 btn-group">
											<button type="button"
												class="btn-wide btn-shadow btn-primary btn btn-secondary switch-theme-class"
												data-class="body-tabs-line">
												Line
											</button>
											<button type="button"
												class="btn-wide btn-shadow btn-primary active btn btn-secondary switch-theme-class"
												data-class="body-tabs-shadow">
												Shadow
											</button>
										</div>
									</div>
								</li>
								<li class="list-group-item">
									<h5 class="pb-2">Light Color Schemes
									</h5>
									<div class="theme-settings-swatches">
										<div role="group" class="mt-2 btn-group">
											<button type="button"
												class="btn-wide btn-shadow btn-primary active btn btn-secondary switch-theme-class"
												data-class="app-theme-white">
												White Theme
											</button>
											<button type="button"
												class="btn-wide btn-shadow btn-primary btn btn-secondary switch-theme-class"
												data-class="app-theme-gray">
												Gray Theme
											</button>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="app-main">
			<div class="app-sidebar sidebar-shadow">
				<div class="app-header__logo">
					<div class="logo-src"></div>
					<div class="header__pane ml-auto">
						<div>
							<button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
								data-class="closed-sidebar">
								<span class="hamburger-box">
									<span class="hamburger-inner"></span>
								</span>
							</button>
						</div>
					</div>
				</div>
				<div class="app-header__mobile-menu">
					<div>
						<button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
							<span class="hamburger-box">
								<span class="hamburger-inner"></span>
							</span>
						</button>
					</div>
				</div>
				<div class="app-header__menu">
					<span>
						<button type="button"
							class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
							<span class="btn-icon-wrapper">
								<i class="fa fa-ellipsis-v fa-w-6"></i>
							</span>
						</button>
					</span>
				</div>

				<?php
				if($level != "null"){ 
					if($level == 100){
						$mylevel = "User";
					}
					if($level == 999){
						$mylevel = "Musahil";
					}
					if($level == 1337){
						$mylevel = "Admin";
					}
				}
				?>

				<div class="scrollbar-sidebar">
					<div class="app-sidebar__inner">
						<ul class="vertical-nav-menu">
							<li class="app-sidebar__heading">Menu</li>
							
							<li class="hyper">
								<a href="<?= base_url("Asrama/")?>">
									<i class="metismenu-icon pe-7s-news-paper">
									</i>News
								</a>
							</li>

							<?php if($level =="null") { ?>
							<li class="hyper">
								<a href="<?= base_url("Asrama/login")?>">
									<i class="metismenu-icon pe-7s-door-lock">
									</i>Login
								</a>
							</li>
							<?php } ?> 
							
							<?php if($level !="null") { ?>
							<li class="hyper">
								<a href="<?= base_url($mylevel."/")?>">
									<i class="metismenu-icon pe-7s-display1">
									</i>Dashboard
								</a>
							</li>
							
							<?php
							if ($level != 1337){?>
							<li class="hyper" id="profile">
								<a href="<?= base_url($mylevel."/edit_profile")?>">
									<i class="metismenu-icon pe-7s-user">
									</i>Edit Profile
								</a>
							</li>
							<?php } ?>
							<li class="hyper" id="change_pwd">
								<a href="<?= base_url($mylevel."/ManagePassword")?>">
									<i class="metismenu-icon pe-7s-lock">
									</i>Change Password
								</a>
							</li>
							<?php if($level != 100){?>
							<li class="app-sidebar__heading">Data</li>
							<?php } ?>
							<?php if ($level == 1337) { ?>
							<li class="hyper" id="data_penghuni">
								<a href="<?= base_url($mylevel."/data_penghuni")?>">
									<i class="metismenu-icon pe-7s-users">
									</i>Data Penghuni
								</a>
							</li>
							<li class="hyper" id="data_musahil">
								<a href="<?= base_url($mylevel."/data_musahil")?>">
									<i class="metismenu-icon pe-7s-headphones">
									</i>Data Musahil
								</a>
							</li>
							
							<?php } 
							if ($level != "100" ){
							?>
							<li class="hyper">
								<a href="<?= base_url($mylevel."/data_pendaftaran")?>">
									<i class="metismenu-icon pe-7s-file">
									</i>Data Pendaftar
								</a>
							</li>
							<li class="hyper" id="data_gedung">
								<a href="<?= base_url($mylevel."/data_gedung")?>">
									<i class="metismenu-icon pe-7s-home">
									</i>Data Gedung
								</a>
							</li>
							<?php } ?>

							<?php if ($level == "1337"){ ?>
							<li class="app-sidebar__heading">News Section</li>
							<li class="hyper" id="data_admin">
								<a href="<?= base_url($mylevel."/post_data")?>">
									<i class="metismenu-icon pe-7s-news-paper">
									</i>Data Berita
								</a>
							</li>
							<li class="hyper" id="data_admin">
								<a href="<?= base_url($mylevel."/view_file")?>">
									<i class="metismenu-icon pe-7s-upload">
									</i>Upload File
								</a>
							</li>
							<li class="hyper" id="data_admin">
								<a href="<?= base_url($mylevel."/update_info")?>">
									<i class="metismenu-icon pe-7s-news-paper">
									</i>Update Informasi Pendaftaran
								</a>
							</li>
							<?php } ?>
							<?php if ($level == 999 || $level == 1337) { ?>
							<li class="app-sidebar__heading">Pendaftaran</li>
							<li class="hyper" id="penghuni_baru">
								<a href="<?= base_url($mylevel."/insert_penghuni")?>">
									<i class="metismenu-icon pe-7s-plus">
									</i>Input Penghuni Baru
								</a>
							</li>
							<li class="hyper" id="get_token">
								<a href="<?= base_url($mylevel."/get_token")?>">
									<i class="metismenu-icon pe-7s-ticket">
									</i>Get Token
								</a>
							</li>
							<?php } ?>
							<?php } if($level != "1337") { ?>
							<li class="hyper" id="get_token">
								<a href="<?= base_url("Asrama/detail_berita/999")?>">
									<i class="metismenu-icon pe-7s-add-user">
									</i>Informasi Pendaftaran
								</a>
							</li>

							<li class="hyper" id="get_token">
								<a href="<?= base_url("Asrama/about")?>">
									<i class="metismenu-icon pe-7s-info">
									</i>Tentang Kami
								</a>
							</li>
							<?php } ?>
						</ul>
						<div class = "col-lg-12 d-block">
							<center>
							<hr>
							<p><b class="text text-primary">POWERED BY</b></p>
							
							<a href="https://www.trunojoyo.ac.id/">
							<img src="<?= base_url("assets/img/UTM.png")?>" class="img-fluid" style="width : 50%">
							</a>
							<br>
							<br><em class="text text-muted"><b>ASRAMA TRUNOJOYO</b> Lahirkan Insan Berakhlak Mulia</em>
							<hr>
							</center>
						</div>
					</div>
				</div>
			</div>
			<div class="app-main__outer">
		<div class="app-main__inner" id="main-page">
