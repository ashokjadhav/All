<script type="text/javascript">
var baseURL = "<?php echo base_url();?>";
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>design/ckeditor/ckeditor.js"></script>
<!-- Start of the main content -->
<div id="main_content">
	<h2 class="grid_12">Edit<div style="float:right;margin-right:5%;">
        <a href="<?php echo site_url('admin/history_milestones/') ?>"><font size=2> List</font></a>
    	</div>
	</h2>
	<div class="clean"></div>
		<center>
		<div class="grid_6" style="width:95%;">
			<div class="box">
				<div class="header">
					<img src="<?php echo base_url(); ?>design/Template/img/icons/packs/fugue/16x16/report--pencil.png" alt="" width="16"
					height="16">
					<h3>Notice Board</h3>
					<span></span>
				</div>
			<?php echo form_open('admin/history_milestones/edit/'.$this->uri->segment(4, 0), array('class' => 'validate')); ?>
				<div class="content no-padding">
				<div class="section _100">
				 	<label>Date :</label>
            		<div>
	                	<input type="text" class="required" id="don" value="<?php if (isset($milestonesDetailsArr[0]['date'])) {
	                echo $milestonesDetailsArr[0]['date'];
	            } else {
	                echo set_value('don');
	            } ?>" name="don">
	<?php echo form_error('don'); ?>
	            </div>

				</div>
					<div class="section _100">
						<label>
			                Description :
			            </label>
			            <div>
			                <textarea id="desc" rows="5" cols="40" name="desc" class="ckeditor"><?php if (isset($milestonesDetailsArr[0]['description'])) {
			                echo $milestonesDetailsArr[0]['description'];
			            } else {
			                echo set_value('desc');
			            } ?></textarea>
			<?php echo form_error('desc'); ?>
			            </div>
					</div>
				
						
					<div class="actions">

						<div class="actions-right">
							<input type="submit" id="submit" name="submit" value="Submit"/>
						</div>
					</div>
				<!-- </form> -->
				<?php echo form_close(); ?>
			</div> <!-- End of .box -->
		</div> <!-- End of .grid_6 -->
		</center>
					<div class="clear"></div>
					<div class="clear"></div>

				</div> <!-- End of #main_content -->
				<div class="clear"></div>

			</div> <!-- End of #content-wrapper -->
			<div class="clear push"></div>

		</div> <!-- End of #height-wrapper -->