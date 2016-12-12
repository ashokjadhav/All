<!-- Start of the main content -->
<div id="main_content">

    <h2 class="grid_12">Edit<div style="float:right;margin-right:5%;">
                    <a href="<?php echo site_url('admin/utsav/') ?>"><font size=2> List</font></a>
                </div></h2>
    <div class="clean"></div>
    <center>
        <div class="grid_6" style="width:95%;">

            <div class="box">
                <div class="header">
                    <img src="<?php echo base_url(); ?>design/Template/img/icons/packs/fugue/16x16/document-pdf.png" alt="" width="16"
                         height="16">
                    <h3>HR Form</h3>
                    <span></span>
                </div>


                <form id="frm" method="post" class="validate" action="<?php echo site_url('admin/utsav/edit/'.$this->uri->segment(4,0));?>" enctype="multipart/form-data">

                <div class="content no-padding">
                    <div class="section _100">
                        <label>
                            Title :
                        </label>
                        <div>
                           <input type="text" class="required" id="name" value="<?php if (isset($utsavDetailsArr[0]['name'])) {
                            echo $utsavDetailsArr[0]['name'];
                        } else {
                            echo set_value('name');
                        } ?>" name="name">
<?php echo form_error('name'); ?>
                        </div>
                    </div>
					<div class="section _100">
                        <label>
                           Upload Newsletter :
                        </label>
                        <div>
                          <input type="file" class="fileupload" name="upload" id="upload">
						<?php if ($utsavDetailsArr[0]['form']!='') { ?>
							<a title='Download' href="<?php echo site_url('admin/utsav/download/'.$utsavDetailsArr[0]['id']) ?>"><font size=2><?php echo $utsavDetailsArr[0]['form'];?>
									   </font></a>
						<?php }else{ ?>

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