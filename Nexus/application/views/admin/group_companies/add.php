<script type="text/javascript" src="<?php echo base_url(); ?>design/ckeditor/ckeditor.js"></script>
<!-- Start of the main content -->
<div id="main_content">
    <h2 class="grid_12">Add<div style="float:right;margin-right:5%;">
                    <a href="<?php echo site_url('admin/group_companies/') ?>"><font size=2> List</font></a>
                </div></h2>
    <div class="clean"></div>
    <center>
        <div class="grid_6" style="width:95%;">

            <div class="box">
                <div class="header">
                    <img src="<?php echo base_url(); ?>design/Template/img/icons/packs/fugue/16x16/home--plus.png" alt="" width="16"
                         height="16">
                    <h3>Company Details</h3>
                    <span></span>
                </div>
                
                <form id="frm" method="post" class="validate" action="<?php echo site_url('admin/group_companies/add');?>" enctype="multipart/form-data">
                <div class="content no-padding">
                    <div class="section _100">
                        <label>
                            Company Name : 
                        </label>
                        <div>
                            <input type="text" name="name" id="name" class="required" value=""/>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
                    <div class="section _100">
                                        <span class="label">Description : </span>
                                        <div>
                                            <textarea name="desc" id="desc"  class="ckeditor" style="width:50%;resize:none;">
                                                <?php echo set_value('desc');?>
                                            </textarea>
                                            <label class="error"><?php echo form_error('desc'); ?></label>
                                        </div>
                    </div>
                    <div class="section _100">
                        <label>
                            Company Logo :
                        </label>
                        <div>
                            <input type="file" class="fileupload" name="logo" id="logo">
                            <span style="color:red;" > * Please Upload Images Approx. of Size (150px * 150px)</span>
                        </div>
                    </div>
                    <div class="section _100">
                        <label>
                            Location: 
                        </label>
                        <div>
                            <textarea rows="5" cols="40" name="address" id="address" class="required" maxlength='1000'></textarea>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
                     <div class="section _100">
                        <label>
                            Contact No : 
                        </label>
                        <div>
                            <input type="text" name="contact" id="contact" class="required valid" value=""/>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
                    
                   
                   
                    
                   
                    
                </div>
                <div class="actions">
                    <div class="actions-right">
                        <input type="submit" id="submit" name="submit" value="Submit"/>
                    </div>
                </div>
                <!-- </form> -->
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