
<!-- Start of the main content -->
<div id="main_content">
    <h2 class="grid_12">Add<div style="float:right;margin-right:5%;">
                    <a href="<?php echo site_url('admin/holiday_list/') ?>"><font size=2> List</font></a>
                </div></h2>
    <div class="clean"></div>
    <center>
        <div class="grid_6" style="width:95%;">

            <div class="box">
                <div class="header">
                    <img src="<?php echo base_url(); ?>design/Template/img/icons/packs/fugue/16x16/report--pencil.png" alt="" width="16"
                         height="16">
                    <h3>Holiday Details</h3>
                    <span></span>
                </div>
                <?php echo form_open('admin/holiday_list/add', array('class' => 'validate')); ?> 
                <div class="content no-padding">
                    <div class="section _100">
                        <label>
                            Select City : 
                        </label>
                         <div>
                            <select id="city" name="city" class="required">

				                            <option value="">--Select--</option>
											 <option value="MUMBAI" <?php echo set_select('city', 'MUMBAI'); ?> >MUMBAI</option>
											 <option value="COCHIN" <?php echo set_select('city','COCHIN'); ?> >COCHIN</option>
											 
				                        </select>
                        </div>
                    </div>
					 <div class="section _100">
                        <label>
                            Date : 
                        </label>
                        <div>
                            <input type="text" name="date" id="doh" class="required valid" value=""/>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
                    <div class="section _100">
                        <label>
                            Description: 
                        </label>
                        <div>
                            <textarea rows="5" cols="40" name="desc" id="desc" class="required" maxlength='1000'></textarea>
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