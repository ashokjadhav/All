<script type="text/javascript" src="<?php echo base_url(); ?>design/ckeditor/ckeditor.js"></script>

        <!-- Start of the main content -->
        <div id="main_content">


          <h2 class="grid_12">Edit<div style="float:right;margin-right:5%;">
                    <a href="<?php echo site_url('admin/kpi/') ?>"><font size=2> List</font></a>
                </div></h2>
          <div class="clean"></div>
          <center>
          <div class="grid_6" style="width:95%;">

            <div class="box">
              <div class="header">
                <img src="<?php echo base_url(); ?>design/Template/img/icons/packs/fugue/16x16/report--pencil.png" alt="" width="16"
                height="16">
                <h3>KPIs</h3>
                <span></span>
              </div>


              <?php echo form_open('admin/kpi/edit/'.$this->uri->segment(4, 0), array('class' => 'validate')); ?>

                <div class="content no-padding">
                  <div class="section _100">
                     <label>
                            Employee Name :
                        </label>
                        <div>
                            <input type="text" class="required" id="name" value="<?php if (isset($kpisDetailsArr[0]['name'])) {
                            echo $kpisDetailsArr[0]['name'];
                        } else {
                            echo set_value('name');
                        } ?>" name="name">
<?php echo form_error('name'); ?>
<input type="hidden" name="empid" id="empid" value="<?php echo $kpisDetailsArr[0]['user_id'];?>">
                        </div>
                  </div>

                  <div class="section _100">
                     <label>
                            Details :
                        </label>
                        <div>
                             <textarea id="desc" rows="5" cols="40" name="details" class="ckeditor"><?php if (isset($kpisDetailsArr[0]['details'])) {
                            echo $kpisDetailsArr[0]['details'];
                        } else {
                            echo set_value('details');
                        } ?></textarea>
<?php echo form_error('details'); ?>
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