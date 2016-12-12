<!-- Start of the main content -->
<div id="main_content">
	<h2 class="grid_12">
		Add
		<div style="float:right;margin-right:5%;">
			<a href="<?php echo site_url('admin/vision_mission/') ?>"><font size=2> List</font>
			</a>
		</div>
	</h2>
    <div class="clean"></div>
    <center>
		<div class="grid_6" style="width:95%;">
			<div class="box">
				<div class="header">
					<img src="<?php echo base_url();?>design/Template/img/icons/packs/fugue/16x16/film.png" alt="" width="16" height="16">
                    <h3>Vision Mission</h3>
                    <span></span>
                </div>
   <?php echo form_open_multipart('admin/vision_mission/add',array('class'=>'validate'));?>
	<div class="content no-padding">
		<div class="section _100">
			<label>Title :</label>
			<div>
				<input type="text" name="title" id="title" class="required" value="<?php echo set_value('title');?>"/>

				<label><?php echo form_error('title'); ?></label>
			</div>
		</div>
		<div class="section _100">
            <label>
                Upload Video :
            </label>
            <div>
                <input type="file" class="fileupload" name="video" id="video">
				<span style="color:red;" >Please Upload Video Of .mp4 Format.</span>

            </div>
        </div>
	</div>
	<div class="actions">

		<div class="actions-right">
			<input type="submit" id="submit" name='submit' value="Submit"/>
		</div>
	</div>
	<!-- </form> -->
	<?php echo form_close();?>
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
