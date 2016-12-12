
<!-- Start of the main content -->
<div id="main_content">
    <h2 class="grid_12">Edit<div style="float:right;margin-right:5%;">
                    <a href="<?php echo site_url('admin/my_medals/') ?>"><font size=2> List</font></a>
                </div></h2>
    <div class="clean"></div>
    <center>
        <div class="grid_6" style="width:95%;">

            <div class="box">
                <div class="header">
                    <img src="<?php echo base_url(); ?>design/Template/img/icons/packs/fugue/16x16/report--pencil.png" alt="" width="16"
                         height="16">
                    <h3>Medal</h3>
                    <span></span>
                </div>
                <?php echo form_open('admin/my_medals/edit/'.$this->uri->segment(4, 0), array('class' => 'validate')); ?>
                <div class="content no-padding">
				   <div class="section _100">
                        <label>
                            Employee Name:
                        </label>
                        <div>
                            <input type="text" name="name" id="name" class="required" value="<?php if (isset($medalsDetailsArr[0]['name'])) {
                            echo $medalsDetailsArr[0]['name'];
                        } else {
                            echo set_value('name');
                        } ?>"/>
						<?php echo form_error('name'); ?>
                         <input type="hidden" name="empid" id="empid" value="<?php echo $medalsDetailsArr[0]['user_id'];?>">
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
					  <div class="section _100">
                        <label>
                            From Date :
                        </label>
                        <div>
                            <input type="text" name="fromdate" id="don" class="required" value="<?php if (isset($medalsDetailsArr[0]['from_date'])) {
                            echo $medalsDetailsArr[0]['from_date'];
                        } else {
                            echo set_value('fromdate');
                        } ?>"/>
						<?php echo form_error('fromdate'); ?>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
					  <div class="section _100">
                        <label>
                            To Date :
                        </label>
                        <div>
                            <input type="text" name="todate" id="date2" class="required" value="<?php if (isset($medalsDetailsArr[0]['to_date'])) {
                            echo $medalsDetailsArr[0]['to_date'];
                        } else {
                            echo set_value('todate');
                        } ?>"/>
						<?php echo form_error('todate'); ?>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
                    <div class="section _100">
                        <label>
                            Date of Posting :
                        </label>
                        <div>
                            <input type="text" name="dop" id="dop" class="required" value="<?php if (isset($medalsDetailsArr[0]['dop'])) {
                            echo $medalsDetailsArr[0]['dop'];
                        } else {
                            echo set_value('dop');
                        } ?>"/>
						<?php echo form_error('dop'); ?>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
                    <div class="section _100">
                        <label>
                            Medal For:
                        </label>
                        <div>
                            <input type="text" name="medalfor" id="medalfor" class="required valid" value="<?php if (isset($medalsDetailsArr[0]['medalfor'])) {
                            echo $medalsDetailsArr[0]['medalfor'];
                        } else {
                            echo set_value('medalfor');
                        } ?>"/>
						<?php echo form_error('medalfor'); ?>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    
                     <div class="section _100">
                        <label>
                            Gold :
                        </label>
                        <div>
                            <input type="digits" name="gold" id="totalmedal" class="required valid" value="<?php if (isset($medalsDetailsArr[0]['gold'])) {
                            echo $medalsDetailsArr[0]['gold'];
                        } else {
                            echo set_value('gold');
                        } ?>"/>
							<?php echo form_error('gold'); ?>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
					 <div class="section _100">
                        <label>
                            Silver :
                        </label>
                        <div>
                            <input type="digits" name="silver" id="totalmedal" class="required valid" value="<?php if (isset($medalsDetailsArr[0]['silver'])) {
                            echo $medalsDetailsArr[0]['silver'];
                        } else {
                            echo set_value('silver');
                        } ?>"/>
							<?php echo form_error('silver'); ?>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
					 <div class="section _100">
                        <label>
                            Bronze :
                        </label>
                        <div>
                            <input type="digits" name="bronze" id="totalmedal" class="required valid" value="<?php if (isset($medalsDetailsArr[0]['bronze'])) {
                            echo $medalsDetailsArr[0]['bronze'];
                        } else {
                            echo set_value('bronze');
                        } ?>"/>
							<?php echo form_error('bronze'); ?>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
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
				//console.log(array);

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