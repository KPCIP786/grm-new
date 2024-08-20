<?php 
      if((empty($this->session->userdata('username')))){
     	redirect(base_url());
     }
      $ss=$this->session->userdata('userid');
      $se=$this->session->userdata('username');
      $emp=$this->session->userdata('name');
      $grp=$this->session->userdata('groupid');
 ?>
<meta name="viewport" content="width=device-width, initial-scale=1">  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">  
		<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic
Product Version: 8.2.0
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
	<!--begin::Head-->
	<head><base href=""/>
		<title>Complaint Management System</title>

        <meta charset="utf-8" />
		<meta name="description" content="The most advanced Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions. Grab your copy now and get life-time updates for free." />
		<meta name="keywords" content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Metronic - Bootstrap Admin Template, HTML, VueJS, React, Angular. Laravel, Asp.Net Core, Ruby on Rails, Spring Boot, Blazor, Django, Express.js, Node.js, Flask Admin Dashboard Theme & Template" />
		<meta property="og:url" content="https://keenthemes.com/metronic" />
		<meta property="og:site_name" content="Keenthemes | Metronic" />
		<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
		<link rel="shortcut icon" href="<?php echo base_url()?>img/logo.png"
             width="60px" height="60px"/>
		<!--begin::Fonts(mandatory for all pages)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Vendor Stylesheets(used for this page only)-->
		<link href="<?php echo base_url()?>demo47/dist/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url()?>demo47/dist/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Vendor Stylesheets-->
		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href="<?php echo base_url()?>demo47/dist/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url()?>demo47/dist/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
		<script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>
		 
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_app_body" data-kt-app-header-fixed-mobile="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="false" class="app-default" >
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::App-->
		<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
			<!--begin::Page-->
			<div class="app-page flex-column flex-column-fluid" id="kt_app_page">		
				<!--begin::Header-->
				<div id="kt_app_header" class="app-header" data-kt-sticky="true" data-kt-sticky-activate="{default: false, lg: true}" data-kt-sticky-name="app-header-sticky" data-kt-sticky-offset="{default: false, lg: '300px'}" style="background-color:#F4F4F4; height:70px;border-bottom:1px solid #000;">
					<!--begin::Header container-->
					<div class="app-container container-xxl d-flex align-items-center justify-content-between" id="kt_app_header_container">
						<div class="d-flex align-items-center">
							<!--begin::Aside toggle-->
							<button class="btn btn-icon btn-color-gray-800 btn-active-color-primary justify-content-start w-30px w-lg-40px me-lg-5" id="kt_app_sidebar_toggle">
								<i class="ki-duotone ki-text-align-left fs-1 fs-lg-2x fw-bold">
									<span class="path1"></span>
									<span class="path2"></span>
									<span class="path3"></span>
									<span class="path4"></span>
								</i>
							</button>
							<!--end::Aside toggle-->
							
						</div>
						<!--begin::Header wrapper-->
						<div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">
							<!--begin::Menu wrapper-->
							<div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="{default: 'append', lg: 'prepend'}" data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
								<!--begin::Menu-->
								<div class="menu menu-rounded menu-active-bg menu-state-primary menu-column menu-lg-row menu-title-gray-700 menu-icon-gray-500 menu-arrow-gray-500 menu-bullet-gray-500 my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0" id="kt_app_header_menu" data-kt-menu="true">
									<!--begin:Menu item-->
					<div class="menu-item here show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
					<!--begin:Menu link-->
					<span class="menu-link">
					<a href="<?php echo base_url()?>Complaint/dashboard"><span class="menu-title">Dashboard</span></a>
					<span class="menu-arrow d-lg-none"></span>
					</span>
					<!--end:Menu link-->
					
									</div>
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion me-0 me-lg-2">
										<!--begin:Menu link-->
										<span class="menu-link">
											<a href="<?php echo base_url()?>Complaint/home"><span class="menu-title">Complaints</span></a>
											<span class="menu-arrow d-lg-none"></span>
										</span>
										<!--end:Menu link-->
										
									</div>
									<!--end:Menu item-->
									<?php if($ss==1){ ?>
									<!--begin:Menu item-->
									<div class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
										<!--begin:Menu link-->
										<span class="menu-link">
											<span class="menu-title">Setting</span>
											
											<span class="menu-arrow d-lg-none"></span>
										</span>

									</div>
									<!--begin:Menu item-->
																<div class="d-flex flex-wrap gap-2" style="margin-left:-25px;margin-top: 5px;">
														
														<!--begin::Filter-->
														<div>
															<a href="#" class="btn btn-sm btn-icon btn-light" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" style="background-color:#F4F4F4;">
																<i class="ki-duotone ki-down fs-2"></i>
															</a>
															<!--begin::Menu-->
															<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-150px py-4" data-kt-menu="true" style="">
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="<?php echo base_url()?>Complaint/view_zone" class="menu-link px-3" data-kt-inbox-listing-filter="show_all">View Zone</a>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="<?php echo base_url()?>Complaint/view_tier" class="menu-link px-3" data-kt-inbox-listing-filter="show_read">View Tier</a>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="<?php echo base_url()?>Complaint/view_status" class="menu-link px-3" data-kt-inbox-listing-filter="show_unread">View Status</a>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="<?php echo base_url()?>Complaint/view_complaint_category" class="menu-link px-3" data-kt-inbox-listing-filter="show_starred">View Category</a>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="<?php echo base_url()?>Complaint/view_uc" class="menu-link px-3" data-kt-inbox-listing-filter="show_unstarred">View UC</a>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="<?php echo base_url()?>Complaint/view_nc" class="menu-link px-3" data-kt-inbox-listing-filter="show_unstarred">View NC</a>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu item-->
																<div class="menu-item px-3">
																	<a href="<?php echo base_url()?>Complaint/view_Source" class="menu-link px-3" data-kt-inbox-listing-filter="show_unstarred">View Source</a>
																</div>
																<!--end::Menu item-->
																<!--begin::Menu item-->
																<!-- <div class="menu-item px-3">
																	<a href="<?php //echo base_url()?>Complaint/page" class="menu-link px-3" data-kt-inbox-listing-filter="show_unstarred">page</a>
																</div> -->
																<!--end::Menu item-->
															</div>
															<!--end::Menu-->
														</div>
														<!--end::Filter-->
														
													</div>
									<!--begin:Menu item-->
									<div class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
										<!--begin:Menu link-->
										<span class="menu-link">
											<a href="<?php echo base_url()?>Complaint/user_management"><span class="menu-title">User</span></a>
											<span class="menu-arrow d-lg-none"></span>
										</span>
									</div>
									<?php } ?>
										<!--end:Menu link-->
										
									</div>
									<!--end:Menu item-->
								</div>
								<!--end::Menu-->
							</div>
							<!--end::Menu wrapper-->
							<!--begin::Logo-->
							<div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0 me-lg-50" style="margin-left:17%;">
								<a href="#">
									<img src="<?php echo base_url()?>img/logo.png"
             width="10%" /> </a>
									
								</a>
							</div>
							<!--end::Logo-->
							<!--begin::Navbar-->
							<div class="app-navbar flex-shrink-0">
								<div class="d-flex align-items-center flex-wrap flex-lg-nowrap gap-4 gap-lg-10">
										
										<!--begin::Actions-->
										<div class="d-flex align-items-center gap-2 gapl-lg-4">
											<!--begin::Secondary button-->
											<div class="m-0">
												<!--begin::Menu-->
								<?php $result3 = $this->db->query("SELECT * FROM user As u where u.user_id=$ss")->row();
                                                 echo $result3->name.' ';
								 ?><div class="symbol symbol-40px symbol-circle" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-attach="parent">
									<img src="<?php echo base_url()?>/demo47/dist/assets/media/books/100.png" class="w-40px me-5" alt="">
								</div> 
												
												<!--begin::Menu 1-->
												<div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_637de26a416ce" style="">
													<!--begin::Header-->
													<div class="px-4 py-3">
														<div class="fs-5 text-dark fw-bold">Profile Setting</div>
														
													</div>
													<!--end::Header-->
													<!--begin::Menu separator-->
													<div class="separator border-gray-200"></div>
													<!--end::Menu separator-->
													<!--begin::Form-->
													<div class="px-4 py-2">
														<!--begin::Input group-->
														
														<!--end::Input group-->
														<!--begin::Input group-->
														<div>
														<ul>
															<li>
														<b style="font-size: 15px"><?php echo $se;?></b><br></li>
														<li>
														<a href="<?php echo base_url('Complaint/change_password/'.$ss)?>">Change Password</a><br></li>
														
														<a href="<?php echo base_url()?>Complaint/logout" class="btn btn-primary">Sign Out</a>
															<!--end::Options-->
															</ul>
														</div>
														<!--end::Input group-->
														<!--begin::Input group-->
														
														<!--end::Input group-->
													
													</div>
													<!--end::Form-->
												</div>
												<!--end::Menu 1-->
												<!--end::Menu-->
											</div>
											<!--end::Secondary button-->
											
										</div>
										<!--end::Actions-->
									</div>								
							

							</div>
							<!--end::Navbar-->
						</div>
						<!--end::Header wrapper-->
					</div>
					<br>
					<!--end::Header container-->
					
				</div>
				<!--end::Header-->



		