<!-- Start of the main content -->
    <div id="main_content">
    <?php if ($this->session->flashdata('success')) {
                ?>
                <div class="alert success">
                    <span class="icon"></span><span class="hide">x</span><strong>Success</strong>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php } elseif ($this->session->flashdata('error')) { ?>
                <div class="alert error">
                    <span class="icon"></span><span class="hide">x</span><strong>Error</strong>
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php } ?>
        <h2 class="grid_12">Edit
            <div style="float:right;margin-right:5%;">
                <a href="<?php echo site_url('admin/company_location/') ?>"><font size=2> List</font></a>
            </div>
        </h2>
        <div class="clean"></div>
            <center>
                <div class="grid_6" style="width:95%;">
                    <div class="box">
                        <div class="header">
                            <img src="<?php echo base_url(); ?>design/Template/img/icons/packs/fugue/16x16/marker--pencil.png" alt="" width="16"
                                height="16">
                            <h3>Company Location</h3>
                        </div>
                    <?php echo form_open('admin/company_location/edit/'.$this->uri->segment(4, 0), array('class' => 'validate')); ?>
                  
                        <div class="content no-padding">
                            <div class="section _100">
                                <label>
                                    Company Location :
                                </label>
                            <div>
                            <div>
                            <input type="text" class="required" id="location_name" value="<?php if (isset($locDetailsArr[0]['location_name'])) {
                            echo $locDetailsArr[0]['location_name'];
                        } else {
                            echo set_value('location_name');
                        } ?>" name="location_name">
<?php echo form_error('sub_category'); ?>
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