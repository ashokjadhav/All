<!doctype html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8">
		<link rel=dns-prefetch href="//fonts.googleapis.com">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Admin Panel</title>
		<meta name="description" content="">
		<meta name="author" content="">
		<style>
			display: inline-block;
			width: 30px;
			height: 30px;
			text-align: center;
			cursor: pointer;
			background-image: url('../img/arrow.png');
			background-repeat: no-repeat;
			line-height: 600%;
			overflow: hidden;
		</style>
		<meta name="viewport" content="width=device-width,initial-scale=1">

		<!-- CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/design/Template/css/960gs/fluid.css"> <!-- 960.gs Grid System -->
		<!-- The HTML5-Boilerplate CSS styling -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/design/Template/css/h5bp/normalize.css"> <!-- RECOMMENDED: H5BP reset styles -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/design/Template/css/h5bp/non-semantic.helper.classes.css"> <!-- RECOMMENDED: H5BP helpers (e.g. .clear or .hidden) -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/design/Template/css/h5bp/print.styles.css"> <!-- OPTIONAL: H5BP print styles -->
		<!-- The main styling -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/design/Template/css/sprites.css"> <!-- STRONGLY RECOMMENDED: Basic sprites (e.g. buttons, jGrowl) -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/design/Template/css/header.css"> <!-- REQUIRED: Header styling -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/design/Template/css/navigation.css"> <!-- REQUIRED: Navigation styling -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/design/Template/css/sidebar.css"> <!-- OPTIONAL: Sidebar -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/design/Template/css/content.css"> <!-- REQUIRED: Content styling -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/design/Template/css/footer.css"> <!-- REQUIRED: Footer styling -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/design/Template/css/typographics.css"> <!-- REQUIRED: Typographics -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/design/Template/css/ie.fixes.css"> <!-- OPTIONAL: Fixes for IE7 -->
		<!-- Sprites styling -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/design/Template/css/sprite.forms.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>/design/Template/css/sprite.tables1.css">
		<!-- SPRITE: Forms styling -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/design/Template/css/sprite.lists.css"> <!-- SPRITE: Lists styling -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/design/Template/css/icons.css">
		<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css">
		 <!-- Icons -->
		<!-- Styling of JS plugins -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/design/Template/css/external/jquery-ui-1.8.16.custom.css">	<!-- PLUGIN: jQuery UI styling -->
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
		<!-- More ideas for your <head> here: h5bp.com/d/head-Tips -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/design/Template/css/sidebar.css"> <!-- TODO: Remove this line! -->
		<link href="<?php echo base_url();?>public/css/datetimepicker.css" type="text/css" rel="stylesheet">

		<script src="<?php echo base_url(); ?>/design/Template/js/libs/modernizr-2.0.6.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script type='text/javascript' src='<?php echo			base_url();?>public/jquery/jquery.datetimepicker.js'></script>
		<style>
			 .dialogFixed{
			 position:fixed !important;
			 }
			 .ui-autocomplete {
						max-height: 200px;
						overflow-y: auto;
						/* prevent horizontal scrollbar */
						overflow-x: hidden;
						/* add padding to account for vertical scrollbar */

			}

		</style>
		<script type="text/javascript">
			$(document).ready(function () {
			 //return false;
			$('#jdate').datepicker({
                    dateFormat: "yy-mm-dd",
					 changeMonth: true,
                     changeYear: true,
					//minDate: '0d'
            });

			$('#sdate').datepicker({
                    dateFormat: "yy-mm-dd",
					 changeMonth: true,
                     changeYear: true,
					//minDate: '0d'
            });
            $('#deadline1').datepicker({
                    dateFormat: "yy-mm-dd",
					minDate: '0d',
					 changeMonth: true,
              changeYear: true,
            });

			$('#deadline').datepicker({
                    dateFormat: "yy-mm-dd",
						changeMonth: true,
              changeYear: true,
            });


            $('#don').datepicker({
                    dateFormat: "yy-mm-dd",
					changeMonth: true,
              changeYear: true,
					//minDate: '0d',
					 onSelect: function(dateStr) {
						$('#date2').datepicker({
                    dateFormat: "yy-mm-dd",
					changeMonth: true,
              changeYear: true,

            });

			var newDate = $(this).datepicker('getDate');

			$('#date2').datepicker('option','minDate', newDate);
			},

                });
				  $('#date').datepicker({
                    dateFormat: "yy-mm-dd",
					changeMonth: true,
              changeYear: true,
				   // minDate: '0d',
					onSelect: function(dateStr) {
						$('#date2').datepicker({
                    dateFormat: "yy-mm-dd",
					changeMonth: true,
              changeYear: true,

                });
           var newDate = $(this).datepicker('getDate');

     //$('#date2').datepicker('setDate', newDate);
     $('#date2').datepicker('option','minDate', newDate);
},
                });

				$('.dos').datepicker({

                    dateFormat: "yy-mm-dd",
					altField: "#" + $(this).attr('id'),
					changeMonth: true,
              changeYear: true,
				    //minDate: '0d'
                });
				$('.due_date').datepicker({

                    dateFormat: "yy-mm-dd",
					altField: "#" + $(this).attr('id'),
					changeMonth: true,
              changeYear: true,
				    //minDate: '0d'
                });
				$('#fini').datepicker({
                    dateFormat: "yy-mm-dd",
					changeMonth: true,
              changeYear: true,
				   // minDate: '0d',
					onSelect: function(dateStr) {
						$('#ffin').datepicker({
                    dateFormat: "yy-mm-dd",
					changeMonth: true,
              changeYear: true,

                });
           var newDate = $(this).datepicker('getDate');

     //$('#date2').datepicker('setDate', newDate);
     $('#ffin').datepicker('option','minDate', newDate);
},
                });
		});

		</script>

     <script type="text/javascript">
		 $(document).ready(function () {


			$('#dob').datepicker({
                    dateFormat: "yy-mm-dd",
					changeMonth: true,
              changeYear: true,
			 yearRange: '-100y:c+nn',
                     //maxDate: '-1d'
                });
				$('#dop').datepicker({
                    dateFormat: "yy-mm-dd",
					changeMonth: true,
              changeYear: true,
                     //maxDate: '-1d'
                });
				 $('#doh').datepicker({
                    dateFormat: "yy-mm-dd",
					changeMonth: true,
              changeYear: true,

                });

        //$('.flora.ui-dialog').css({position:"fixed"});
		$('a.view-answer').click(function() {

			var id = $(this).attr('id');
			var target = $('#main_content');
			$( "#dialog_"+id ).dialog({
				 dialogClass: 'dialogFixed',
				width:400,
				/*position: {   my: 'center',
    at: 'center',
    of: window
		},*/
			});
		});
		});

		</script>

       <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

	</head>

	<body>
