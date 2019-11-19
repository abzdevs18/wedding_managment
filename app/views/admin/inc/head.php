<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?=SITE_NAME;?></title>
	<link rel="icon" type="image/x-icon" href="<?=URL_ROOT;?>/img/logo_icon/lab.ico">
	<link href="https://fonts.googleapis.com/css?family=Quicksand:400,500&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="https://cdndevelopment.blob.core.windows.net/cdn/fa/css/all.min.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="<?=URL_ROOT;?>/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?=URL_ROOT;?>/css/main.css">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="<?=URL_ROOT;?>/css/jquery.mCustomScrollbar.css">
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>	
	<script src="https://cdn.tiny.cloud/1/hhu3aczt7p034dcjnizjwnns5faj5u4s14e894midesztea0/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
   
	<script src="<?=URL_ROOT;?>/js/calendar/dhtmlxscheduler.js?v=5.3.3" type="text/javascript" charset="utf-8"></script>
   <link rel="stylesheet" href="<?=URL_ROOT;?>/js/calendar/dhtmlxscheduler_material.css?v=5.3.3" type="text/css" charset="utf-8">

	<script src="<?=URL_ROOT;?>/js/calendar/dhtmlxscheduler_minical.js?v=5.3.3" type="text/javascript" charset="utf-8"></script>
	
    
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?=URL_ROOT;?>/js/datePicker/material-datetime-picker.css">

	<style>
		@import url("<?=URL_ROOT;?>/css/static-style.css");

		#navigation-scroll > .mCSB_inside > .mCSB_container {
			margin-right: 0px !important;
		}
		#accordion .ui-state-active {
			background-color:#2b2f3e !important;
			border-color:#2b2f3e !important;
		}
		#accordion h3 {
			font: var(--font-quick-500-18);
			font-size: 15px;
		}
		.mCSB_inside > .mCSB_container {
			margin-right: 0px !important;
		}
		.tox-statusbar__branding {
			display: none !important;
		}
		.c-datepicker--open {
			font-family: 'Roboto';
			z-index: 99999999;
		}
		.grid-container {
		display: grid;
		grid-template-columns: auto auto auto;
		background-color: #fff;
		padding: 10px;
		}
		.grid-item {
		background-color: #f3f3f3;
		border: 1px solid rgba(0, 0, 0, 0.8);
		padding: 20px;
		font-size: 30px;
		text-align: center;
		border-radius: 5px;
		margin: 5px;
		}
	</style>
	<script>
		$( function() {
			$( "#accordion" ).accordion();
		} );
	</script>
	<script>
		tinymce.init({
			selector: 'textarea#chemicalFormula',
			// without the below lines of code. TinyMCE editor gets the value of the textarea
			// on second click, not on the first click.
			//NOTE: important code.
			setup: function (editor) {
				editor.on('change', function () {
					tinymce.triggerSave();
				});
			}
		});
	</script>
	<!-- Base on the documentation, if multiple editors we need to initialize each -->
	<script>
		$( function() {
			$('i').tooltip();
		});
	</script>

	<script type="text/javascript" charset="utf-8">
		function init() {
			scheduler.config.multi_day = true;
			
			scheduler.init('scheduler_here',new Date(),"week");
			scheduler.load("<?=URL_ROOT;?>/js/calendar/events.json");

		}
		
		function show_minical(){
			if (scheduler.isCalendarVisible())
				scheduler.destroyCalendar();
			else
				scheduler.renderCalendar({
					position:"dhx_minical_icon",
					date:scheduler.getState().date,
					navigation:true,
					handler:function(date,calendar){
						scheduler.setCurrentView(date);
						scheduler.destroyCalendar()
					}
				});
		}
		
	</script>
