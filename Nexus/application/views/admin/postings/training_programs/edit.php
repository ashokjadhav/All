
<!-- Start of the main content -->
<div id="main_content">
    <h2 class="grid_12">Edit<div style="float:right;margin-right:5%;">
                    <a href="<?php echo site_url('admin/training_programs/') ?>"><font size=2> List</font></a>
                </div></h2>
    <div class="clean"></div>
    <center>
        <div class="grid_6" style="width:95%;">

            <div class="box">
                <div class="header">
                    <img src="<?php echo base_url(); ?>design/Template/img/icons/packs/fugue/16x16/report--pencil.png" alt="" width="16"
                         height="16">
                    <h3>Training Program </h3>
                    <span></span>
                </div>
                <?php echo form_open('admin/training_programs/edit/'.$this->uri->segment(4, 0), array('class' => 'validate')); ?>
                <div class="content no-padding">
				   <div class="section _100">
                        <label>
                            Employee Name:
                        </label>
                        <div>
                            <input type="text" name="name" id="name" class="required" value="<?php if (isset($programsDetailsArr[0]['name'])) {
                            echo $programsDetailsArr[0]['name'];
                        } else {
                            echo set_value('name');
                        } ?>"/>
						<?php echo form_error('name'); ?>
                        <input type="hidden" name="empid" id="empid" value="<?php echo $programsDetailsArr[0]['user_id'];?>">
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
					 <div class="section _100">
                        <label>
                            Program Name:
                        </label>
                        <div>
                            <input type="text" name="programname" id="programname" class="required" value="<?php if (isset($programsDetailsArr[0]['programname'])) {
                            echo $programsDetailsArr[0]['programname'];
                        } else {
                            echo set_value('programname');
                        } ?>"/>
						<?php echo form_error('programname'); ?>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
                    <div class="section _100">
                        <label>
                            Learning Areas:
                        </label>
                        <div>
                            <input type="text" name="learning" id="learning" class="required" value="<?php if (isset($programsDetailsArr[0]['learning_areas'])) {
                            echo $programsDetailsArr[0]['learning_areas'];
                        } else {
                            echo set_value('learning_areas');
                        } ?>"/>
						<?php echo form_error('learning_areas'); ?>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
                    <div class="section _100">
                        <label>
                            Process:
                        </label>
                        <div>

                            <textarea name="process" id="process" class="required valid" ><?php if (isset($programsDetailsArr[0]['process'])){
                            echo $programsDetailsArr[0]['process'];
                        } else {
                            echo set_value('process');
                        } ?></textarea>
						<?php echo form_error('process'); ?>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
                     <div class="section _100">
                        <label>
                            Level Of Importance:
                        </label>
                        <div>
                            <input type="text" name="importance" id="importance" class="required valid" value="<?php if (isset($programsDetailsArr[0]['importance_level'])) {
                            echo $programsDetailsArr[0]['importance_level'];
                        } else {
                            echo set_value('importance');
                        } ?>"/>
							<?php echo form_error('importance'); ?>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
					 <div class="section _100">
                        <label>
                            Start Date:
                        </label>
                        <div>
                            <input type="text" name="sdate" id="sdate" class="required valid" value="<?php if (isset($programsDetailsArr[0]['start_date'])) {
                            echo $programsDetailsArr[0]['start_date'];
                        } else {
                            echo set_value('sdate');
                        } ?>"/>
							<?php echo form_error('sdate'); ?>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
					 <div class="section _100">
                        <label>
                            Deadline:
                        </label>
                        <div>
                            <input type="text" name="deadline" id="deadline" class="required valid" value="<?php if (isset($programsDetailsArr[0]['deadline'])) {
                            echo $programsDetailsArr[0]['deadline'];
                        } else {
                            echo set_value('deadline');
                        } ?>"/>
							<?php echo form_error('deadline'); ?>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
					 <div class="section _100">
                        <label>
                            Total Hours :
                        </label>
                        <div>
                            <input type="digits" maxlength="2" name="hours" id="hours" class="required valid" value="<?php if (isset($programsDetailsArr[0]['total_hours'])) {
                            echo $programsDetailsArr[0]['total_hours'];
                        } else {
                            echo set_value('hours');
                        } ?>"/>
							<?php echo form_error('hours'); ?>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
                    <!--<div class="section _100">
                        <label>
                           Period :
                        </label>
                        <div>
                            <input type="text" name="period" id="period" class="required valid" value="<?php if (isset($medalsDetailsArr[0]['period'])) {
                            echo $medalsDetailsArr[0]['period'];
                        } else {
                            echo set_value('period');
                        } ?>"/>
                            <?php echo form_error('period'); ?>
                            <!--<label><?php echo form_error($field->name); ?></label>
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
<script>
  $(function() {
	  var baseURL = "<?php echo base_url();?>";
	  $.ajax({
                type: "GET",
                dataType: "json",
                url: baseURL+"admin/employee_directory/list_employee_name/",
                success: function(data) {

                   if(data!=''){
				      a= data.map(function(elem){
					  return elem.name;
				      }).join(',');

				var array = a.split(',');
				console.log(array);

				   }



    $("#name").autocomplete({
      source: array,
	select: function(event, ui) {
          var name = ui.item.value;
         $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: baseURL+"admin/employee_directory/get_emp_id/"+name,
                    success: function(response) {
                    $.each(response, function(i, v) {
                       $("#empid").val(v.id);
                     });
                    }
                });
    },
    });
	   }
	   });
  });
  </script>