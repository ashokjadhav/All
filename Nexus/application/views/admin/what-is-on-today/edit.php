<!-- Start of the main content -->
<div id="main_content">


    <h2 class="grid_12">Edit<div style="float:right;margin-right:5%;">
                    <a href="<?php echo site_url('admin/what_is_on/') ?>"><font size=2> List</font></a>
                </div></h2>
    <div class="clean"></div>
    <center>
        <div class="grid_6" style="width:95%;">

            <div class="box">
                <div class="header">
                    <img src="<?php echo base_url(); ?>design/Template/img/icons/packs/fugue/16x16/calendar.png" alt="" width="16"
                         height="16">
                    <h3>Event</h3>
                    <span></span>
                </div>


                <form id="frm" method="post" class="validate" action="<?php echo site_url('admin/what_is_on/edit/'.$this->uri->segment(4,0));?>" enctype="multipart/form-data">

                <div class="content no-padding">
                    <div class="section _100">
                        <label>
                         From Date :
                        </label>
                        <div>
                           <input type="text" class="required" id="date" value="<?php if (isset($what_is_onDetailsArr[0]['from_date'])) {
                            echo $what_is_onDetailsArr[0]['from_date'];
                        } else {
                            echo set_value('date');
                        } ?>" name="date">
<?php echo form_error('date'); ?>
                        </div>
                    </div>
					 <div class="section _100">
                        <label>
                         To Date :
                        </label>
                        <div>
                           <input type="text" class="required" id="date2" value="<?php if (isset($what_is_onDetailsArr[0]['to_date'])) {
                            echo $what_is_onDetailsArr[0]['to_date'];
                        } else {
                            echo set_value('todate');
                        } ?>" name="todate">
<?php echo form_error('todate'); ?>
                        </div>
                    </div>
					 <div class="section _100">
                        <label>
                    Description :
                        </label>
                        <div>
                           <textarea id="desc" rows="5" cols="40" name="desc" class="required"><?php if (isset($what_is_onDetailsArr[0]['description'])) {
                            echo $what_is_onDetailsArr[0]['description'];
                        } else {
                            echo set_value('desc');
                        } ?></textarea>
<?php echo form_error('desc'); ?>
                        </div>
						</div>
						<div class="section _100">
                        <label>
                            Profile :
                        </label>
                        <div>
                          <input type="file" class="fileupload" name="logo" id="logo">
						  <span style="color:red;" > * Please Upload Images of Size (168px * 218px)</span>
						<?php if ($what_is_onDetailsArr[0]['img']!='') { ?>
                    <img src="<?php echo base_url();?>public/images/Events/<?php echo $what_is_onDetailsArr[0]['img'];?>" width="50" height="80">
					<input type="hidden" id="logo" name="logo" value="<?php echo $what_is_onDetailsArr[0]['img'];?>">
			<?php }else{ ?>
			<img src="<?php echo site_url();?>public/images/no-images1.jpg" width="50" height="80">
			<?php }?>


                                     <?php echo form_error('logo'); ?>

                        </div>
                    </div>
                </div>
                <div class="actions">

                    <div class="actions-right">
                        <input type="submit" id="submit" name="submit" value="Submit"/>
                    </div>
                </div>
                 </form>

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