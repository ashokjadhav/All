<script type="text/javascript" src="<?php echo base_url(); ?>design/ckeditor/ckeditor.js"></script>
<!-- Start of the main content -->
<div id="main_content">


    <h2 class="grid_12">Edit<div style="float:right;margin-right:5%;">
                    <a href="<?php echo site_url('admin/thought/') ?>"><font size=2> List</font></a>
                </div></h2>
    <div class="clean"></div>
    <center>
        <div class="grid_6" style="width:95%;">

            <div class="box">
                <div class="header">
                    <img src="<?php echo base_url(); ?>design/Template/img/icons/packs/fugue/16x16/application-form.png" alt="" width="16"
                         height="16">
                    <h3>Thought</h3>
                    <span></span>
                </div>


                <form id="frm" method="post" class="validate" action="<?php echo site_url('admin/thought/edit/'.$this->uri->segment(4,0));?>" enctype="multipart/form-data">

                <div class="content no-padding">
                    <div class="section _100">
                        <label>
                            By :
                        </label>
                        <div>
                           <input type="text" class="required" id="writer" value="<?php if (isset($thoughtDetailsArr[0]['writer'])) {
                            echo $thoughtDetailsArr[0]['writer'];
                        } else {
                            echo set_value('writer');
                        } ?>" name="writer">
<?php echo form_error('writer'); ?>
                        </div>
                    </div>

					 <div class="section _100">
                        <label>
                            Thought Description :
                        </label>
                        <div>
                           <textarea id="desc" rows="5" cols="40" name="desc" class="ckeditor"><?php if (isset($thoughtDetailsArr[0]['description'])) {
                            echo $thoughtDetailsArr[0]['description'];
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
						  <span style="color:red;" > * Please Upload Images of Size (100px * 100px)</span>
						<?php if ($thoughtDetailsArr[0]['img']!='') { ?>
                    <img src="<?php echo base_url();?>files/<?php echo $thoughtDetailsArr[0]['img'];?>" width="50" height="50">
					<input type="hidden" id="logo" name="logo" value="<?php echo $thoughtDetailsArr[0]['img'];?>" width="80" height="80">
			<?php }else{ ?>
			<img src="<?php echo base_url();?>public/images/no-images.jpg" width="80" height="80">
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