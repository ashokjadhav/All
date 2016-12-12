<script type="text/javascript" src="<?php echo base_url(); ?>design/ckeditor/ckeditor.js"></script>
<!-- Start of the main content -->
        <div id="main_content">


          <h2 class="grid_12">Edit<div style="float:right;margin-right:5%;">
                    <a href="<?php echo site_url('admin/group_companies/') ?>"><font size=2> List</font></a>
                </div></h2>
          <div class="clean"></div>
          <center>
          <div class="grid_6" style="width:95%;">

            <div class="box">
              <div class="header">
                <img src="<?php echo base_url(); ?>design/Template/img/icons/packs/fugue/16x16/home--pencil.png" alt="" width="16"
                height="16">
                <h3>Company Details</h3>
                <span></span>
              </div>


              <?php echo form_open('admin/group_companies/edit/'.$this->uri->segment(4, 0), array('class' => 'validate','enctype' => 'multipart/form-data')); ?>

                <div class="content no-padding">


                  <div class="section _100">
                     <label>
                            Company Name :
                        </label>
                        <div>
                            <input type="text" class="required" id="name" value="<?php if (isset($group_companiesDetailsArr[0]['name'])) {
                            echo $group_companiesDetailsArr[0]['name'];
                        } else {
                            echo set_value('name');
                        } ?>" name="name">
<?php echo form_error('name'); ?>
                        </div>
                  </div>
                  <div class="section _100">
                     <label>
                            Description :
                      </label>
                     <div>
                            <textarea name="desc" id="desc"  class="ckeditor" style="width:50%;resize:none;"><?php if (isset($group_companiesDetailsArr[0]['desc'])) {
                            echo $group_companiesDetailsArr[0]['desc'];
                        } else {
                            echo set_value('desc');
                        } ?></textarea>
<?php echo form_error('desc'); ?>
                     </div>
                 </div>
                 <div class="section _100">
                        <label>
                            Company Logo :
                        </label>
                        <div>
                          <input type="file" class="fileupload" name="logo" id="logo">
                          <span style="color:red;" > * Please Upload Images APPROX. of Size (150px * 150px)</span>
                        <?php if ($group_companiesDetailsArr[0]['img']!='') { ?>
                    <img src="<?php echo base_url();?>public/images/company/<?php echo $group_companiesDetailsArr[0]['img'];?>" width="50" height="50">
                    
            <?php }?>

                                     <?php echo form_error('logo'); ?>

                        </div>
                    </div>

                  <div class="section _100">
                     <label>
                            Location :
                        </label>
                        <div>
                            <textarea id="desc" rows="5" cols="40" name="address" class="required" maxlength='1000'><?php if (isset($group_companiesDetailsArr[0]['address'])) {
                            echo $group_companiesDetailsArr[0]['address'];
                        } else {
                            echo set_value('address');
                        } ?></textarea>
<?php echo form_error('address'); ?>
                        </div>
      </div>
      <div class="section _100">
                     <label>
                            Contact No :
                        </label>
                        <div>
                            <input type="text" class="required valid" id="contact" value="<?php if (isset($group_companiesDetailsArr[0]['contact'])) {
                            echo $group_companiesDetailsArr[0]['contact'];
                        } else {
                            echo set_value('contact');
                        } ?>" name="contact">
<?php echo form_error('contact'); ?>
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