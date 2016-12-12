<!doctype html> <!--
paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!-- Consider adding a manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
	<!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<!-- DNS prefetch -->
		<link rel=dns-prefetch href="//fonts.googleapis.com">
		<!-- Use the .htaccess and remove these lines to avoid edge case issues.
		More info: h5bp.com/b/378 -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Admin :: Home</title>
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Mobile viewport optimized: j.mp/bplateviewport -->
		<meta name="viewport" content="width=device-width,initial-scale=1">

		<!-- <link rel="shortcut icon" href="<?php echo base_url();?>design/favicon.png" /> -->
		<!-- Place favicon.ico and apple-touch-icon.png in the root directory:
		mathiasbynens.be/notes/touch-icons -->

		<script src="http://code.jquery.com/jquery-latest.js"></script>
		
       
		<!-- CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/design/Template/css/960gs/fluid.css">
		<!-- 960.gs Grid System -->
		<!-- The HTML5-Boilerplate CSS styling -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/design/Template/css/h5bp/normalize.css">
		<!-- RECOMMENDED: H5BP reset styles -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/design/Template/css/h5bp/non-semantic.helper.classes.css">
		<!-- RECOMMENDED: H5BP helpers (e.g. .clear or .hidden) -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/design/Template/css/h5bp/print.styles.css">
		<!-- OPTIONAL: H5BP print styles -->
		<!-- The main styling -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/design/Template/css/sprites.css">
		<!-- STRONGLY RECOMMENDED: Basic sprites (e.g. buttons, jGrowl) -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/design/Template/css/header.css">
		<!-- REQUIRED: Header styling -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/design/Template/css/navigation.css">
		<!-- REQUIRED: Navigation styling -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/design/Template/css/sidebar.css">
		<!-- OPTIONAL: Sidebar -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/design/Template/css/content.css">
		<!-- REQUIRED: Content styling -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/design/Template/css/footer.css">
		<!-- REQUIRED: Footer styling -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/design/Template/css/typographics.css">
		<!-- REQUIRED: Typographics -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/design/Template/css/ie.fixes.css">
		<!-- OPTIONAL: Fixes for IE7 -->
		<!-- Sprites styling -->
		<link rel="stylesheet" href="<?php echo base_url();?>design/Template/css/sprite.tables.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>/design/Template/css/sprite.forms.css">
		<!-- Sprite -gallery styling -->
		<link rel="stylesheet" href="<?php echo base_url();?>design/Template/css/sprite.gallery.css"> <!-- SPRITES: Gallery styling -->
		<!-- SPRITE: Forms styling -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/design/Template/css/sprite.lists.css">
		<!-- SPRITE: Lists styling -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/design/Template/css/icons.css">
		<!-- Icons -->
		<!-- Styling of JS plugins -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/design/Template/css/external/jquery-ui-1.8.16.custom.css">
		<!-- PLUGIN: jQuery UI styling -->

		<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />

		<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
		<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>

		<script src="<?php echo base_url(); ?>design/Template/js/jquery.validate.js"></script>
		<!-- More ideas for your <head> here: h5bp.com/d/head-Tips -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/design/Template/css/sidebar.css">
		<!-- TODO: Remove this line! -->
		<!-- All JavaScript at the bottom, except this Modernizr build incl. Respond.js
		Respond is a polyfill for min/max-width media queries. Modernizr enables HTML5
		elements & feature detects;
		for optimal performance, create your own custom Modernizr build:
		www.modernizr.com/download/ -->
		<script src="<?php echo base_url(); ?>/design/Template/js/libs/modernizr-2.0.6.min.js"></script>

		<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script> -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	

	</head>

	<body>

		<!-- Begin of #height-wrapper -->
		<div id="height-wrapper">
			<!-- Begin of header -->
			<header>
				<!-- Begin of the header toolbar -->
				<div id="header_toolbar">
					<div class="container_12">
						<h1 class="grid_8">Admin Panel</h1>
						<!-- Start of right part -->
						<div class="grid_4">
							<!-- A small toolbar button -->
							<div class="toolbar_small">

							</div>
							<!-- End of small toolbar button -->

							<!-- A large toolbar button -->
							<div class="toolbar_large">
								<div class="toolbutton">
									<div class="toolicon">
										<img src="<?php echo base_url(); ?>/design/Template/img/icons/16x16/user.png" width="16" height="16" alt="user" >
									</div>
									<div class="toolmenu">
										<div class="toolcaption">
											<span>Administrator</span>
										</div>
										<!-- Start of menu -->
										<div class="dropdown"  style="min-width:100px;">
											<ul>
												<li>
													<a href="<?php echo site_url('admin/change_psw'); ?>">Change password</a>
												</li>

												<li>
													<a href="<?php echo site_url(); ?>" target="_blank">Frontend</a>
												</li>
												<li>
													<a href="<?php echo site_url('login/logout'); ?>">Logout</a>
												</li>
											</ul>
										</div>
										<!-- End of menu -->
									</div>
								</div>
							</div>
							<!-- End of large toolbar button -->
						</div>
						<!-- End of right part -->
					</div>
				</div>
				<!-- End of the header toolbar -->

				<!-- Start of the main header bar -->
				<nav id="header_main">
					<div class="container_12">
						<!-- Start of the main navigation -->
						<ul id="nav_main">
							
							<li class="<?php echo $home;?>">
								<a href="<?php echo site_url('admin/home'); ?>"> <img src="<?php echo base_url(); ?>/design/Template/img/icons/25x25/dark/home.png" width=25 height=25 alt=""> Home</a>
								<ul>
									<li>
										<a href=""></a>
									</li>
								</ul>
							</li>

							<li class="<?php echo $gallery;?>">
								<a href="<?php echo site_url('admin/gallery'); ?>"> <img src="<?php echo base_url(); ?>/design/Template/img/icons/25x25/dark/film-strip.png" width=25 height=25 alt=""> Gallery</a>
								<ul>

								</ul>
							</li>
							<li class="<?php echo $articles;?>">
								<a href="<?php echo site_url('admin/articles'); ?>"> <img src="<?php echo base_url(); ?>/design/Template/img/icons/25x25/dark/create---write.png" width=25 height=25 alt=""> Articles</a>
								<ul>

								</ul>
							</li>
							<li class="<?php echo $tables;?>">
								<a href="<?php echo site_url('admin/listing'); ?>"> <img src="<?php echo base_url(); ?>/design/Template/img/icons/25x25/dark/list.png" width=25 height=25 alt=""> Tables</a>
								<ul>

								</ul>
							</li>
							<li class="<?php echo $charts;?>">
								<a href="<?php echo site_url('admin/chart'); ?>"> <img src="<?php echo base_url(); ?>/design/Template/img/icons/25x25/dark/graph-2" width=25 height=25 alt=""> Charts</a>
								<ul>

								</ul>
							</li>
							<li class="<?php echo $lists;?>">
								<a href="<?php echo site_url('admin/lists'); ?>"> <img src="<?php echo base_url(); ?>/design/Template/img/icons/25x25/dark/frames.png" width=25 height=25 alt=""> Lists</a>
								<ul>

								</ul>
							</li>
							<li class="<?php echo $tabs;?>">
								<a href="<?php echo site_url('admin/tabs'); ?>"> <img src="<?php echo base_url(); ?>/design/Template/img/icons/25x25/dark/expos-.png" width=25 height=25 alt=""> Tabs</a>
								<ul>

								</ul>
							</li>
						</ul>
						<!-- End of the main navigation -->
					</div>
				</nav>
				<div id="nav_sub"></div>
			</header>

			<!-- Start of the content -->
<div role="main" class="container_12" id="content-wrapper">

<aside>
	
	<div id="sidebar_top">
    <div class="userinfo">
        <div class="info">
            <div class="avatar">
                <img  src="<?php echo base_url();?>/design/Template/img/sprites/userinfo/avatar.png">
            </div>
            <a href="#">Admin</a>
        </div>
        <ul class="links">
            <li>
                <strong><a href="#">Administrator</a></strong>
            </li>
            <li>
                <a href="<?php echo site_url('admin/change_psw');?>">Settings</a>
            </li>
            <li>
                <a href="<?php echo site_url('login/logout');?>">Logout</a>
            </li>
        </ul>
        <div class="clear"></div>
    </div>
</div>

	<div id="sidebar_content">
		
	</div>
</aside><!-- End of the sidebar-->