<?php $priv = $this->session->userdata('privileges');
//echo "<pre>";
//print_r($priv);exit;?>
		<!-- Begin of #height-wrapper -->
		<div id="height-wrapper">
			<!-- Begin of header -->
			<header>
				<!-- Begin of the header toolbar -->
				<div id="header_toolbar">
					<div class="container_12">
						<h1 class="grid_8"> Nexus - Admin Template</h1>
						<!-- Start of right part -->
						<div class="grid_4">
							<!-- A small toolbar button -->
							<div class="toolbar_small">

							</div> <!-- End of small toolbar button -->

							<!-- A large toolbar button -->
							<div class="toolbar_large">
								<div class="toolbutton">
									<div class="toolicon">
										<img src="<?php echo base_url();?>/design/Template/img/icons/16x16/user.png" width="16" height="16" alt="user" >
									</div>
									<div class="toolmenu">
										<div class="toolcaption">
											<span><?php echo $this->session->userdata('username1');?></span>
										</div>
										<!-- Start of menu -->
										<div class="dropdown">
											<ul>
												<li>
													<a target="_blank" href="<?php echo site_url();?>">Frontend</a>
												</li>
												<?php if(isset($priv['settings']) || $priv == 'All'){?>
												<li>
													<a href="<?php echo base_url('admin/settings'); ?>">Settings</a>
												</li>
												<?php }?>
												<li>
													<a href="<?php echo base_url('admin/logout'); ?>">Logout</a>
												</li>
											</ul>
										</div> <!-- End of menu -->
									</div>
								</div>
							</div> <!-- End of large toolbar button -->
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

					<li class="<?php if($tab=='dashboard'){echo 'current';}?>">
						<a href="<?php echo site_url('admin/dashboard');?>">
							<img src="<?php echo base_url();?>/design/Template/img/icons/25x25/dark/computer-imac.png" width=25 height=25 alt="">
						Dashboard
						</a>

					</li>
	<?php if($priv == 'All'){ ?>
					<li class="<?php if($tab=='category' || $tab=='sub_category' || $tab=='resource_management' || $tab=='lending_management' || $tab=='borrowed' || $tab=='returned' || $tab=='lost'){echo 'current';}?>">
						<a href="#">
							<img src="<?php echo base_url();?>/design/Template/img/icons/25x25/dark/books-2.png" width=25 height=25 alt="">
							Library
						</a>
						<ul>
							<li>
								<a href="<?php echo site_url('admin/category');?>">Category</a>
							</li>
							<li>
								<a href="<?php echo site_url('admin/sub_category');?>">SubCategory</a>
							</li>
							<li>
								<a href="<?php echo site_url('admin/resource_management');?>">Resource		Management
								</a>
							</li>
							<li>
								<a href="<?php echo site_url('admin/lending_management');?>">Lending Management</a>
							</li>
						</ul>
					</li>
					<li class="<?php if($tab=='my_medals' || $tab=='special_assignments' || $tab=='kra' || $tab=='kpi' || $tab=='training_programs'){echo 'current';}?>">
								<a href="#">
								<img src="<?php echo base_url();?>/design/Template/img/icons/25x25/dark/clipboard.png" width=25 height=25 alt="">
								Dashboard Postings</a>
								<ul>
                                                                                                                                                    <li>
										<a href="<?php echo site_url('admin/my_medals');?>">Medals</a>
									</li>
									   <li>
										<a href="<?php echo site_url('admin/special_assignments');?>">Special Assignments</a>
									</li>

									<li>
										<a href="<?php echo site_url('admin/kra');?>">KRAs</a>
									</li>
									<li>
										<a href="<?php echo site_url('admin/kpi');?>">KPIs</a>
									</li>
									<li>
										<a href="<?php echo site_url('admin/training_programs');?>">Training Programs</a>
									</li>

								</ul>
							</li>
							<li class="<?php if($tab=='elearning_category' || $tab=='articles' || $tab=='elearning_slides' || $tab=='elearning_videos' || $tab=='book_summary' || $tab=='quiz_subcategory' || $tab=='elearning_quiz'
   || $tab=='quiz_scores' || $tab=='elearning_totaltime'){echo 'current';}?>">
								<a href="#">
								<img src="<?php echo base_url();?>/design/Template/img/icons/25x25/dark/address-book-5.png" width=25 height=25 alt="">
								E-learning</a>
								<ul>
                                   <li>
										<a href="<?php echo site_url('admin/elearning_category');?>">Category</a>
									</li>                                                                                                   <li>
										<a href="<?php echo site_url('admin/articles');?>">Articles</a>
									</li>
									   <li>
										<a href="<?php echo site_url('admin/elearning_slides');?>">Slides & Pdfs</a>
									</li>
									<li>
										<a href="<?php echo site_url('admin/elearning_videos');?>">Videos</a>
									</li>
									<li>
										<a href="<?php echo site_url('admin/book_summary');?>">Book Summary</a>
									</li>
                        <li>
					<a href="<?php echo site_url('admin/quiz_subcategory');?>">Quiz Sub-category</a>
									</li>
									<li>
										<a href="<?php echo site_url('admin/elearning_quiz');?>">Quiz</a>
										</li>
									<li>
										<a href="<?php echo site_url('admin/quiz_scores');?>">Quiz Scores</a>
									</li>
									<li>
										<a href="<?php echo site_url('admin/elearning_totaltime');?>">Elearning Time</a>
									</li>
								</ul>
							</li>
							<li class="<?php if($tab=='travel_airlines' || $tab=='travel_locations' || $tab=='approve_authority' || $tab=='travel_requests' || $tab=='hotel_requests'|| $tab=='ticket_modified' || $tab=='ticket_cancelled' || $tab=='ticket_approved' || $tab=='guesthouse_locations' || $tab=='hotel_locations'){echo 'current';}?>">
								<a href="#">
								<img src="<?php echo base_url();?>/design/Template/img/icons/25x25/dark/airplane.png" width=25 height=25 alt="">
								Travel Desk</a>
								<ul>
                                                                                                                                          <li>
										<a href="<?php echo site_url('admin/travel_airlines');?>">Airlines</a>
									</li>
									   <li>
										<a href="<?php echo site_url('admin/travel_locations');?>">Locations</a>
									</li>
									<li>
										<a href="<?php echo site_url('admin/approve_authority');?>">Approving Authority</a>
									</li>
									<li>
										<a href="<?php echo site_url('admin/travel_requests');?>">Travel Requests</a>
									</li>
									<!--<li>
										<a href="<?php echo site_url('admin/hotel_requests');?>">Hotel & GuestHouse Requests</a>
									</li>-->

								</ul>
							</li>
	<?php }else{ ?>
				<?php if(isset($priv['category']) || isset($priv['sub_category']) || isset($priv['resource_management']) || isset($priv['borrowed']) || isset($priv['lost']) || isset($priv['returned']) || isset($priv['lending_management'])){?>
					<li class="<?php if($tab=='category' || $tab=='sub_category' || $tab=='resource_management' || $tab=='lending_management' || $tab=='borrowed' || $tab=='returned' || $tab=='lost'){echo 'current';}?>">
						<a href="#">
							<img src="<?php echo base_url();?>/design/Template/img/icons/25x25/dark/books-2.png" width=25 height=25 alt="">
								Library
						</a>
						<ul>
						<?php if(isset($priv['category'])){?>												<li>
								<a href="<?php echo site_url('admin/category');?>">Category</a>
							</li>
							<?php }if(isset($priv['sub_category'])){?>
								<li>
									<a href="<?php echo site_url('admin/sub_category');?>">SubCategory</a>
								</li>
							<?php }?>
							<?php if(isset($priv['resource_management'])){?>
								<li>
									<a href="<?php echo site_url('admin/resource_management');?>">Resource Management</a>
								</li>
							<?php }?>
							<?php if(isset($priv['lending_management']) || isset($priv['borrowed']) || isset($priv['returned']) || isset($priv['lost']) ){?>

								<li>
									<a href="<?php echo site_url('admin/lending_management');?>">Lending Management</a>
								</li>
							<?php }?>
						</ul>
					</li>
				<?php }?>
				<?php if(isset($priv['my_medals']) || isset($priv['special_assignments']) || isset($priv['kra']) || isset($priv['kpi']) ||isset($priv['training_programs'])){?>


					<li class="<?php if($tab=='my_medals' || $tab=='special_assignments' || $tab=='kra' || $tab=='kpi' || $tab=='training_programs'){echo 'current';}?>">
								<a href="#">
								<img src="<?php echo base_url();?>/design/Template/img/icons/25x25/dark/clipboard.png" width=25 height=25 alt="">
								Dashboard Postings</a>
								<ul>
                                    <?php if(isset($priv['my_medals'])){?>		                                                                                            <li>
										<a href="<?php echo site_url('admin/my_medals');?>">Medals</a>
									</li>
									<?php }?>
									<?php if(isset($priv['special_assignments'])){?>
									   <li>
										<a href="<?php echo site_url('admin/special_assignments');?>">Special Assignments</a>
									</li>
									<?php }?>
									<?php if(isset($priv['kra'])){?>
									<li>
										<a href="<?php echo site_url('admin/kra');?>">KRAs</a>
									</li>
									<?php }?>
									<?php if(isset($priv['kpi'])){?>
									<li>
										<a href="<?php echo site_url('admin/kpi');?>">KPIs</a>
									</li>
									<?php }?>
									<?php if(isset($priv['training_programs'])){?>
									<li>
										<a href="<?php echo site_url('admin/training_programs');?>">Training Programs</a>
									</li>
									<?php }?>
								</ul>
							</li>
							<?php }?>
		<?php if(isset($priv['elearning_category']) || isset($priv['articles']) || isset($priv['elearning_slides']) || isset($priv['elearning_videos']) || isset($priv['book_summary']) || isset($priv['quiz_subcategory']) || isset($priv['elearning_quiz']) || isset($priv['quiz_scores']) || isset($priv['elearning_totaltime'])){?>
						<li class="<?php if($tab=='elearning_category' || $tab=='articles' || $tab=='elearning_slides' || $tab=='elearning_videos' || $tab=='book_summary' || $tab=='quiz_subcategory' || $tab=='elearning_quiz' || $tab=='quiz_scores' || $tab=='elearning_totaltime'){echo 'current';}?>">
								<a href="#">
								<img src="<?php echo base_url();?>/design/Template/img/icons/25x25/dark/address-book-5.png" width=25 height=25 alt="">
								E-learning</a>
								<ul>
								<?php if(isset($priv['elearning_category'])){?>
                                   <li>
										<a href="<?php echo site_url('admin/elearning_category');?>">Category</a>
								   </li>
								   <?php }?>
								   <?php if(isset($priv['articles'])){?>
								   <li>
										<a href="<?php echo site_url('admin/articles');?>">Articles</a>
								   </li>
								   <?php }?>
								   <?php if(isset($priv['elearning_slides'])){?>
								   <li>
										<a href="<?php echo site_url('admin/elearning_slides');?>">Slides & Pdfs</a>
									</li>
									<?php }?>
									<?php if(isset($priv['elearning_videos'])){?>
									<li>
										<a href="<?php echo site_url('admin/elearning_videos');?>">Videos</a>
									</li>
									<?php }?>
									<?php if(isset($priv['book_summary'])){?>
									<li>
										<a href="<?php echo site_url('admin/book_summary');?>">Book Summary</a>
									</li>
									<?php }?>
									<?php if(isset($priv['quiz_subcategory'])){?>
									<li>
									<a href="<?php echo site_url('admin/quiz_subcategory');?>">Quiz Sub-category</a>
									</li>
									<?php }?>
									<?php if(isset($priv['elearning_quiz'])){?>
									<li>
										<a href="<?php echo site_url('admin/elearning_quiz');?>">Quiz</a>
									</li>
									<?php }?>
									<?php if(isset($priv['quiz_scores'])){?>
									<li>
										<a href="<?php echo site_url('admin/quiz_scores');?>">Quiz Scores</a>
									</li>
									<?php }?>
									<?php if(isset($priv['elearning_totaltime'])){?>
									<li>
										<a href="<?php echo site_url('admin/elearning_totaltime');?>">Elearning Time</a>
									</li>
									<?php }?>
								</ul>
							</li>
					<?php }?>
					<?php if(isset($priv['travel_airlines']) || isset($priv['travel_locations']) || isset($priv['approve_authority']) || isset($priv['travel_requests']) || isset($priv['hotel_requests']) || isset($priv['ticket_modified']) || isset($priv['ticket_cancelled']) || isset($priv['ticket_approved']) || isset($priv['guesthouse_locations']) || isset($priv['hotel_locations'])){?>
							<li class="<?php if($tab=='travel_airlines' || $tab=='travel_locations' || $tab=='approve_authority' || $tab=='travel_requests' || $tab=='hotel_requests'|| $tab=='ticket_modified' || $tab=='ticket_cancelled' || $tab=='ticket_approved' || $tab=='guesthouse_locations' || $tab=='hotel_locations'){echo 'current';}?>">
								<a href="#">
								<img src="<?php echo base_url();?>/design/Template/img/icons/25x25/dark/airplane.png" width=25 height=25 alt="">
								Travel Desk</a>
								<ul>
                                    <?php if(isset($priv['travel_airlines'])){?>                        <li>
										<a href="<?php echo site_url('admin/travel_airlines');?>">Airlines</a>
									</li>
									<?php }?>
									<?php if(isset($priv['travel_locations']) || isset($priv['hotel_locations']) || isset($priv['guesthouse_locations'])){?>
									 <li>
										<a href="<?php echo site_url('admin/travel_locations');?>">Locations</a>
									</li>
									<?php }?>
									<?php if(isset($priv['approve_authority'])){?>
									<li>
										<a href="<?php echo site_url('admin/approve_authority');?>">Approving Authority</a>
									</li>
									<?php }?>
									<?php if(isset($priv['travel_requests']) || isset($priv['ticket_modified']) || isset($priv['ticket_cancelled']) || isset($priv['ticket_approved'])){?>
									<li>
										<a href="<?php echo site_url('admin/travel_requests');?>">Travel Requests</a>
									</li>
									<?php }?>
									<?php if(isset($priv['hotel_requests'])){?>
									<li>
										<a href="<?php echo site_url('admin/hotel_requests');?>">Hotel & GuestHouse Requests</a>
									</li>
									<?php }?>

								</ul>
							</li>
        <?php }}?>





									<!-- End of the main navigation -->
					</div>
				</nav>
				<div id="nav_sub"></div>
			</header>

			<!-- Start of the content -->
			<div role="main" class="container_12" id="content-wrapper">
				<!-- Start of the sidebar -->
				<aside>
					<div id="sidebar_top">
						<div class="userinfo">
							<div class="info">
								<div class="avatar">
									<img src="<?php echo base_url();?>/public/images/nexus-logo.jpg" width="100" height="40" alt="Nexus">
								</div>
								<!--<a href="#">3</a>-->
							</div>
							<ul class="links">
								<li>
									<strong><a href="#"><?php echo $this->session->userdata('username1');?></a></strong>
								</li>
								<?php if(isset($priv['settings'])  || $priv == 'All'){?>
								<li>
									<a href="<?php echo base_url('admin/settings'); ?>">Settings</a>
								</li>
<?php }?>
								<li>
									<a href="<?php echo base_url('admin/logout'); ?>">Logout</a>
								</li>

							</ul>
							<div class="clear"></div>
						</div>
					</div>

				</aside><!-- End of the sidebar-->

				<!-- Start of the main content -->
				<div id="main_content">
				<?php {


					$this->load->view($middle);
			}?>
				</div> <!-- End of #main_content -->


			<div class="push clear"></div>
			</div> <!-- End of #content-wrapper -->
			<div class="clear"></div>
			<!-- <div class="push"></div> --> <!-- BUGFIX if problems with sidebar in Chrome -->
		</div> <!-- End of #height-wrapper -->

		<!-- Start of footer-->
		<footer>
			<div class="container_12">
				Copyright &copy; 2015 NeoSoft, all rights reserved.
				<div id="button_bar">
					<ul>
						<li>
							<span><a href="<?php echo site_url('admin/dashboard');?>">Dashboard</a></span>
						</li>
						<?php if(isset($priv['settings'])  || $priv == 'All'){?>
						<li>
							<span><a href="<?php echo site_url('admin/settings');?>">Settings</a></span>
						</li>
						<?php }?>
					</ul>
				</div>
			</div>
		</footer><!-- End of footer-->

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js"></script>
		<script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>/design/Template/js/libs/jquery-1.7.1.js"><\/script>')</script>
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
		<script>window.jQuery.ui || document.write('<script src="<?php echo base_url(); ?>/design/Template/js/libs/jquery-ui-1.8.16.min.js"><\/script>')</script>

		<script defer src="<?php echo base_url(); ?>/design/Template/js/plugins.js"></script> <!-- REQUIRED: Different own jQuery plugnis -->
		<script defer src="<?php echo base_url(); ?>/design/Template/js/mylibs/jquery.ba-resize.js"></script> <!-- RECOMMENDED when using sidebar: page resizing -->
		<script defer src="<?php echo base_url(); ?>/design/Template/js/mylibs/jquery.easing.1.3.js"></script> <!-- RECOMMENDED: box animations -->
		<script defer src="<?php echo base_url(); ?>/design/Template/js/mylibs/jquery.ui.touch-punch.js"></script> <!-- RECOMMENDED: touch compatibility -->
		<script defer src="<?php echo base_url(); ?>/design/Template/js/mylibs/jquery.chosen.js"></script>
		<script defer src="<?php echo base_url(); ?>design/Template/js/mylibs/jquery.validate.js"></script>
		<script defer src="<?php echo base_url(); ?>/design/Template/js/script.js"></script> <!-- REQUIRED: Generic scripts -->
		<!-- end scripts -->
		<script>
			$(window).load(function() {
				$('#accordion').accordion({ header: "h4", collapsible: true, active: false,autoHeight: false });

				$(window).resize();
			});
		</script>
	</body>
</html>
