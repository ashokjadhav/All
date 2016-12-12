
<!-- Start of the main content -->
<div id="main_content">
    <h2 class="grid_12">Add<div style="float:right;margin-right:5%;">
                    <a href="<?php echo site_url('admin/branding_template/') ?>"><font size=2> List</font></a>
                </div></h2>
    <div class="clean"></div>
    <center>
        <div class="grid_6" style="width:95%;">

            <div class="box">
                <div class="header">
                    <img src="<?php echo base_url(); ?>design/Template/img/icons/packs/fugue/16x16/photo-album--plus.png" alt="" width="16"
                         height="16">
                    <h3>Branding Template</h3>
                    <span></span>
                </div>
                <form id="frm" method="post" class="validate" action="<?php echo site_url('admin/branding_template/add');?>" enctype="multipart/form-data">
				
                <div class="content no-padding">
                    
					<div class="section _100">
                        <label>
                            Branding Photo : 
                        </label>
                        <div>
                            <input type="file" class="fileupload" name="logo" id="logo">
							<span style="color:red;" > * Please Upload Images of Size greater than(200px * 200px)</span>
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