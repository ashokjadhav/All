		<footer>
			<div class="container_12">
				Copyright &copy; 2013 <a href='http://www.web-werks.com/' target="_blank"><font color='#FFF'>Web-werks</font></a>, all rights reserved.
				<div id="button_bar">
					<ul>
						<li>
							<span><a href="dashboard.html">Dashboard</a></span>
						</li>
						<li>
							<span><a href="#">Settings</a></span>
						</li>
					</ul>
				</div>
			</div>
		</footer>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js"></script>
		<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.js"><\/script>')</script>
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
		<script>window.jQuery.ui || document.write('<script src="js/libs/jquery-ui-1.8.16.min.js"><\/script>')</script>	
		<script defer src="<?php echo base_url();?>/design/Template/js/plugins.js"></script> <!-- REQUIRED: Different own jQuery plugnis -->
		<script defer src="<?php echo base_url();?>/design/Template/js/mylibs/jquery.ba-resize.js"></script> <!-- RECOMMENDED when using sidebar: page resizing -->
		<script defer src="<?php echo base_url();?>/design/Template/js/mylibs/jquery.easing.1.3.js"></script> <!-- RECOMMENDED: box animations -->
		<script defer src="<?php echo base_url();?>/design/Template/js/mylibs/jquery.ui.touch-punch.js"></script> <!-- RECOMMENDED: touch compatibility -->
		<script defer src="<?php echo base_url();?>/design/Template/js/mylibs/jquery.chosen.js"></script>
		<script defer src="<?php echo base_url();?>/design/Template/js/mylibs/jquery.validate.js"></script>
		<script defer src="<?php echo base_url();?>design/Template/js/mylibs/jquery.prettyPhoto.js"></script><!-- required for gallery -->
		<script defer src="<?php echo base_url();?>/design/Template/js/script.js"></script> <!-- REQUIRED: Generic scripts -->
		<script>
			$(window).load(function() {
				$('#accordion').accordion();
				$(window).resize();
			});
		</script>
	</body>
</html>