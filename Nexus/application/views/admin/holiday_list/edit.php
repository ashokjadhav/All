

        <!-- Start of the main content -->
        <div id="main_content">


          <h2 class="grid_12">Edit<div style="float:right;margin-right:5%;">
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


              <?php echo form_open('admin/holiday_list/edit/'.$this->uri->segment(4, 0), array('class' => 'validate')); ?>

                <div class="content no-padding">


                  <div class="section _100">
                     <label>
                            Select City :
                      </label>
                  <div>
                      <select id="city" name="city" class="required">
                        <option value="" <?php echo set_select('city', '', TRUE); ?>>--Select--</option>
						            <option value="MUMBAI" <?php
							           if (isset($holiday_listDetailsArr[0]['city'])) {
									         if ($holiday_listDetailsArr[0]['city'] == "MUMBAI") {
										          echo 'selected="selected";';
									          }
								          } else {
									            echo set_select('city', 'MUMBAI');
									          } ?>>MUMBAI</option>
						            <option value="COCHIN" <?php
							           if (isset($holiday_listDetailsArr[0]['city'])) {
									         if ($holiday_listDetailsArr[0]['city'] == "COCHIN") {
										          echo 'selected="selected";';
									          }
								          } else {
									            echo set_select('city', 'COCHIN');
								            } ?> >COCHIN</option>
                          </select>
                  </div>
                </div>
                  <div class="section _100">
                     <label>
                            Date :
                    </label>
                        <div>
                            <input type="text" class="required" id="doh" value="<?php if (isset($holiday_listDetailsArr[0]['holiday_date'])) {
                            echo $holiday_listDetailsArr[0]['holiday_date'];
                        } else {
                            echo set_value('date');
                        } ?>" name="date">
<?php echo form_error('date'); ?>
                        </div>
                  </div>





                  <div class="section _100">
                     <label>
                            Description :
                        </label>
                        <div>
                            <textarea id="desc" rows="5" cols="40" name="desc" class="required" maxlength='1000'><?php if (isset($holiday_listDetailsArr[0]['desc'])) {
                            echo $holiday_listDetailsArr[0]['desc'];
                        } else {
                            echo set_value('desc');
                        } ?></textarea>
<?php echo form_error('desc'); ?>
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