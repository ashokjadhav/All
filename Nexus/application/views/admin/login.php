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
		<!-- Use the .htaccess and remove these lines to avoid edge case issues.
		More info: h5bp.com/b/378 -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Login :: Admin Template</title>
		<meta name="description" content="">
		<meta name="author" content="Simon Stamm & Markus Siemens">
		<!-- Mobile viewport optimized: j.mp/bplateviewport -->
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<!-- Place favicon.ico and apple-touch-icon.png in the root directory:
		mathiasbynens.be/notes/touch-icons -->
		
		<!-- CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>design/Template/css/960gs/fluid.css"> <!-- 960.gs Grid System -->
		<!-- The HTML5-Boilerplate CSS styling -->
		<link rel="stylesheet" href="<?php echo base_url();?>design/Template/css/h5bp/normalize.css"> <!-- RECOMMENDED: H5BP reset styles -->
		<link rel="stylesheet" href="<?php echo base_url();?>design/Template/css/h5bp/non-semantic.helper.classes.css"> <!-- RECOMMENDED: H5BP helpers (e.g. .clear or .hidden) -->
		<link rel="stylesheet" href="<?php echo base_url();?>design/Template/css/h5bp/print.styles.css"> <!-- OPTIONAL: H5BP print styles -->
		<!-- The special page's styling -->
		<link rel="stylesheet" href="<?php echo base_url();?>design/Template/css/special-page.css"> <!-- REQUIRED: Special page styling -->
		<link rel="stylesheet" href="<?php echo base_url();?>design/Template/css/sprites.css"> <!-- REQUIRED: Basic sprites (e.g. buttons, jGrowl) -->
		<link rel="stylesheet" href="<?php echo base_url();?>design/Template/css/typographics.css"> <!-- REQUIRED: Typographics -->
		<link rel="stylesheet" href="<?php echo base_url();?>design/Template/css/content.css"> <!-- REQUIRED: Content (we need the boxes) -->
		<link rel="stylesheet" href="<?php echo base_url();?>design/Template/css/sprite.forms.css"> <!-- SPRITE: Forms -->
		<link rel="stylesheet" href="<?php echo base_url();?>design/Template/css/ie.fixes.css"> <!-- OPTOINAL: Fixes for IE -->
		
		<!-- More ideas for your <head> here: h5bp.com/d/head-Tips -->
		<!-- All JavaScript at the bottom, except this Modernizr build incl. Respond.js
		Respond is a polyfill for min/max-width media queries. Modernizr enables HTML5
		elements & feature detects;
		for optimal performance, create your own custom Modernizr build:
		www.modernizr.com/download/ -->
		
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		
		<script src="<?php echo base_url(); ?>design/Template/js/jquery-latest.js"></script>
		<script src="<?php echo base_url(); ?>design/Template/js/jquery.validate.js"></script>

		<script src="<?php echo base_url();?>design/Template/js/libs/modernizr-2.0.6.min.js"></script>

		<script>
			$(document).ready(function(){
  			    
		    $("#form_test").validate({
				rules:{
					"user":
					{
						required:true,
						//NameReg: true
					},
					
					"psw":{
						required: true,
					}
				},
				
				messages:{
					"user": {
						required: "Please enter Username",
		               // NameReg: "Please enter a valid Username."
		                },
					"psw":{
						required: "Please enter Password",
					}
				}
			});
		  });
		</script>
	</head>
	<body class="special_page">
		<div class="top">
			<div class="gradient"></div>
			<div class="white"></div>
			<div class="shadow"></div>
		</div>
		<div class="content">
			<h1>Admin | Login</h1>
			<div class="background"></div>
			<div class="wrapper">
				<div class="box">
					<div class="header grey">
						<img src="<?php echo base_url();?>design/Template/img/icons/packs/fugue/16x16/lock.png" width="16" height="16">
						<h3>Login</h3>
					</div>
					<form method="post" id="form_test" action="<?php echo site_url('admin/login/check');?>" class="validate">
						<?php //echo form_open('login/checklogin');?>
						<div class="content no-padding">
							<?php if($msg = $this->session->flashdata('error')):?>
							<div class="alert error">
								<span class="icon"></span><span class="hide">x</span><strong>Error</strong> 
								<?php echo $msg;?>
							</div>
							<?php endif;?>
						 <?php if ($this->session->flashdata('success')) {
                ?>
                <div class="alert success">
                    <span class="icon"></span><span class="hide">x</span><strong>Success</strong>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php }?>
					
							
							<div class="section _100">
								<label>
									Username
								</label>
								<div>
									<input name="username" id="username" type="text" class="required"/>
									<label for="username" class="error red" style="display: none;width:50%">Please enter username</label>
								</div>
							</div>
							<div class="section _100">
								<label>
									Password
								</label>
								<div>
									<input name="password" id="password" type="password" class="required"/>
									<label for="password" class="error red" style="display: none;width:50%">Please enter password</label>
								</div>
							</div>
						</div>
						<div class="actions">
							<!--<div class="actions-left" style="margin-top: 8px;">
								<label for="newsletter">
									<input name="autologin" type="checkbox"/>
									Auto-login in future.
								</label>
							</div>-->
							<div class="actions-right">
								<input type="submit" value="Login"/>
							</div>
						</div>
					</form>
					<?php //echo form_close();?>
				</div>
				<div class="shadow"></div>
			</div>
		</div>
		
		
		<!-- JavaScript at the bottom for fast page loading -->
		<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.js"><\/script>')</script>
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
		<script>window.jQuery.ui || document.write('<script src="js/libs/jquery-ui-1.8.16.min.js"><\/script>')</script>
		
		<!-- scripts concatenated and minified via build script -->
		<script defer src="<?php echo base_url();?>design/Template/js/plugins.js"></script> <!-- REQUIRED: Different own jQuery plugnis -->
		<!-- <script defer src="<?php echo base_url();?>design/Template/js/mylibs/jquery.validate.js"></script> -->
		<script defer src="<?php echo base_url();?>design/Template/js/mylibs/jquery.jgrowl.js"></script>
		<script defer src="<?php echo base_url();?>design/Template/js/mylibs/jquery.checkbox.js"></script>
		<script defer src="<?php echo base_url();?>design/Template/js/mylibs/jquery.validate.js"></script>
		<script defer src="<?php echo base_url();?>design/Template/js/script.js"></script> <!-- REQUIRED: Generic scripts -->
		<!-- end scripts -->
		<!--<script>
		$(window).load(function(){
			/*
			 * Validate the form when it is submitted
			 */
			var validatelogin = $("form").validate({
				invalidHandler: function(form, validator) {
					var errors = validator.numberOfInvalids();
					if (errors) {
						var message = errors == 1
						  ? 'You missed 1 field. It has been highlighted.'
						  : 'You missed ' + errors + ' fields. They have been highlighted.';
						$('.box .content').removeAlertBoxes();
						$('.box .content').alertBox(message, {type: 'warning', icon: true, noMargin: false});
						$('.box .content .alert').css({
							width: '',
							margin: '0',
							borderLeft: 'none',
							borderRight: 'none',
							borderRadius: 0
						});
					} else {
						$('.box .content').removeAlertBoxes();
					}
				},
				showErrors : function(errorMap, errorList) {
						this.defaultShowErrors();
						var self = this;
						$.each(errorList, function() {
							var $input = $(this.element);
							var $label = $input.parent().find('label.error').hide();
							$label.addClass('red');
							$label.css('width', '');
							$input.trigger('labeled');
							$label.fadeIn();
						});
				}
				/* ,
				//submitHandler: function(form) {
					//window.location = "<?php echo base_url();?>index.php/login/checklogin"
					// window.location.replace('dashboard.html');
					
				//} */
			});
		});
		</script>-->		
		
		<!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to
		support IE 6.
		chromium.org/developers/how-tos/chrome-frame-getting-started -->
		<!--[if lt IE 7 ]>
		<script defer
		src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
		<script
		defer>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
		<![endif]-->
	</body>
</html>
