
        
        <!-- Start of the main content -->
        <div id="main_content">
        
        
          <h2 class="grid_12">Edit<div style="float:right;margin-right:5%;">
                    <a href="<?php echo site_url('admin/location/') ?>"><font size=2> List</font></a>
                </div></h2>
          <div class="clean"></div>
          <center>
          <div class="grid_6" style="width:95%;">
            
            <div class="box">
              <div class="header">
                <img src="<?php echo base_url(); ?>design/Template/img/icons/packs/fugue/16x16/marker--pencil.png" alt="" width="16"
                height="16">
                <h3>Location</h3>
                <span></span>
              </div>
              
              
              <?php echo form_open('admin/location/edit/'.$this->uri->segment(4, 0), array('class' => 'validate')); ?>
              
                <div class="content no-padding">
                  
                  
                  <div class="section _100">
                     <label>
                            Cinema Manager : 
                        </label>
                        <div>
                            <input type="text" class="required" id="name" value="<?php if (isset($locationDetailsArr[0]['name'])) {
                            echo $locationDetailsArr[0]['name'];
                        } else {
                            echo set_value('name');
                        } ?>" name="name">
<?php echo form_error('name'); ?>
                        </div>
                  </div>
                  <div class="section _100">
                     <label>
                            Contact No : 
                        </label>
                        <div>
                            <input type="digits" class="required" id="contact" value="<?php if (isset($locationDetailsArr[0]['contact'])) {
                            echo $locationDetailsArr[0]['contact'];
                        } else {
                            echo set_value('contact');
                        } ?>" name="contact">
<?php echo form_error('contact'); ?>
                        </div>
                  </div>
                  <div class="section _100">
                     <label>
                            City : 
                        </label>
                        <div>
                            <input type="text" class="required" id="city" value="<?php if (isset($locationDetailsArr[0]['city'])) {
                            echo $locationDetailsArr[0]['city'];
                        } else {
                            echo set_value('city');
                        } ?>" name="city">
<?php echo form_error('city'); ?>
                        </div>
                  </div>
                  
                  <div class="section _100">
                     <label>
                            Description : 
                        </label>
                        <div>
                            <textarea id="desc" rows="5" cols="40" name="address" class="required" maxlength='1000'><?php if (isset($locationDetailsArr[0]['address'])) {
                            echo $locationDetailsArr[0]['address'];
                        } else {
                            echo set_value('address');
                        } ?></textarea>
<?php echo form_error('address'); ?>
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