</head>
<body style="position:relative;" onload="init();">
	<!-- Modal for confirmation in deleting Blog  -->
	<div class="confirmationModal" style="display:none;">
		<div class="confirmationMessage mCustomScrollbar content fluid light" data-mcs-theme="inset-2-dark" style="max-height:500px;margin-top:3%;">
			
		<div class="alert-content no-fixed-height" style="display: flex;flex-direction: column;">
			<h2 style="text-align:left;padding-left:30px;"></h2>
				<div class="changepass-holder" style="padding:5px 30px;display:none;">
					<div class="form-group half-form-group" style="width:100%;">
						<!-- <input type="text" name="title" class="form-control"> -->
						<select style="width: 100%;border-radius: 35px;" name="category">
							<optgroup>
								<?php for ($i = 0; $i < 5; $i++) : ?>
									<option value="<?=$category->id;?>">Client One</option>
								<?php endfor; ?>
							</optgroup>
						</select>
						<label for="category">Clients</label>
					</div>
				</div>
				<div class="changepass-holder" style="padding:5px 30px;">
					<div class="form-group">
						<input type="text" name="vendorName" id="vendorName" class="form-control">
						<label for="vendorName">Name</label>
					</div>
				</div>
				<div class="changepass-holder" style="padding:5px 30px;">
					<div class="form-group">
						<input type="text" name="vendorFee" id="vendorFee" class="form-control">
						<label for="vendorFee">Price</label>
					</div>
				</div>
				<div class="changepass-holder" style="padding:5px 30px;">
					<div class="form-group">
						<input type="file" name="vendorSample[]" class="form-control" id="sampleVendors" multiple="multiple">
						<label for="vendorSample">Photos taken</label>
					</div>
				</div>
				<div class="changepass-holder" style="padding:5px 30px;display:none;">
					<div class="form-group">
						<div class="grid-container" style="border: 1px solid #2b2f3e4f;border-radius:5px;">
						<div class="grid-item">1</div>
						<div class="grid-item">2</div>
						<div class="grid-item">3</div>  
						<div class="grid-item">4</div>
						<div class="grid-item">5</div>
						<div class="grid-item">6</div>  
						<div class="grid-item">7</div>
						<div class="grid-item">8</div>
						<div class="grid-item">9</div>  
						</div>
						<label>Price</label>
					</div>
				</div>
			</div>
			<div class="actionButtonModal" style="padding: 15px 30px;margin: 0;background: #3333331c;justify-content: right;">
				<button>Save</button>
				<button>Cancel</button>
			</div>
		</div>
	</div>
	<!-- End of modal blog Deletion -->
	<!-- <img style="position:absolute;z-index:-1;" src="<?=URL_ROOT;?>/css/svg/header.svg" alt="" class="src"> -->
			<!-- Modal: For adding chemicals. First Plan -->
	<div id="modal" style="display:none;width: 100%;height: 100vh;background: rgba(51, 51, 51, 0.37);z-index: 999999;position: fixed;">
		<form>
			<section class="offices-msgs">
				<div class="alerts-notif" style="width: 66.66%;margin: 0 auto;position: relative;">
					<span class="modal-close" style="position: absolute;color: #fff;z-index: 9;right: 0;padding: 10px;background: green;top: -21px;border-radius: 50%;width: 20px;height: 20px;text-align: center;line-height: 20px;font-size: 20px;"><i class="fal fa-times"></i></span>
					<div class="alert-content no-fixed-height" style="display: flex;flex-direction: column;">
						<div class="content-head">
							<h2>Job Details</h2>
						</div>
					</div>
				</div>
			</section>
			<section class="offices-msgs">
				<div class="alerts-notif">
					<div class="alert-content">
						<div class="content-head">
							<h2>Site Activity Log</h2>
						</div>
						<div id="log">
							<ul id="content-log-list" class="mCustomScrollbar content fluid light" data-mcs-theme="inset-2-dark" style="height: 400px;width: 100%;">
								<?php for($i = 0; $i <= 10; $i++) :?>
								<li>
									<h3>You Posted A Job - Carpenter Required</h3>
									<time>02 Minutes Ago</time>
								</li>
								<?php endfor;?>
							</ul>
						</div>
					</div>
				</div>
				<div class="alerts-notif">
					<div class="alert-content">
						<div class="content-head">
							<h2>Recent request</h2>
						</div>
						<div class="ad-log">
							<ul class="mCustomScrollbar content fluid light" data-mcs-theme="inset-2-dark" style="height: 400px;width: 100%;">
								<?php for($i = 0; $i <= 10; $i++) :?>
								<li>							
									<span class="tg-adverified">Verified Ad</span>
									<h3>Brand new lenovo laptop i5 for sale</h3>
									<time datetime="2017-08-08">01 Day Ago</time>									
								</li>
								<?php endfor;?>
							</ul>
						</div>
					</div>
				</div>
			</section>
		</form>
	</div>			
	<!-- End Modal -->
	
	<!-- Right Sidebar -->
	<div class="request_side">
		<span><i class="fal fa-times"></i></span>
		<div class="req_details mCustomScrollbar content fluid light" data-mcs-theme="inset-2-dark" style="height: calc( 100vh - 100px );width:100%;">
			<div id="head_name">
				<div class="request_icon_wrapper m_icon">
					<div class="req_icon m_icon_req">
						<span>IV</span>
					</div>
					<div style="margin:5px;margin-top:11px;" class="m_head_req">
						<h3>Flower de Santa Ana</h3>
					</div>
					<p style="font:var(--font-quick-500-18);font-size:15px;">Flower Shop</p>
					<div id="m_req_status">
						<span><i class="far fa-ruble-sign"></i> 400.00</span>
					</div>
				</div>
			</div>
			<div class="actionButtonModal">
				<button>Delete</button>
				<button id="cancelDeletion">Update</button>
			</div>
		</div>
	</div>	
	<!-- End Right Sidebar -->

	<!-- Notification Modal -->
	<div class="m_notification" style="position:fixed;">
		<h3>Notification</h3>
		<div class="ad-log">
			<ul class="mCustomScrollbar content fluid light" data-mcs-theme="inset-2-dark" style="height: 400px;width: 100%;">
				<?php for($i = 0; $i <= 10; $i++) :?>
				<li style="padding-bottom:0px;margin-bottom:10px;border-bottom:1px solid #888;cursor:pointer;">							
					<!-- <span class="tg-adverified"><i class="fal fa-atom" style="padding-right:5px;"></i> user identification</span> -->
					<!-- <div class="m_tag_time">
						<label for="notification" class="notif_tag">Admin</label>
						<span>12:00 am</span>
					</div> -->
					<div class="request_icon_wrapper" style="margin-top:4px;margin-bottom:5px;">
						<div class="req_icon m_notif_icon">
							<span>KS</span>
						</div>
						<div style="margin:5px;" class="m_notif_content">
							<b>Kate Saycon</b>
							<h3>EDTA Disodium Salt dihydrate, crystal  </h3>
							<time datetime="2017-08-08">01 Day Ago</time>
						</div>
					</div>									
				</li>
				<?php endfor;?>
			</ul>
		</div>
	</div>
	<!-- End Notification Modal -->
	<main>
		<header class="dashboard-nav">
			<div id="add-post">
				<div class="search-dash" style="margin-top: 5px;">
					<div id="search-sort" style="width: 80%;">
						<input type="text" name="search" placeholder="Search on couples...." style="width: 10%;" id="admin-search-field">
						<i class="fal fa-search" style="left:0;"></i>
					</div>	
					<div class="dash-result">
						<div>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						</div>
					</div>				
				</div>
				<div>
					<div id="notif-icon">
						<button><i class="fal fa-envelope"></i></button>
						<span id="notif-counter">2</span>
					</div>
					<div id="notif-icon">
						<button><i class="fal fa-bell"></i></button>
						<span id="notif-counter">2</span>
					</div>
					<div style="display: flex;flex-direction: row;margin-left: 20px;vertical-align: middle;line-height: 45px;">
						<!-- <span style="font-family: 'quicksand';font-weight: 600;padding-left: 10px;">Administrator</span> -->
						<div style="width: 35px;height: 35px;border: 1px solid #666;margin-left: 10px;border-radius: 50%;background: #f3f3f3;background-image: url('<?=URL_ROOT;?>/img/prof.png');background-size: contain;background-repeat: no-repeat;background-position: center;">
							
						</div>
					</div>
				</div>
			</div>
			<section id="side-navigation" class="sideNav-full" style="margin-bottom: 100px;" >				
				<div class="clip-path">
					<span>
						<i class="fal fa-angle-left caret-left caret"></i>
						<i class="fal fa-angle-right caret-right caret"></i>
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="67" viewBox="0 0 20 67">
							<metadata>
								<!--?xpacket begin="﻿" id="W5M0MpCehiHzreSzNTczkc9d"?-->
									<x:xmpmeta xmlns:x="adobe:ns:meta/" x:xmptk="Adobe XMP Core 5.6-c138 79.159824, 2016/09/14-01:09:01">
										<rdf:rdf xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#">
											<rdf:description rdf:about=""></rdf:description>
										</rdf:rdf>
									</x:xmpmeta>
								<!--?xpacket end="w"?-->
							</metadata>
							<path id="bg" class="cls-1" d="M20,27.652V39.4C20,52.007,0,54.728,0,67.265,0,106.515.026-39.528,0-.216-0.008,12.32,20,15.042,20,27.652Z"></path>
						</svg>						
					</span>
				</div>
				<!--  data-simplebar -->
				<div id="navigation-scroll" class="mCustomScrollbar content fluid light" data-mcs-theme="inset-2-dark" style="height: 100%;width: 100%;">			
					<div id="logo-admin" dir="ltr"> 
						<div style="width: 70%;margin: 0 auto;">
							<img style="width: 100%;" src="<?=URL_ROOT;?>/img/default/logo.png" id="logo-icon" class="logo-show">
						</div>
					</div>
					<div id="admin-profile">
						<a href="#" id="check-couple" title="Create modal to and select all the clients to view the data of their events.">Check Couples <i class="far fa-rings-wedding" style="color:#fe5894;"></i></a>
						<div id="profile-container" class="adm-prof">
							<div id="admin-icon">
								<img src="<?=URL_ROOT;?>/img/prof.png">
							</div>
							<div id="admin-details">
								<h3>Hi! I'm Angela</h3>
								<p>Administrator</p>
							</div>
							<div id="admin-edit">
								<a href="<?=URL_ROOT;?>/admin/profile"><i class="fal fa-pencil"></i></a>
							</div>
						</div>
					</div>
					<nav>
						<div id="admin-details" class="menu-head">
							<h3>Menu</h3>
						</div>
						<ul id="menus-nav" style="padding-left: 20px;">
							<li data-link="<?=URL_ROOT;?>/<?=($_SESSION['is_admin'] && $_SESSION['is_client'] == 0) ? 'admin' : 'client'; ?>" class="<?=($_SESSION['menu_active']=="home") ? 'menu-active' : ''; ?>">
								<i class="fal fa-chart-bar"></i>
								<a href="#"> Dashboard</a>
							</li>
							<?php if($_SESSION['is_client']):?>
								<li data-link="<?=URL_ROOT;?>/admin/event" class="<?=($_SESSION['menu_active']=="event") ? 'menu-active' : ''; ?>">
									<i class="far fa-rings-wedding" style="color:#fe5894;"></i>
									<a href="#"> Event</a>
								</li>
							<?php endif;?>
							<li data-link="<?=URL_ROOT;?>/admin/messenger" class="<?=($_SESSION['menu_active']=="messages") ? 'menu-active' : ''; ?>">
								<i class="fal fa-envelope"></i>
								<a href="#"> Messages</a>
							</li>
							<li data-link="<?=URL_ROOT;?>/admin/profile" class="<?=($_SESSION['menu_active']=="profile") ? 'menu-active' : ''; ?>">
								<i class="fal fa-cog"></i>
								<a href="#"> Profile settings</a>
							</li>
							<li data-link="<?=URL_ROOT;?>/admin/posted" class="<?=($_SESSION['menu_active']=="request") ? 'menu-active' : ''; ?>">
								<i class="fal fa-cubes"></i>
								<a href="#"> Bookings</a>
							</li>
							<li data-link="<?=URL_ROOT;?>/admin/calendar" class="<?=($_SESSION['menu_active']=="calendar") ? 'menu-active' : ''; ?>">
								<i class="fal fa-calendar-alt"></i>
								<a href="#"> Calendar of Events</a>
							</li>
						</ul>
						<div id="admin-details" class="menu-head">
							<h3>Vendors</h3>
						</div>
						<ul id="menus-nav" style="padding-left: 20px;padding-bottom:60px;">
							<li data-link="<?=URL_ROOT;?>/admin/photographer" class="<?=($_SESSION['menu_active']=="photographer") ? 'menu-active' : ''; ?>">
								<i class="fal fa-camera-retro"></i>
								<a href="#"> Photography</a>
							</li>
							<li data-link="<?=URL_ROOT;?>/admin/attire" class="<?=($_SESSION['menu_active']=="attire") ? 'menu-active' : ''; ?>">
								<i class="fal fa-tshirt"></i>
								<a href="#"> Attire & Beauty</a>
							</li>
							<li data-link="<?=URL_ROOT;?>/admin/food" class="<?=($_SESSION['menu_active']=="food") ? 'menu-active' : ''; ?>">
								<i class="fas fa-burger-soda"></i>
								<a href="#"> Food</a>
							</li>
							<li data-link="<?=URL_ROOT;?>/admin/flower" class="<?=($_SESSION['menu_active']=="flower") ? 'menu-active' : ''; ?>">
								<i class="fal fa-flower-tulip"></i>
								<a href="#"> Flowers</a>
							</li>
							<li data-link="<?=URL_ROOT;?>/users/signout">
								<i class="fal fa-sign-out"></i>
								<a href="#"> Logout</a>
							</li>
						</ul>
					</nav>
				</div>
			</section>
		</header>
	
	