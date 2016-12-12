<script type="text/javascript" src="<?php echo base_url(); ?>design/ckeditor/ckeditor.js"></script>
<!-- Start of the main content -->
        <div id="main_content">


          <h2 class="grid_12">Edit<div style="float:right;margin-right:5%;">
                    <a href="<?php echo site_url('admin/faq/') ?>"><font size=2> List</font></a>
                </div></h2>
          <div class="clean"></div>
          <center>
          <div class="grid_6" style="width:95%;">

            <div class="box">
              <div class="header">
                <img src="<?php echo base_url(); ?>design/Template/img/icons/packs/fugue/16x16/shadeless/question-octagon.png" alt="" width="16"
                height="16">
                <h3>FAQs</h3>
                <span></span>
              </div>


              <?php echo form_open('admin/faq/edit/'.$this->uri->segment(4, 0), array('class' => 'validate')); ?>

                <div class="content no-padding">


                  <div class="section _100">
                     <label>
                            Question :
                        </label>
                        <div>
                            <input type="text" class="required" id="question" value="<?php if (isset($faqDetailsArr[0]['question'])) {
                            echo $faqDetailsArr[0]['question'];
                        } else {
                            echo set_value('question');
                        } ?>" name="question">
<?php echo form_error('question'); ?>
                        </div>
                  </div>

                  <div class="section _100">
                     <label>
                            Answer:
                        </label>
                        <div>
                            <textarea id="answer" rows="5" cols="40" name="answer" class="ckeditor" style="width:50%;resize:none;"><?php if (isset($faqDetailsArr[0]['answer'])) {
                            echo $faqDetailsArr[0]['answer'];
                        } else {
                            echo set_value('answer');
                        } ?></textarea>
<?php echo form_error('answer'); ?>
                        </div>
      </div>
     <!-- <div class="section _100">
                     <label>
                            Notice Date :
                        </label>
                        <div>
                            <input type="text" class="required" id="don" value="<?php if (isset($jobopeningsDetailsArr[0]['notice_date'])) {
                            echo $jobopeningsDetailsArr[0]['notice_date'];
                        } else {
                            echo set_value('don');
                        } ?>" name="don">
<?php echo form_error('don'); ?>
                        </div>
                  </div>-->

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