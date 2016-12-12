<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<!--<script src="<?php echo base_url();?>design/Template/js/jquery-latest.js"></script>-->
<script src="<?php echo base_url();?>design/Template/js/mylibs/jquery.validate.js"></script>
<script src="<?php echo base_url();?>/design/Template/js/md5.js"></script>


	<div id="main_content">
		
		<h2 class="grid_12">Change password</h2>
		<div class="clean"></div>

		<!-- End of .grid_12 -->
		<div class="clear"></div>

		<div class="grid_4" style="margin-left:20%;width:70%;">
			<div class="box">
				<div class="header">
					<img src="<?php echo base_url(); ?>/design/Template/img/icons/25x25/blue/cog.png" alt="" width="16"
					height="16">
					<h3>Change password</h3>
					<span></span>
				</div>
				<form id="form_test" action="<?php echo site_url('admin/settings/psw_change'); ?>" method="post" class="validate">
					<div class="content no-padding">
						<?php if($msg = $this->session->flashdata('error')):?>
						<div class="alert error">
							<span class="icon"></span><span class="hide">x</span><strong>Error</strong> 
							<?php echo $msg;?>
						</div>
						<?php endif;?>
						<div class="section _100">
							

							<label for="blogpost-title"> Username : </label>
							<div>
								<input class="required" readonly name="uname" id="uname" value="<?php echo $this->session->userdata('username1');?>" style="width:55%;">
								<label class="error red" for="uname" id="fill_name" style="width:53%;margin-top:-2%;display:none;">Please fill Username.</label>
								<!-- <div id="fill_name">Please fill user name</div> -->
							</div>
						</div>
						<div class="section _100">
							<label for="blogpost-title"> Old password : </label>
							<div>
								<input class="required" type="password" name="old_psw" id="old_psw" style="width:55%;" onchange="chk_prev_psw()">
								<label class="error red" for="old_psw" id="chk_prev_psw" style="margin-top:-2%;width:53%;display:none;">Please fill Original password.</label>
								

							</div>
						</div>
						<div class="section _100">
							<label for="blogpost-title"> New password : </label>
							<div>
								<input class="required" type="password" name="psw" id="psw" style="width:55%;">
								<label class="error red" for="psw" id="fill_new_psw" style="margin-top:-2%;width:53%;display:none;">Please fill New password.</label>

							</div>
						</div>
						<div class="section _100">
							<label for="blogpost-title"> Confirrm password: </label>
							<div>
								<input  class="required" type="password" name="cn_psw" id="cn_psw" style="width:55%;">
								<label class="error red" for="cn_psw" id="fill_cn_psw" style="margin-top:-2%;width:53%;display:none;">Please re-confirm password.</label>
								
							</div>
						</div>
						<div>
							<input type="hidden" id="id" name="id" value="<?php echo $this->session->userdata('id');?>"/>
						</div>
					</div>
					<!-- End of .content -->
					<div class="actions">
						<div class="actions-left">
							<input type="reset" id="reset" value="Reset"/>
						</div>
						<div class="actions-right">
							<input type="submit" id="submit" value="Submit"/>
						</div>
					</div>
					<!-- End of .actions -->
				</form>
			</div>
			<!-- End of .box -->
		</div>
		<!-- End of .grid_4 -->

	</div>
	<!-- End of #main_content -->
	
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js"></script>
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.js"><\/script>')</script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<script>window.jQuery.ui || document.write('<script src="js/libs/jquery-ui-1.8.16.min.js"><\/script>')</script>

<!-- scripts concatenated and minified via build script -->
<script defer src="<?php echo base_url(); ?>/design/Template/js/plugins.js"></script>
<!-- REQUIRED: Different own jQuery plugnis -->
<script defer src="<?php echo base_url(); ?>/design/Template/js/mylibs/jquery.ba-resize.js"></script>
<!-- RECOMMENDED when using sidebar: page resizing -->
<script defer src="<?php echo base_url(); ?>/design/Template/js/mylibs/jquery.easing.1.3.js"></script>
<!-- RECOMMENDED: box animations -->
<script defer src="<?php echo base_url(); ?>/design/Template/js/mylibs/jquery.ui.touch-punch.js"></script>
<!-- RECOMMENDED: touch compatibility -->
<script defer src="<?php echo base_url(); ?>/design/Template/js/mylibs/jquery.chosen.js"></script>
<!-- <script defer src="<?php echo base_url();?>/design/Template/js/mylibs/jquery.validate.js"></script> -->
<script src="<?php echo base_url(); ?>design/Template/js/mylibs/jquery.validate.js"></script>
<script defer src="<?php echo base_url(); ?>/design/Template/js/script.js"></script>
<!-- REQUIRED: Generic scripts -->
<!-- end scripts -->

</body>
</html>