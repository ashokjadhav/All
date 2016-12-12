
<!-- Start of the main content -->
<div id="main_content">
    <h2 class="grid_12">Add<div style="float:right;margin-right:5%;">
                    <a href="<?php echo site_url('admin/training_programs/') ?>"><font size=2> List</font></a>
                </div></h2>
    <div class="clean"></div>
    <center>
        <div class="grid_6" style="width:95%;">

            <div class="box">
                <div class="header">
                    <img src="<?php echo base_url(); ?>design/Template/img/icons/packs/fugue/16x16/report--pencil.png" alt="" width="16"
                         height="16">
                    <h3>Training Program</h3>
                    <span></span>
                </div>
                <?php echo form_open('admin/training_programs/add', array('class' => 'validate')); ?>
                <div class="content no-padding">
				 <div class="section _100">
                        <label>
                            Employee Name :
                        </label>
                        <div>
                            <input type="text" name="name" id="name" class="required" value="<?php echo set_value('name') ?>"/>
                            <input type="hidden" name="empid" id="empid"><!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
					<div class="section _100">
                        <label>
                            Program Name :
                        </label>
                        <div>
                            <input type="text" name="programname" id="programname" class="required" value="<?php echo set_value('programname') ?>"/>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
					<div class="section _100">
                        <label>
                            Learning Areas :
                        </label>
                        <div>
                            <input type="text" name="learning" id="learning" class="required"/>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
					<div class="section _100">
                        <label>
                            Process:
                        </label>
                        <div>
                            <textarea  class="required" id="process" name="process" cols="40" rows="5"></textarea>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
                    <div class="section _100">
                        <label>
                           Level Of Importance :
                        </label>
                        <div>
                            <input type="text" name="importance" id="importance" class="required" value=""/>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
					 <div class="section _100">
                        <label>
                            Start Date :
                        </label>
                        <div>
                            <input type="text" name="sdate" id="sdate" class="required valid"/>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>

                     <div class="section _100">
                        <label>
                            Deadline :
                        </label>
                        <div>
                            <input type="text" name="deadline" id="deadline1" class="required valid" />
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
					<div class="section _100">
                        <label>
                            Total Hours :
                        </label>
                        <div>
                            <input type="digits" maxlength="2" name="hours" id="hours" class="required valid"/>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
                    <!--<div class="section _100">
                        <label>
                           Periods :
                        </label>
                        <div>
                            <input type="text" name="periods" id="periods" class="required valid" value="<?php echo set_value('periods') ?>"/>
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